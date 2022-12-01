<nav id="sidebar" aria-label="Main Navigation">
    <!-- Side Header -->
    <div class="content-header">
        <!-- Logo -->
        <a class="font-semibold text-dual" href="/">
            <span class="smini-visible">
                <i class="fa fa-circle-notch text-primary"></i>
            </span>
            <span class="smini-hide fs-5 tracking-wider">
                <img src="{{ asset('media/favicons/coin64x64.png') }}" alt="Debtor logo" width="20" height="20">
                <span class="debtor-logo"></span>
                Debtor
            </span>
        </a>
        <!-- END Logo -->

        <!-- Extra -->
        <div>
            <!-- Dark Mode -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="btn btn-sm btn-alt-secondary" data-toggle="layout" data-action="dark_mode_toggle" href="javascript:void(0)">
                <i class="far fa-moon"></i>
            </a>
            <!-- END Dark Mode -->


            <!-- Close Sidebar, Visible only on mobile screens -->
            <!-- Layout API, functionality initialized in Template._uiApiLayout() -->
            <a class="d-lg-none btn btn-sm btn-alt-secondary ms-1" data-toggle="layout" data-action="sidebar_close" href="javascript:void(0)">
                <i class="fa fa-fw fa-times"></i>
            </a>
            <!-- END Close Sidebar -->
        </div>
        <!-- END Extra -->
    </div>
    <!-- END Side Header -->

    <!-- Sidebar Scrolling -->
    <div class="js-sidebar-scroll">
        <!-- Side Navigation -->
        <div class="content-side">
            <ul class="nav-main">

                <x-layouts.backend.sidebar-link title="Dashboard" icon="si si-cursor"
                                                :is-active="request()->is('dashboard*')"
                                                :url="route('home.index')"/>
                @role('admin')
                <li class="nav-main-heading">Administration</li>

                <x-layouts.backend.sidebar-link-group :title="trans('usersManagement/users.users_management')" :is-active="request()->is('users-management*')" icon="fas fa-users-cog">

                    <x-layouts.backend.sidebar-link :title="trans('usersManagement/users.users')" icon="fa-solid fa-users"
                                                    :is-active="request()->is('users*')"
                                                    :url="route('users_management.users.index')" permission="user_index"/>

                    <x-layouts.backend.sidebar-link :title="trans('usersManagement/roles.roles')" icon="fa-solid fa-user-tag"
                                                    :is-active="request()->is('roles*')"
                                                    :url="route('users_management.roles.index')"/>

                </x-layouts.backend.sidebar-link-group>


                @endrole
            </ul>
        </div>
        <!-- END Side Navigation -->
    </div>
    <!-- END Sidebar Scrolling -->
</nav>
