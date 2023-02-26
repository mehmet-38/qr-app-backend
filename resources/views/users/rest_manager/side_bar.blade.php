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
                <span class="app-brand-text demo menu-text fw-bolder ms-2">MANAGER</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
                <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item {{ request()->routeIs('r-home') ? 'active' : '' }}">
                <a href="{{ route('r-home') }}" class="menu-link ">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Dashboard</div>
                </a>
            </li>


            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">İşlemler</span>
            </li>
            <li class="menu-item {{ request()->routeIs('info-rest') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-dock-top"></i>
                    <div data-i18n="Account Settings">Restoran İşlemleri</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('info-rest') ? 'active' : '' }}">
                        <a href="{{ route('info-rest') }}" class="menu-link">
                            <div data-i18n="Account">Restoran Bilgileri</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('info-rest') ? 'active' : '' }}">
                        <a href="{{ route('add-coupon-page') }}" class="menu-link">
                            <div data-i18n="Account">Kupon Ekle</div>
                        </a>
                    </li>

                </ul>
            </li>
            <li class="menu-item {{ request()->routeIs('add-menu-page') ? 'active' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons bx bx-lock-open-alt"></i>
                    <div data-i18n="Authentications">Menü İşlemleri</div>
                </a>
                <ul class="menu-sub">
                    <li class="menu-item {{ request()->routeIs('add-menu-page') ? 'active' : '' }}">
                        <a href="{{ route('add-menu-page') }}" class="menu-link">
                            <div data-i18n="Account">Menü Bilgileri</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->routeIs('add-product-page') ? 'active' : '' }}">
                        <a href="{{ route('add-product-page') }}" class="menu-link">
                            <div data-i18n="Notifications">Ürün Ekle</div>
                        </a>
                    </li>

                </ul>

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
