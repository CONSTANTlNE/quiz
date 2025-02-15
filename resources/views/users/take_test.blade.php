@extends('components.layout')

@section('take-test')

    {{--    <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-7 lg:gap-y-10 xl:grid-cols-10">--}}
    <div class="mt-3.5 flex justify-center">

        <div style="width :100%; max-width: 800px!important;" class="relative flex flex-col">
            {{-- =========== Test Header ========== --}}
            <div class="flex flex-col p-5 box box--stacked">
                <div class="preview-component">
                    <div class="flex flex-col pb-5 mb-5 border-b border-dashed border-slate-300/70 sm:flex-row sm:items-center justify-center">
                        <div class="text-[0.94rem] font-medium">
                            <h1 style="color:black">{{$test->test_name}}</h1>
                        </div>
                    </div>
                </div>
                {{-- =========== show total score if test is taken by user========== --}}
                @if(isset($useranswers))
                    <div class="preview-component">
                        <div class="flex flex-col pb-5 mb-5 border-b border-dashed border-slate-300/70 sm:flex-row sm:items-center justify-center">
                            <div class="text-[0.94rem] font-medium">
                                Total Score :
                                <span style="color:red">
                                    {{$totalscore}}
                                </span>
                                My Score :
                                <span style="color:red">
                                    {{$userscore}}
                                </span>
                                Correct : {{$userscore/$totalscore*100}} %
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            {{--            remove form if test is already taken--}}
            @if(!isset($useranswers))
                <form action="{{route('user.test.store')}}" method="post">
                    @csrf
                    <input type="hidden" name="test_id" value="{{$test->id}}">
                    @endif
                    {{-- =========== Test Questions ========== --}}
                    @foreach($test->questions as $testindex => $question)
                        <div class="flex flex-col p-5 box box--stacked">
                            <div class="preview-component">
                                <div class="w-full flex flex-col pb-5 mb-5 border-b border-dashed border-slate-300/70 sm:flex-row sm:items-center">
                                    <div style="justify-content: space-between!important;"
                                         class="w-full flex justify-between text-[0.94rem] font-medium">
                                        <p>{{$question->question}}</p>
                                        <p>Score : {{$question->score}}</p>
                                        {{--  If question is a free answer and if admin already checked it will show correct or wrong--}}
                                        @if(isset($useranswers) && $question->type==='free' )
                                            @if($useranswers->where('test_question_id', $question->id)->where('user_id', auth()->user()->id)->first()->correct===1)
                                                <p style="color:green">Correct</p>
                                            @elseif($useranswers->where('test_question_id', $question->id)->where('user_id', auth()->user()->id)->first()->correct===null)
                                                <p style="color:black">Not Checked</p>
                                            @else
                                                <p style="color:red">Wrong</p>
                                            @endif
                                        @endif

                                        {{--  only admin for questions with free answer , ADMIN manually assigns correct or wrong--}}
                                        @if(isset($useranswers) && $question->type==='free' &&  auth()->user()->role==='admin')
                                            <form action="{{route('tests.check.manual')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="question_id" value="{{$question->id}}">
                                                <div>
                                                    {{--  correct --}}
                                                    <input type="radio" id="correct{{$question->id}}"
                                                           name="correct_{{$question->id}}" value="1"
                                                            @checked($useranswers->where('test_question_id', $question->id)->first()->correct===1)
                                                    >
                                                    <label class="cursor-pointer"
                                                           for="correct{{$question->id}}">Correct</label>
                                                    {{--  wrong--}}
                                                    <input type="radio" id="wrong{{$question->id}}"
                                                           name="correct_{{$question->id}}" value="0"
                                                            @checked($useranswers->where('test_question_id', $question->id)->first()->correct===0)

                                                    >
                                                    <label class="cursor-pointer"
                                                           for="wrong{{$question->id}}">Wrong</label>
                                                    <div class="flex justify-center mt-2">
                                                        <button class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&:hover:not(:disabled)]:bg-slate-100 [&:hover:not(:disabled)]:border-slate-100 [&:hover:not(:disabled)]:dark:border-darkmode-300/80 [&:hover:not(:disabled)]:dark:bg-darkmode-300/80 w-24">
                                                            Save
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        @endif
                                    </div>
                                </div>

                                <div class="box box--stacked mt-3.5 p-5" id="container{{$testindex}}">
                                    <div>
                                        {{--   if question has multiple answers , show each answer --}}
                                        @if($question->type==='multiple')
                                            @foreach($question->answers as $answerindex=> $answer)
                                                {{--                                                @dd($useranswers->where('question_answer_id', $answer->id)->first()->correct)--}}
                                                <div class="flex gap-4 mt-5">
                                                    <div class="flex group input-group w-full">
                                                        <di class="
                                                         @if(isset($useranswers) && $useranswers->where('question_answer_id', $answer->id)->first()?->correct===0)
                                                          incorrect-background
                                                         @elseif(isset($useranswers) && $answer->correct===1)
                                                         correct-background
                                                         @endif
                                                         py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600 dark:bg-darkmode-900/20 dark:border-darkmode-900/20 dark:text-slate-400 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r">
                                                            {{$answerindex+1}}
                                                        </di>
                                                        <input type="text" aria-label="Email"
                                                               aria-describedby="input-group-email"
                                                               value="{{$answer->answer}}"
                                                               disabled
                                                               class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                    </div>
                                                    <div class="flex items-center mt-2">
                                                        <input type="radio"
                                                               value="{{$answer->id}}"
                                                               name="question_id{{$question->id}}"

                                                               {{-- if validation fails, this code ensures that old values (previously checked by user) stays--}}
                                                               {{ old('question_id'.$question->id) == $answer->id ? 'checked' : '' }}
                                                               {{--   If page is opened (for review) after user submits test   --}}
                                                               @disabled(isset($useranswers))
                                                               {{isset($useranswers) && $useranswers->where('question_answer_id', $answer->id)->first() ? 'checked' : ''}}

                                                               class="correct_checkbox transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type='radio']]:checked:bg-primary [&amp;[type='radio']]:checked:border-primary [&amp;[type='radio']]:checked:border-opacity-10 [&amp;[type='checkbox']]:checked:bg-primary [&amp;[type='checkbox']]:checked:border-primary [&amp;[type='checkbox']]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50">
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <textarea name="question_id{{$question->id}}" rows="3"
                                                      @disabled(isset($useranswers))
                                                      class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50
                                                  dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed
                                                  [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200
                                                  ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90
                                                  focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40
                                                   dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50
                                                    dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md
                                                    file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100
                                                     ">{{old($question->id)}} {{isset($useranswers) ? $useranswers->where('test_question_id', $question->id)->first()->user_answer : ''}}</textarea>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>

                    @endforeach


                    <div class="flex flex-col p-5 box box--stacked">
                        <div class="preview-component">
                            <div class="flex justify-center gap-4">
                                @if(isset($useranswers))
                                    <a href="{{route('user.main')}}"
                                       class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-primary dark:border-primary [&amp;:hover:not(:disabled)]:bg-primary/10 rounded-full mt-6 border-primary/50 px-10">
                                        Return Back
                                    </a>
                                @else
                                    <button
                                            class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-primary dark:border-primary [&amp;:hover:not(:disabled)]:bg-primary/10 rounded-full mt-6 border-primary/50 px-10">
                                        Finish Test
                                    </button>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
        </div>
    </div>

    <script>

    </script>
@endsection