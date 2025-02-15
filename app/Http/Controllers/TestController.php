<?php

namespace App\Http\Controllers;

use App\Models\QuestionAnswer;
use App\Models\Test;
use App\Models\TestQuestion;
use App\Models\TestUserAssign;
use App\Models\User;
use App\Models\UserAnswer;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function allTests()
    {
        $tests = Test::with('questions')
            ->withCount('questions')
            ->withCount('users')
            ->get();

        $users = User::all();

        return view('admin.tests.all_tests', compact('tests', 'users'));
    }

    public function createTest()
    {
        return view('admin.tests.createtest');
    }

    public function storeTest(Request $request)
    {

        $request->validate([
            'test_name'=>'required|string|max:255'
        ]);

        $test            = new Test();
        $test->test_name = $request->test_name;
        $test->save();

        return to_route('test.edit', ['id' => $test->id]);
    }

    public function editTest($id)
    {
        $test = Test::with('questions.answers')->find($id);


//        $test = Test::where('id', $id)
//            ->with('questions.answers')
//            ->first();


        if ($test) {
            return view('admin.tests.test_edit', compact('test'));
        }

        return back()->with('error', 'Test not found');
    }

    public function deleteTest(Request $request){

        $test = Test::find($request->test_id);

        if ($test) {
            $test->delete();
            return back();
        }

        return back()->with('error', 'Test not found');

    }


    // Multiple Questions


    public function addMultipleQuestion($id){
        $test = Test::with('questions.answers')->find($id);

        if ($test) {
            return view('admin.tests.question_multiple_add', compact('test'));
        }

        return back()->with('error', 'Test not found');

    }

    public function storeMultipleQuestion(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'correct_answer'=>'required|array',
            'correct_answer.*' => 'required|boolean',
            'answer' => 'required|array',
            'answer.*' => 'required|string|max:255',
            'score'=>'required|numeric|min:1'
        ]);

        $test = Test::find($request->test_id);


        if ($test) {
            $question           = new TestQuestion();
            $question->test_id  = $test->id;
            $question->score=$request->score;
            $question->question = $request->question;
            $question->type='multiple';
            $question->save();

            foreach ($request->answer as $index => $answer) {
                $answerModel                   = new QuestionAnswer();
                $answerModel->test_question_id = $question->id;
                $answerModel->answer           = $answer;
                $answerModel->correct          = $request->correct_answer[$index];
                $answerModel->test_id          = $request->test_id;
//                $answerModel->type='multiple';
                $answerModel->save();
            }
        }

        return to_route('test.edit',$test->id);
    }

    public function editMultipleQuestion($id)
    {
        $question = TestQuestion::find($id);

        if ($question) {
            return view('admin.tests.edit_multiple_question', compact('question'));
        }

        return back()->with('error', 'Test question was not found');
    }

    public function updateMultipleQuestion(Request $request)
    {

        $request->validate([
            'question' => 'required|string|max:255',
            'correct_answer'=>'required|array',
            'correct_answer.*' => 'required|boolean',
            'answer' => 'required|array',
            'answer.*' => 'required|string|max:255',
            'score'=>'required|numeric|min:1'

        ]);

        $question = TestQuestion::find($request->question_id);

        if ($question) {
            $question->update([
                'question' => $request->question,
                'score' => $request->score,
            ]);

            $question->answers()->delete();


            foreach ($request->answer as $index => $answer) {
                $answerModel                   = new QuestionAnswer();
                $answerModel->test_question_id = $question->id;
                $answerModel->answer           = $answer;
                $answerModel->test_id          = $question->test->id;
                $answerModel->correct          = $request->correct_answer[$index];
                $answerModel->save();
            }

            return to_route('test.edit',$question->test->id);
        }

        return back()->with('error', 'Question not found');
    }


    // Free Questions


    public function addFreeQuestion( $id){
        $test = Test::with('questions.answers')->find($id);

        if ($test) {
            return view('admin.tests.question_free_add', compact('test'));
        }

        return back()->with('error', 'Test not found');

    }

    public function storeFreeQuestion(Request $request)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'score'=>'required|numeric|min:1'
        ]);

        $test = Test::find($request->test_id);


        if ($test) {
            $question           = new TestQuestion();
            $question->test_id  = $test->id;
            $question->score=$request->score;
            $question->type='free';
            $question->question = $request->question;
            $question->save();
        }

        return to_route('test.edit',$test->id);
    }

    public function editFreeQuestion($id)
    {
        $question = TestQuestion::find($id);

        if ($question) {
            return view('admin.tests.edit_free_question', compact('question'));
        }

        return back()->with('error', 'Test question was not found');
    }

    public function updateFreeQuestion(Request $request)
    {

        $request->validate([
            'question' => 'required|string|max:255',
            'score'=>'required|numeric|min:1'

        ]);

        $question = TestQuestion::find($request->question_id);

        if ($question) {
            $question->update([
                'question' => $request->question,
                'score' => $request->score,
            ]);


            return to_route('test.edit',$question->test->id);
        }

        return back()->with('error', 'Question not found');
    }






    public function assignTestUser(Request $request)
    {
        $request->validate([
            'test_id' => 'required|exists:tests,id',
        ]);

        $user = User::find($request->user_id);

        if ($user) {
            $testassign          = new TestUserAssign();
            $testassign->user_id = $request->user_id;
            $testassign->test_id = $request->test_id;
            $testassign->save();

            return back();
        }

        return back()->with('error', 'User not found');
    }

    public function userAssigned($id)
    {

//        $test_assignments = TestUserAssign::where('test_id', $id)
//            ->with('test', 'user.answers')
//            ->get();


        $test_assignments = TestUserAssign::where('test_id', $id)
            ->with(['test', 'user.answers' => function($query) use ($id) {
                $query->where('test_id', $id)->where('correct', 1);
            }])
            ->get();


        if ($test_assignments->isEmpty()) {
            return back()->with('error', 'No assignment found');
        }

        $total_score = $test_assignments->first()->test->questions->sum('score');

        // adds a new property " total_score "  to each assignment
        $test_assignments->each(function ($assignment) {
            $assignment->user_score = $assignment->user->answers->where('correct', 1)->sum('score');
        });

        $test_assignments->each(function ($assignment) use ($total_score) {
            $assignment->total_score = $total_score;
        });



            return view('admin.tests.user_assigned_tests', compact('test_assignments', 'total_score'));


    }

    public function checkTestManual(Request $request){

        $userAnswers = UserAnswer::where('test_question_id', $request->question_id)->first();

        if ($userAnswers) {
            $userAnswers->correct=$request->input('correct_'.$request->question_id);
            $userAnswers->save();
            return back();
        }

        return back()->with('error', 'No assignment found');

    }

}
