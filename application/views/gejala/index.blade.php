<?php defined('BASEPATH') or exit('No direct script access allowed') ?>
@extends('layouts.master')
@section('content')
<!--Begin::Section-->
@php
  echo $ci->session->flashdata("alert");
@endphp
<div class="m-portlet" id="m_portlet_tools_1">
    <div class="m-portlet__head m-portlet__head--fit">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    {{ $controller_text }}
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <ul class="m-portlet__nav">
                    <li class="m-portlet__nav-item">
                        <a class="m-portlet__nav-link m-portlet__nav-link--icon" href="{{ site_url($controller.'/create') }}" data-toggle="m-tooltip" data-placement="top" title="" data-original-title="Tambah Data">
                            <i class="la la-plus-circle">
                            </i>
                        </a>
                    </li>
                    <li class="m-portlet__nav-item">
                        <a class="m-portlet__nav-link m-portlet__nav-link--icon" href="#" m-portlet-tool="toggle">
                            <i class="la la-angle-down">
                            </i>
                        </a>
                    </li>
                    <li class="m-portlet__nav-item">
                        <a class="m-portlet__nav-link m-portlet__nav-link--icon" href="#" m-portlet-tool="fullscreen">
                            <i class="la la-expand">
                            </i>
                        </a>
                    </li>
                </ul>
            </ul>
        </div>
    </div>
    <div class="m-portlet__body">
        <table class="table table-light table-bordered table-hover table-checkable" id="m_table_1">
            <thead>
                <tr>
                    <th>
                        ID {{ $controller_text }}
                    </th>
                    <th>
                        Jenis
                    </th>
                    <th>
                        Tanggal Ditambahkan
                    </th>
                    <th>
                        Tanggal Diubah
                    </th>
                    <th>
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($gejala as $k) : ?>
                <tr>
                    <th>
                        {{ $k->gejala_id }}
                    </th>
                    <th>
                        {{ $k->gejala_nama }}
                    </th>
                    <th>
                        {{ $k->created_at }}
                    </th>
                    <th>
                        {{ $k->updated_at }}
                    </th>
                    <th>
                        <a href="{{ site_url($controller.'/edit/'.$k->gejala_id) }}">Edit</a>
                        <a href="{{ site_url($controller.'/destroy/'.$k->gejala_id) }}">Hapus</a>
                    </th>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
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
<script src="{{ base_url('assets/demo/default/custom/components/portlets/tools.js') }}" type="text/javascript">
</script>
<!--end::Page Scripts -->
@endsection
