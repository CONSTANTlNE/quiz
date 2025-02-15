@extends('components.layout')

@section('all.users')
    <div class="flex h-10 items-center justify-center mb-5">
        <div class="text-lg font-medium group-[.mode--light]:text-white ">
            All Tests
        </div>
    </div>
    <div class="box box--stacked flex flex-col">
        <div class="overflow-auto xl:overflow-visible">
            <table class="w-full text-left border-b border-slate-200/60">
                <thead class="">
                <tr class="">

                    <td class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                        Test Name
                    </td>
                    <td class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                        Total Questions
                    </td>
                    <td class="px-5 border-b dark:border-darkmode-300 border-t border-slate-200/60 bg-slate-50 py-4 font-medium text-slate-500 text-center">
                        Assigned to Users
                    </td>
                    <td class="px-5 border-b dark:border-darkmode-300 w-20 border-t border-slate-200/60 bg-slate-50 py-4 text-center font-medium text-slate-500 text-center">
                        Action
                    </td>
                </tr>
                </thead>
                <tbody>
                @foreach($tests as $index=> $test)
                    <tr class="[&amp;_td]:last:border-b-0">

                        <td class="px-5 border-b dark:border-darkmode-300 w-80 border-dashed py-4 dark:bg-darkmode-600 text-center">
                            <p>{{$test->test_name}}</p>
                        </td>

                        <td class="px-5 border-b dark:border-darkmode-300 w-80 border-dashed py-4 dark:bg-darkmode-600 text-center">
                            <p>{{$test->questions_multiple_count}}</p>
                        </td>
                        <td class="px-5 border-b dark:border-darkmode-300 w-80 border-dashed py-4 dark:bg-darkmode-600 text-center">
                            <a href="{{route('tests.get.assigned',$test->id)}}" class="w-full transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 w-24">
                                Assigned to users ({{$test->users_count}})
                            </a>
                        </td>
                        <td class="px-5 border-b dark:border-darkmode-300 relative border-dashed py-4 dark:bg-darkmode-600">
                            <div class="flex items-center justify-center">
                                <div data-tw-placement="bottom-end" class="dropdown relative h-5">
                                    {{-- ================== dropdown button ========================== --}}
                                    <button data-tw-toggle="dropdown" aria-expanded="false"
                                            class="cursor-pointer h-5 w-5 text-slate-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                             viewBox="0 0 24 24"
                                             fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                             stroke-linejoin="round" data-lucide="more-vertical"
                                             class="lucide lucide-more-vertical stroke-[1] w-5 h-5 fill-slate-400/70 stroke-slate-400/70">
                                            <circle cx="12" cy="12" r="1"></circle>
                                            <circle cx="12" cy="5" r="1"></circle>
                                            <circle cx="12" cy="19" r="1"></circle>
                                        </svg>
                                    </button>

                                    <div data-transition="" data-selector=".show"
                                         data-enter="transition-all ease-linear duration-150"
                                         data-enter-from="absolute !mt-5 invisible opacity-0 translate-y-1"
                                         data-enter-to="!mt-1 visible opacity-100 translate-y-0"
                                         data-leave="transition-all ease-linear duration-150"
                                         data-leave-from="!mt-1 visible opacity-100 translate-y-0"
                                         data-leave-to="absolute !mt-5 invisible opacity-0 translate-y-1"
                                         class="dropdown-menu absolute z-[9999] hidden invisible opacity-0 translate-y-1"
                                         data-state="leave" style="display: none;">
                                        <div class="dropdown-content rounded-md border-transparent bg-white p-2 shadow-[0px_3px_10px_#00000017] dark:border-transparent dark:bg-darkmode-600 w-40">
                                            {{-- ======================= edit test ======================--}}
                                            <a href="{{route('test.edit',$test->id)}}"
                                               class="cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                     stroke-width="2"
                                                     stroke-linecap="round" stroke-linejoin="round"
                                                     data-lucide="check-square"
                                                     class="lucide lucide-check-square stroke-[1] mr-2 h-4 w-4">
                                                    <polyline points="9 11 12 14 22 4"></polyline>
                                                    <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"></path>
                                                </svg>
                                                Edit Test
                                            </a>
                                            {{-- ======================= delete test ======================--}}
                                            <form action="{{route('test.delete')}}" method="post">
                                                @csrf
                                                <input type="hidden" name="test_id" value="{{$test->id}}">
                                                <button class="w-full cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item text-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                         viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                         stroke-width="2"
                                                         stroke-linecap="round" stroke-linejoin="round"
                                                         data-lucide="trash2"
                                                         class="lucide lucide-trash2 stroke-[1] mr-2 h-4 w-4">
                                                        <path d="M3 6h18"></path>
                                                        <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                        <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                        <line x1="10" x2="10" y1="11" y2="17"></line>
                                                        <line x1="14" x2="14" y1="11" y2="17"></line>
                                                    </svg>
                                                    Delete Test
                                                </button>
                                            </form>
                                            {{-- ======================= assign test to user ======================--}}
                                            <button data-tw-merge="" data-tw-toggle="modal"
                                                    data-tw-target="#assignuser{{$index}}"
                                                    class="w-full cursor-pointer flex items-center p-2 transition duration-300 ease-in-out rounded-md hover:bg-slate-200/60 dark:bg-darkmode-600 dark:hover:bg-darkmode-400 dropdown-item">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                     viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                          d="M12 4c4.411 0 8 3.589 8 8s-3.589 8-8 8s-8-3.589-8-8s3.589-8 8-8m0-2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2m5 9h-4V7h-2v4H7v2h4v4h2v-4h4z"/>
                                                </svg>
                                                Assign to User
                                            </button>
                                            <div data-tw-backdrop="static" aria-hidden="true" tabindex="-1"
                                                 id="assignuser{{$index}}"
                                                 class="modal group bg-gradient-to-b from-theme-1/50 via-theme-2/50 to-black/50 transition-[visibility,opacity] w-screen h-screen fixed left-0 top-0 [&:not(.show)]:duration-[0s,0.2s] [&:not(.show)]:delay-[0.2s,0s] [&:not(.show)]:invisible [&:not(.show)]:opacity-0 [&.show]:visible [&.show]:opacity-100 [&.show]:duration-[0s,0.4s]">
                                                <div data-tw-merge=""
                                                     class="w-[90%] mx-auto bg-white relative rounded-md shadow-md transition-[margin-top,transform] duration-[0.4s,0.3s] -mt-16 group-[.show]:mt-16 group-[.modal-static]:scale-[1.05] dark:bg-darkmode-600 sm:w-[460px] px-5 py-10">
                                                    <form action="{{route('test.assign')}}" method="post">
                                                        @csrf
                                                        <input type="hidden" name="test_id" value="{{$test->id}}">
                                                        <div class="text-center">
                                                            <div class="mb-5">
                                                                <div class="mt-3">
                                                                    <label
                                                                            class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
                                                                        Users
                                                                    </label>
                                                                    <select required name="user_id"
                                                                            aria-label="Default select example"
                                                                            class="disabled:bg-slate-100 disabled:cursor-not-allowed disabled:dark:bg-darkmode-800/50 [&amp;[readonly]]:bg-slate-100 [&amp;[readonly]]:cursor-not-allowed [&amp;[readonly]]:dark:bg-darkmode-800/50 transition duration-200 ease-in-out w-full text-sm border-slate-200 shadow-sm rounded-md py-2 px-3 pr-8 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 group-[.form-inline]:flex-1 mt-2 sm:mr-2">
                                                                        <option value="">choose user</option>
                                                                        @foreach($users as $user)
                                                                            <option value="{{$user->id}}">{{$user->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <button data-tw-merge="" data-tw-dismiss="modal"
                                                                    type="button"
                                                                    class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-24">
                                                                Cancel
                                                            </button>

                                                            <button data-tw-merge=""
                                                                    class="transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary w-24">
                                                                Assign
                                                            </button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection