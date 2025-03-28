<x-guest-layout>
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="alert alert-info text-sm">
                {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
            </div>

            @if (session('status') == 'verification-link-sent')
                <div class="alert alert-success text-sm">
                    {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                </div>
            @endif

            <div class="mt-4 d-flex justify-content-between">
                <form method="POST" action="{{ route('verification.send') }}">
                    @csrf
                    <x-primary-button class="btn btn-primary">
                        {{ __('Resend Verification Email') }}
                    </x-primary-button>
                </form>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="btn btn-secondary text-decoration-none text-white">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</x-guest-layout>
