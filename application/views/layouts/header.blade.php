<?php defined('BASEPATH') or exit('No direct script access allowed') ?>
<header class="m-grid__item m-header " id="m_header" m-minimize-mobile-offset="200" m-minimize-offset="200">
    <div class="m-container m-container--fluid m-container--full-height">
        <div class="m-stack m-stack--ver m-stack--desktop">
            @include('layouts.brand')
            <div class="m-stack__item m-stack__item--fluid m-header-head" id="m_header_nav">
                @include('layouts.topbar')
            </div>
        </div>
    </div>
</header>