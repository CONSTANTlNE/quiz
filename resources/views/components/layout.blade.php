<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" class="opacity-0" lang="en">


<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Tailwise admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="author" content="Sophi Burchuladze">
    <title>Tests</title>

    <link rel="stylesheet" href="{{asset('assets/css/vendors/highlight.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/vendors/simplebar.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/themes/dagger.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">

    <style>
        .correct-background{
           background: green!important;
            color: white;
        }
        .incorrect-background
        {
            background: red!important;
            color: white;

        }
    </style>
</head>

<body>
@include('components.themeswitcher')


<div class="dagger before:content-[''] before:bg-gradient-to-b before:from-slate-100 before:to-slate-50 before:fixed before:inset-0">
    <div class="[&.loading-page--before-hide]:h-screen [&.loading-page--before-hide]:relative loading-page loading-page--before-hide [&.loading-page--before-hide]:before:block [&.loading-page--hide]:before:opacity-0 before:content-[''] before:transition-opacity before:duration-300 before:hidden before:inset-0 before:h-screen before:w-screen before:fixed before:bg-gradient-to-b before:from-theme-1 before:to-theme-2 before:z-[60] [&.loading-page--before-hide]:after:block [&.loading-page--hide]:after:opacity-0 after:content-[''] after:transition-opacity after:duration-300 after:hidden after:h-16 after:w-16 after:animate-pulse after:fixed after:opacity-50 after:inset-0 after:m-auto after:bg-loading-puff after:bg-cover after:z-[61]">
    </div>
    <div class="fixed top-0 left-0 z-50 h-screen side-menu group side-menu--collapsed">

        {{--Header--}}
        @include('components.header')
        {{-- Sidebar--}}
        @include('components.sidebar')
    </div>
    <div class="content transition-[margin,width] duration-100 px-5 mt-[65px] pt-[31px] pb-16 relative z-10 content--compact xl:ml-[275px] [&.content--compact]:xl:ml-[91px]">
        <div class="container">

            {{--  Show errors from controller  --}}
            @session('error')
            <div role="alert"
                 class="alert relative border rounded-md px-5 py-4 bg-danger border-danger text-white dark:border-danger flex items-center mb-5">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                     stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                     data-lucide="alert-octagon" class="lucide lucide-alert-octagon stroke-[1] mr-2 h-6 w-6">
                    <polygon points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                    <line x1="12" x2="12" y1="8" y2="12"></line>
                    <line x1="12" x2="12.01" y1="16" y2="16"></line>
                </svg>
                {{session('error')}}
            </div>
            @endsession

            {{--  Show VALIDATION errors from controller  --}}
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <div role="alert"
                         class="alert relative border rounded-md px-5 py-4 bg-danger border-danger text-white dark:border-danger flex items-center mb-5">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                             data-lucide="alert-octagon" class="lucide lucide-alert-octagon stroke-[1] mr-2 h-6 w-6">
                            <polygon
                                    points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2"></polygon>
                            <line x1="12" x2="12" y1="8" y2="12"></line>
                            <line x1="12" x2="12.01" y1="16" y2="16"></line>
                        </svg>
                       {{$error}}
                    </div>
                @endforeach
            @endif

            @yield('index')
            @yield('test.create')
            @yield('test.edit')
            @yield('question.edit.multiple')
            @yield('question.edit.free')
            @yield('add_multiple_question')
            @yield('add_free_question')
            @yield('all.users')
            @yield('my-tests')
            @yield('take-test')

        </div>
    </div>
</div>

<!-- BEGIN: Vendor JS Assets-->
<script src="{{asset('assets/js/vendors/dom.js')}}"></script>
<script src="{{asset('assets/js/vendors/tailwind-merge.js')}}"></script>
<script src="{{asset('assets/js/vendors/alert.js')}}"></script>
<script src="{{asset('assets/js/utils/helper.js')}}"></script>
<script src="{{asset('assets/js/vendors/highlight.js')}}"></script>
<script src="{{asset('assets/js/vendors/simplebar.js')}}"></script>
<script src="{{asset('assets/js/vendors/lucide.js')}}"></script>
<script src="{{asset('assets/js/vendors/modal.js')}}"></script>
<script src="{{asset('assets/js/vendors/transition.js')}}"></script>
<script src="{{asset('assets/js/vendors/popper.js')}}"></script>
<script src="{{asset('assets/js/vendors/dropdown.js')}}"></script>
<script src="{{asset('assets/js/components/base/theme-color.js')}}"></script>
<script src="{{asset('assets/js/components/base/lucide.js')}}"></script>
<script src="{{asset('assets/js/components/quick-search.js')}}"></script>
<script src="{{asset('assets/js/components/base/highlight.js')}}"></script>
<script src="{{asset('assets/js/components/base/source.js')}}"></script>
<script src="{{asset('assets/js/components/base/preview-component.js')}}"></script>
<script src="{{asset('assets/js/themes/dagger.js')}}"></script>
<!-- END: Vendor JS Assets-->

</body>

</html>