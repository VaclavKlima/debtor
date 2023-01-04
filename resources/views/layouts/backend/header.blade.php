<header id="page-header">
    <!-- Header Content -->
    <div class="content-header">
        <!-- Left Section -->
        <div class="d-flex align-items-center">
            <!-- Toggle Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-lg-none" data-toggle="layout" data-action="sidebar_toggle">
                <i class="fa fa-fw fa-bars"></i>
            </button>
            <!-- END Toggle Sidebar -->

            <!-- Toggle Mini Sidebar -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
            <button type="button" class="btn btn-sm btn-alt-secondary me-2 d-none d-lg-inline-block" data-toggle="layout" data-action="sidebar_mini_toggle">
                <i class="fa fa-fw fa-ellipsis-v"></i>
            </button>
            <!-- END Toggle Mini Sidebar -->

        </div>
        <!-- END Left Section -->

        <!-- Right Section -->
        <div class="d-flex align-items-center">
            <!-- User Dropdown -->
            <div class="dropdown d-inline-block ms-2">
                <button type="button" class="btn btn-sm btn-alt-secondary d-flex align-items-center" id="page-header-user-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img class="rounded-circle" src="{{ auth()->user()->profile_image_url }}" alt="Header Avatar" style="width: 21px;">
                    <span class="d-none d-sm-inline-block ms-2">{{ Auth::user()->name }}</span>
                    <i class="fa fa-fw fa-angle-down d-none d-sm-inline-block ms-1 mt-1"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-md dropdown-menu-end p-0 border-0" aria-labelledby="page-header-user-dropdown">
                    <div class="p-3 text-center bg-body-light border-bottom rounded-top">
                        <img class="img-avatar img-avatar48 img-avatar-thumb" src="{{ auth()->user()->profile_image_url }}" alt="">
                        <p class="mt-2 mb-0 fw-medium">{{ Auth::user()->name }}</p>

                        <p class="mb-0 text-muted fs-sm fw-medium">Web Developer</p>
                    </div>
                    <div class="p-2">
                        <a class="dropdown-item d-flex align-items-center justify-content-between" href="{{ route('user-profile.edit') }}">
                            <span class="fs-sm fw-medium">@lang('global.profile')</span>
                        </a>
                    </div>
                    <div role="separator" class="dropdown-divider m-0"></div>
                    <div class="p-2">
                        <x-form.open :action="route('logout')">
                            <x-form.save class="dropdown-item d-flex align-items-center justify-content-between w-100" type="submit">
                                <span class="fs-sm fw-medium">@lang('global.logout')</span>
                            </x-form.save>
                        </x-form.open>
                    </div>
                </div>
            </div>
            <!-- END User Dropdown -->

            <!-- Notifications Dropdown -->
            <div class="dropdown d-inline-block ms-2">
                <button type="button" class="btn btn-sm btn-alt-secondary" id="page-header-notifications-dropdown" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-fw fa-bell"></i>
                    <span class="text-primary">•</span>
                </button>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end p-0 border-0 fs-sm" aria-labelledby="page-header-notifications-dropdown">
                    <div class="p-2 bg-body-light border-bottom text-center rounded-top">
                        <h5 class="dropdown-header text-uppercase">Notifications</h5>
                    </div>
                    <ul class="nav-items mb-0">
                        <li>
                            <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                <div class="flex-shrink-0 me-2 ms-3">
                                    <i class="fa fa-fw fa-check-circle text-success"></i>
                                </div>
                                <div class="flex-grow-1 pe-2">
                                    <div class="fw-semibold">You have a new follower
                                        <button>click here</button>
                                    </div>
                                    <span class="fw-medium text-muted">15 min ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                <div class="flex-shrink-0 me-2 ms-3">
                                    <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                </div>
                                <div class="flex-grow-1 pe-2">
                                    <div class="fw-semibold">1 new sale, keep it up</div>
                                    <span class="fw-medium text-muted">22 min ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                <div class="flex-shrink-0 me-2 ms-3">
                                    <i class="fa fa-fw fa-times-circle text-danger"></i>
                                </div>
                                <div class="flex-grow-1 pe-2">
                                    <div class="fw-semibold">Update failed, restart server</div>
                                    <span class="fw-medium text-muted">26 min ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                <div class="flex-shrink-0 me-2 ms-3">
                                    <i class="fa fa-fw fa-plus-circle text-primary"></i>
                                </div>
                                <div class="flex-grow-1 pe-2">
                                    <div class="fw-semibold">2 new sales, keep it up</div>
                                    <span class="fw-medium text-muted">33 min ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                <div class="flex-shrink-0 me-2 ms-3">
                                    <i class="fa fa-fw fa-user-plus text-success"></i>
                                </div>
                                <div class="flex-grow-1 pe-2">
                                    <div class="fw-semibold">You have a new subscriber</div>
                                    <span class="fw-medium text-muted">41 min ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a class="text-dark d-flex py-2" href="javascript:void(0)">
                                <div class="flex-shrink-0 me-2 ms-3">
                                    <i class="fa fa-fw fa-check-circle text-success"></i>
                                </div>
                                <div class="flex-grow-1 pe-2">
                                    <div class="fw-semibold">You have a new follower</div>
                                    <span class="fw-medium text-muted">42 min ago</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <div class="p-2 border-top text-center">
                        <a class="d-inline-block fw-medium" href="javascript:void(0)">
                            <i class="fa fa-fw fa-arrow-down me-1 opacity-50"></i> Load More..
                        </a>
                    </div>
                </div>
            </div>
            <!-- END Notifications Dropdown -->

            <!-- Toggle Side Overlay -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <button type="button" class="btn btn-sm btn-alt-secondary ms-2" data-toggle="layout" data-action="side_overlay_toggle">
                <i class="fa fa-fw fa-list-ul fa-flip-horizontal"></i>
            </button>
            <!-- END Toggle Side Overlay -->
        </div>
        <!-- END Right Section -->
    </div>
    <!-- END Header Content -->
</header>
