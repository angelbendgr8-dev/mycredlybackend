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
    <div class="mx-auto w-[45vw] my-12">
        <div class="intro-y box ">
            <div
                class="flex flex-col justify-center sm:flex-row items-center p-5 border-b border-slate-200/60 dark:border-darkmode-400">
                <h2 class="font-medium text-base ">
                    Add Assets
                </h2>

            </div>
            <div id="input" class="p-5">
                <div class="preview">
                    <div>
                        <label for="regular-form-1" class="form-label">Account Name</label>
                        <input wire:model='account_name' id="regular-form-1" type="text" class="form-control"
                            placeholder="Account Name">
                    </div>
                    @error('account_name')
                        <div class="my-2">
                            <p class="text-red-400 float-right">{{ $message }}</p>
                        </div>
                    @enderror

                    <div class="mt-3 clear-right">
                        <label for="regular-form-2" class="form-label">Account Number</label>
                        <input wire:model='account_number' id="regular-form-2" type="text" class="form-control py-2"
                            placeholder="Account Number">
                    </div>
                    @error('account_number')
                        <div class="my-2">
                            <p class="text-red-400 float-right">{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="mt-3 clear-right">
                        <label for="regular-form-3" class="form-label">Bank Name</label>
                        <input wire:model='bank_name' id="regular-form-3" type="text" class="form-control"
                            placeholder="Bank Name">

                    </div>
                    @error('bank_name')
                        <div class="my-2">
                            <p class="text-red-400 float-right">{{ $message }}</p>
                        </div>
                    @enderror
                    <div class="flex flex-row justify-center clear-right">
                        <a href="#" wire:click='addBank' class="btn btn-primary self-center mr-1 mb-2 px-4">

                            <div>
                                <span wire:loading wire:target='addBank'>
                                    <svg width="20" viewBox="0 0 58 58" xmlns="http://www.w3.org/2000/svg"
                                        class="w-4 h-4 ml-2">
                                        <g fill="none" fill-rule="evenodd">
                                            <g transform="translate(2 1)" stroke="white" stroke-width="1.5">
                                                <circle cx="42.601" cy="11.462" r="5" fill-opacity="1"
                                                    fill="white">
                                                    <animate attributeName="fill-opacity" begin="0s" dur="1.3s"
                                                        values="1;0;0;0;0;0;0;0" calcMode="linear"
                                                        repeatCount="indefinite">
                                                    </animate>
                                                </circle>
                                                <circle cx="49.063" cy="27.063" r="5" fill-opacity="0"
                                                    fill="white">
                                                    <animate attributeName="fill-opacity" begin="0s" dur="1.3s"
                                                        values="0;1;0;0;0;0;0;0" calcMode="linear"
                                                        repeatCount="indefinite">
                                                    </animate>
                                                </circle>
                                                <circle cx="42.601" cy="42.663" r="5" fill-opacity="0"
                                                    fill="white">
                                                    <animate attributeName="fill-opacity" begin="0s" dur="1.3s"
                                                        values="0;0;1;0;0;0;0;0" calcMode="linear"
                                                        repeatCount="indefinite">
                                                    </animate>
                                                </circle>
                                                <circle cx="27" cy="49.125" r="5" fill-opacity="0"
                                                    fill="white">
                                                    <animate attributeName="fill-opacity" begin="0s" dur="1.3s"
                                                        values="0;0;0;1;0;0;0;0" calcMode="linear"
                                                        repeatCount="indefinite">
                                                    </animate>
                                                </circle>
                                                <circle cx="11.399" cy="42.663" r="5"
                                                    fill-opacity="0" fill="white">
                                                    <animate attributeName="fill-opacity" begin="0s"
                                                        dur="1.3s" values="0;0;0;0;1;0;0;0" calcMode="linear"
                                                        repeatCount="indefinite">
                                                    </animate>
                                                </circle>
                                                <circle cx="4.938" cy="27.063" r="5"
                                                    fill-opacity="0" fill="white">
                                                    <animate attributeName="fill-opacity" begin="0s"
                                                        dur="1.3s" values="0;0;0;0;0;1;0;0" calcMode="linear"
                                                        repeatCount="indefinite">
                                                    </animate>
                                                </circle>
                                                <circle cx="11.399" cy="11.462" r="5"
                                                    fill-opacity="0" fill="white">
                                                    <animate attributeName="fill-opacity" begin="0s"
                                                        dur="1.3s" values="0;0;0;0;0;0;1;0" calcMode="linear"
                                                        repeatCount="indefinite">
                                                    </animate>
                                                </circle>
                                                <circle cx="27" cy="5" r="5"
                                                    fill-opacity="0" fill="white">
                                                    <animate attributeName="fill-opacity" begin="0s"
                                                        dur="1.3s" values="0;0;0;0;0;0;0;1" calcMode="linear"
                                                        repeatCount="indefinite">
                                                    </animate>
                                                </circle>
                                            </g>
                                        </g>
                                    </svg>

                                </span>
                            </div>
                            Add <span wire:loading wire:target='addBank'>ing</span>
                        </a>

                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
