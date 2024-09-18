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
    <!--begin::Form-->
    <form class="m-form m-form--fit m-form--label-align-right" action="{{ site_url($controller.'/store') }}" method="post">
        <div class="m-portlet__body">
            <div class="form-group m-form__group row">
                <label class="col-form-label col-lg-3 col-sm-12">
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
        </div>
        <div class="m-portlet__foot m-portlet__foot--fit">
            <div class="m-form__actions m-form__actions">
                <div class="row">
                    <div class="col-lg-9 ml-lg-auto">
                        <button class="btn btn-brand" type="submit">
                            Submit
                        </button>
                        <button class="btn btn-secondary" type="reset">
                            Cancel
                        </button>
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
<script src="{{ base_url('assets/demo/default/custom/components/portlets/tools.js') }}" type="text/javascript">
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
