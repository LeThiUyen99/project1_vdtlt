<aside>
    <div id="sidebar" class="nav-collapse">
        <!-- sidebar menu start-->
        <div class="leftside-navigation">
            <ul class="sidebar-menu" id="nav-accordion">
                <li>
                    <a class="active" href="index.html">
                        <i class="fa fa-dashboard"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class="fa fa-book"></i>
                        <span>Blog</span>
                    </a>
                    <ul class="sub">
                        <li><a href="{{route('blogs.index')}}">Danh sách bài viết</a></li>
                        <li><a href="{{route('admins.index')}}">Danh sách admin</a></li>
                        <li><a href="{{route('accounts.index')}}">Danh sách khách hàng</a></li>
                        <li><a href="{{route('categories.index')}}">Danh sách loại tin</a></li>
                    </ul>
                </li>


            </ul>            </div>
        <!-- sidebar menu end-->
    </div>
</aside>
