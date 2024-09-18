<?php defined('BASEPATH') or exit('No direct script access allowed') ?>
@extends('layouts.master')
@section('content')
<!--Begin::Section-->
<div class="row">
    <div class="col-xl-3 col-lg-4">
        <div class="m-portlet m-portlet--full-height  ">
            <div class="m-portlet__body">
                <div class="m-card-profile">
                    <div class="m-card-profile__title">
                        Your Profile
                    </div>
                    <div class="m-card-profile__pic">
                        <div class="m-card-profile__pic-wrapper">
                            <img src="{{ base_url('assets/app/media/img/users/300-2.png') }}" alt="{{ $users->user_name }}" />
                        </div>
                    </div>
                    <div class="m-card-profile__details">
                        <span class="m-card-profile__name">{{ $users->user_name }}</span>
                        <a href="{{ site_url('users') }}" class="m-card-profile__email m-link">{{ $users->user_email }}</a>
                    </div>
                </div>
                <ul class="m-nav m-nav--hover-bg m-portlet-fit--sides">
                    <li class="m-nav__separator m-nav__separator--fit"></li>
                    <li class="m-nav__section m--hide">
                        <span class="m-nav__section-text">Section</span>
                    </li>
                    <li class="m-nav__item">
                        <a href="{{ site_url('users') }}" class="m-nav__link">
                            <i class="m-nav__link-icon flaticon-profile-1"></i>
                            <span class="m-nav__link-title">
                                <span class="m-nav__link-wrap">
                                    <span class="m-nav__link-text">My Profile</span>
                                    <span class="m-nav__link-badge m--hide"><span class="m-badge m-badge--success">2</span></span>
                                </span>
                            </span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="col-xl-9 col-lg-8">
        <div class="m-portlet m-portlet--full-height m-portlet--tabs">
            <div class="m-portlet__head">
                <div class="m-portlet__head-tools">
                    <ul class="nav nav-tabs m-tabs m-tabs-line   m-tabs-line--left m-tabs-line--primary" role="tablist">
                        <li class="nav-item m-tabs__item">
                            <a class="nav-link m-tabs__link active" data-toggle="tab" href="#m_user_profile_tab_1" role="tab">
                                <i class="flaticon-share m--hide"></i>
                                Update Profile
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-content">
                <div class="tab-pane active" id="m_user_profile_tab_1">
                    <form id="form_edit_profile" class="m-form m-form--fit m-form--label-align-right" action="{{ site_url('users/edit') }}" autocomplete="off" method="post" accept-charset="utf-8">
                        <div class="m-portlet__body">
                            <div class="form-group m-form__group m--margin-top-10 m--hide">
                                <div class="alert m-alert m-alert--default" role="alert">
                                    Alert
                                </div>
                            </div>
                            <div class="form-group m-form__group row m--hide">
                                <div class="col-10 ml-auto">
                                    <h3 class="m-form__section">1. Personal Details</h3>
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Username</label>
                                <div class="col-7">
                                    <input class="form-control m-input" name="username" type="text" value="{{ $users->user_name }}">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Email</label>
                                <div class="col-7">
                                    <input class="form-control m-input" name="email" type="email" value="{{ $users->user_email }}">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Password</label>
                                <div class="col-7">
                                    <input class="form-control m-input" id="password" name="password" type="password">
                                </div>
                            </div>
                            <div class="form-group m-form__group row">
                                <label for="example-text-input" class="col-2 col-form-label">Konfirmasi Password</label>
                                <div class="col-7">
                                    <input class="form-control m-input" name="conf_password" type="password">
                                </div>
                            </div>
                        </div>
                        <div class="m-portlet__foot m-portlet__foot--fit">
                            <div class="m-form__actions">
                                <div class="row">
                                    <div class="col-2">
                                    </div>
                                    <div class="col-7">
                                        <button id="m_user_edit_submit" type="submit" class="btn btn-accent m-btn m-btn--air m-btn--custom">Save changes</button>&nbsp;&nbsp;
                                        <button type="reset" class="btn btn-secondary m-btn m-btn--air m-btn--custom">Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END EXAMPLE TABLE PORTLET-->
@endsection

@section('page-vendors')
<!--begin::Page Vendors -->
<script src="{{ base_url('assets/vendors/custom/fullcalendar/fullcalendar.bundle.js') }}" type="text/javascript">
</script>
<script src="{{ base_url('assets/vendors/custom/datatables/datatables.bundle.js') }}" type="text/javascript">
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
<script src="{{ base_url('assets/snippets/custom/pages/users/profile.js') }}" type="text/javascript">
</script>
<!--end::Page Scripts -->
@endsection
