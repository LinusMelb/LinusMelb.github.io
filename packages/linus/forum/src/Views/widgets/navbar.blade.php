
<nav class="navbar">
        <ul class="nav headernav navbar-nav">
            <li><a href="/">主页</a></li>
            <!-- <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="/university">大学<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Melbourne Uni</a></li>
                <li><a href="#">Monash Uni</a></li>
              </ul>
            </li> -->
            <li><a href="/university">大学</a></li>
            <li><a href="/article">文章</a></li>
            <!-- Search bar -->
            <li class="search-bar">
                <div class="search">
                    <div class="wrap">
                        <form action="#" method="post" class="form">
                            <div class="pull-left txt"><input type="text" id="search-input" class="form-control" placeholder="Search Topics"></div>
                            <div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                            <div class="clearfix"></div>
                        </form>

                    </div>
                </div>
            </li>
            <div class="dropdown-menu header-search-wrapper clearfix">
              <div id="header-search-result"></div>
            </div>


            <!-- End of search bar -->
            <!-- Login/User Avatar -->
            <li>
                <div class="avt" style="margin-left: 20px">
                    @if (Auth::guest())
                        <div class="env">
                            <a class="btn btn-success" href="{{ route('login') }}">Login</a>
                            <a class="btn btn-info" href="{{ route('register') }}">Register</a>
                        </div>
                    @else
                        <div class="stnt pull-left">
                            <form action="/NewDiscussion" method="get" class="form">
                                <button type="submit" class="btn btn-primary">发布帖子</button>
                            </form>
                        </div>
                        <div class="env pull-left"><i class="fa fa-envelope"></i></div>
                        <div class="avatar pull-left dropdown">
                            <a data-toggle="dropdown" href="#" style="text-decoration: none">
                              <img class="profileAvatar" src="{{Auth::user()->avatar}}" style="width: 40px; height: 40px;top:10px; left:10px; border-radius: 50%;" alt="" />
                              <b class="caret"></b>
                              <div class="status green">&nbsp;</div>
                            </a>
                            <ul class="dropdown-menu" role="menu" style="left: -50px">
                                <li><a role="menuitem" tabindex="-1" href="/profile"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;My Profile</a></li>
                                <li><a role="menuitem" tabindex="-2" href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;Inbox &nbsp;<span class="badge">0</span></a></li>
                                <li><a role="menuitem" tabindex="-3" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;Log Out</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                </form>
                            </ul>
                        </div>
                    @endif
                    <div class="clearfix"></div>
                </div>
            </li>
            <!-- End of login/User avatar -->
        </ul>
</nav>
