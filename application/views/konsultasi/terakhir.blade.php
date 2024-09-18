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
                    Perhitungan
                </h3>
            </div>
        </div>
        <div class="m-portlet__head-tools">
            <ul class="m-portlet__nav">
                <ul class="m-portlet__nav">
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
                        Kerusakan
                    </th>
                    <th>
                        Gejala
                    </th>
                    <th>
                        Kemiripan
                    </th>
                    <th>
                        Bobot
                    </th>
                    <th>
                        Nilai
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $tampil = false; $i = 0; foreach ($kasus as $k): ?>
                <tr>
                    <td class="text-center">
                        {{ $k->kerusakan_nama }}
                    </td>
                    <td>
                        {{ $k->gejala_nama }}
                    </td>
                    <td class="text-right">
                        {{ $similarity[$i]->nilai }}
                    </td>
                    <td class="text-right">
                        {{ $k->kasus_bobot }}
                    </td>
                    <td class="text-right">
                        {{ $similarity[$i]->nilai*$k->kasus_bobot }}
                    </td>
                </tr>
                <?php $i++; endforeach;?>
            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-xl-6">
        <div class="m-portlet" id="m_portlet_tools_2">
            <div class="m-portlet__head m-portlet__head--fit">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Euclidean Distance
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <ul class="m-portlet__nav">
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
                <?php $no = 1; foreach ($kerusakan as $rusak) : ?>
                <p>
                    {{ $no }}. Kerusakan {{ $rusak->kerusakan_nama }} :
                </p>
                <p>
                    = √
                    <?php $rumus1 = ''; $i = 0; foreach ($kasus as $k)  : ?>
                    <?php if ($k->kerusakan_id == $rusak->kerusakan_id) : ?>
                    <?php $rumus1 .= '('.$k->kasus_bobot.'-'.$similarity[$i]->nilai*$k->kasus_bobot.')²+';?>
                    <?php endif; ?>
                    <?php $i++; endforeach; ?>
                    {{ rtrim($rumus1,"+ ") }}
                </p>
                <p>
                    = √
                    <?php $rumus2 = ''; $i = 0; foreach ($kasus as $k)  : ?>
                    <?php if ($k->kerusakan_id == $rusak->kerusakan_id) : ?>
                    <?php $rumus2 .= '('.($k->kasus_bobot - ($similarity[$i]->nilai*$k->kasus_bobot)).')²+';?>
                    <?php endif; ?>
                    <?php $i++; endforeach; ?>
                    {{ rtrim($rumus2,"+ ") }}
                </p>
                <p>
                    = √
                    <?php $rumus3 = ''; $i = 0; foreach ($kasus as $k)  : ?>
                    <?php if ($k->kerusakan_id == $rusak->kerusakan_id) : ?>
                    <?php $rumus3 .= (pow($k->kasus_bobot - ($similarity[$i]->nilai*$k->kasus_bobot), 2)).'+';?>
                    <?php endif; ?>
                    <?php $i++; endforeach; ?>
                    {{ rtrim($rumus3,"+ ") }}
                </p>
                <p>
                    = √
                    <?php $jumlah = 0; $i = 0; foreach ($kasus as $k)  : ?>
                    <?php if ($k->kerusakan_id == $rusak->kerusakan_id) : ?>
                    <?php $jumlah += pow($k->kasus_bobot - ($similarity[$i]->nilai*$k->kasus_bobot), 2); ?>
                    <?php endif; ?>
                    <?php $i++; endforeach; ?>
                    {{ $jumlah }}
                </p>
                <p>
                    = {{ sqrt($jumlah) }}
                </p>
                <?php $no++; endforeach; ?>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="m-portlet" id="m_portlet_tools_3">
            <div class="m-portlet__head m-portlet__head--fit">
                <div class="m-portlet__head-caption">
                    <div class="m-portlet__head-title">
                        <h3 class="m-portlet__head-text">
                            Cosine Similarity
                        </h3>
                    </div>
                </div>
                <div class="m-portlet__head-tools">
                    <ul class="m-portlet__nav">
                        <ul class="m-portlet__nav">
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
                <?php $no = 1; foreach ($kerusakan as $rusak) : ?>
                <p>
                    {{ $no }}. Kerusakan {{ $rusak->kerusakan_nama }} :
                </p>
                <p>
                    = 
                    <?php $rumus1 = ''; $i = 0; foreach ($kasus as $k)  : ?>
                    <?php if ($k->kerusakan_id == $rusak->kerusakan_id) : ?>
                    <?php $rumus1 .= $k->kasus_bobot.'*'.$similarity[$i]->nilai*$k->kasus_bobot.'+';?>
                    <?php endif; ?>
                    <?php $i++; endforeach; ?>
                    {{ rtrim($rumus1,"+ ") }}
                    /
                    <?php $rumus2 = ''; $i = 0; foreach ($kasus as $k)  : ?>
                    <?php if ($k->kerusakan_id == $rusak->kerusakan_id) : ?>
                    <?php $rumus2 .= $k->kasus_bobot.'*'.$k->kasus_bobot.'+';?>
                    <?php endif; ?>
                    <?php $i++; endforeach; ?>
                    ({{ rtrim($rumus2,"+ ") }})^0.5
                    /
                    <?php $rumus3 = ''; $i = 0; foreach ($kasus as $k)  : ?>
                    <?php if ($k->kerusakan_id == $rusak->kerusakan_id) : ?>
                    <?php $rumus3 .= $similarity[$i]->nilai*$k->kasus_bobot.'*'.$similarity[$i]->nilai*$k->kasus_bobot.'+';?>
                    <?php endif; ?>
                    <?php $i++; endforeach; ?>
                    ({{ rtrim($rumus3,"+ ") }})^0.5
                </p>
                <p>
                    = 
                    <?php $jumlah1 = 0; $i = 0; foreach ($kasus as $k)  : ?>
                    <?php if ($k->kerusakan_id == $rusak->kerusakan_id) : ?>
                    <?php $jumlah1 += $k->kasus_bobot*($similarity[$i]->nilai*$k->kasus_bobot); ?>
                    <?php endif; ?>
                    <?php $i++; endforeach; ?>
                    {{ $jumlah1 }}
                    /
                    <?php $jumlah2 = 0; $i = 0; foreach ($kasus as $k)  : ?>
                    <?php if ($k->kerusakan_id == $rusak->kerusakan_id) : ?>
                    <?php $jumlah2 += $k->kasus_bobot*$k->kasus_bobot; ?>
                    <?php endif; ?>
                    <?php $i++; endforeach; ?>
                    ({{ $jumlah2 }})^0.5
                    /
                    <?php $jumlah3 = 0; $i = 0; foreach ($kasus as $k)  : ?>
                    <?php if ($k->kerusakan_id == $rusak->kerusakan_id) : ?>
                    <?php $jumlah3 += ($similarity[$i]->nilai*$k->kasus_bobot)*($similarity[$i]->nilai*$k->kasus_bobot); ?>
                    <?php endif; ?>
                    <?php $i++; endforeach; ?>
                    ({{ $jumlah3 }})^0.5
                </p>
                <p>
                    =
                    {{ $jumlah1 }} / {{ pow($jumlah2, 0.5) }} / {{ pow($jumlah3, 0.5) }}
                </p>
                <?php 
                    $hasil = $jumlah1;
                    if(pow($jumlah2, 0.5) > 0){
                        $hasil /= pow($jumlah2, 0.5);
                    }
                    if(pow($jumlah3, 0.5) > 0){
                        $hasil /= pow($jumlah3, 0.5);
                    }
                ?>
                <p>
                    = {{ $hasil }}
                </p>
                <p>
                    distance = 1-{{ $hasil }} = {{ 1-$hasil }}
                </p>
                <?php $no++; endforeach; ?>
            </div>
        </div>
    </div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
@endsection

@section('page-vendors')
<!--begin::Page Vendors -->
<script src="{{ base_url('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript">
</script>
<script src="{{ base_url('assets/vendors/custom/datatables/plugins/rowsGroup/dataTables.rowsGroup.js') }}" type="text/javascript">
</script>
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
