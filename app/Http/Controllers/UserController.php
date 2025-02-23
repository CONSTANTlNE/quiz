<?php

namespace App\Http\Controllers;

use App\Models\QuestionAnswer;
use App\Models\Test;
use App\Models\TestUserAssign;
use App\Models\User;
use App\Models\UserAnswer;
use App\Models\UserAnswerFree;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.all_users', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'role'     => ['required', 'string', 'in:admin,employee'],
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => $request->role,
        ]);

        return back();
    }

    public function update(Request $request)
    {
        $user = User::find($request->user_id);

        if ($user) {
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                // 'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'role' => ['required', 'string', 'in:admin,employee'],
            ]);

            if ($user->email !== $request->email) {
                $request->validate([
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                ]);
            }

            if ($request->password !== null) {
                $request->validate([
                    'password' => ['required', 'string', 'min:8'],
                ]);

                $user->update([
                    'password' => $request->password,
                ]);
            }

            $user->update([
                'name'  => $request->name,
                'email' => $request->email,
                'role'  => $request->role,
            ]);


            return back();
        }

        return back()->with('error', 'User not found');
    }

    public function delete(Request $request)
    {
        $user = User::find($request->user_id);

        if ($user) {
            $user->delete();

            return back();
        }

        return back()->with('error', 'User not found');
    }

    public function userMainPage()
    {
        $user  = auth()->user();
        $tests = TestUserAssign::where('user_id', $user->id)
            ->with('test.questions.answers')
            ->get();

        return view('users.mytests', compact('user', 'tests'));
    }

    // returns view when user wants to take test OR test is already taken and user wants to view result
    public function userTakeTest(Request $request, $id)
    {

        $testUser=User::find($request->user_id);

        $userassigned = TestUserAssign::where('user_id', $testUser->id)
            ->where('test_id', $id)
            ->first();

        // if user has already taken the test
        if ($userassigned && $userassigned->took_test === 1) {

            $useranswers = UserAnswer::where('test_id', $id)
                ->where('user_id', $testUser->id)
                ->get();

            $userscore  = $useranswers->where('correct',1)
                ->where('user_id',  $testUser->id)
                ->sum('score');

            $totalscore  = $useranswers
                ->where('user_id',  $testUser->id)
                ->sum('score');

            $test = Test::with('questions.answers')->find($id);

            return view('users.take_test', compact('test', 'useranswers', 'totalscore', 'userscore','testUser'));
        }

        if ($userassigned) {
            $test = Test::with('questions.answers')->find($id);

            return view('users.take_test', compact('test'));
        }

        return back()->with('error', 'Test not found');
    }

    // user submits filled test
    public function userTestStore(Request $request)
    {

        // IMPORTANT to consider  in   name="question_id{{$question->id}}" we put  value="{{$answer->id}}"

        $userassigned = TestUserAssign::where('user_id', auth()->user()->id)
            ->where('test_id', $request->test_id)
            ->first();

        if ($userassigned) {
            $rules = [];
            // name="1" in View files on inputs is treated as array index by laravel , so we need to convert it to string
            foreach ($userassigned->test->questions as $question) {
                $rules['question_id'.$question->id] = 'required';
            }


            $request->validate($rules);

            // Save Answers
            foreach ($userassigned->test->questions as $question) {
                if ($question->type === 'multiple') {
                    UserAnswer::create([
                        'test_question_id'   => $question->id,
                        'user_id'            => auth()->user()->id,
                        // request name="question_id" value is ID of the answer, name question_id was chosen for request targeting purposes
                        'question_answer_id' => $request->input('question_id'.$question->id),
                        'test_id'            => $request->test_id,
                        'score'=>$question->score,
                        // take correct or false value from answers table and put it here
                        'correct'=>$question->answers()->where('id',$request->input('question_id'.$question->id))->first()->correct
                    ]);
                }


                if ($question->type === 'free') {
                    UserAnswer::create([
                        'test_question_id'   => $question->id,
                        'user_id'            => auth()->user()->id,
                        'test_id'            => $request->test_id,
                        'user_answer'        => $request->input('question_id'.$question->id),
                        'score'=>$question->score
                    ]);
                }
            }

            $userassigned->update([
                'took_test' => true,
            ]);

//            return to_route('user.main');
            return back();

        }

        return back()->with('error', 'Test not found');
    }

}
