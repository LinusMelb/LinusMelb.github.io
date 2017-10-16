@extends('layouts.app')

@section('css')
<!-- Include code hightlight style -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css"/>
<!-- Include Quill stylesheet -->
<link href="/packages/linus/forum/assets/vendor/quill/quill.snow.css" rel="stylesheet">

<style type="text/css">
    #editor-container > .ql-editor{
      min-height: 300px;
    }
</style>
@endsection

@section('content')

            <section class="content" style="padding-top: 80px">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 breadcrumbf">
                            <a href="">主页</a> <span class="diviver">&gt;</span>
                            <a href="">General Discussion</a> <span class="diviver">&gt;</span>
                            <a href="">Topic Details</a>
                        </div>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-8 col-md-8">

                            <!-- POST -->
                            <div class="post beforepagination" id="discussion" data-value="{{$discussion->id}}">
                                <div class="topwrap">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img src="{{ $discussion->user->avatar }}" alt="avatar" class="avatar-img">
                                            <div class="status green">&nbsp;</div>
                                        </div>

                                        <div class="icons">
                                            <img src="/packages/linus/forum/assets/img/icon1.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon4.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon5.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon6.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="posttext pull-left">
                                        <h2>{{ $discussion->title }}</h2>
                                        <p>{!! strip_tags($discussion->content, '<p><table><tr><th><td><ul><li><img>') !!}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="postinfobot">

                                    <div class="likeblock pull-left">
                                        <a href="" class="up"><i class="fa fa-thumbs-o-up"></i>0</a>
                                        <a href="" class="down"><i class="fa fa-thumbs-o-down"></i>0</a>
                                    </div>

                                    <div class="prev pull-left">
                                        <a href=""><i class="fa fa-reply"></i></a>
                                    </div>

                                    <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : {{ $discussion->created_at }}</div>

                                    <div class="next pull-right">
                                        <a href=""><i class="fa fa-share"></i></a>

                                        <a href=""><i class="fa fa-flag"></i></a>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            </div><!-- POST -->

                            <br/>

                            @foreach($comments as $comment)
                            <!-- COMMENT -->
                            <div class="post beforepagination" id="{{$comment->id}}" style="margin-bottom: 20px;">
                                <div class="topwrap">
                                    <div class="userinfo pull-left">
                                          <a href="/profile/{{$comment->user->id}}" title="{{$comment->user->username}}">
                                            <div class="avatar">
                                              <img src="{{$comment->user->avatar}}" class="avatar-img" >
                                              <div class="status green">&nbsp;</div>
                                            </div>
                                          </a>
                                        <div class="icons">
                                            <img src="/packages/linus/forum/assets/img/icon1.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon4.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon5.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon6.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="posttext pull-left">
                                      @if(Auth::user() && $comment->user_id == Auth::user()->id)
                                      <a href="javascript:void(0)" data-value="{{$comment->id}}" class="closebtn pull-right" data-toggle="confirmation"><i class="fa fa-times" aria-hidden="true"></i></a>
                                      @endif
                                      <p>{!! strip_tags($comment->content, '<p><table><tr><th><td><ul><li><img>') !!}</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="postinfobot">

                                    <div class="likeblock pull-left">
                                        <a href="" class="up"><i class="fa fa-thumbs-o-up"></i>0</a>
                                        <a href="" class="down"><i class="fa fa-thumbs-o-down"></i>0</a>
                                    </div>

                                    <div class="prev pull-left">
                                        <a href=""><i class="fa fa-reply"></i></a>
                                    </div>

                                    <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : {{$comment->created_at}}</div>

                                    <div class="next pull-right">
                                        <a href=""><i class="fa fa-share"></i></a>
                                        <a href=""><i class="fa fa-flag"></i></a>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <!-- END OF COMMENT -->
                            @endforeach
                            <!-- POST -->
<!--                             <div class="post">
                                <div class="topwrap">
                                    <div class="userinfo pull-left">
                                        <div class="avatar">
                                            <img src="/packages/linus/forum/assets/img/avatar3.jpg" alt="">
                                            <div class="status red">&nbsp;</div>
                                        </div>

                                        <div class="icons">
                                            <img src="/packages/linus/forum/assets/img/icon3.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon4.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon5.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon6.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="posttext pull-left">

                                        <blockquote>
                                            <span class="original">Original Posted by - theguy_21:</span>
                                            Did you see that Dove ad pop up in your Facebook feed this year? How about the Geico camel one?
                                        </blockquote>
                                        <p>Toronto Mayor Rob Ford does not have a bigger fan than "Anchorman's" Ron Burgundy. In fact, Burgundy wants Ford to be re-elected so much, that he agreed to sing the campaign song Brien. The tune in question ...</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                                <div class="postinfobot">

                                    <div class="likeblock pull-left">
                                        <a href="" class="up"><i class="fa fa-thumbs-o-up"></i>55</a>
                                        <a href="" class="down"><i class="fa fa-thumbs-o-down"></i>12</a>
                                    </div>

                                    <div class="prev pull-left">
                                        <a href=""><i class="fa fa-reply"></i></a>
                                    </div>

                                    <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : 20 Nov @ 9:50am</div>

                                    <div class="next pull-right">
                                        <a href=""><i class="fa fa-share"></i></a>

                                        <a href=""><i class="fa fa-flag"></i></a>
                                    </div>

                                    <div class="clearfix"></div>
                                </div>
                            </div> -->
                            <!-- POST -->
                    @if (Auth::guest())

                        <p>登录后发表回帖/You can post your comment after you log in</p>

                    @else
                            <!-- POST -->
                            <div class="post">
                                <form id="comment-form" action="/discussion/{{$discussion->id}}" class="form" method="post">
                                  {{ csrf_field() }}
                                    <div class="topwrap">
                                        <div class="userinfo pull-left">
                                            <div class="avatar">
                                                <img src="{{Auth::user()->avatar}}" alt="avatar" class="avatar-img">
                                                <div class="status red">&nbsp;</div>
                                            </div>

                                            <div class="icons">
                                                <img src="/packages/linus/forum/assets/img/icon3.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon4.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon5.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon6.jpg" alt="">
                                            </div>
                                        </div>
                                        <div class="posttext pull-left">
                                            <div class="textwraper">
                                                <div class="postreply">Post a Reply</div>
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
                                                      <button class="ql-link"></button>
                                                      <button class="ql-image"></button>
                                                    </span>
                                                </div>
                                                <div name="reply" id="editor-container" placeholder="Type your message here"></div>
                                                <input name="content" id="hidden_text" style="display: none;"></input>
                                            </div>
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
                                            <div class="pull-left smile"><a><i class="fa fa-smile-o"></i></a></div>
                                            <div class="pull-left"><button type="submit" class="btn btn-primary">Post Reply</button></div>
                                            <div class="clearfix"></div>
                                        </div>


                                        <div class="clearfix"></div>
                                    </div>
                                </form>
                            </div><!-- POST -->
                    @endif

                        </div>
                        <div class="col-lg-4 col-md-4">

                            <!-- Category -->
                            <div class="sidebarblock">
                                <h3>平台分类/Categories</h3>
                                <div class="divline"></div>
                                <div class="blocktxt">
                                    <ul class="cats">
                                        @foreach ($categories as $category)

                                            <li><span class="is-circle icon" style="color: {{$category->color}}"></span><a href="/category/{{ $category->slug }}">{{ $category->name }} <span class="badge pull-right">{{ $category->num_of_discussions }}</span></a></li>

                                        @endforeach
                                    </ul>
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

                        </div>
                    </div>
                </div>

            </section>


@endsection

@section('js')
<script type="text/javascript" src="/packages/linus/forum/assets/vendor/quill/quill.min.js"></script>

@if (!Auth::guest()):
<script type="text/javascript">
    var quill = new Quill('#editor-container', {
                modules: {
                  toolbar: '#toolbar-container',
                },
                placeholder: 'Compose an epic...',
                theme: 'snow'
              });

    $("#comment-form").on("submit", function(){
      var content = $('#hidden_text');

      /* At least 3 chars */
      if($('<div>').html(quill.root.innerHTML).text().length >= 3){
        /* Populate hidden form on submit */
        content.val(quill.root.innerHTML);

        return true
      }
      console.log("Pls type more than 3 letters...");

      /* No back end to actually submit to! */
      return false;
    });

    /* Delete Comments here */
    function closeComment(id){
      $('#'+id).fadeOut('slow');
      return;
    }

    $('[data-toggle="confirmation"]').confirmation();

</script>
@endif

@endsection
