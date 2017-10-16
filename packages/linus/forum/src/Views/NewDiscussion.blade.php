@extends('layouts.app')

@section('css')
    <!-- CSS Style for quill editor -->
    <link href="/packages/linus/forum/assets/vendor/quill/quill.snow.css" rel="stylesheet">

    <style type="text/css">
        /* Original color */
        .original-btn{
            background-color: #1abc9c;
        }
        /* Button being clicked */
        .clicked-btn{
            background-color: #ff6666;
        }

        .btn-group a:hover{
            background-color: grey;
        }
        .template-loading{
            position: relative;
            top: 0;
            left: 0;
            width: 100%;
            height: 400px;
            background: url('/packages/linus/forum/assets/img/loading-div-cat.gif') 50% 50% no-repeat rgba(255,255, 255, 1);
            z-index: 999;
            transition: 1s 0.4s;
        }

        /* Style for quill editor */
        #editor-container > .ql-editor{
          min-height: 300px;
        }
    </style>

@endsection

@section('content')

<!-- Include slider here -->

@include('forum::widgets.slider')

            <section class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 breadcrumbf">
                            <a href="">Forum</a> <span class="diviver">&gt;</span> <a href="">General Discussion</a> <span class="diviver">&gt;</span> <a href="">New Discussion</a>
                        </div>
                    </div>
                </div>


                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">

                            <!-- POST -->
                            <div class="post">

                                <form id="article-form" action="/NewDiscussion" class="form newtopic" method="post">
                                    {{ csrf_field() }}
                                    <div class="topwrap">
                                        <div class="userinfo pull-left">
                                            <div class="avatar">
                                                <img class="avatar-img" src="{{Auth::user()->avatar}}" alt="profile image">
                                                <div class="status red">&nbsp;</div>
                                            </div>

                                            <div class="icons">
                                                <img src="/packages/linus/forum/assets/img/icon3.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon4.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon5.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon6.jpg" alt="">
                                            </div>
                                        </div>

                                        <div class="posttext pull-left">

                                            <div class="btn-group">
                                                <p>请先选择类别: </p>
                                                @foreach ($categories as $category)
                                                    <a category-id="{{$category->id}}" type="button" style="margin-right: 20px; margin-bottom: 20px;" class="btn btn-primary original-btn">{{$category->name}}</a>
                                                @endforeach
                                            </div>

                                        <!-- START OF TEMPLATE -->
                                        <div id="form-template">

                                            <div>
                                                <input type="text" placeholder="请输入标题" class="form-control" name="title">
                                                @if ($errors->has('title'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('title') }}</strong>
                                                </span>
                                                @endif
                                            </div>


                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <select name="category_id" id="category" class="form-control" required>
                                                            <option value="0" disabled selected>请选择类别</option>

                                                        @foreach ($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                                        @endforeach

                                                    </select>
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <select name="subcategory" id="subcategory" class="form-control">
                                                        <option value="" disabled="" selected="">请选择发帖类别</option>
                                                        <option value="op1">一般发帖/General</option>
                                                        <option value="op2">紧急发帖/Urgent</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END OF TEMPLATE -->


                                            <!-- Create the toolbar container -->
                                            <div id="toolbar-container">
                                              <span class="ql-formats">
                                                  <select class="ql-size"></select>
                                              </span>
                                                <span class="ql-formats">
                                                  <button class="ql-bold"></button>
                                                  <button class="ql-italic"></button>
                                                  <button class="ql-underline"></button>
                                                  <button class="ql-strike"></button>
                                                </span>
                                                <span class="ql-formats">
                                                  <select class="ql-color"></select>
                                                  <select class="ql-background"></select>
                                                </span>
                                                <span class="ql-formats">
                                                  <button class="ql-blockquote"></button>
                                                  <button class="ql-code-block"></button>
                                                </span>
                                                <span class="ql-formats">
                                                  <button class="ql-list" value="ordered"></button>
                                                  <button class="ql-list" value="bullet"></button>
                                                </span>
                                                <span class="ql-formats">
                                                  <button class="ql-direction" value="rtl"></button>
                                                  <select class="ql-align"></select>
                                                </span>
                                                <span class="ql-formats">
                                                  <button class="ql-link"></button>
                                                  <button class="ql-image"></button>
                                                  <button class="ql-video"></button>
                                                </span>
                                                <span class="ql-formats">
                                                  <button class="ql-clean"></button>
                                                </span>
                                            </div>

                                            <!-- Create the editor container -->
                                            <div id="editor-container"></div>

                                            <!-- Hidden input -->
                                            <input id="hidden_text" type="text" name="content" style="display: none">
                                            @if ($errors->has('content'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('content') }}</strong>
                                                </span>
                                            @endif

                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="postinfobot">

                                        <div class="notechbox pull-left">
                                            <input type="checkbox" name="note" id="note" class="form-control">
                                        </div>

                                        <div class="pull-left">
                                            <label for="note"> Email me when some one post a reply</label>
                                        </div>

                                        <div class="pull-right postreply">
                                            <div class="pull-left smile"><a href=""><i class="fa fa-smile-o"></i></a></div>
                                            <div class="pull-left"><button type="submit" class="btn btn-primary">Post</button></div>
                                            <div class="clearfix"></div>
                                        </div>


                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div><!-- POST -->

                            <div class="row similarposts">
                                <div class="col-lg-10"><i class="fa fa-info-circle"></i> <p>Similar Posts according to your <a href="">Topic Title</a>.</p></div>
                                <div class="col-lg-2 loading"><i class="fa fa-spinner"></i></div>

                            </div>

                            <!-- POST -->
                            <div class="post">
                                <div class="wrap-ut pull-left">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img src="{{Auth::user()->avatar}}" alt="avatar" class="avatar-img">
                                            <div class="status red">&nbsp;</div>
                                        </div>

                                        <div class="icons">
                                            <img src="/packages/linus/forum/assets/img/icon2.jpg" alt="badges"><img src="/packages/linus/forum/assets/img/icon4.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="posttext pull-left">
                                        <h2>关于网站发布的公告</h2>
                                        <p>本网站将于２０１７年年底正式上线。本网站致力于为广大中国留澳大学生提供多元化的信息。为每一位同学提供最权威，全面，详尽的帮助。感谢大家的支持！ 网站Ａｐｐ计划于２０１８年年底之前正式上线，目的是给大家提供一个更加简单，高效，　快速的方式获取本网站信息！尽请期待！</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="postinfo pull-left">
                                    <div class="comments">
                                        <div class="commentbg">
                                            456
                                            <div class="mark"></div>
                                        </div>

                                    </div>
                                    <div class="views"><i class="fa fa-eye"></i> 1,568</div>
                                    <div class="time"><i class="fa fa-clock-o"></i> 2 days</div>
                                </div>
                                <div class="clearfix"></div>
                            </div><!-- POST -->

                        </div>
                        <div class="col-lg-4 col-md-4">

                            <!-- -->
                            <div class="sidebarblock">
                                <h3>平台分类/Categories</h3>
                                <div class="divline"></div>
                                <div class="blocktxt">
                                    <ul class="cats">
                                        @foreach ($categories as $category)
                                            <li>
                                                <span class="is-circle icon" style="color: {{$category->color}}"></span>
                                                <a href="/category/{{ $category->slug }}">{{ $category->name }} <span class="badge pull-right">{{ $category->num_of_discussions }}</span></a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                                                        <!-- -->
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

                            <!-- Article -->
                            <div class="sidebarblock">
                                <h3>精选文章/Hot Topics</h3>
                                @foreach ($articles as $article)
                                <div class="divline"></div>
                                <div class="blocktxt">
                                    <a href="/article?id={{$article->id}}">{{ $article->title }}</a>
                                </div>
                                @endforeach
                            </div>
                            <!-- End article -->


                        </div>
                    </div>
                </div>


            </section>

@endsection

@section('js')
<!-- Quill editor -->
<script type="text/javascript" src="/packages/linus/forum/assets/vendor/quill/quill.min.js"></script>
<script type="text/javascript">
        var quill = new Quill('#editor-container', {
            modules: {
              toolbar: '#toolbar-container',
            },
            placeholder: 'Compose an epic...',
            theme: 'snow'
          });

        $("#article-form").on("submit", function(){
          var content = $('#hidden_text');

          // Populate hidden form on submit
          content.val(quill.root.innerHTML);

          // console.log(about.val());

          // console.log(about.val());

          // No back end to actually submit to!
          return true;
        });
</script>

<script type="text/javascript">
    /* Change category */
    jQuery(document).ready(function() {

        var buttons = $('.btn-group a');

        buttons.on('click', function(){


            /* Set all buttons to default color */
            $.each(buttons, function(){
                $(this).removeClass('clicked-btn');
            });

            $(this).addClass('clicked-btn');

            var id = $(this).attr('category-id');

            $('#form-template').empty();

            /* Showing loading animation */
            /* Loading animation until finishing rendering template */

            $('#form-template').addClass('template-loading');

            /* Ajax to get different template */
            $.get("/NewDiscussion/template/"+id, function(data, status){

                if(status == 'success'){

                    /* Hide all subject posts */


                    var returnHTML = data['data'];

                    /* Replace content with Single subject post data */
                    /* Retreving from widgets template */
                    jQuery('#form-template').html(returnHTML);

                    $('#form-template').removeClass('template-loading');
                }


            });
            /* End of get request */

        });

    });
</script>

@endsection
