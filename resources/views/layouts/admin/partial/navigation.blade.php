<nav x-data="{ open: false }" class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <x-application-logo class="h-9 w-auto text-dark" />
        </a>

        <button class="navbar-toggler" type="button" @click="open = !open">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" :class="{'show': open}" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="nav-link">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </li>
            </ul>

            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <x-dropdown-link :href="route('profile.edit')" class="dropdown-item">
                                {{ __('Profile') }}
                            </x-dropdown-link>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')" class="dropdown-item"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
