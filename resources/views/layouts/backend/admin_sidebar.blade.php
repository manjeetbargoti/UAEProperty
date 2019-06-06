<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{{ Auth::user()->name }}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat">
                        <i class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="{{ url('/admin/dashboard') }}"><i class="fa fa-dashboard"></i>
                    <span>Dashboard</span></a></li>

            <li class="treeview">
                <a href="#"><i class="fa fa-wpexplorer text-red"></i> <span>Property Type</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin/property-type') }}"><i class="fa fa-circle-o text-aqua"></i>All
                            Property Type</a></li>
                    <li><a href="{{ url('/admin/add-property-type') }}"><i class="fa fa-circle-o text-aqua"></i>Add
                            Property Type</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="#"><i class="fa fa-tasks text-green"></i> <span>Property</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ url('/admin/properties') }}"><i class="fa fa-building text-yellow"></i>All Properties</a></li>
                    <li><a href="{{ url('/admin/add-property') }}"><i class="fa fa-puzzle-piece text-yellow"></i>Add Property</a></li>
                    <li><a href="{{ url('/admin/amenities') }}"><i class="fa fa-s15 text-yellow"></i>Amenities</a></li>
                    <li><a href="{{ url('/admin/add-amenities') }}"><i class="fa fa-plus text-yellow"></i>Add Amenities</a></li>
                </ul>
            </li>
        </ul>
        <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>