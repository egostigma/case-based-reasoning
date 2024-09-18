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
    <form action="{{ site_url($controller.'/update/'.$gejala->gejala_id) }}" class="m-form m-form--fit m-form--label-align-right" method="post">
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12" for="nama">
                    Nama {{ $controller_text }}
                </label>
                <div class="col-lg-6 col-md-9 col-sm-12">
                    <input class="form-control m-input" id="nama" name="nama" type="text" value="{{ $gejala->gejala_nama }}">
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
                        <a href="{{ site_url($controller) }}" class="btn btn-danger">
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
