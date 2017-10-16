@extends('layouts.app')


@section('css')

        <link rel="stylesheet" type="text/css" href="/packages/linus/forum/assets/css/cs-select.css">

        <link rel="stylesheet" type="text/css" href="/packages/linus/forum/assets/css/cs-skin-elastic.css">

        <link href="/packages/linus/forum/assets/vendor/quill/quill.snow.css" rel="stylesheet">

        <style type="text/css">
            #editor-container > .ql-editor{
              min-height: 300px;
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

@endsection

@section('content')

<!-- Include slider here -->

@include('forum::widgets.slider')
        <!-- Content -->
        <div class="container" style="margin-top: 90px; ">
                    <div class="row">

                      <!-- <a class="btn btn-primary" href="/university">主页</a>
                      <a class="btn btn-primary" href="/university/NewSubject">新建课程预览</a> -->

                        <!-- top nav: Uni, Degree, Faculty, Year -->
                        <div class="col-lg-3 col-md-3 col-sm-12">

                            <section style="padding-top: 0px;">
                                <select class="cs-select cs-skin-elastic">
                                    <option value="" disabled selected>Select University</option>
                                    <option value="argentina" data-class="flag-argentina">Melbourne University</option>
                                    <!-- <option value="brazil" data-class="flag-brazil">RMIT</option>
                                    <option value="france" data-class="flag-france">Monash</option>
                                    <option value="south-africa" data-class="flag-safrica">Victoria University</option> -->
                                </select>
                            </section>

                            <section>
                                <select class="cs-select cs-skin-elastic">
                                    <option value="" disabled selected>Select Degree</option>
                                    <option value="france" data-class="">Undergraduate</option>
                                    <option value="brazil" data-class="">Postgraduate</option>
                                    <option value="argentina" data-class="">Doctor</option>
                                    <option value="south-africa" data-class="">Honor Degree</option>
                                </select>
                            </section>

                            <section>
                                <select class="cs-select cs-skin-elastic">
                                    <option value="" disabled selected>Select Faculty</option>
<!--                                <option value="france" data-class="flag-france">France</option>
                                    <option value="brazil" data-class="flag-brazil">Brazil</option>
                                    <option value="argentina" data-class="flag-argentina">Argentina</option>
                                    <option value="south-africa" data-class="flag-safrica">South Africa</option> -->
                                </select>
                            </section>

                            <section>
                                <select class="cs-select cs-skin-elastic">
                                    <option value="" disabled selected>Select Year</option>
                                    <option value="1" >First Year</option>
                                    <option value="2">Second Year</option>
                                    <option value="3">Third Year</option>
                                </select>
                            </section>
                            <br><br>

                            <!-- Category -->
                            <div class="sidebarblock">
                                <h3>平台分类/Categories</h3>
                                <div class="divline"></div>
                                <div class="blocktxt">
                                    <ul class="cats">

                                      <li><span class="is-circle icon" style="color: red"></span>
                                        <a href="/category/jobs">Jobs
                                          <span class="badge pull-right">1</span>
                                        </a>
                                      </li>

                                    </ul>
                                </div>

                            </div>

                            <!-- University Survey Sidebar -->
                            <div class="sidebarblock">
                                <h3>大学板块/University</h3>
                                <div class="divline"></div>
                                <div class="blocktxt">
                                    <p>Which uni are you studying?</p>
                                    <form action="" method="post" class="form">
                                        <table class="poll">
                                            <tbody><tr>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar color1" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 90%">
                                                            墨尔本大学/Melbourne University
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="chbox">
                                                    <input id="opt1" type="radio" name="opt" value="1">
                                                    <label for="opt1"></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar color2" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 63%">
                                                            莫纳什大学/Monash University
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="chbox">
                                                    <input id="opt2" type="radio" name="opt" value="2" checked="">
                                                    <label for="opt2"></label>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="progress">
                                                        <div class="progress-bar color3" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 75%">
                                                            皇家理工大学/RMIT University
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="chbox">
                                                    <input id="opt3" type="radio" name="opt" value="3">
                                                    <label for="opt3"></label>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </form>
                                    <p class="smal">This section will release soon!</p>
                                </div>
                            </div>
                            <!-- End of University Survey Sidebar -->
                        </div>

                        <div class="col-lg-9 col-md-9 col-sm-12">

                            <!-- POST -->
                            <!-- Display all discussions -->

                            <div id="view_post">
                            </div>

                            <div id="forum_content">

                                <!-- <div class="row">
                                    <a>Time</a>
                                    <a>Views</a>
                                    <a>Answers</a>
                                </div> -->

                            @foreach ($SubjectPosts as $SubjectPost)
                            <div class="post">
                                    <div class="wrap-ut pull-left">
                                        <div class="userinfo pull-left">
                                            <div class="avatar">
                                                <img src="/packages/linus/forum/assets/img/unimelb-logo.jpg" style="width: 50px; height: 50px;top:10px; left:10px; border-radius: 50%;" alt="">
                                                <!-- <div class="status green">&nbsp;</div> -->
                                            </div>

                                            <div class="icons">
                                                <img src="/packages/linus/forum/assets/img/icon1.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon4.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="posttext pull-left">
                                            <h2><a data-id="{{$SubjectPost->id}}" href="#">如何评价 {{$SubjectPost->code}} {{$SubjectPost->name}}</a></h2>
                                            <p>难度系数: @if ($SubjectPost->difficulty == 0)
                                                            <b>-</b>
                                                        @else

                                                            @for ($i = 0; $i < floor($SubjectPost->difficulty); $i++)
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            @endfor
                                                            {{ number_format($SubjectPost->difficulty,1) }}

                                                        @endif


                                            </p>
                                            <p>实用程度:
                                                        @if ($SubjectPost->practicality == 0)
                                                            <b>-</b>
                                                        @else

                                                            @for ($i = 0; $i < floor($SubjectPost->practicality); $i++)
                                                                <i class="fa fa-star" aria-hidden="true"></i>
                                                            @endfor
                                                            {{ number_format($SubjectPost->practicality,1) }}

                                                        @endif
                                            </p>
                                            <p>费用: ${{ $SubjectPost->fees }}</p>
                                            <p>开课时间: Semester 1, Semester 2</p>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="postinfo pull-left">
                                        <div class="comments">
                                            <div class="commentbg">
                                                {{ $SubjectPost->answers }}
                                                <div class="mark"></div>
                                            </div>

                                        </div>
                                        <div id="views-" class="views"><i class="fa fa-eye"></i> {{ $SubjectPost->views }}</div>
                                        <div class="time"><i class="fa fa-clock-o"></i>
                                        <!-- Store a tempoary variable -->
                                        25 min

                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div><!-- POST -->
                                @endforeach

                            </div> <!-- End of forum content -->
                        </div>

                    </div>
        </div>

        <!-- End Content -->

@endsection

@section('js')

        <script type="text/javascript" src="/packages/linus/forum/assets/vendor/quill/quill.min.js"></script>

        <script src="/packages/linus/forum/assets/js/classie.js"></script>
        <script src="/packages/linus/forum/assets/js/selectFx.js"></script>
        <script>
            (function() {
                [].slice.call( document.querySelectorAll( 'select.cs-select' ) ).forEach( function(el) {
                    new SelectFx(el);
                } );
            })();
        </script>

        <script type="text/javascript">
            (function() {

                $('.post').on('click', 'a', function(){

                    var id = $(this).attr('data-id');

                 /* Ajax send data to the server */
                  $.get("/university/subjectpost/"+id, function(data, status){

                        if(status == 'success'){

                            /* Hide all subject posts */
                            $('#forum_content').hide();

                            var returnHTML = data['data'];

                            /* Replace content with Single subject post data */
                            /* Retreving from widgets template */
                            jQuery('#view_post').html(returnHTML);

                        }
                  });
                });
            })();
        </script>
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

@endsection
