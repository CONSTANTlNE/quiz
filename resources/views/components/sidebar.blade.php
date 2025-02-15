<div class="side-menu__content absolute inset-y-0 z-10 xl:top-[65px] xl:z-0">
    <div class="box xl:ml-0 border-y-0 border-l-0 rounded-none w-[275px] duration-300 transition-[width,margin] group-[.side-menu--collapsed]:xl:w-[91px] group-[.side-menu--collapsed.side-menu--on-hover]:xl:shadow-[6px_0_12px_-4px_#0000000f] group-[.side-menu--collapsed.side-menu--on-hover]:xl:w-[275px] relative overflow-hidden h-full flex flex-col after:content-[''] after:fixed after:inset-0 after:bg-black/80 after:z-[-1] after:xl:hidden group-[.side-menu--mobile-menu-open]:ml-0 group-[.side-menu--mobile-menu-open]:after:block -ml-[275px] after:hidden">
        <div class="close-mobile-menu fixed ml-[275px] w-10 h-10 items-center justify-center xl:hidden [&.close-mobile-menu--mobile-menu-open]:flex hidden">
            <a class="ml-5 mt-5" href="#">
                <i data-tw-merge="" data-lucide="x" class="stroke-[1] h-8 w-8 text-white"></i>
            </a>
        </div>
        <div class="scrollable-ref w-full h-full z-20 px-5 overflow-y-auto overflow-x-hidden pb-3 [-webkit-mask-image:-webkit-linear-gradient(top,rgba(0,0,0,0),black_30px)] [&:-webkit-scrollbar]:w-0 [&:-webkit-scrollbar]:bg-transparent [&_.simplebar-content]:p-0 [&_.simplebar-track.simplebar-vertical]:w-[10px] [&_.simplebar-track.simplebar-vertical]:mr-0.5 [&_.simplebar-track.simplebar-vertical_.simplebar-scrollbar]:before:bg-slate-400/30">
            <ul class="scrollable">
                @if(auth()->user()->role=='admin')
                    <li class="side-menu__divider">
                        Tests
                    </li>
                    <li>
                        <a href="{{route('test.create')}}" class="side-menu__link ">
                            <svg class="stroke-[1] w-5 h-5 side-menu__link__icon" xmlns="http://www.w3.org/2000/svg"
                                 xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32">
                                <path fill="currentColor"
                                      d="M16 32C7.163 32 0 24.837 0 16S7.163 0 16 0s16 7.163 16 16a16 16 0 0 1-16 16m0-30C8.268 2 2 8.268 2 16s6.268 14 14 14s14-6.268 14-14A14 14 0 0 0 16 2"/>
                                <path fill="currentColor" d="M23 15h-6V9h-2v6H9v2h6v6h2v-6h6z"
                                      class="ouiIcon__fillSecondary"/>
                            </svg>
                            <div class="side-menu__link__title">
                                Create Test
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="{{route('test.all')}}" class="side-menu__link ">
                            <svg class="stroke-[1] w-5 h-5 side-menu__link__icon" xmlns="http://www.w3.org/2000/svg"
                                 width="24" height="24" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                   stroke-width="2">
                                    <path stroke-dasharray="2" stroke-dashoffset="2" d="M4 5h0.01">
                                        <animate fill="freeze" attributeName="stroke-dashoffset" dur="0.1s"
                                                 values="2;0"/>
                                    </path>
                                    <path stroke-dasharray="14" stroke-dashoffset="14" d="M8 5h12">
                                        <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.1s"
                                                 dur="0.2s" values="14;0"/>
                                    </path>
                                    <path stroke-dasharray="2" stroke-dashoffset="2" d="M4 10h0.01">
                                        <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.3s"
                                                 dur="0.1s" values="2;0"/>
                                    </path>
                                    <path stroke-dasharray="14" stroke-dashoffset="14" d="M8 10h12">
                                        <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.4s"
                                                 dur="0.2s" values="14;0"/>
                                    </path>
                                    <path stroke-dasharray="2" stroke-dashoffset="2" d="M4 15h0.01">
                                        <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.6s"
                                                 dur="0.1s" values="2;0"/>
                                    </path>
                                    <path stroke-dasharray="14" stroke-dashoffset="14" d="M8 15h12">
                                        <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.7s"
                                                 dur="0.2s" values="14;0"/>
                                    </path>
                                    <path stroke-dasharray="2" stroke-dashoffset="2" d="M4 20h0.01">
                                        <animate fill="freeze" attributeName="stroke-dashoffset" begin="0.9s"
                                                 dur="0.1s" values="2;0"/>
                                    </path>
                                    <path stroke-dasharray="14" stroke-dashoffset="14" d="M8 20h12">
                                        <animate fill="freeze" attributeName="stroke-dashoffset" begin="1s"
                                                 dur="0.2s" values="14;0"/>
                                    </path>
                                </g>
                            </svg>
                            <div class="side-menu__link__title">
                                All Tests
                            </div>
                        </a>
                        <!-- BEGIN: Third Child -->
                        <!-- END: Third Child -->
                    </li>
                    <li class="side-menu__divider">
                        Users
                    </li>
                    <li>
                        <a href="{{route('users.index')}}" class="side-menu__link ">
                            <svg class="stroke-[1] w-5 h-5 side-menu__link__icon" xmlns="http://www.w3.org/2000/svg"
                                 width="24" height="24" viewBox="0 0 24 24">
                                <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                      d="M16 19h4a1 1 0 0 0 1-1v-1a3 3 0 0 0-3-3h-2m-2.236-4a3 3 0 1 0 0-4M3 18v-1a3 3 0 0 1 3-3h4a3 3 0 0 1 3 3v1a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1Zm8-10a3 3 0 1 1-6 0a3 3 0 0 1 6 0Z"/>
                            </svg>
                            <div class="side-menu__link__title">Users</div>
                        </a>
                    </li>
                @endif
                {{--    ======  User Links ======= --}}
                <li class="side-menu__divider">
                    My Tests
                </li>
                <li>
                    <a href="{{route('user.main')}}" class="side-menu__link ">
                        <svg class="stroke-[1] w-5 h-5 side-menu__link__icon" xmlns="http://www.w3.org/2000/svg"
                             width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                  d="M14 15q.425 0 .738-.312t.312-.738t-.312-.737T14 12.9t-.737.313t-.313.737t.313.738T14 15m-.75-3.2h1.5q0-.725.15-1.062t.7-.888q.75-.75 1-1.212t.25-1.088q0-1.125-.788-1.837T14 5q-1.025 0-1.787.575T11.15 7.1l1.35.55q.225-.625.613-.937T14 6.4q.6 0 .975.338t.375.912q0 .35-.2.663t-.7.787q-.825.725-1.012 1.138T13.25 11.8M8 18q-.825 0-1.412-.587T6 16V4q0-.825.588-1.412T8 2h12q.825 0 1.413.588T22 4v12q0 .825-.587 1.413T20 18zm0-2h12V4H8zm-4 6q-.825 0-1.412-.587T2 20V6h2v14h14v2zM8 4v12z"/>
                        </svg>
                        <div class="side-menu__link__title">My Tests</div>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>