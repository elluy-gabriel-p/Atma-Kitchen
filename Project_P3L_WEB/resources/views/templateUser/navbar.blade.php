<header class="header">
    <img class= "logo"src="{{ asset('images/logoP3L.png') }}" alt="Logo P3L" style="height: 50px; width: 50px;">

    <nav class="navbar">
        <a href="/#home" class="nav-link">home</a>
        <a href="/#about" class="nav-link">about</a>
        <a href="/produkHome" class="nav-link">produk</a>
        <a href="/#gallery" class="nav-link">foto</a>
    </nav>

    <div class="icons">

        @if (Auth::check())
            <div id="cart-btn" class="fas fa-shopping-cart"></div>
            <div id="profile-btn" onclick="window.location.href='{{ route('user.userProfile') }}'" class="fas fa-user">
            </div>
        @endif
        @if (Auth::check())
            <div id="logout-btn" onclick="window.location.href='<?php echo route('actionLogout'); ?>'" class="fas fa-sign-out-alt">
            </div>
        @else
            <div id="login-btn" onclick="window.location.href='{{ url('login') }}'" class="fas fa-sign-in-alt">
            </div>
        @endif
        <div id="menu-btn" class="fas fa-bars"></div>
    </div>
</header>
