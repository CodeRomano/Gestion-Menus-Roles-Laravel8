<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
        @include('adminlte::partials.common.brand-logo-xl')
    @else
        @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}"
                data-widget="treeview" role="menu"
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Configured sidebar links --}}
                 @each('adminlte::partials.sidebar.menu-item', $adminlte->menu('sidebar'), 'item') 
             </ul> 

            {{-- <ul class="nav nav-pills nav-sidebar flex-column " data-widget="treeview" role="menu">
                <li class="nav-item">
                    <a class="nav-link  " href="http://127.0.0.1:8000/admin/pages">
                        <i class="far fa-fw fa-file "></i>
                        <p>Pages <span class="badge badge-success right">4</span>
                        </p>

                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="http://127.0.0.1:8000/admin/settings">
                        <i class="fas fa-fw fa-user "></i>
                        <p>Profile</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  " href="http://127.0.0.1:8000/admin/settings">
                        <i class="fas fa-fw fa-lock "></i>
                        <p>Change Password</p>
                    </a>
                </li>
                <li class="nav-item has-treeview"> 
                    
                    <a class="nav-link  " href="">
                        <i class="fas fa-fw fa-share "></i>
                        <p>Multi Level <i class="fas fa-angle-left right"></i></p>
                    </a>

                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a class="nav-link  " href="#">
                                <i class="far fa-fw fa-circle "></i>
                                <p>Level 1</p>
                            </a>
                        </li>
<li class="nav-item has-treeview">
    <a class="nav-link  " href="">
        <i class="far fa-fw fa-circle "></i>
        <p>
            Level 1
            <i class="fas fa-angle-left right"></i>

                    </p>

    </a>

    
    <ul class="nav nav-treeview" style="display: none; padding-left: 15px">
        <li class="nav-item">

    <a class="nav-link  " href="#">

        <i class="far fa-fw fa-circle "></i>

        <p>
            Level 2

                    </p>

    </a>

</li>
<li class="nav-item has-treeview">

    
    <a class="nav-link  " href="">

        <i class="far fa-fw fa-circle "></i>

        <p>
            Level 2
            <i class="fas fa-angle-left right"></i>

                    </p>

    </a>

    
    <ul class="nav nav-treeview" style="display: none; ">
        <li class="nav-item">

    <a class="nav-link  " href="#">

        <i class="far fa-fw fa-circle "></i>

        <p>
            Level 3

                    </p>

    </a>

</li>
<li class="nav-item">

    <a class="nav-link  " href="#">

        <i class="far fa-fw fa-circle "></i>

        <p>
            Level 3

                    </p>

    </a>

</li>
    </ul>

</li>
    </ul>

</li>
<li class="nav-item">

    <a class="nav-link  " href="#">

        <i class="far fa-fw fa-circle "></i>

        <p>
            Level 1

                    </p>

    </a>

</li>
    </ul>

</li>
<li class="nav-header ">

    LABELS

</li>
<li class="nav-item">

    <a class="nav-link  " href="#">

        <i class="far fa-fw fa-circle text-red"></i>

        <p>
            Important

                    </p>

    </a>

</li>
<li class="nav-item">

    <a class="nav-link  " href="#">

        <i class="far fa-fw fa-circle text-yellow"></i>

        <p>
            Warning

                    </p>

    </a>

</li>
<li class="nav-item">

    <a class="nav-link  " href="#">

        <i class="far fa-fw fa-circle text-cyan"></i>

        <p>
            Information

                    </p>

    </a>

</li>
            </ul> --}}

        </nav>
    </div>

</aside>
