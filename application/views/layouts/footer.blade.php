<?php defined('BASEPATH') or exit('No direct script access allowed') ?>
<footer class="m-grid__item m-footer ">
    <div class="m-container m-container--fluid m-container--full-height m-page__container">
        <div class="m-stack m-stack--flex-tablet-and-mobile m-stack--ver m-stack--desktop">
            <div class="m-stack__item m-stack__item--left m-stack__item--middle m-stack__item--last">
                <span class="m-footer__copyright">
                    {{ $ci->config->item('copy_year') }} {{ $ci->config->item('copy_year') < date('Y') ? " - ".date('Y') : "" }} © {{ $ci->config->item('app_name') }} v{{ $ci->config->item('app_version') }} by
                    <a class="m-link" href="{{ $ci->config->item('author_site') }}">
                        {{ $ci->config->item('author') }}
                    </a>
                </span>
            </div>
            <div class="m-stack__item m-stack__item--right m-stack__item--middle m-stack__item--first">
                <ul class="m-footer__nav m-nav m-nav--inline m--pull-right">
                    <li class="m-nav__item">
                        <a class="m-nav__link m--hide" href="#">
                            <span class="m-nav__link-text">
                                About
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a class="m-nav__link m--hide" href="#">
                            <span class="m-nav__link-text">
                                Privacy
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a class="m-nav__link m--hide" href="#">
                            <span class="m-nav__link-text">
                                T&C;
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item">
                        <a class="m-nav__link m--hide" href="#">
                            <span class="m-nav__link-text">
                                Purchase
                            </span>
                        </a>
                    </li>
                    <li class="m-nav__item m-nav__item--last">
                        <a class="m-nav__link" data-placement="left" data-toggle="m-tooltip" href="mailto:{{ $ci->config->item('author_email') }}?Subject={{ $ci->config->item('app_name') }} v{{ $ci->config->item('app_version') }}" title="Support Center">
                            <i class="m-nav__link-icon flaticon-info m--icon-font-size-lg3">
                            </i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>