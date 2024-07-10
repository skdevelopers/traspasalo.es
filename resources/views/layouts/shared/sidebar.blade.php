<div class="app-menu">

    <!-- Sidenav Brand Logo -->
    <a href="{{ url('/') }}" class="logo-box">
        <!-- Light Brand Logo -->
        <div class="logo-light">
            <img src="{{ asset('/images/logo-light.png') }}" class="logo-lg h-6" alt="Light logo">
            <img src="{{ asset('/images/logo-sm.png') }}" class="logo-sm" alt="Small logo">
        </div>

        <!-- Dark Brand Logo -->
        <div class="logo-dark">
            <img src="{{ asset('/images/logo-dark.png') }}" class="logo-lg h-6" alt="Dark logo">
            <img src="{{ asset('/images/logo-sm.png') }}" class="logo-sm" alt="Small logo">
        </div>
    </a>

    <!-- Sidenav Menu Toggle Button -->
    <button id="button-hover-toggle" class="absolute top-5 end-2 rounded-full p-1.5">
        <span class="sr-only">Menu Toggle Button</span>
        <i class="mgc_round_line text-xl"></i>
    </button>

    <!--- Menu -->
    <div class="srcollbar" data-simplebar>
        <ul class="menu" data-fc-type="accordion">
            <li class="menu-title">Menu</li>

            <li class="menu-item">
                <a href="{{ route('home') }}" class="menu-link">
                    <span class="menu-icon"><i class="mgc_home_3_line"></i></span>
                    <span class="menu-text"> Dashboard </span>
                </a>
            </li>

            <li class="menu-title">ERP</li>

            <!-- Add your ERP menu items here -->

            <li class="menu-item">
                <a href="{{ route('cash-flows.index') }}" class="menu-link">
                    <span class="menu-icon"><i class="mgc_file_check_line"></i></span>
                    <span class="menu-text"> Cash Flow </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('categories.index') }}" class="menu-link">
                    <span class="menu-icon"><i class="mgc_file_check_line"></i></span>
                    <span class="menu-text"> Categories </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('customers.index') }}" class="menu-link">
                    <span class="menu-icon"><i class="mgc_file_check_line"></i></span>
                    <span class="menu-text"> Customers </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('permissions.index') }}" class="menu-link">
                    <span class="menu-icon"><i class="mgc_file_check_line"></i></span>
                    <span class="menu-text"> Permissions </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('products.index') }}" class="menu-link">
                    <span class="menu-icon"><i class="mgc_file_check_line"></i></span>
                    <span class="menu-text"> Products </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('sales.index') }}" class="menu-link">
                    <span class="menu-icon"><i class="mgc_file_check_line"></i></span>
                    <span class="menu-text"> Sale </span>
                </a>
            </li>
            <li class="menu-item">
                <a href="{{ route('suppliers.index') }}" class="menu-link">
                    <span class="menu-icon"><i class="mgc_file_check_line"></i></span>
                    <span class="menu-text"> Suppliers </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('roles.index') }}" class="menu-link">
                    <span class="menu-icon"><i class="mgc_file_check_line"></i></span>
                    <span class="menu-text"> Roles </span>
                </a>
            </li>

            <li class="menu-title">Apps</li>

            <li class="menu-item">
                <a href="{{ route('apps.calendar') }}" class="menu-link">
                    <span class="menu-icon"><i class="mgc_calendar_line"></i></span>
                    <span class="menu-text"> Calendar </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('apps.tickets') }}" class="menu-link">
                    <span class="menu-icon"><i class="mgc_coupon_line"></i></span>
                    <span class="menu-text"> Tickets </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('apps.file-manager') }}" class="menu-link">
                    <span class="menu-icon"><i class="mgc_folder_2_line"></i></span>
                    <span class="menu-text"> File Manager </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="{{ route('apps.kanban') }}" class="menu-link">
                    <span class="menu-icon"><i class="mgc_task_2_line"></i></span>
                    <span class="menu-text">Kanban</span>
                </a>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon"><i class="mgc_building_2_line"></i></span>
                    <span class="menu-text"> Project </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="{{ route('project.list') }}" class="menu-link">
                            <span class="menu-text">List</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('project.detail') }}" class="menu-link">
                            <span class="menu-text">Detail</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('project.create') }}" class="menu-link">
                            <span class="menu-text">Create</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-title">Custom</li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon"><i class="mgc_user_3_line"></i></span>
                    <span class="menu-text"> Auth Pages </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="{{ route('auth.login') }}" class="menu-link">
                            <span class="menu-text">Log In</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('auth.register') }}" class="menu-link">
                            <span class="menu-text">Register</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('auth.recoverpw') }}" class="menu-link">
                            <span class="menu-text">Recover Password</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('auth.lock-screen') }}" class="menu-link">
                            <span class="menu-text">Lock Screen</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon"><i class="mgc_box_3_line"></i></span>
                    <span class="menu-text"> Extra Pages </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="{{ route('pages.starter') }}" class="menu-link">
                            <span class="menu-text">Starter</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('pages.timeline') }}" class="menu-link">
                            <span class="menu-text">Timeline</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('pages.invoice') }}" class="menu-link">
                            <span class="menu-text">Invoice</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('pages.gallery') }}" class="menu-link">
                            <span class="menu-text">Gallery</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('pages.faqs') }}" class="menu-link">
                            <span class="menu-text">FAQs</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('pages.pricing') }}" class="menu-link">
                            <span class="menu-text">Pricing</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('pages.maintenance') }}" class="menu-link">
                            <span class="menu-text">Maintenance</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('pages.coming-soon') }}" class="menu-link">
                            <span class="menu-text">Coming Soon</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('pages.404') }}" class="menu-link">
                            <span class="menu-text">Error 404</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('pages.404-alt') }}" class="menu-link">
                            <span class="menu-text">Error 404-alt</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('pages.500') }}" class="menu-link">
                            <span class="menu-text">Error 500</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon"><i class="mgc_layout_line"></i></span>
                    <span class="menu-text"> Layout </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="{{ route('layouts-eg.hover-view') }}" class="menu-link">
                            <span class="menu-text">Hovered Menu</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('layouts-eg.icon-view') }}" class="menu-link">
                            <span class="menu-text">Icon View Menu</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('layouts-eg.compact-view') }}" class="menu-link">
                            <span class="menu-text">Compact Menu</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('layouts-eg.mobile-view') }}" class="menu-link">
                            <span class="menu-text">Mobile View Menu</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('layouts-eg.hidden-view') }}" class="menu-link">
                            <span class="menu-text">Hidden Menu</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-title">Elements</li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon"><i class="mgc_classify_2_line"></i></span>
                    <span class="menu-text"> Components </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="{{ route('ui.accordions') }}" class="menu-link">
                            <span class="menu-text">Accordions</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.alerts') }}" class="menu-link">
                            <span class="menu-text">Alerts</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.avatars') }}" class="menu-link">
                            <span class="menu-text">Avatars</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.buttons') }}" class="menu-link">
                            <span class="menu-text">Buttons</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.badges') }}" class="menu-link">
                            <span class="menu-text">Badges</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.breadcrumbs') }}" class="menu-link">
                            <span class="menu-text">Breadcrumb</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.cards') }}" class="menu-link">
                            <span class="menu-text">Cards</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.collapse') }}" class="menu-link">
                            <span class="menu-text">Collapse</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.dismissible') }}" class="menu-link">
                            <span class="menu-text">Dismissible</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.dropdowns') }}" class="menu-link">
                            <span class="menu-text">Dropdowns</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.progress') }}" class="menu-link">
                            <span class="menu-text">Progress</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.skeleton') }}" class="menu-link">
                            <span class="menu-text">Skeleton</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.spinners') }}" class="menu-link">
                            <span class="menu-text">Spinners</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.list-group') }}" class="menu-link">
                            <span class="menu-text">List Group</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.ratio') }}" class="menu-link">
                            <span class="menu-text">Ratio</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.tabs') }}" class="menu-link">
                            <span class="menu-text">Tab</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.modals') }}" class="menu-link">
                            <span class="menu-text">Modals</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.offcanvas') }}" class="menu-link">
                            <span class="menu-text">Offcanvas</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.popovers') }}" class="menu-link">
                            <span class="menu-text">Popovers</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.tooltips') }}" class="menu-link">
                            <span class="menu-text">Tooltips</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('ui.typography') }}" class="menu-link">
                            <span class="menu-text">Typography</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon"><i class="mgc_box_3_line"></i></span>
                    <span class="menu-text"> Extended </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="{{ route('extended.swiper') }}" class="menu-link">
                            <span class="menu-text">Swiper</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('extended.nestable') }}" class="menu-link">
                            <span class="menu-text">Nestable List</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('extended.ratings') }}" class="menu-link">
                            <span class="menu-text">Ratings</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('extended.animation') }}" class="menu-link">
                            <span class="menu-text">Animation</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('extended.player') }}" class="menu-link">
                            <span class="menu-text">Player</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('extended.scrollbar') }}" class="menu-link">
                            <span class="menu-text">Scrollbar</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('extended.sweet-alert') }}" class="menu-link">
                            <span class="menu-text">Sweet Alert</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('extended.tour') }}" class="menu-link">
                            <span class="menu-text">Tour Page</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('extended.tippy-tooltips') }}" class="menu-link">
                            <span class="menu-text">Tippy Tooltip</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('extended.lightbox') }}" class="menu-link">
                            <span class="menu-text">Lightbox</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon"><i class="mgc_file_check_line"></i></span>
                    <span class="menu-text"> Forms </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="{{ route('forms.elements') }}" class="menu-link">
                            <span class="menu-text">Form Elements</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('forms.select') }}" class="menu-link">
                            <span class="menu-text">Select</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('forms.range') }}" class="menu-link">
                            <span class="menu-text">Range</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('forms.pickers') }}" class="menu-link">
                            <span class="menu-text">Pickers</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('forms.masks') }}" class="menu-link">
                            <span class="menu-text">Masks</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('forms.editor') }}" class="menu-link">
                            <span class="menu-text">Editor</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('forms.file-uploads') }}" class="menu-link">
                            <span class="menu-text">File Uploads</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('forms.validation') }}" class="menu-link">
                            <span class="menu-text">Validation</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('forms.layout') }}" class="menu-link">
                            <span class="menu-text">Form Layout</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon"><i class="mgc_layout_grid_line"></i></span>
                    <span class="menu-text"> Tables </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="{{ route('tables.basic') }}" class="menu-link">
                            <span class="menu-text">Basic Tables</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('tables.datatables') }}" class="menu-link">
                            <span class="menu-text">Data Tables</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon"><i class="mgc_dribbble_line"></i></span>
                    <span class="menu-text"> Icons </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="{{ route('icons.mingcute') }}" class="menu-link">
                            <span class="menu-text">Mingcute</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('icons.feather') }}" class="menu-link">
                            <span class="menu-text">Feather</span>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="{{ route('icons.material-symbols') }}" class="menu-link">
                            <span class="menu-text">Material Symbols </span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="menu-item">
                <a href="{{ route('charts') }}" class="menu-link">
                    <span class="menu-icon"><i class="mgc_chart_bar_line"></i></span>
                    <span class="menu-text"> Chart </span>
                </a>
            </li>

            <li class="menu-item">
                <a href="javascript:void(0)" data-fc-type="collapse" class="menu-link">
                    <span class="menu-icon"><i class="mgc_location_line"></i></span>
                    <span class="menu-text"> Maps </span>
                    <span class="menu-arrow"></span>
                </a>

                <ul class="sub-menu hidden">
                    <li class="menu-item">
                        <a href="{{ route('maps.google') }}" class="menu-link">
                            <span class="menu-text">Google Maps</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>

        <!-- Help Box Widget -->
        <div class="my-10 mx-5">
            <div class="help-box p-6 bg-black/5 text-center rounded-md">
                <div class="flex justify-center mb-4">
                    <svg width="30" height="18" aria-hidden="true">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M15 0c-4 0-6.5 2-7.5 6 1.5-2 3.25-2.75 5.25-2.25 1.141.285 1.957 1.113 2.86 2.03C17.08 7.271 18.782 9 22.5 9c4 0 6.5-2 7.5-6-1.5 2-3.25 2.75-5.25 2.25-1.141-.285-1.957-1.113-2.86-2.03C20.42 1.728 18.718 0 15 0ZM7.5 9C3.5 9 1 11 0 15c1.5-2 3.25-2.75 5.25-2.25 1.141.285 1.957 1.113 2.86 2.03C9.58 16.271 11.282 18 15 18c4 0 6.5-2 7.5-6-1.5 2-3.25 2.75-5.25 2.25-1.141-.285-1.957-1.113-2.86-2.03C12.92 10.729 11.218 9 7.5 9Z"
                            fill="#38BDF8"></path>
                    </svg>
                </div>
                <h5 class="mb-2">Unlimited Access</h5>
                <p class="mb-3">Upgrade to plan to get access to unlimited reports</p>
                <a href="javascript: void(0);" class="btn btn-sm bg-secondary text-white">Upgrade</a>
            </div>
        </div>
    </div>
</div>
<!-- Sidenav Menu End  -->
