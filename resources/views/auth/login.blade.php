<!DOCTYPE html><!--

<html xmlns="http://www.w3.org/1999/xhtml" class="opacity-0" lang="en"><!-- BEGIN: Head -->
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="UTDQHUMnQs9GC9VYhC9EaF5Db5U3oNpH3LpUisuu">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description"
          content="Tailwise admin is super flexible, powerful, clean & modern responsive tailwind admin template with unlimited possibilities.">
    <meta name="keywords"
          content="admin template, Tailwise Admin Template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="LEFT4CODE">
    <title>Tailwise - Admin Dashboard Template</title>
    <!-- BEGIN: CSS Assets-->
    <link rel="stylesheet" href="assets/css/vendors/tippy.css">
    <link rel="stylesheet" href="assets/css/app.css"> <!-- END: CSS Assets-->
</head>
<!-- END: Head -->
<body>

<div class="container grid grid-cols-12 px-5 py-10 sm:px-10 sm:py-14 md:px-36 lg:h-screen lg:max-w-[1550px] lg:py-0 lg:pl-14 lg:pr-12 xl:px-24 2xl:max-w-[1750px]">
    <div class="relative z-50 h-full col-span-12 p-7 sm:p-14 bg-white rounded-2xl lg:bg-transparent lg:pr-10 lg:col-span-5 xl:pr-24 2xl:col-span-4 lg:p-0 before:content-[''] before:absolute before:inset-0 before:-mb-3.5 before:bg-white/40 before:rounded-2xl before:mx-5">
        <div class="relative z-10 flex flex-col justify-center w-full h-full py-2 lg:py-32">
            <div class="flex h-[55px] w-[55px] items-center justify-center rounded-[0.8rem] border border-primary/30">
                <div class="relative flex h-[50px] w-[50px] items-center justify-center rounded-[0.6rem] bg-white bg-gradient-to-b from-theme-1/90 to-theme-2/90">
                    <div class="relative h-[26px] w-[26px] -rotate-45 [&_div]:bg-white">
                        <div class="absolute inset-y-0 left-0 my-auto h-[75%] w-[20%] rounded-full opacity-50"></div>
                        <div class="absolute inset-0 m-auto h-[120%] w-[20%] rounded-full"></div>
                        <div class="absolute inset-y-0 right-0 my-auto h-[75%] w-[20%] rounded-full opacity-50"></div>
                    </div>
                </div>
            </div>
            <div class="mt-10">
                <div class="text-2xl font-medium">Sign In</div>

                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="mt-6">
                        <label data-tw-merge=""
                               class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right">
                            Email*
                        </label>
                        <input data-tw-merge="" type="text" name="email" placeholder="brad.pitt@left4code.com"
                               class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 block rounded-[0.6rem] border-slate-300/80 px-4 py-3.5">
                        <label data-tw-merge=""
                               class="inline-block mb-2 group-[.form-inline]:mb-2 group-[.form-inline]:sm:mb-0 group-[.form-inline]:sm:mr-5 group-[.form-inline]:sm:text-right mt-4">
                            Password*
                        </label>
                        <input data-tw-merge=""name="password" type="password" placeholder="************"
                               class="disabled:bg-slate-100 disabled:cursor-not-allowed dark:disabled:bg-darkmode-800/50 dark:disabled:border-transparent [&[readonly]]:bg-slate-100 [&[readonly]]:cursor-not-allowed [&[readonly]]:dark:bg-darkmode-800/50 [&[readonly]]:dark:border-transparent transition duration-200 ease-in-out w-full text-sm shadow-sm placeholder:text-slate-400/90 focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus:border-primary focus:border-opacity-40 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 dark:placeholder:text-slate-500/80 [&[type='file']]:border file:mr-4 file:py-2 file:px-4 file:rounded-l-md file:border-0 file:border-r-[1px] file:border-slate-100/10 file:text-sm file:font-semibold file:bg-slate-100 file:text-slate-500/70 hover:file:bg-200 group-[.form-inline]:flex-1 group-[.input-group]:rounded-none group-[.input-group]:[&:not(:first-child)]:border-l-transparent group-[.input-group]:first:rounded-l group-[.input-group]:last:rounded-r group-[.input-group]:z-10 block rounded-[0.6rem] border-slate-300/80 px-4 py-3.5">
                        <div class="flex mt-4 text-xs text-slate-500 sm:text-sm">
                            <div class="flex items-center mr-auto">
                                <input data-tw-merge="" type="checkbox"
                                       class="transition-all duration-100 ease-in-out shadow-sm border-slate-200 cursor-pointer rounded focus:ring-4 focus:ring-offset-0 focus:ring-primary focus:ring-opacity-20 dark:bg-darkmode-800 dark:border-transparent dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&[type='radio']]:checked:bg-primary [&[type='radio']]:checked:border-primary [&[type='radio']]:checked:border-opacity-10 [&[type='checkbox']]:checked:bg-primary [&[type='checkbox']]:checked:border-primary [&[type='checkbox']]:checked:border-opacity-10 [&:disabled:not(:checked)]:bg-slate-100 [&:disabled:not(:checked)]:cursor-not-allowed [&:disabled:not(:checked)]:dark:bg-darkmode-800/50 [&:disabled:checked]:opacity-70 [&:disabled:checked]:cursor-not-allowed [&:disabled:checked]:dark:bg-darkmode-800/50 mr-2.5 border"
                                       id="remember-me">
                                <label class="cursor-pointer select-none" for="remember-me">
                                    Remember me
                                </label>
                            </div>
                            <a href="#">Forgot Password?</a>
                        </div>
                        <div class="mt-5 text-center xl:mt-8 xl:text-left">
                            <button data-tw-merge=""
                                    class="transition duration-200 border shadow-sm inline-flex items-center justify-center px-3 font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed bg-primary border-primary text-white dark:border-primary rounded-full w-full bg-gradient-to-r from-theme-1/70 to-theme-2/70 py-3.5 xl:mr-3">
                                Sign In
                            </button>
                            <button data-tw-merge=""
                                    class="transition duration-200 border shadow-sm inline-flex items-center justify-center px-3 font-medium cursor-pointer focus:ring-4 focus:ring-primary focus:ring-opacity-20 focus-visible:outline-none dark:focus:ring-slate-700 dark:focus:ring-opacity-50 [&:hover:not(:disabled)]:bg-opacity-90 [&:hover:not(:disabled)]:border-opacity-90 [&:not(button)]:text-center disabled:opacity-70 disabled:cursor-not-allowed border-secondary text-slate-500 dark:border-darkmode-100/40 dark:text-slate-300 [&:hover:not(:disabled)]:bg-secondary/20 [&:hover:not(:disabled)]:dark:bg-darkmode-100/10 rounded-full mt-3 w-full bg-white/70 py-3.5">
                                Sign Up
                            </button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<div class="container fixed inset-0 grid h-screen w-screen grid-cols-12 pl-14 pr-12 lg:max-w-[1550px] xl:px-24 2xl:max-w-[1750px]">
    <div class="relative h-screen col-span-12 lg:col-span-5 2xl:col-span-4 z-20 after:bg-white after:hidden after:lg:block after:content-[''] after:absolute after:right-0 after:inset-y-0 after:bg-gradient-to-b after:from-white after:to-slate-100/80 after:w-[800%] after:rounded-[0_1.2rem_1.2rem_0/0_1.7rem_1.7rem_0] before:content-[''] before:hidden before:lg:block before:absolute before:right-0 before:inset-y-0 before:my-6 before:bg-gradient-to-b before:from-white/10 before:to-slate-50/10 before:bg-white/50 before:w-[800%] before:-mr-4 before:rounded-[0_1.2rem_1.2rem_0/0_1.7rem_1.7rem_0]"></div>
    <div class="h-full col-span-7 2xl:col-span-8 lg:relative before:content-[''] before:absolute before:lg:-ml-10 before:left-0 before:inset-y-0 before:bg-gradient-to-b before:from-theme-1 before:to-theme-2 before:w-screen before:lg:w-[800%] after:content-[''] after:absolute after:inset-y-0 after:left-0 after:w-screen after:lg:w-[800%] after:bg-texture-white after:bg-fixed after:bg-center after:lg:bg-[25rem_-25rem] after:bg-no-repeat">
        <div class="sticky top-0 z-10 flex-col justify-center hidden h-screen ml-16 lg:flex xl:ml-28 2xl:ml-36">
            <div class="text-[2.6rem] font-medium leading-[1.4] text-white xl:text-5xl xl:leading-[1.2]">
                Embrace Excellence <br> in Dashboard Development
            </div>
            <div class="mt-5 text-base leading-relaxed text-white/70 xl:text-lg">
                Unlock the potential of Tailwise, where developers craft
                meticulously structured, visually stunning dashboards with
                feature-rich modules. Join us today to shape the future of your
                application development.
            </div>
            <div class="flex flex-col gap-3 mt-10 xl:flex-row xl:items-center">
                <div class="flex items-center">
                    <div class="image-fit zoom-in h-9 w-9 2xl:h-11 2xl:w-11">
                        <img data-placement="top" title="Brad Pitt" src="assets/images/users/user5-50x50.jpg"
                             alt="Tailwise - Admin Dashboard Template"
                             class="tooltip cursor-pointer rounded-full border-[3px] border-white/50">
                    </div>
                    <div class="-ml-3 image-fit zoom-in h-9 w-9 2xl:h-11 2xl:w-11">
                        <img data-placement="top" title="Cate Blanchett" src="assets/images/users/user8-50x50.jpg"
                             alt="Tailwise - Admin Dashboard Template"
                             class="tooltip cursor-pointer rounded-full border-[3px] border-white/50">
                    </div>
                    <div class="-ml-3 image-fit zoom-in h-9 w-9 2xl:h-11 2xl:w-11">
                        <img data-placement="top" title="Angelina Jolie" src="assets/images/users/user4-50x50.jpg"
                             alt="Tailwise - Admin Dashboard Template"
                             class="tooltip cursor-pointer rounded-full border-[3px] border-white/50">
                    </div>
                    <div class="-ml-3 image-fit zoom-in h-9 w-9 2xl:h-11 2xl:w-11">
                        <img data-placement="top" title="Johnny Depp" src="assets/images/users/user7-50x50.jpg"
                             alt="Tailwise - Admin Dashboard Template"
                             class="tooltip cursor-pointer rounded-full border-[3px] border-white/50">
                    </div>
                </div>
                <div class="text-base text-white/70 xl:ml-2 2xl:ml-3">
                    Over 7k+ strong and growing! Your journey begins here.
                </div>
            </div>
        </div>
    </div>
</div>
<!-- BEGIN: Vendor JS Assets-->
<script src="assets/js/vendors/dom.js"></script>
<script src="assets/js/vendors/tailwind-merge.js"></script>
<script src="assets/js/vendors/lucide.js"></script>
<script src="assets/js/vendors/alert.js"></script>
<script src="assets/js/vendors/tippy.js"></script>
<script src="assets/js/vendors/modal.js"></script>
<script src="assets/js/components/base/theme-color.js"></script>
<script src="assets/js/components/base/lucide.js"></script>
<script src="assets/js/components/base/tippy.js"></script> <!-- END: Vendor JS Assets-->
<!-- BEGIN: Pages, layouts, components JS Assets-->
<!-- END: Pages, layouts, components JS Assets-->
</body>

</html>