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

        <!-- PARTICLES CSS STYLE -->
        <link rel="stylesheet" media="screen" href="/packages/linus/forum/assets/css/particles/style.css">


        <style type="text/css">
            /* Make sure footer stick to bottom */

            html {
                position: relative;
                min-height: 100%;
            }
            body{
                margin-bottom: 100px;
                background: #ecf0f1;
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

            .avatar-img{
               width: 40px;
               height: 40px;
               top:0px;
               left:10px;
               border-radius: 50%;
           }

            /* Display on the small screen */
            @media (max-width: 400px){
                footer {
                    background-color: white;
                    position: relative;
                    left: 0;
                    bottom: -100px;
                    height: auto;
                    width: 100%;
                    overflow: hidden;
                    margin-top: -100px;
                    line-height: 50px;
                }
            }

            strong{
                color: red;
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
            @media (max-width: 991px){
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

                nav ul li {
                    margin-left: 0px;
                    width: 100%;
                    padding: 0 5px 0 5px;
                }
                .pagi-placeholder{
                    width: 100%;
                    height: 30px;
                }
                /* Sidebar in login page */
                #login-sidebar{
                    margin: 0 -15px;
                }
            }

            table {
                max-width: none;
            }
            .navbar {
                margin-bottom: 0px!important; /* In bootstrap.min.css */
            }

            @media (min-width: 768px) and (max-width: 991px){
                .navbar-header {
                    float: left;
                }
                .search-bar{
                    width: 300px;
                }
                .pagi-placeholder{
                    width: 100%;
                    height: 63px;
                }
            }

            @media screen and (min-width: 992px){
              .pagi-placeholder{
                  width: 100%;
                  height: 63px;
              }
              .navbar-header {
                  float: left;
              }
              .search-bar{
                  width: 300px;
              }
              nav ul li{
                  margin-left: 30px;
              }
              .navbar{
                /* Justify content to center */
                display: flex;
                justify-content: space-around;
                display: -webkit-flex; /* Safari */
                -webkit-justify-content: space-around; /* Safari 6.1 */
              }
            }
            .navbar-default {

                border-color: white;
            }

            .icon.is-circle {
                border: 3px solid currentColor;
                width: 15px;
                height: 15px;
                margin-right: 10px;
            }

            .is-circle {
                border-radius: 50%;
            }
            .icon {
                font-size: 21px;
                height: 24px;
                line-height: 24px;
                width: 24px;
                display: inline-block;
            }
            .dropdown-menu li{
              margin-left: 0px!important;
            }

            /* ---- particles.js container ---- */

            #particles-js{
              width: 100%;
              height: 420px!important;
              /*background-color: #b61924;*/
              background-size: cover;
              background-position: 50% 50%;
              background-repeat: no-repeat;
            }


            #header-search-table {
              width: 100%;
              border-collapse: separate;
              border-spacing: 5px;
            }

          .header-search-wrapper{
            position: absolute;
            background: white;
            left: 349px;
            top: 67px;
            padding: 15px;
            width: 370px;
            display: none;
            overflow: hidden;
          }

          .search-item {
            padding: 2px;
          }

          .search-image img{
            height: 30px;
            width: 30px;
          }



          @media screen and (min-width: 1200px){
            .header-search-wrapper{
              left: 463px;
            }
          }

          /* Nav bat link set backgrounds */
          .nav .open>a, .nav .open>a:hover, .nav .open>a:focus {
              background-color: unset!important;
              border-color: unset!important;
          }

        </style>

        @yield('css')


    </head>
    <body class="">

        <!-- Loading animation -->
        <div class="loading-div"></div>

        <!-- particles.js container -->
        <div id="particles-js" style="position: absolute; height: 370px; "></div>

        <div style="box-shadow: 0 1px 3px 0 rgba(0,34,77,.05); background: white; height: 70px; width: 100%; border-bottom: 1px solid rgba(30,35,42,.06); position: fixed; z-index: 100">
            <div class="container">

                <div id="mySidenav" class="sidenav">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  @include('forum::widgets.sidebar')

                </div>
                <span id="menu-toggle" style="padding-top:10px;font-size:30px;cursor:pointer;" onclick="openNav()">&#9776;
                    <a class="pull-right" style="color: #989c9e;">Sunrise.com</a>
                </span>

                @include('forum::widgets.navbar')
            </div>
        </div>

            <!-- Nav bar -->
            @yield('content')

            <!-- Modal -->
            <!-- End Modal -->

            <!-- Footer -->
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-xs-12 col-sm-5 sociconcent">&copy; Copyrights 2017. Designed by <a style="color: #428bca" href="">LIMI Studio</a>.</div>
                        <div class="col-lg-3 col-xs-12 col-sm-5 sociconcent pull-right">
                            <ul class="socialicons">
                                <li><a href="#"><i class="fa fa-weixin"></i></a></li>
                                <li><a href="#"><i class="fa fa-weibo"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </footer>
            <!-- End Footer -->

        <!-- particles effect scripts -->
        <script src="/packages/linus/forum/assets/js/particles/particles.js"></script>
        <script src="/packages/linus/forum/assets/js/particles/app.js"></script>

        <!-- get jQuery from the google apis -->
        <script type="text/javascript" src="/packages/linus/forum/assets/js/jquery-3.2.1.min.js"></script>

        <!-- SLIDER REVOLUTION 4.x SCRIPTS  -->
        <script type="text/javascript" src="/packages/linus/forum/assets/js/jquery.themepunch.plugins.min.js"></script>
        <script type="text/javascript" src="/packages/linus/forum/assets/js/jquery.themepunch.revolution.min.js"></script>

        <script src="/packages/linus/forum/assets/js/bootstrap.min.js"></script>
        <script src="/packages/linus/forum/assets/js/bootstrap-confirmation.min.js"></script>

        <!-- LOOK THE DOCUMENTATION FOR MORE INFORMATIONS -->
        <script type="text/javascript">

            var revapi;

            jQuery(document).ready(function() {
                "use strict";
                revapi = jQuery('.tp-banner').revolution(
                        {
                            delay: 10000,
                            startwidth: 1200,
                            startheight: 300,
                            hideThumbs: 10,
                            fullWidth: "on"
                        });
               $('#particles-js').css('height', $( window ).height());

        });
        //ready

        /* Open side navbar when on mobile device */
        function openNav() {
            document.getElementById("mySidenav").style.width = "250px";
        }
        /* Close sidebar when click close button */
        function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
        }

        </script>
        <!-- END REVOLUTION SLIDER -->
        <script type="text/javascript">

            /* Loading bar */
            jQuery(window).on('load', function(){
               // PAGE IS FULLY LOADED
               // FADE OUT YOUR OVERLAYING DIV
               setTimeout(function(){
                  jQuery('.loading-div').fadeOut()
                }, 0);

                // HEADER SEARCH
                header_search_init();
            });

            /* Header search inital */
            function header_search_init(){
              var $input = jQuery('#search-input');
              var $wrapper = jQuery('.header-search-wrapper');
              var $result = jQuery('#header-search-result');

              $input.focusout(function(){
                setTimeout(
                  function (){
                    var focus = ($input.find(':focus').length > 0);
                    if (!focus){
                      $wrapper.css('display','none');
                    }
                }, 200);
              });

              //Header search: Focus and input field has value show the result
              $input.focusin(function(){
                if($input.val() !== ''){
                  $wrapper.css('display','block');
                }
              });

              //Header search: make row clickable
              $result.click( function() {
                // var url = $(event.target).closest('tr').find('a').attr('href');
                // if (url){
                //   window.location = url;
                // }
              });

              //Header search: sent input to server and get list of product
              $input.on('input',function(e){
              // $input.keyup(function(){
                if($input.val().trim().length > 0)
                  headerSearchPost($input.val());
                else
                  $wrapper.css('display','none');
              });
            }

            function headerSearchPost(value){
              var $result = jQuery('#header-search-result');
              var $wrapper = jQuery('.header-search-wrapper');
              $wrapper.css('display','block');
              var url = "{{ route('search.ajax') }}";
              $.get(url, { query: value }, function (data) {
                var result = '';
                var i = 1;
                if(data.length <= 0){
                  result += '<tr class="search-item"><td style="text-align:center">没有这玩意儿</td></tr>';
                } else {
                  if(typeof data['user'] !== 'undefined' && data['user'].length > 0){
                    result += '<tr><td class="search-cat">用户</td></tr>';
                    data['user'].forEach(function(item){
                      result += '<tr class="search-item">';
                      result += '<td class="search-image"><a href=""><img src="' + item.avatar + '"></a></td>';
                      result += '<td class="search-info"><a href="">'+ item.username +'</a></td></tr>';
                    });
                  }

                  if(typeof data['article'] !== 'undefined' && data['article'].length > 0){
                    result += '<tr><td class="search-cat">文章</td></tr>';
                    data['article'].forEach(function(item){
                      result += '<tr class="search-item">';
                      result += '<td class="search-info"><a href="">'+ item.title +'</a></td></tr>';
                    });
                  }

                  result += '<tr class="search-item">';
                  result += '<td colspan=2 style="text-align:center"><a href ="">查看更多</a></td></tr>';

                }
                $result.html('<table id="header-search-table"><tbody>'+ result +'</tbody></table>');
              }, "json");
            }

        </script>

        @yield('js')
    </body>
</html>
