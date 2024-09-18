<?php defined('BASEPATH') or exit('No direct script access allowed') ?>
@extends('layouts.master')
@section('content')
<!--Begin::Section-->
<div class="m-alert m-alert--icon m-alert--air m-alert--square alert alert-dismissible m--margin-bottom-30 m--hide" role="alert">
    <div class="m-alert__icon">
        <i class="flaticon-exclamation m--font-brand">
        </i>
    </div>
    <div class="m-alert__text">
        Alert
    </div>
</div>
<div class="m-portlet m-portlet--head-overlay m-portlet--full-height   m-portlet--rounded-force">
    <div class="m-portlet__head m-portlet__head--fit">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text m--font-light">
                    Menu
                </h3>
            </div>
        </div>
    </div>
    <div class="m-portlet__body" style="padding: 0;">
        <div class="m-widget28">
            <div class="m-widget28__pic m-portlet-fit--sides"></div>
            <div class="m-widget28__container">

                <!-- begin::Nav pills -->
                <ul class="m-widget28__nav-items nav nav-pills nav-fill" role="tablist">
                    <li class="m-widget28__nav-item nav-item">
                        <a class="nav-link active" data-toggle="pill" href="{{ site_url('konsultasi') }}"><span><i class="la la-print"></i></span><span>Konsultasi Kerusakan</span></a>
                    </li>
                    <li class="m-widget28__nav-item nav-item">
                        <a class="nav-link" data-toggle="pill" href="{{ site_url('konsultasi/terakhir') }}"><span><i class="la la-calendar-check-o"></i></span><span>Konsultasi Terakhir</span></a>
                    </li>
                    <li class="m-widget28__nav-item nav-itemv">
                        <a class="nav-link" data-toggle="pill" href="{{ site_url('konsultasi/show') }}"><span><i class="la la-puzzle-piece"></i></span><span>Data Kerusakan</span></a>
                    </li>
                </ul>

                <!-- end::Nav pills -->
            </div>
        </div>
    </div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
@endsection

@section('page-vendors')
<!--begin::Page Vendors -->
<!--end::Page Vendors -->
@endsection

@section('page-scripts')
<!--begin::Page Scripts -->
<script type="text/javascript">
    var base_url = '{{ base_url() }}';
    var site_url = '{{ site_url() }}';
    var controller = '{{ clean($controller) }}';
</script>
<!--end::Page Scripts -->
@endsection
