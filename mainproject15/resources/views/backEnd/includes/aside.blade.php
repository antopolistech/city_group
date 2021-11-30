<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>

            <!--<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Home</span></a></li> -->

            <li class="treeview company_overview">
                <a href="#">
                    <i class="fa fa-circle-o text-yellow"></i>
                    <span>Company Overview</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('about.index')}}"><i class="fa fa-circle-o text-red"></i> <span>About Us</span></a></li>
                    <li><a href="{{route('admin-history.index')}}"><i class="fa fa-circle-o text-red"></i> <span>History</span></a></li>
                    <li><a href="{{route('admin-sister-concern.index')}}"><i class="fa fa-circle-o text-red"></i> <span>Sister Concern</span></a></li>
                    <li><a href="{{route('admin-achievement.index')}}"><i class="fa fa-circle-o text-red"></i> <span>Achievement</span></a></li>
                    <li><a href="{{route('admin-csr.index')}}"><i class="fa fa-circle-o text-red"></i> <span>CSR</span></a></li>
                    <li class="sustain_ability"><a href="{{route('sustain.ability.index')}}"><i class="fa fa-circle-o text-red"></i> <span>Sustain Ability</span></a></li>
                </ul>
            </li> 

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-circle-o text-yellow"></i>
                    <span>Management</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin-chairman.index')}}"><i class="fa fa-circle-o text-red"></i> <span>Chairman</span></a></li>
                    <li><a href="{{route('admin-director.index')}}"><i class="fa fa-circle-o text-red"></i> <span>Director</span></a></li>
                    <li><a href="{{route('admin-manageTeam.index')}}"><i class="fa fa-circle-o text-red"></i> <span>Management Team</span></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-circle-o text-yellow"></i>
                    <span>Media</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin-news-event.index')}}"><i class="fa fa-circle-o text-red"></i> <span>News & Event</span></a></li>
                    <li><a href="{{route('admin-commercial.index')}}"><i class="fa fa-circle-o text-red"></i> <span>Commercial</span></a></li>
                    <li><a href="{{route('admin-PressRelease.index')}}"><i class="fa fa-circle-o text-red"></i> <span>Press Release</span></a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-circle-o text-yellow"></i>
                    <span>Brand</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('admin-brand.index')}}"><i class="fa fa-circle-o text-red"></i> <span>Brand Add</span></a></li>
                    <li><a href="{{route('admin-brand-category.index')}}"><i class="fa fa-circle-o text-red"></i> <span>Brand Category</span></a></li>
                    <li><a href="{{route('product.index')}}"><i class="fa fa-circle-o text-red"></i> <span> Product</span></a></li>
                </ul>
            </li>

            <li><a href="{{route('slider.index')}}"><i class="fa fa-circle-o text-green"></i> <span>Slider</span></a></li>

            <li><a href="{{route('admin-career.index')}}"><i class="fa fa-circle-o text-green"></i> <span>Career</span></a></li>

        </ul>
    </section>
    <!-- /.sidebar -->
</aside>

