@if ($discussions->links() !== NULL)

    {{ $discussions->links() }}

@endif

@foreach ($discussions as $discussion)

<div class="post">
    <div class="wrap-ut pull-left">
        <div class="userinfo pull-left">
            <a href="/profile/{{$discussion->user->id}}" title="{{$discussion->user->username}}">
            <div class="avatar">
                <img src="{{ $discussion->user->avatar }}" style="width: 40px; height: 40px;top:10px; left:10px; border-radius: 50%;" alt="">
                <div class="status green">&nbsp;</div>
            </div>
            </a>
            <div class="icons">
                <img src="/packages/linus/forum/assets/img/icon1.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon4.jpg" alt="">
            </div>
        </div>
        <div class="posttext pull-left">
            <h2><a href="/discussion/{{ $discussion->id }}">{{ $discussion->title }}</a></h2>
            <p>{!! str_limit(strip_tags($discussion->content), 150) !!}</p>
        </div>
        <div class="clearfix"></div>
        </div>
    <div class="postinfo pull-left">
        <div class="comments">
            <div class="commentbg">
                {{ $discussion->answers }}
                <div class="mark"></div>
            </div>

        </div>
        <div id="views-{{$discussion->id}}" class="views"><i class="fa fa-eye"></i> {{ $discussion->views }}</div>
        <div class="time"><i class="fa fa-clock-o"></i>
        <!-- Store a tempoary variable -->
        @php
            $s = $now->diffInSeconds($discussion->created_at);
        @endphp

        <!-- calculate how long past so far -->
        @if ($s < 60)
            {{ $s }} s
        @elseif ($s <= 3600)
            {{ floor($s/60) }} min
        @else
            {{ floor($s/3600) }} h
        @endif

        </div>
    </div>
    <div class="clearfix"></div>
</div><!-- POST -->

@endforeach

@if ($discussions->links() !== NULL)
    {{ $discussions->links() }}
@endif
