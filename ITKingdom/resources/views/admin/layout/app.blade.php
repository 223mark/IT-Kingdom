<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>IT Kingdom Admin Panel</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/dist/css/adminlte.min.css') }}">
    <!-- fontawesom -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
            </ul>
        </nav>
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <a href="#" class="brand-link">

                <span class="brand-text font-weight-light mx-2">IT Kingdom </span>
            </a>
            <div class="sidebar">
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="{{ route('dashboard') }}" class="nav-link">
                                <i class="fas fa-user-circle"></i>
                                <p>
                                    My Profile
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin#category') }}" class="nav-link">
                                <i class="fa-solid fa-bars"></i>
                                <p>
                                    Category
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('phoneList#index') }}" class="nav-link">
                                <i class="fa-solid fa-mobile"></i>
                                <p>
                                    Phone List
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin#laptopIndex') }}" class="nav-link">
                                <i class="fa-sharp fa-solid fa-laptop"></i>
                                <p>
                                    Laptop List
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin#accessoriesIndex') }}" class="nav-link">
                                <i class="fa-solid fa-keyboard"></i>
                                <p>
                                    Accessories
                                </p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{ route('admin#userList') }}" class="nav-link">
                                <i class="fa-solid fa-user"></i>
                                <p>
                                    User List
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin#postIndex') }}" class="nav-link">
                                <i class="fa-solid fa-barcode"></i>
                                <p>
                                    Post
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('admin#getOrder') }}" class="nav-link">
                                <i class="fa-solid fa-truck-arrow-right"></i>
                                <p>
                                    Order Process
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" class="nav-link" method="POST">
                                @csrf
                                <button class="btn btn-danger" type="submit"><i
                                        class="fas fa-sign-out-alt mx-2"></i>Logout</button>
                            </form>

                        </li>
                    </ul>
                </nav>
            </div>
        </aside>

        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row ">
                        @yield('content')
                    </div>
                </div>
        </div>
        </section>
    </div>

    <aside class="control-sidebar constrol-sidebar-dark">
    </aside>
    </div>
    <script src="{{ asset('/plugins/jquery/jquery.min.js') }}.."></script>
    <script src="{{ asset('/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('/dist/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('/dist/js/demo.js') }}"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous">
    </script>
</body>

</html>
