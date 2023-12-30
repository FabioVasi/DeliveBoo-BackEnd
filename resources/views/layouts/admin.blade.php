<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fontawesome 6 cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Usando Vite -->
    @vite(['resources/js/app.js'])
</head>

<body>
    <div id="app" class="h-100">
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark text-dark sticky-top flex-md-nowrap p-2 shadow">

                <div class="container-fluid">

                    <div class="flex-grow-0 col-md-3 col-lg-2 me-0">
                        <h4>DeliveBoo</h4>
                        <h5>Admin - <strong>{{ Auth::user()->name }}</strong></h5>
                    </div>


                    <button class="navbar-toggler position-absolute top-10 bg-dark end-0 me-1  d-md-none collapsed"
                        type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu"
                        aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    {{-- <input class="form-control form-control-dark w-50" type="text" placeholder="Search"
                        aria-label="Search"> --}}

                    <div class="collapse navbar-collapse justify-content-end flex-grow-0" id="navbarNavDarkDropdown">

                        <ul class="navbar-nav">

                            <li class="nav-item dropdown dropstart">
                                <button class="btn btn-outline-dark dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </button>

                                <ul class="dropdown-menu dropdown-menu-dark">
                                    <li>
                                        <a class="dropdown-item" href="{{ url('admin') }}">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.user') }}">{{ __('User') }}</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.dishes.index') }}">{{ __('Dishes') }}</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('admin.orders.index') }}">{{ __('Orders') }}</a>
                                    </li>

                                    {{--
                                        <li>
                                            <a class="dropdown-item" href="{{ url('/') }}">{{ __('Home') }}</a>
                                        </li>
                                    --}}

                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </li>

                        </ul>

                    </div>

                </div>

            </nav>

        </header>

        <div class="container-fluid h-100">
            <div class="row h-100">
                <!-- Definire solo parte del menu di navigazione inizialmente per poi
        aggiungere i link necessari giorno per giorno
        -->
                <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-dark navbar-dark sidebar collapse">
                    <div class="position-sticky pt-3">
                        <ul class="nav flex-column fs-5">

                            {{-- BTN DASHBOARD PER EVENTUALI STATISTICHE --}}
                            <li class="nav-item ">
                                <a class="nav-link text-white border border-secondary rounded-3 p-3 fs-4 my-2 d-flex align-items-center {{ Route::currentRouteName() == 'admin.dashboard' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.dashboard') }}">
                                    <img style="height: 40px" class="me-2"
                                        src="{{ asset('assets/utility_image/logo.PNG') }}" alt="">
                                    {{ __('Dashboard') }}
                                </a>
                            </li>

                            {{-- BTN DASHBOARD PER VISUALILZZARE IL PROFILO UTENTE --}}
                            <li class="nav-item ">
                                <a class="nav-link text-white border border-secondary rounded-3 p-3 fs-4 my-2 d-flex align-items-center {{ Route::currentRouteName() == 'admin.user' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.user') }}">
                                    <img class="me-2" src="{{ asset('assets/utility_image/user_profile.svg') }}"
                                        alt=""> {{ __('User') }}
                                </a>
                            </li>

                            {{-- BTN INDEX PER VISUALILZZARE I PIATTI --}}
                            <li>
                                <a class="nav-link text-white border border-secondary rounded-3 p-3 fs-4 my-2 d-flex align-items-center {{ Route::currentRouteName() == 'admin.dishes.index' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.dishes.index') }}">
                                    <img class="me-2" src="{{ asset('assets/utility_image/pizza-svgrepo-com.svg') }}"
                                        alt="">

                                    {{ __('Dishes') }}
                                </a>
                            </li>

                            {{-- BTN INDEX PER VISUALILZZARE GLI ORDINI --}}
                            <li>
                                <a class="nav-link text-white border border-secondary rounded-3 p-3 fs-4 my-2 d-flex align-items-center {{ Route::currentRouteName() == 'admin.oders' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.orders.index') }}">
                                    <img class="me-2" src="{{ asset('assets/utility_image/orders_tray.svg') }}"
                                        alt="">

                                    {{ __('Orders') }}
                                </a>
                            </li>

                            {{-- BTN CREATE PER AGGIUNGERE PIATTI --}}
                            <li>
                                <a class="nav-link text-white border border-secondary rounded-3 p-3 fs-4 my-2 d-flex align-items-center {{ Route::currentRouteName() == 'admin.dishes.create' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.dishes.create') }}">
                                    <img class="me-2" src="{{ asset('assets/utility_image/fork_and_knife.svg') }}"
                                        alt="">
                                    {{ __('Create Dish') }}
                                </a>
                            </li>

                            {{-- BTN SOFT BIN --}}
                            {{-- <li>
                                <a class="nav-link text-white border border-secondary rounded-3 p-3 fs-4 my-2 d-flex align-items-center {{ Route::currentRouteName() == 'admin.dishes.recycle' ? 'bg-secondary' : '' }}"
                                    href="{{ route('admin.dishes.recycle') }}">
                                    <img class="me-2" src="{{ asset('assets/utility_image/recycle-bin.svg') }}"
                                        alt="">
                                    {{ __('Bin') }}
                                </a>
                            </li> --}}


                        </ul>


                    </div>
                </nav>

                <main class="col-md-9 ms-sm-auto col-lg-10 p-0">
                    <div class="style_box">
                        @yield('content')
                    </div>
                </main>
            </div>
        </div>

    </div>
</body>

</html>
