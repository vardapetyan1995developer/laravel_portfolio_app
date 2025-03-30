<x-guest-layout>
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-md-6 mx-auto">
                            <div class="p-5">
                                <form method="POST" action="{{ route('register') }}">
                                    @csrf

                                    <div class="form-group">
                                        <x-input-label for="name" :value="__('Name')" />
                                        <x-text-input id="name" class="form-control form-control-user shadow-none" type="text" name="name" :value="old('name')" autofocus autocomplete="name" placeholder="Enter Your Name..." />
                                        <x-input-error :messages="$errors->get('name')" class="text-danger mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <x-input-label for="email" :value="__('Email')" />
                                        <x-text-input id="email" class="form-control form-control-user shadow-none" type="email" name="email" :value="old('email')" autocomplete="username" placeholder="Enter Email Address..." />
                                        <x-input-error :messages="$errors->get('email')" class="text-danger mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <x-input-label for="password" :value="__('Password')" />
                                        <x-text-input id="password" class="form-control form-control-user shadow-none" type="password" name="password" autocomplete="new-password" placeholder="Password" />
                                        <x-input-error :messages="$errors->get('password')" class="text-danger mt-2" />
                                    </div>
                                    <div class="form-group">
                                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
                                        <x-text-input id="password_confirmation" class="form-control form-control-user shadow-none" type="password" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password" />
                                        <x-input-error :messages="$errors->get('password_confirmation')" class="text-danger mt-2" />
                                    </div>
                                    <x-primary-button class="btn btn-primary btn-user btn-block shadow-none">
                                        {{ __('Register') }}
                                    </x-primary-button>
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="{{ route('login') }}">Already registered?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
