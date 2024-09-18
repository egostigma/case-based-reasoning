<?php defined('BASEPATH') or exit('No direct script access allowed') ?>
<div class="m-aside-menu m-aside-menu--skin-light m-aside-menu--submenu-skin-light " id="m_ver_menu" m-menu-dropdown-timeout="500" m-menu-scrollable="0" m-menu-vertical="1">
    <ul class="m-menu__nav m-menu__nav--dropdown-submenu-arrow ">
        <li class="m-menu__section m-menu__section--first">
            <h4 class="m-menu__section-text">
                Menu
            </h4>
            <i class="m-menu__section-icon flaticon-more-v2">
            </i>
        </li>
        <li aria-haspopup="true" class="m-menu__item {{ $controller == 'home' && $method == 'index' ? 'm-menu__item--active' : '' }}" m-menu-link-redirect="1">
            <a class="m-menu__link " href="{{ site_url('home') }}">
                <i class="m-menu__link-icon fa fa-home">
                </i>
                <span class="m-menu__link-text">
                    Home
                </span>
            </a>
        </li>
        <li aria-haspopup="true" class="m-menu__item {{ $controller == 'konsultasi' && $method == 'create' ? 'm-menu__item--active' : '' }}" m-menu-link-redirect="1">
            <a class="m-menu__link " href="{{ site_url('konsultasi/create') }}">
                <i class="m-menu__link-icon fa fa-print">
                </i>
                <span class="m-menu__link-text">
                    Konsultasi Kerusakan
                </span>
            </a>
        </li>
        <li aria-haspopup="true" class="m-menu__item {{ $controller == 'konsultasi' && $method == 'terakhir' ? 'm-menu__item--active' : '' }}" m-menu-link-redirect="1">
            <a class="m-menu__link " href="{{ site_url('konsultasi/terakhir') }}">
                <i class="m-menu__link-icon fa fa-calendar-check">
                </i>
                <span class="m-menu__link-text">
                    Konsultasi Terakhir
                </span>
            </a>
        </li>
        <li aria-haspopup="true" class="m-menu__item {{ $controller == 'konsultasi' && $method == 'index' ? 'm-menu__item--active' : '' }}" m-menu-link-redirect="1">
            <a class="m-menu__link " href="{{ site_url('konsultasi') }}">
                <i class="m-menu__link-icon fa fa-puzzle-piece">
                </i>
                <span class="m-menu__link-text">
                    Data Kerusakan
                </span>
            </a>
        </li>
        <li class="m-menu__section m-menu__section--first">
            <h4 class="m-menu__section-text">
                Data
            </h4>
            <i class="m-menu__section-icon flaticon-more-v2">
            </i>
        </li>
        <li aria-haspopup="true" class="m-menu__item {{ $controller == 'kerusakan'  ? 'm-menu__item--active' : '' }}" m-menu-link-redirect="1">
            <a class="m-menu__link " href="{{ site_url('kerusakan') }}">
                <i class="m-menu__link-icon fa fa-tired">
                </i>
                <span class="m-menu__link-text">
                    Kerusakan
                </span>
            </a>
        </li>
        <li aria-haspopup="true" class="m-menu__item {{ $controller == 'gejala' ? 'm-menu__item--active' : '' }}" m-menu-link-redirect="1">
            <a class="m-menu__link " href="{{ site_url('gejala') }}">
                <i class="m-menu__link-icon fa fa-times-circle">
                </i>
                <span class="m-menu__link-text">
                    Gejala
                </span>
            </a>
        </li>
        <li aria-haspopup="true" class="m-menu__item {{ $controller == 'kasus' ? 'm-menu__item--active' : '' }}" m-menu-link-redirect="1">
            <a class="m-menu__link " href="{{ site_url('kasus') }}">
                <i class="m-menu__link-icon fa fa-wrench">
                </i>
                <span class="m-menu__link-text">
                    Basis Kasus
                </span>
            </a>
        </li>
    </ul>
</div>