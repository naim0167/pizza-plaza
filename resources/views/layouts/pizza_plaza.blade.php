<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="https://cdn-icons-png.flaticon.com/512/6978/6978255.png" type="image/png">
        <title>Pizza Plaza</title>
    
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    
        <!-- Popper.js -->
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
        <!-- Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
        <!-- DataTables CSS -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
    
        <!-- DataTables and DataTables Buttons JS -->
        <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/dataTables.buttons.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.html5.min.js"></script>
        <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.4.2/js/buttons.print.min.js"></script>

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/86c7cc40c1.js" crossorigin="anonymous"></script>
    </head>
    
<body>
    <nav class="navbar navbar-expand-sm bg-dark">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-light" href="/main">Pizza Plaza</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="/main">Startseite</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="/about">Über uns</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="/contact">Kontakt</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="/imprint">Impressum</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="/order">Order</a>
            </li>    
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-light" href="/cart">
                    <i class="fas fa-shopping-cart"></i>
                    <span class="badge badge-pill badge-danger">
                        CART
                    </span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light" href="/profile">🛠️{{ Auth::user()->name }}</a>
            </li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();" class="nav-link text-light" >
                    {{ __('Log Out') }}❌
                </x-responsive-nav-link>
            </form>
        </ul>
    </nav>
    {{-- @if($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <strong>{{ $message }} </strong>
        </div>
    @endif

    @if($message = Session::get('error'))
        <div class="alert alert-danger alert-block">
            <strong>{{ $message }} </strong>
        </div>  
    @endif --}}

    @yield('main')
    
</body>
</html>
