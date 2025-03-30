<x-guest-layout>
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="p-5">
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <div class="form-group">
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="form-control form-control-user" type="email" name="email" :value="old('email')" autofocus autocomplete="email" placeholder="Enter Email Address..." />
                                        <x-input-error :messages="$errors->get('email')" class="text-danger mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <x-input-label for="password" :value="__('Password')" />
                                        <x-text-input id="password" class="form-control form-control-user" type="password" name="password" autocomplete="password" placeholder="Password" />
                                        <x-input-error :messages="$errors->get('password')" class="text-danger mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input id="remember_me" type="checkbox" class="custom-control-input shadow-none" name="remember">
                                            <label for="remember_me" class="custom-control-label">{{ __('Remember me') }}</label>
                                        </div>
                                    </div>
                                    <x-primary-button class="btn btn-primary btn-user btn-block shadow-none">
                                        {{ __('Log in') }}
                                    </x-primary-button>
                                    <hr>
                                    <a href="#" class="btn btn-google btn-user btn-block">
                                        <i class="fab fa-google fa-fw"></i> Login with Google
                                    </a>
                                    <a href="#" class="btn btn-facebook btn-user btn-block">
                                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                    </a>
                                </form>
                                <hr>
                                <div class="text-center">
                                    @if (Route::has('password.request'))
                                        <a class="small" href="{{ route('password.request') }}">Forgot Password?</a>
                                    @endif
                                </div>
                                <div class="text-center">
                                    <a class="small" href="{{ route('register') }}">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
