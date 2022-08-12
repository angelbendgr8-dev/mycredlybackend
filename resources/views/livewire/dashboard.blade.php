<div class="top-bar">
    <!-- BEGIN: Breadcrumb -->
    <nav aria-label="breadcrumb" class="-intro-x mr-auto hidden sm:flex">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Application</a></li>
            <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
        </ol>
    </nav>
    <!-- END: Breadcrumb -->
    <!-- BEGIN: Search -->
    @include('top_bar')
    <!-- END: Account Menu -->
</div>
<!-- END: Top Bar -->
<div class="grid grid-cols-12 gap-6">
    <div class="col-span-12 2xl:col-span-9">
        <div class="grid grid-cols-12 gap-6">
            <!-- BEGIN: General Report -->
            <div class="col-span-12 mt-8">
                <div class="intro-y flex items-center h-10">
                    <h2 class="text-lg font-medium truncate mr-5">
                        General Report
                    </h2>
                    <a href="" class="ml-auto flex items-center text-primary"> <i data-lucide="refresh-ccw"
                            class="w-4 h-4 mr-3"></i> Reload Data </a>
                </div>
                <div class="grid grid-cols-12 gap-6 mt-5">
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="shopping-cart" class="report-box__icon text-primary"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                            title="33% Higher than last month"> 33% <i data-lucide="chevron-up"
                                                class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">4.710</div>
                                <div class="text-base text-slate-500 mt-1">Total User</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="credit-card" class="report-box__icon text-pending"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-danger tooltip cursor-pointer"
                                            title="2% Lower than last month"> 2% <i data-lucide="chevron-down"
                                                class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">3.721</div>
                                <div class="text-base text-slate-500 mt-1">New Orders</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="monitor" class="report-box__icon text-warning"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                            title="12% Higher than last month"> 12% <i data-lucide="chevron-up"
                                                class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">2.149</div>
                                <div class="text-base text-slate-500 mt-1">Total Products</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
                        <div class="report-box zoom-in">
                            <div class="box p-5">
                                <div class="flex">
                                    <i data-lucide="user" class="report-box__icon text-success"></i>
                                    <div class="ml-auto">
                                        <div class="report-box__indicator bg-success tooltip cursor-pointer"
                                            title="22% Higher than last month"> 22% <i data-lucide="chevron-up"
                                                class="w-4 h-4 ml-0.5"></i> </div>
                                    </div>
                                </div>
                                <div class="text-3xl font-medium leading-8 mt-6">152.040</div>
                                <div class="text-base text-slate-500 mt-1">Unique Visitor</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-span-12 2xl:col-span-3">
        <div class="2xl:border-l -mb-10 pb-10">
            <div class="2xl:pl-6 grid grid-cols-12 gap-x-6 2xl:gap-x-0 gap-y-6">
                <!-- BEGIN: Transactions -->
                <div class="col-span-12 md:col-span-6  2xl:col-span-12 mt-3 2xl:mt-8">
                    <div class="intro-x flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Transactions
                        </h2>
                    </div>
                    <div class="mt-5">
                        <div class="intro-x">
                            <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="dist/images/profile-9.jpg">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium">Kevin Spacey</div>
                                    <div class="text-slate-500 text-xs mt-0.5">27 June 2020</div>
                                </div>
                                <div class="text-success">+$30</div>
                            </div>
                        </div>
                        <div class="intro-x">
                            <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="dist/images/profile-5.jpg">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium">Angelina Jolie</div>
                                    <div class="text-slate-500 text-xs mt-0.5">28 June 2020</div>
                                </div>
                                <div class="text-success">+$50</div>
                            </div>
                        </div>
                        <div class="intro-x">
                            <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="dist/images/profile-8.jpg">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium">Angelina Jolie</div>
                                    <div class="text-slate-500 text-xs mt-0.5">17 December 2022</div>
                                </div>
                                <div class="text-success">+$28</div>
                            </div>
                        </div>
                        <div class="intro-x">
                            <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="dist/images/profile-2.jpg">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium">Al Pacino</div>
                                    <div class="text-slate-500 text-xs mt-0.5">16 July 2021</div>
                                </div>
                                <div class="text-success">+$156</div>
                            </div>
                        </div>
                        <div class="intro-x">
                            <div class="box px-5 py-3 mb-3 flex items-center zoom-in">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="dist/images/profile-11.jpg">
                                </div>
                                <div class="ml-4 mr-auto">
                                    <div class="font-medium">Robert De Niro</div>
                                    <div class="text-slate-500 text-xs mt-0.5">9 February 2021</div>
                                </div>
                                <div class="text-success">+$33</div>
                            </div>
                        </div>
                        <a href=""
                            class="intro-x w-full block text-center rounded-md py-3 border border-dotted border-slate-400 dark:border-darkmode-300 text-slate-500">View
                            More</a>
                    </div>
                </div>
                <!-- END: Transactions -->
                <!-- BEGIN: Recent Activities -->
                <div class="col-span-12 md:col-span-6 2xl:col-span-12 mt-3">
                    <div class="intro-x flex items-center h-10">
                        <h2 class="text-lg font-medium truncate mr-5">
                            Recent Activities
                        </h2>
                        <a href="" class="ml-auto text-primary truncate">Show More</a>
                    </div>
                    <div
                        class="mt-5 relative before:block before:absolute before:w-px before:h-[85%] before:bg-slate-200 before:dark:bg-darkmode-400 before:ml-5 before:mt-5">
                        <div class="intro-x relative flex items-center mb-3">
                            <div
                                class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="dist/images/profile-5.jpg">
                                </div>
                            </div>
                            <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                <div class="flex items-center">
                                    <div class="font-medium">Morgan Freeman</div>
                                    <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                </div>
                                <div class="text-slate-500 mt-1">Has joined the team</div>
                            </div>
                        </div>
                        <div class="intro-x relative flex items-center mb-3">
                            <div
                                class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="dist/images/profile-12.jpg">
                                </div>
                            </div>
                            <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                <div class="flex items-center">
                                    <div class="font-medium">Denzel Washington</div>
                                    <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                </div>
                                <div class="text-slate-500">
                                    <div class="mt-1">Added 3 new photos</div>
                                    <div class="flex mt-2">
                                        <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in" title="Nike Air Max 270">
                                            <img alt="Midone - HTML Admin Template"
                                                class="rounded-md border border-white"
                                                src="dist/images/preview-1.jpg">
                                        </div>
                                        <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in"
                                            title="Samsung Galaxy S20 Ultra">
                                            <img alt="Midone - HTML Admin Template"
                                                class="rounded-md border border-white"
                                                src="dist/images/preview-2.jpg">
                                        </div>
                                        <div class="tooltip w-8 h-8 image-fit mr-1 zoom-in"
                                            title="Apple MacBook Pro 13">
                                            <img alt="Midone - HTML Admin Template"
                                                class="rounded-md border border-white"
                                                src="dist/images/preview-3.jpg">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="intro-x text-slate-500 text-xs text-center my-4">12 November</div>
                        <div class="intro-x relative flex items-center mb-3">
                            <div
                                class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="dist/images/profile-7.jpg">
                                </div>
                            </div>
                            <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                <div class="flex items-center">
                                    <div class="font-medium">Kate Winslet</div>
                                    <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                </div>
                                <div class="text-slate-500 mt-1">Has changed <a class="text-primary"
                                        href="">Nike Tanjun</a> price and description</div>
                            </div>
                        </div>
                        <div class="intro-x relative flex items-center mb-3">
                            <div
                                class="before:block before:absolute before:w-20 before:h-px before:bg-slate-200 before:dark:bg-darkmode-400 before:mt-5 before:ml-5">
                                <div class="w-10 h-10 flex-none image-fit rounded-full overflow-hidden">
                                    <img alt="Midone - HTML Admin Template" src="dist/images/profile-13.jpg">
                                </div>
                            </div>
                            <div class="box px-5 py-3 ml-4 flex-1 zoom-in">
                                <div class="flex items-center">
                                    <div class="font-medium">Morgan Freeman</div>
                                    <div class="text-xs text-slate-500 ml-auto">07:00 PM</div>
                                </div>
                                <div class="text-slate-500 mt-1">Has changed <a class="text-primary"
                                        href="">Nike Tanjun</a> description</div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Recent Activities -->


            </div>
        </div>
    </div>
</div>
