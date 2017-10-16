        <nav class="headernav navbar navbar-default">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>
              <a class="navbar-brand" href="#">Sunrise.com</a>
            </div>

            <div class="collapse navbar-collapse" id="myNavbar">

              <ul class="nav navbar-nav">
                <li><a href="#">主页</a></li>
                <li class="dropdown">
                  <a class="dropdown-toggle" data-toggle="dropdown" href="#">大学<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="#">Melbourne Uni</a></li>
                    <li><a href="#">Monash Uni</a></li>
                  </ul>
                </li>
                <li><a href="#">文章</a></li>
                <li>                      
                    <div class="search">
                        <div class="wrap">
                            <form action="#" method="post" class="form">
                                <div class="pull-left txt"><input type="text" class="form-control" placeholder="Search Topics"></div>
                                <div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                                <div class="clearfix"></div>
                            </form>
                            
                        </div>
                    </div>
                </li>
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
                                <button type="submit" class="btn btn-primary">Start New Topic</button>
                            </form>
                        </div>
                        <div class="env pull-left"><i class="fa fa-envelope"></i></div>
                        <div class="avatar pull-left dropdown">
                            <a data-toggle="dropdown" href="#"><img src="{{Auth::user()->avatar}}" style="width: 40px; height: 40px;top:10px; left:10px; border-radius: 50%;" alt="" /></a> <b class="caret"></b>
                            <div class="status green">&nbsp;</div>
                            <ul class="dropdown-menu" role="menu">
                                <li role="presentation"><a role="menuitem" tabindex="-1" href="/profile">My Profile</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-2" href="#">Inbox</a></li>
                                <li role="presentation"><a role="menuitem" tabindex="-3" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                </form>
                            </ul>
                        </div>
                    @endif


                        <div class="clearfix"></div>
                    </div>
                </li>
            </ul>
            </div>
        </nav> 
