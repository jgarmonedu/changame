        <div class="relative w-full">
            <footer class="py-4 text-center text-sm text-black dark:text-white/70">
                <div class="text-white bg-blue-950 py-20">
                    <h2 class="inline-flex text-3xl font-semibold">¡Entra en el mundo&nbsp;<img
                            src="/images/logoinvertido.png"
                            alt="Logo"
                            width="165"
                            class="">!</h2>

                    <br>
                    <div class="mt-10 pb-8s">
                        <form class="flex items-center max-w-lg mx-auto">
                            <label for="subscription" class="sr-only">Email</label>
                            <div class="relative w-full">
                                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <i class="fa-solid fa-envelope text-green-700"></i>
                                </div>
                                <input type="email" id="subscription" name="subscription"
                                       class="rounded-lg text-md w-full ps-10 bg-gray-50 border border-gray-300 text-gray-900 focus:ring-blue-500 focus:border-blue-500 block  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                       placeholder="{{ __('Email') }}"/>
                                <x-form.input-error :messages="$errors->get('subscription')" class="mt-2"/>
                            </div>
                            <x-form.secondary-button>
                                {{ __('Subscribe') }}
                            </x-form.secondary-button>
                        </form>
                    </div>
                </div>
                <div class="inline-flex align-items-center py-4 gap-10 lg:gap-28">
                    <a href="/company/privacy">{{  __('privacy') }}</a>
                    <a href="/company/cookies">{{  __('cookies') }} </a>
                    <a href="/company/legacy">{{  __('legacy') }} </a>
                    <a href="/company/help">{{  __('Help') }} </a>
                </div>
                <hr class="main-color">
                <div class="grid grid-cols-1 lg:grid-cols-9 text-sm gap-3 lg:gap-10">
                    <div class="flex flex-col items-center lg:col-start-4">
                        <small>
                            Creative Commons ©
                            <script>document.write(new Date().getFullYear());</script>
                        </small>
                        <img class="h-5" src="/images/by-sa.svg" alt="Creative Commons BY-SA"/>
                    </div>
                    <div class="flex flex-col items-center lg:col-start-5">
                        <small>{{ config('app.author', 'Javier García Montero') }}</small>
                        <img src="/images/logoJGM.png" alt="JGM" class="w-10">
                    </div>
                </div>
            </footer>
        </div>
    </div>
</div>
</body>
</html>
