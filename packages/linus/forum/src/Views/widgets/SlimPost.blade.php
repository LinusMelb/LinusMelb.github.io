@if ($discussions->links() !== NULL)
    {{ $discussions->links() }}

@endif


@foreach ($discussions as $discussion)

<div class="post" id="post-{{ $discussion->id }}">
    <div class="wrap-ut pull-left">
        <div class="userinfo pull-left">
          <a href="/profile/{{$discussion->user->id}}" title="{{$discussion->user->username}}">
            <div class="avatar">
                <img src="{{ $discussion->user->avatar }}" class="avatar-img" alt="">
                <div class="status green">&nbsp;</div>
            </div>
          </a>
        </div>
        <div class="posttext pull-left">
            <h2 style="padding-top: 70px; margin-top: -65px;" id="fix-{{$discussion->id}}">
            <a data="{{ $discussion->id }}" target="_blank" href="/discussion/{{ $discussion->id }}">{{ $discussion->title }}</a>&nbsp;
            <!-- <span class="view-btn"> -->
            <a data="{{ $discussion->id }}" class="toggle" data-toggle="collapse" data-target="#{{$discussion->id}}"><label class="label label-info">展开</label></a>
            <!-- </span> -->
            </h2>

            <div id="{{$discussion->id}}" class="collapse">
            <p>{!! strip_tags($discussion->content, '<p><table><tr><th><td><ul><li><img>') !!}</p>

            <!-- Trigger the modal with a button -->

            <!-- <a type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Apply Now</a> -->

            </div>

        </div>
        <div class="clearfix"></div>
        </div>
    <div class="postinfo pull-left">

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
