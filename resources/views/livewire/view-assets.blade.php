<div>

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


    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">


            </div>

            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" icon-name="search"
                        class="lucide lucide-search w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0"
                        data-lucide="search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
            </div>
        </div>
        <!-- BEGIN: Data List -->
        <div class="intro-y col-span-12 overflow-auto lg:overflow-visible">
            <table class="table table-report -mt-2">
                <thead>
                    <tr>
                        <th class="whitespace-nowrap">S/N</th>
                        <th class="whitespace-nowrap">NAME</th>
                        <th class="text-center whitespace-nowrap">ICON</th>
                        <th class="text-center whitespace-nowrap">SYMBOL</th>
                        <th class="text-center whitespace-nowrap">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($assets as $index=> $asset)
                        <tr class="intro-x">
                            <td class="">
                                {{$index}}
                            </td>
                            <td>
                                <a href="" class="font-medium whitespace-nowrap">{{$asset->symbol}}</a>

                            </td>
                            <td class="text-center">
                                <img src="{{asset('storage/'.$asset->icon)}}" class="h-12 rounded-full" alt="">
                            </td>

                            <td class="text-center">{{$asset->name}}</td>


                            <td class="table-report__action w-56">
                                <div class="flex justify-center items-center">


                                    <a class="flex items-center mr-3" href="#"> <svg
                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            icon-name="check-square" data-lucide="check-square"
                                            class="lucide lucide-check-square w-4 h-4 mr-1">
                                            <polyline points="9 11 12 14 22 4"></polyline>
                                            <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11"></path>
                                        </svg> Complete Payment </a>


                                </div>
                            </td>
                        </tr>
                    @empty
                    <tr>
                        <td colspan="5">No transaction history available</td>
                    </tr>
                    @endforelse

                </tbody>
            </table>
        </div>

    </div>
</div>
