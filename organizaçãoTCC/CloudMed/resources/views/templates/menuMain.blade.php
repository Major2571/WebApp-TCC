<header>
    <nav>
        <div class="menuHamburger">
            <div class="hamburger">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
        </div>

        <div class="nav-menu menu-main">

            <a href="#">
                <img src="{{url('assets/img/logo.png')}}" alt="logo">
            </a>

            <ul class="menu manu-main">
                <li><a href="#" target="_blank"> Funcionalidades </a></li>
                <li><a href="#" target="_blank"> Sobre </a></li>
            </ul>

            <button class="btnLogin"> Login </button>
        </div>
    </nav>
</header>

@yield('contentMain')