<div class="container sm:px-10">
    <div class="block xl:grid grid-cols-2 gap-4">
        <!-- BEGIN: Login Info -->
        <div class="hidden md:flex flex-col min-h-screen">
            <a href="" class="-intro-x flex items-center pt-5">
                <img alt="Midone - HTML Admin Template" class="w-24" src="{{ asset('images/MYCREDLY2.png') }}">

            </a>
            <div class="my-auto">
                <img alt="Midone - HTML Admin Template" class="-intro-x w-1/2 -mt-16" src="dist/images/illustration.svg">
                <div class="-intro-x text-white font-medium text-4xl leading-tight mt-10">

                    sign in to your account.
                </div>
                <div class="-intro-x mt-5 text-lg text-white text-opacity-70 dark:text-slate-400">Manage all your
                    e-commerce accounts in one place</div>
            </div>
        </div>
        <!-- END: Login Info -->
        <!-- BEGIN: Login Form -->
        <div class="h-screen xl:h-auto flex py-5 xl:py-0 my-10 xl:my-0">
            <div
                class="my-auto mx-auto xl:ml-20 bg-white dark:bg-darkmode-600 xl:bg-transparent px-5 sm:px-8 py-8 xl:p-0 rounded-md shadow-md xl:shadow-none w-full sm:w-3/4 lg:w-2/4 xl:w-auto">
                <h2 class="intro-x font-bold text-2xl xl:text-3xl text-center xl:text-left">
                    Sign In
                </h2>
                <div class="intro-x mt-2 text-slate-400 xl:hidden text-center">A few more clicks to sign in to your
                    account. Manage and monitor all your transaction and wallets accounts in one place</div>
                <div class="intro-x mt-8 ">
                    <input wire:model='email' type="text"
                        class=" login__input form-control py-3 px-4 block  @error('email') border-2 border-red-400 @enderror"
                        placeholder="Email">
                    @error('email')
                        <div>
                            <p class="text-red-400 float-right">Email field is required</p>
                        </div>
                    @enderror
                    <input wire:model='password' type="password"
                        class="intro-x login__input form-control py-3 px-4 block mt-4" placeholder="Password">
                    @error('password')
                        <div class="my-2">
                            <p class="text-red-400 float-right">Password field is required</p>
                        </div>
                    @enderror
                </div>
                <div class="intro-x flex text-slate-600 dark:text-slate-500 text-xs sm:text-sm mt-4 clear-right">
                    <div class="flex items-center mr-auto">
                        <input id="remember-me" type="checkbox" class="form-check-input border mr-2">
                        <label class="cursor-pointer select-none" for="remember-me">Remember me</label>
                    </div>
                    <a href="">Forgot Password?</a>
                </div>
                <div class="intro-x mt-5 flex justify-center xl:mt-8 text-center xl:text-left">
                    <button wire:click='authenticate'
                        class="btn btn-primary py-3 px-4 w-full xl:w-32 xl:mr-3 align-top">
                        <div>
                            <span wire:loading.remove wire:target='authenticate'>
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" icon-name="plus" data-lucide="plus"
                                    class="w-4 h-4 mr-2 lucide lucide-plus">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg>

                            </span>
                            <span wire:loading wire:target='authenticate' class="text-white">
                                <svg width="20" viewBox="0 0 57 57" xmlns="http://www.w3.org/2000/svg"
                                    class="w-8 h-8">
                                    <g fill="none" fill-rule="evenodd">
                                        <g transform="translate(1 1)">
                                            <circle cx="5" cy="50" r="5" fill="white">
                                                <animate attributeName="cy" begin="0s" dur="2.2s"
                                                    values="50;5;50;50" calcMode="linear" repeatCount="indefinite">
                                                </animate>
                                                <animate attributeName="cx" begin="0s" dur="2.2s"
                                                    values="5;27;49;5" calcMode="linear" repeatCount="indefinite">
                                                </animate>
                                            </circle>
                                            <circle cx="27" cy="5" r="5" fill="white">
                                                <animate attributeName="cy" begin="0s" dur="2.2s" from="5"
                                                    to="5" values="5;50;50;5" calcMode="linear"
                                                    repeatCount="indefinite"></animate>
                                                <animate attributeName="cx" begin="0s" dur="2.2s"
                                                    from="27" to="27" values="27;49;5;27"
                                                    calcMode="linear" repeatCount="indefinite"></animate>
                                            </circle>
                                            <circle cx="49" cy="50" r="5" fill="white">
                                                <animate attributeName="cy" begin="0s" dur="2.2s"
                                                    values="50;50;5;50" calcMode="linear" repeatCount="indefinite">
                                                </animate>
                                                <animate attributeName="cx" from="49" to="49"
                                                    begin="0s" dur="2.2s" values="49;5;27;49"
                                                    calcMode="linear" repeatCount="indefinite"></animate>
                                            </circle>
                                        </g>
                                    </g>
                                </svg>
                            </span>

                        </div>
                        Login
                    </button>

                </div>
                <div class="intro-x mt-10 xl:mt-24 text-slate-600 dark:text-slate-500 text-center xl:text-left"> By
                    signin up, you agree to our <a class="text-primary dark:text-slate-200" href="">Terms and
                        Conditions</a> & <a class="text-primary dark:text-slate-200" href="">Privacy Policy</a>
                </div>
            </div>
        </div>
        <!-- END: Login Form -->
    </div>
</div>
