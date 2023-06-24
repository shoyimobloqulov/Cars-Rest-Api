<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{asset('assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{auth()->user()->name}}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search...">
                <span class="input-group-btn">
                    <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i>
                    </button>
                </span>
            </div>
        </form>
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">MAIN NAVIGATION</li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Hero</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('hero.create')}}"><i class="fa fa-circle-o"></i>Qo'shish</a></li>
                    <li class=""><a href="{{route('hero.index')}}"><i class="fa fa-circle-o"></i> Ko'rish</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Questions</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('questions.create')}}"><i class="fa fa-circle-o"></i>Qo'shish</a></li>
                    <li class=""><a href="{{route('questions.index')}}"><i class="fa fa-circle-o"></i> Ko'rish</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Logo</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('logo.create')}}"><i class="fa fa-circle-o"></i>Qo'shish</a></li>
                    <li class=""><a href="{{route('logo.index')}}"><i class="fa fa-circle-o"></i> Ko'rish</a></li>
                </ul>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-dashboard"></i> <span>Reasons</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{route('reasons.create')}}"><i class="fa fa-circle-o"></i>Qo'shish</a></li>
                    <li class=""><a href="{{route('reasons.index')}}"><i class="fa fa-circle-o"></i> Ko'rish</a></li>
                </ul>
            </li>

            <li><a href="{{route('contact.index')}}"><i class="fa fa-book"></i> <span>Contact</span></a></li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
