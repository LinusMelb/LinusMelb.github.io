@extends('layouts.app')


@section('content')

<!-- Include slider here -->

@include('forum::widgets.slider')

            <section class="content">

                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 col-md-4" style="padding-top: 63px;">

                            <!-- -->
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

                        <div class="col-lg-8 col-md-8">

                            <!-- POST -->
                            <!-- Display all discussions -->
                            <div id="forum_content">
                                @if(isset($slug) && $slug == 'Jobs')
                                    @include('forum::widgets.SlimPost')
                                @else
                                    @include('forum::widgets.LargePost')
                                @endif

                            </div> <!-- End of forum content -->

                            <!-- Scroll bar for each post -->
                            <div id="btmBar" style="width: 100%; display: none">
                                <a href="#" class="fold pull-right" data-toggle="collapse" data-target=""><i class="fa fa-angle-double-up" aria-hidden="true"></i>&nbsp;收起</a>
                                <a href="#"><i class="fa fa-telegram" aria-hidden="true"></i>&nbsp;申请职位&nbsp;&nbsp;</a>
                                <a href="#"><i class="fa fa-bell" aria-hidden="true"></i>&nbsp;钉一下&nbsp;&nbsp;</a>
                                <a href="#"><i class="fa fa-comments" aria-hidden="true"></i>&nbsp;评论&nbsp;</a>
                            </div>

                        </div>

                    </div>
                </div>

            </section>

@endsection

@section('js')
<script type="text/javascript" src="/packages/linus/forum/assets/js/fix-bottom-bar.js"></script>

<script type="text/javascript">


    (function() {

        /* Set up Asjax token */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        /* Update views */
        /* Needs to modify later */
        /* This code will update views twice each time */
        $('#forum_content .posttext').on('click', 'a', function(){

            /* This user has viewed this post */
            if($(this).attr('data') == -1){
                return;
            }

            var id = $(this).attr('data');

            /* change data value to prevent from updating view again*/
            $(this).attr('data', -1);

            /* Add 1 view to current discussion */
            var views = Number($('#views-'+id).text().trim())+1;

          /* Ajax send data to the server */
          $.post("/update-views", {views : views, id: id, datatype: 'discussion'}, function(data, status){


            if(data == 'success' && status == 'success'){

                $('#views-'+id).html('<i class="fa fa-eye"></i> '+views);

            }else{

                /* Failed, encountered issues on server */
            }

          });


        });

    })();

</script>


<script type="text/javascript">

$(function () {
    $('.toggle').on('click', function(){
        var id = $(this).attr('data-target');
        $('#btmBar .fold').attr('data-target', id);
    });

    $('#btmBar').foldContentPlugin({
        'btnBg': 'white',
        'btnColor': '#fff',
        'paddingTop': '2px'
    });
});

</script>

@endsection
