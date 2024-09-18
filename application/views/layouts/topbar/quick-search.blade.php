<?php defined('BASEPATH') or exit('No direct script access allowed') ?>
<li class="m-nav__item m-dropdown m-dropdown--large m-dropdown--arrow m-dropdown--align-center m-dropdown--mobile-full-width m-dropdown--skin-light m-list-search m-list-search--skin-light" id="m_quicksearch" m-dropdown-persistent="1" m-dropdown-toggle="click" m-quicksearch-mode="dropdown">
    <a class="m-nav__link m-dropdown__toggle" href="#">
        <span class="m-nav__link-icon">
            <span class="m-nav__link-icon-wrapper">
                <i class="flaticon-search-1">
                </i>
            </span>
        </span>
    </a>
    <div class="m-dropdown__wrapper">
        <span class="m-dropdown__arrow m-dropdown__arrow--center">
        </span>
        <div class="m-dropdown__inner ">
            <div class="m-dropdown__header">
                <form class="m-list-search__form">
                    <div class="m-list-search__form-wrapper">
                        <span class="m-list-search__form-input-wrapper">
                            <input autocomplete="off" class="m-list-search__form-input" id="m_quicksearch_input" name="q" placeholder="Search..." type="text" value="">
                            </input>
                        </span>
                        <span class="m-list-search__form-icon-close" id="m_quicksearch_close">
                            <i class="la la-remove">
                            </i>
                        </span>
                    </div>
                </form>
            </div>
            <div class="m-dropdown__body">
                <div class="m-dropdown__scrollable m-scrollable" data-height="300" data-mobile-height="200" data-scrollable="true">
                    <div class="m-dropdown__content">
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>