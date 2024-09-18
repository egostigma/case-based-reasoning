<?php defined('BASEPATH') or exit('No direct script access allowed') ?>
<?php if (!empty($users)): ;?>
<li class="m-nav__item m-topbar__user-profile m-dropdown m-dropdown--medium m-dropdown--arrow m-dropdown--align-right m-dropdown--mobile-full-width m-dropdown--skin-light" m-dropdown-toggle="click">
    <a class="m-nav__link m-dropdown__toggle" href="#">
        <span class="m-topbar__userpic">
            <img alt="" class="m--img-rounded m--marginless m--img-centered" src="{{ base_url('assets/app/media/img/users/300-2.png') }}"/>
        </span>
        <span class="m-nav__link-icon m-topbar__usericon m--hide">
            <span class="m-nav__link-icon-wrapper">
                <i class="flaticon-user-ok">
                </i>
            </span>
        </span>
        <span class="m-topbar__username m--hide">
            {{ $users->user_name }}
        </span>
    </a>
    <div class="m-dropdown__wrapper">
        <span class="m-dropdown__arrow m-dropdown__arrow--right m-dropdown__arrow--adjust">
        </span>
        <div class="m-dropdown__inner">
            <div class="m-dropdown__header m--align-center">
                <div class="m-card-user m-card-user--skin-light">
                    <div class="m-card-user__pic">
                        <img alt="" class="m--img-rounded m--marginless" src="{{ base_url('assets/app/media/img/users/300-2.png') }}"/>
                    </div>
                    <div class="m-card-user__details">
                        <span class="m-card-user__name m--font-weight-500">
                            {{ $users->user_name }}
                        </span>
                        <a class="m-card-user__email m--font-weight-300 m-link" href="{{ site_url('users/profile') }}">
                            {{ $users->user_email }}
                        </a>
                    </div>
                </div>
            </div>
            <div class="m-dropdown__body">
                <div class="m-dropdown__content">
                    <ul class="m-nav m-nav--skin-light">
                        <li class="m-nav__section">
                            <span class="m-nav__section-text">
                                Section
                            </span>
                        </li>
                        <li class="m-nav__item">
                            <a class="m-nav__link" href="{{ site_url('users/profile') }}">
                                <i class="m-nav__link-icon flaticon-profile-1">
                                </i>
                                <span class="m-nav__link-title">
                                    <span class="m-nav__link-wrap">
                                        <span class="m-nav__link-text">
                                            My Profile
                                        </span>
                                        <span class="m-nav__link-badge m--hide">
                                            <span class="m-badge m-badge--success">
                                                2
                                            </span>
                                        </span>
                                    </span>
                                </span>
                            </a>
                        </li>
                        <li class="m-nav__separator m-nav__separator--fit">
                        </li>
                        <li class="m-nav__item text-right">
                            <a class="btn m-btn--pill btn-secondary m-btn m-btn--custom m-btn--label-brand m-btn--bolder" href="{{ site_url('users/logout') }}">
                                Logout
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</li>
<?php endif; ?>
