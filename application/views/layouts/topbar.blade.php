<?php defined('BASEPATH') or exit('No direct script access allowed') ?>
<div class="m-topbar m-stack m-stack--ver m-stack--general" id="m_header_topbar">
    <div class="m-stack__item m-topbar__nav-wrapper">
        <ul class="m-topbar__nav m-nav m-nav--inline">
            <!-- @include('layouts.topbar.quick-search') -->
            <!-- @include('layouts.topbar.notifications') -->
            <!-- @include('layouts.topbar.quick-actions') -->
            @include('layouts.topbar.user-profile')
            <!-- @include('layouts.topbar.quick-sidebar') -->
        </ul>
    </div>
</div>