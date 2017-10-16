
        <div style="margin-top: 40px;">
            <a href="/">主页</a>
            <!-- <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="/university">大学<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Melbourne Uni</a></li>
                <li><a href="#">Monash Uni</a></li>
              </ul>
            </li> -->
            <a href="/university">大学</a>
            <a href="/article">文章</a>
            <!-- Search bar -->
            <div class="headernav">
                <div class="search">
                    <div class="wrap">
                        <form action="#" method="post" class="form">
                            <div class="pull-left txt"><input type="text" class="form-control" placeholder="Search Topics"></div>
                            <div ><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                        </form>

                    </div>
                </div>
            </div>
            <!-- End of search bar -->
            <!-- Login/User Avatar -->
                <div id="login-btns" style="padding: 18px;">
                    @if (Auth::guest())
                            <a class="btn btn-success" href="{{ route('login') }}">Login</a>
                            <br>
                            <a class="btn btn-info" href="{{ route('register') }}">Register</a>
                    @else
                        <a type="button" href="/NewDiscussion" class="btn btn-primary">发布帖子</a>

                        <!-- <div class="env pull-left"><i class="fa fa-envelope"></i></div> -->
                        <div class="avatar dropdown" style="text-align: center; padding-top: 10px;">
                            <a data-toggle="dropdown" href="#"><img class="profileAvatar" src="{{Auth::user()->avatar}}" style="width: 60px; height: 60px; border-radius: 50%;" alt="" /></a><b class="caret"></b>
                            <ul class="dropdown-menu" role="menu">
                                <li><a role="menuitem" tabindex="-1" href="/profile"><i class="fa fa-user-circle" aria-hidden="true"></i>&nbsp;My Profile</a></li>
                                <li><a role="menuitem" tabindex="-2" href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i>&nbsp;Inbox &nbsp;<span class="badge">0</span></a></li>
                                <li><a role="menuitem" tabindex="-3" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-power-off" aria-hidden="true"></i>&nbsp;Log Out</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                </form>
                            </ul>
                        </div>
                    @endif
                </div>
            <!-- End of login/User avatar -->
        </div>
