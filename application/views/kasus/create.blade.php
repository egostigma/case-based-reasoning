<?php defined('BASEPATH') or exit('No direct script access allowed') ?>
@extends('layouts.master')
@section('content')
<!--Begin::Section-->
@php
  echo $ci->session->flashdata("alert");
@endphp
<div class="m-portlet">
    <div class="m-portlet__head m-portlet__head--fit">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                    {{ $controller_text }}
                </h3>
            </div>
        </div>
    </div>
    <!--begin::Form-->
    <form action="{{ site_url($controller.'/store/') }}" class="m-form m-form--fit m-form--label-align-right" method="post">
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12" for="nama">
                    Kerusakan
                </label>
                <div class="col-lg-6 col-md-9 col-sm-12">
                    <select class="form-control m-select2" id="m_select1" name="kerusakan">
                        <?php foreach ($kerusakan as $k): ?>
                        <option value="{{ $k->kerusakan_id }}">
                            {{ $k->kerusakan_nama }}
                        </option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12" for="nama">
                    Gejala
                </label>
                <div class="col-lg-6 col-md-9 col-sm-12">
                    <select class="form-control m-select2" id="m_select2" multiple="multiple" name="gejala[]">
                        <?php foreach ($gejala as $g): ?>
                        <option value="{{ $g->gejala_id }}">
                            {{ $g->gejala_nama }}
                        </option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
                <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12" for="bobot">
                    Bobot
                </label>
                <div class="col-lg-6 col-md-9 col-sm-12">
                    <input class="form-control m-input" id="bobot" name="bobot" type="number">
                    </input>
                </div>
            </div>
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions">
                <div class="row">
                    <div class="col-lg-9 ml-lg-auto">
                        <button class="btn btn-brand" type="submit">
                            Submit
                        </button>
                        <button class="btn btn-secondary" type="reset">
                            Reset
                        </button>
                        <a class="btn btn-danger" href="{{ site_url($controller) }}">
                            Cancel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <!--end::Form-->
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
<script type="text/javascript">
    var Select2 = {
    init: function() {
        $("#m_select1").select2({
            placeholder: "Pilih Kerusakan"
        }),
        $("#m_select2").select2({
            placeholder: "Pilih Gejala"
        })
    }
};
jQuery(document).ready(function() {
    Select2.init()
});
</script>
<!--end::Page Scripts -->
@endsection
