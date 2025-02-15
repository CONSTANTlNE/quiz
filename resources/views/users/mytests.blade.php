@extends('components.layout')

@section('my-tests')

    <div class="flex h-10 items-center justify-center mb-5">
        <div class="text-lg font-medium group-[.mode--light]:text-white ">
            My Tests
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
                        Test Taken
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
                            <p>{{$test->test->test_name}}</p>
                        </td>

                        <td class="px-5 border-b dark:border-darkmode-300 w-80 border-dashed py-4 dark:bg-darkmode-600 text-center">
                            @if($test->took_test === 1)
                                <p>YES</p>
                            @else
                                <p>NO</p>
                            @endif
                        </td>
                        <td class="px-5 border-b dark:border-darkmode-300 w-80 border-dashed py-4 dark:bg-darkmode-600 text-center">
                            @if($test->took_test === 1)
                                <a href="{{route('user.take.test',$test->test->id)}}"
                                   class="w-full transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 w-24">
                                    Check results
                                </a>
                            @else
                                <a href="{{route('user.take.test',$test->test->id)}}"
                                   class="w-full transition duration-200 border shadow-sm inline-flex items-center justify-center py-2 px-3 rounded-md font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&amp;:hover:not(:disabled)]:bg-opacity-90 [&amp;:hover:not(:disabled)]:border-opacity-90 [&amp;:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-secondary/70 border-secondary/70 text-slate-500 dark:border-darkmode-400 dark:bg-darkmode-400 dark:text-slate-300 [&amp;:hover:not(:disabled)]:bg-slate-100 [&amp;:hover:not(:disabled)]:border-slate-100 [&amp;:hover:not(:disabled)]:dark:border-darkmode-300/80 [&amp;:hover:not(:disabled)]:dark:bg-darkmode-300/80 w-24">
                                    Take Test
                                </a>
                            @endif
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
