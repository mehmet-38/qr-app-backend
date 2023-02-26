<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
        <div class="app-brand demo">
            <a href="index.html" class="app-brand-link">
                <span class="app-brand-logo demo">

                </span>
                <span class="app-brand-text demo menu-text fw-bolder ms-2">ADMIN</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ request()->routeIs('a-home') ? 'active' : '' }}">
                <a href="{{ route('a-home') }}" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>


            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">İşlemler</span>
            </li>
            <li class="menu-item {{ request()->routeIs('a-users') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div data-i18n="Account Settings">Kullanıcı İşlemleri</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('a-users') ? 'active' : '' }}">
                        <a href="{{ route('a-users') }}" class="menu-link">
                            <div data-i18n="Account">Kullanıcı Listele</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('add-users-page') ? 'active' : '' }}">
                        <a href="{{ route('add-users-page') }}" class="menu-link">
                            <div data-i18n="Notifications">Kullanıcı Ekle</div>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="menu-item {{ request()->routeIs('a-restaurants') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                    <div data-i18n="Authentications">Restoran İşlemleri</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('a-restaurants') ? 'active' : '' }}">
                        <a href="{{ route('a-restaurants') }}" class="menu-link">
                            <div data-i18n="Account">Restoran Listele</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('add-rest-page') ? 'active' : '' }}">
                        <a href="{{ route('add-rest-page') }}" class="menu-link">
                            <div data-i18n="Notifications">Restoran Ekle</div>
                        </a>
                    </li>

                </ul>

            </li>
            <li class="menu-item ">
                <a href="javascript:void(0);" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-cube-alt"></i>
                    <div data-i18n="Misc">Menü İşlemleri</div>
                </a>

            </li>


    </aside>
    <script>
        $(document).ready(function() {
            $("ul li").click(function() {
                $("ul li").removeClass("active");
                $(this).addClass("active");
            })
        })
    </script>
</body>


</html>
