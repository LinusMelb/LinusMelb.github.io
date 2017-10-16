<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Bootstrap -->
        <link href="/packages/linus/forum/assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom -->
        <link href="/packages/linus/forum/assets/css/custom.css" rel="stylesheet">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
          <![endif]-->

        <!-- fonts -->
        <link rel="stylesheet" href="/packages/linus/forum/assets/css/font-awesome.css">

        <!-- CSS STYLE-->
        <link rel="stylesheet" type="text/css" href="/packages/linus/forum/assets/css/style.css" media="screen">

        <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
        <link rel="stylesheet" type="text/css" href="/packages/linus/forum/assets/css/settings.css" media="screen">

        <link rel="stylesheet" type="text/css" href="/packages/linus/forum/assets/css/cs-select.css">

        <link rel="stylesheet" type="text/css" href="/packages/linus/forum/assets/css/cs-skin-elastic.css">

        @yield('css')

        <style type="text/css">
            strong{
                color: red;
            }
            /* Make sure footer stick to bottom */
            html {
                position: relative;
                min-height: 100%;
            }
            body{
                margin-bottom: 100px;
            }

            footer {
                background-color: white;
                position: absolute;
                left: 0;
                bottom: 0;
                height: 70px;
                width: 100%;
                overflow:hidden;
            }
            section{
                padding-top: 20px;
            }
            .post span{
                color: black;
            }

            /* avatar style */
            .avatar{
                /*width: 40px; */
                height: 40px;
                /*top:10px; */
                /*left:10px; */
                border-radius: 50%;
            }
            .loading-div{
              position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: url('/packages/linus/forum/assets/img/loading-div-cat.gif') 50% 50% no-repeat rgba(255,255, 255, 1);
                z-index: 999;
                transition: 1s 0.4s;
                /*display:none;*/
            }
            .loading-div img {
                margin-top: 50%;
                margin-left: 50%;
            }

            .unfold{
                display: none;
            }
            .toggle{
                color: #0c5897;
                text-decoration-style: none;
                font-size: 14px;
            }
            /* Display on mobile */
            @media (max-width: 767px){
                .post .posttext {
                    width: 95%;
                    padding-right: 15px;
                    padding-top: 15px;
                    padding-bottom: 15px;
                    padding-left: 25px;
                }
                p{
                    word-break: break-all;
                }
                #myNavbar{
                    border-bottom: 1px solid rgba(30,35,42,.06);
                    box-shadow: 0 1px 3px 0 rgba(0,34,77,.05);
                }
                nav ul li {
                    margin-left: 0px; 
                    width: 100%;
                    padding: 0 5px 0 5px;
                }

            }
            table {
                max-width: none;
            }
            .navbar {
                margin-bottom: 0px!important; /* In bootstrap.min.css */
            }

            @media (min-width: 768px){
                .navbar-header {
                    float: left;
                }
                .search-bar{
                    width: 300px;
                }
                nav ul li{
                    margin-left: 20px;
                }
            }

            .navbar-default {
                
                border-color: white;
            }

        </style>

    </head>
    <body class="content">

        <!-- Loading animation -->
        <div class="loading-div"></div>

        <div style="box-shadow: 0 1px 3px 0 rgba(0,34,77,.05); height: 70px; width: 100%; border-bottom: 1px solid rgba(30,35,42,.06); position: fixed; background-color: white; z-index: 150">
            <div class="container">
                <nav class="headernav navbar navbar-default" style="border-bottom: 0px; z-index: 100">
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
                                            <div class="pull-left txt"><input type="text" class="form-control" placeholder="Search Topics"></div>
                                            <div class="pull-right"><button class="btn btn-default" type="button"><i class="fa fa-search"></i></button></div>
                                            <div class="clearfix"></div>
                                        </form>
                                        
                                    </div>
                                </div>
                            </li>
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
                                            <form action="/university/NewSubject" method="get" class="form">
                                                <button type="submit" class="btn btn-primary">Create New Subject</button>
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
                            <!-- End of login/User avatar -->
                        </ul>
                    </div>
                </nav>
            </div>
        </div>


        @yield('content')


        <!-- Footer -->
            <footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-1 col-xs-3 col-sm-2 logo "></div>
                        <div class="col-lg-8 col-xs-9 col-sm-5 ">Copyrights 2017. Designed by <a href="linuslife.com">Linus Peng</a> &amp; <a href="https://www.linkedin.com/in/mike-chen-aa8969a1/">Mike Chen</a>.</div>
                        <div class="col-lg-3 col-xs-12 col-sm-5 sociconcent">
                            <ul class="socialicons">
                                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-cloud"></i></a></li>
                                <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>

        <!-- get jQuery from the google apis -->
        <script type="text/javascript" src="/packages/linus/forum/assets/js/jquery-3.2.1.min.js"></script>
 
        <script src="/packages/linus/forum/assets/js/bootstrap.min.js"></script>
        <!-- Quill editor -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/KaTeX/0.7.1/katex.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
        <script type="text/javascript" src="/packages/linus/forum/assets/vendor/quill/quill.min.js"></script>
        <!-- END quill js file -->

        <script type="text/javascript">

            /* Loading bar */
            jQuery(window).on('load', function(){
               // PAGE IS FULLY LOADED  
               // FADE OUT YOUR OVERLAYING DIV
               setTimeout(function(){
                  jQuery('.loading-div').fadeOut()
                }, 0);
            });
        </script>

        @yield('js')
    </body>
</html>