<div class="post">
    <div class="topwrap">
        <div class="userinfo pull-left">
            <div class="avatar">
                <img src="{{Auth::user()->avatar}}" class="avatar">
                <div class="status red">&nbsp;</div>
            </div>

            <div class="icons">
                <img src="/packages/linus/forum/assets/img/icon3.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon4.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon5.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon6.jpg" alt="">
            </div>
        </div>
        <div class="posttext pull-left">

            <p>{!! strip_tags($answer->answer, '<a><br><img>') !!}</p>

            <p><span>难度系数:</span> @if ($answer->difficulty == 0)
                <b>-</b>
            @else

                @for ($i = 0; $i < floor($answer->difficulty); $i++)
                    <i class="fa fa-star" aria-hidden="true"></i>
                @endfor
                {{ number_format($answer->difficulty,1) }}

            @endif

        </p>
        <p><span>实用程度: </span>
            @if ($answer->practicality == 0)
                <b>-</b>
            @else

                @for ($i = 0; $i < floor($answer->practicality); $i++)
                    <i class="fa fa-star" aria-hidden="true"></i>
                @endfor
                {{ number_format($answer->practicality,1) }}

            @endif
        </p>

        </div>

        <div class="clearfix"></div>
    </div>                              
    <div class="postinfobot">

        <div class="likeblock pull-left">
            <a href="" class="up"><i class="fa fa-thumbs-o-up"></i>{{ $answer->agree }}</a>
            <a href="" class="down"><i class="fa fa-thumbs-o-down"></i>{{ $answer->disagree }}</a>
        </div>

        <div class="prev pull-left">                                        
            <a href=""><i class="fa fa-reply"></i></a>
        </div>

        <div class="posted pull-left"><i class="fa fa-clock-o"></i> Posted on : {{ $answer->created_at }}</div>

        <div class="next pull-right">                                        
            <a href=""><i class="fa fa-share"></i></a>

            <a href=""><i class="fa fa-flag"></i></a>
        </div>

        <div class="clearfix"></div>
    </div>
</div><!-- End Answers -->
