@extends('components.layout')

@section('test.edit')

    {{--    <div class="mt-3.5 grid grid-cols-12 gap-x-6 gap-y-7 lg:gap-y-10 xl:grid-cols-10">--}}
    <div class="mt-3.5 flex justify-center">

        <div style="width :100%; max-width: 800px!important;" class="relative flex flex-col">
            {{-- =========== Test Header ========== --}}
            <div class="flex flex-col p-5 box box--stacked mt-5">
                <div class="preview-component">
                    <div class="flex flex-col pb-5 mb-5 border-b border-dashed border-slate-300/70 sm:flex-row sm:items-center justify-center">
                        <p class="mr-3">Edit Test :  </p>
                        <div class="text-[0.94rem] font-medium"><span style="color:red">{{$test->test_name}}</span>
                        </div>
                    </div>
                </div>
            </div>


            {{-- ================ previously added questionsfor when going on EDIT route ================= --}}
            @foreach($test->questions as $index => $question)
                <div class="flex flex-col p-5 box box--stacked mt-5">
                    <div class="preview-component">

                        <div class="w-full flex flex-col pb-5 mb-5 border-b border-dashed border-slate-300/70 sm:flex-row sm:items-center">
                            <div style="justify-content: space-between!important;"
                                 class="w-full flex justify-between text-[0.94rem] font-medium">
                                <p>{{$index+1}}</p>

                                <p>{{$question->question}}</p>

                                <p>Score : {{$question->score}}</p>

                            </div>
                        </div>
                        <div>
                            @if($question->type!=='free')
                                <div class="box box--stacked mt-3.5 p-5">
                                    <div>
                                        @foreach($question->answers as $answer)
                                            <div class="flex gap-4 mt-5 removeanswer">
                                                <div class="flex group input-group w-full">
                                                    <div id="input-group-email"
                                                         class="py-2 px-3 bg-slate-100 border shadow-sm border-slate-200 text-slate-600 dark:bg-darkmode-900/20 dark:border-darkmode-900/20 dark:text-slate-400 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r">
                                                        Answer
                                                    </div>
                                                    <input type="text" aria-label="Email"
                                                           aria-describedby="input-group-email"
                                                           value="{{$answer->answer}}"
                                                           disabled
                                                           class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 [&amp;[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&amp;[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&amp;:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10">
                                                </div>
                                                <div class="flex items-center mt-2">
                                                    <input type="checkbox"
                                                           @checked($answer->correct===1)
                                                           disabled
                                                           class="correct_checkbox transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;[type='radio']]:checked:bg-primary [&amp;[type='radio']]:checked:border-primary [&amp;[type='radio']]:checked:border-opacity-10 [&amp;[type='checkbox']]:checked:bg-primary [&amp;[type='checkbox']]:checked:border-primary [&amp;[type='checkbox']]:checked:border-opacity-10 [&amp;:disabled:not(:checked)]:bg-slate-100 [&amp;:disabled:not(:checked)]:cursor-not-allowed [&amp;:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&amp;:disabled:checked]:opacity-70 [&amp;:disabled:checked]:cursor-not-allowed [&amp;:disabled:checked]:dark:bg-darkmode-800/50">
                                                    <label for="" class="cursor-pointer label ml-2">Correct</label>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                        <div class="flex justify-center gap-4">

                            <a href="{{$question->type==='multiple' ? route('test.question.edit.multiple',$question->id) : route('test.question.edit.free',$question->id) }} "
                               class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-primary dark:border-primary [&amp;:hover:not(:disabled)]:bg-primary/10 rounded-full mt-6 border-primary/50 px-10">
                                Edit
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach


            {{-- ==============   add new question ===============--}}
            <div class="flex p-5 justify-center gap-4 box box--stacked mt-5">
                <a href="{{route('test.question.add.multiple',$test->id)}}"
                   class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-primary dark:border-primary [&amp;:hover:not(:disabled)]:bg-primary/10 rounded-full mt-6 border-primary/50 px-10">
                    Add Multiple answer question
                </a>

                <a href="{{route('test.question.add.free',$test->id)}}"
                   class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed text-primary dark:border-primary [&amp;:hover:not(:disabled)]:bg-primary/10 rounded-full mt-6 border-primary/50 px-10">
                    Add Free answer question
                </a>
            </div>

        </div>
    </div>

    <script>
        var counter = 0;
    </script>
@endsection