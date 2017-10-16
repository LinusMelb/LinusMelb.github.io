@extends('layouts.app')

@section('css')

<style type="text/css">
.sidebarblock{
	padding: 20px;
}
#navbar ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    color: black;
}

#navbar li {
    float: left;
    border-radius: 5px;
    margin-left: 10px;
    width: 80px;
}
#navbar li a {
    display: block;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

#navbar li:hover {
    background-color: #eaeaea;
  	transition: background-color 0.3s ease;
    border-radius: 5px;
}

#navbar li.active:hover{
	background-color: #1abc9c;

}

.active{
	background-color: #1abc9c;

}
.active a{
	color: white;
}

.two-colomn-vertical-line {
    width: 1px;
    height: 85px;
    background: grey;
    float: left;
}
article{
	padding: 3px 0 3px 10px;
}
strong{
	color: black;
}

#banner {
    background: #ecf0f1 url('{{$data->cover}}');
    background-position: center center;
    background-size: 100%;
    background-repeat: no-repeat;
    text-align: center;
    padding: 4em 0 4em 0;
    margin: 3em 0 0 0;
    color: white;
}
#banner .profile {
    margin: 0 auto;
    width: 600px;
    background-color: rgba(0, 0, 0, 0.4);
    text-align: left;
}
#banner li{
	padding: 20px;
}

#banner .avatar{
	width: 130px;
	height: 130px;
	margin: 0 auto;
}

/* li of Profile image */
.col-avatar{
	text-align: center;
	padding: 40px;
}

@media screen and (max-width: 1260px) and (min-width: 990px){
	#banner{
		background-size: auto;
	}
}

@media screen and (max-width: 990px){

	#banner .profile {
	    margin: 0 auto;
	    width: 100%;
	    background-color: rgba(0, 0, 0, 0.4);
	    text-align: center;
	}

	#banner{
		 background-size: auto;
    	 padding: 0em;
	}
	#banner li{
		padding: 0px;
	}
	.col-avatar{
		text-align: center;
		padding-top: 40px!important;
	}
	#banner .avatar{
		width: 100px;
		height: 100px;
	}

}
</style>


@endsection

@section('content')

<!-- Main -->
<div id="main-wrapper" class="content">


<section id="banner">
	<div class="profile">
		<ul class="cats">
			<li class="col-md-4 col-avatar">
				<img class="avatar" src="{{$data->avatar}}">
			</li>
			<li class="col-md-8 col-sm-12">
				<h2>{{$data->username}}</h2>
				<h4>注册时间: {{ $data->created_at->format('Y-m-d') }}</h4>
				<h4>所在行业: 计算机软件</h4>
				<h4>教育经历: Melbourne University</h4>
				@if($access == 'yes')
				<br>
				<a class="btn btn-default" href="/edit-profile">Edit profile</a>
				@else
				<br>
				<a class="btn btn-default" href="#">+ Add friend</a>
				@endif
			</li>
		</ul>
		<div class="clearfix"></div>

	</div>
</section>

	<div class="container">
		<div class="row">
			<div class="col-lg-8 col-md-8" style="margin-top: 20px;">

				<!-- Content -->
					<div class="post" style="padding: 20px;">

						<nav id="navbar">
							<ul>
								<li class="active f-left"><a href="#">动态 {{count($data->discussions)}}</a></li>
								<li class="">
									<a href="#">点赞 0</a>
								</li>

								<li class=""><a href="/">评论 0</a></li>
								<li class=""><a href="/">提问 0</a></li>
								<li class=""><a href="/">收藏 0</a></li>
								<li>
									<a data-toggle="dropdown" href="#">更多</a>
								</li>
							</ul>
						</nav>

						<hr>
						 @foreach ($data->discussions as $discussion)

						    <article>

				            	<h4 style="color: black"><b>{{ $discussion->title }}</b></h4>

				            <span>

						    		<span >
					                    <span class="label label-primary"><i class="fa fa-eye"></i>&nbsp;浏览: {{ $discussion->views }}</span>
					                    <span class="label label-success"><i class="fa fa-commenting-o" aria-hidden="true"></i>&nbsp;评论: 0</span>
					                    <span class="label label-default"><i class="fa fa-clock-o"></i>&nbsp;发布时间: {{ $discussion->created_at }}</span>
				                    </span>
				            </span>

						    	<h5>
						    		{!! $discussion->content !!}
						    	</h5>

									<div class="likeblock">
											<a style="color: #428bca; font-size: 12px; margin-right: 20px;">
												<i style="font-size: 20px; padding-right: 10px;" class="fa fa-comments-o"></i>0
											</a>
                      <a class="up"><i class="fa fa-thumbs-o-up"></i>0</a>
                      <a class="down"><i class="fa fa-thumbs-o-down"></i>0</a>
                  </div>

						    	<hr>
						    </article>

						@endforeach

					</div>

			</div>
			<div class="col-md-4 12u(mobile)" style="margin-top: 20px;">

				<!-- Sidebar -->
					<div class="sidebarblock">
						<h4>Ta的资料</h4>
						<ul class="divided">
							<li><a href="#">教育经历</a>: <strong>Bachelor of Science</strong></li>
							<li><a href="#">回答数</a>: <strong>0</strong></li>
							<li><a href="#">发帖数</a>: <strong>0</strong></li>
						</ul>
					</div>

					<div class="sidebarblock">

						<div class="card">
								<h4 class="">个人成就</h4>
								<hr>
								<p><i class="fa fa-thumbs-up" aria-hidden="true">&nbsp;获得 0 次赞同</i></p>
								<p><i class="fa fa-certificate" aria-hidden="true">&nbsp;优秀回答者</i></p>
								<p><i class="fa fa-book" aria-hidden="true">获得 0 次感谢，0 次收藏</i></p>
								<p><i class="fa fa-bolt" aria-hidden="true">&nbsp;Sunrise.com收录 0 个回答</i></p>
						</div>

					</div>
					<!-- Following and followers -->
					<div class="sidebarblock">
						<div>
							<div style="float:left; width: 45%; padding-left: 10px;">
								<h4>Ta的关注: </h4>
								<h3><b>0</b></h3>
							</div>
							<div class="two-colomn-vertical-line"></div>
							<div style="float: right; width: 48%; padding-left: 10px;">
								<h4>关注Ta的: </h4>
								<h3><b>0</b></h3>
							</div>
						</div>
						<div class="clearfix"></div>
					</div>

			</div>
		</div>
	</div>
</div>
@endsection
