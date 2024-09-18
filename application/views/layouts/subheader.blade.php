<?php defined('BASEPATH') or exit('No direct script access allowed') ?>
<div class="m-subheader ">
    <div class="d-flex align-items-center">
        <div class="mr-auto">
            <h3 class="m-subheader__title m-subheader__title--separator">
                {{ clean($controller_text) }}
            </h3>
            <ul class="m-subheader__breadcrumbs m-nav m-nav--inline">
                <li class="m-nav__item m-nav__item--home">
                    <a class="m-nav__link m-nav__link--icon" href="{{ site_url() }}">
                        <i class="m-nav__link-icon la la-home">
                        </i>
                    </a>
                </li>
                <?php if ($controller != 'home'): ;?>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a class="m-nav__link" href="{{ site_url($controller) }}">
                        <span class="m-nav__link-text">
                            {{ clean($controller_text) }}
                        </span>
                    </a>
                </li>
                <?php endif; ?>

                <?php if ($method != 'index'): ;?>
                <li class="m-nav__separator">
                    -
                </li>
                <li class="m-nav__item">
                    <a class="m-nav__link" href="{{ site_url($method) }}">
                        <span class="m-nav__link-text">
                            {{ clean($method_text) }}
                        </span>
                    </a>
                </li>
                <?php endif; ?>
            </ul>
        </div>
        <!-- @include('layouts.subheader.daterange') -->
    </div>
</div>