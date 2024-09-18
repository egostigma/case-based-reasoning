<?php defined('BASEPATH') or exit('No direct script access allowed') ?>
<head>
    <meta charset="utf-8"/>
    <title>
        {{ clean($controller_text) . ($method != 'index' ? ' - ' . $method_text: '') }}
            |  {{ clean($ci->config->item('app_name'))}}
    </title>
    <meta content="Latest updates and statistic charts" name="description"/>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport"/>
    <!--begin::Web font -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js">
    </script>
    <script>
        WebFont.load({
            google: {"families":["Poppins:300,400,500,600,700","Roboto:300,400,500,600,700"]},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <!--end::Web font -->
    <!--begin::Global Theme Styles -->
    <link href="{{ base_url('assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ base_url('assets/demo/demo11/base/style.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Global Theme Styles -->
    <!--begin::Page Vendors Styles -->
    <link href="{{ base_url('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ base_url('assets/vendors/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css"/>
    <!--end::Page Vendors Styles -->
    <link href="{{ base_url('assets/demo/demo11/media/img/logo/favicon.ico') }}" rel="shortcut icon"/>
</head>