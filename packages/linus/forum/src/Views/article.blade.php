<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Article Page</title>
		<meta name="description" content="A responsive, magazine-like website layout with a grid item animation effect when opening the content" />
		<meta name="keywords" content="grid, layout, effect, animated, responsive, magazine, template, web design" />
		<meta name="author" content="Codrops" />
		<!-- <link rel="shortcut icon" href="../favicon.ico"> -->

		<!-- Include code hightlight style -->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css"/>

		<link rel="stylesheet" type="text/css" href="/packages/linus/forum/assets/css/article-normalize.css" />
        <link rel="stylesheet" href="/packages/linus/forum/assets/css/font-awesome.css">
		<link rel="stylesheet" type="text/css" href="/packages/linus/forum/assets/css/article-style2.css" />

		<!-- Include code hightlight style -->
		<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/monokai-sublime.min.css"/>
		<link href="/packages/linus/forum/assets/vendor/quill/quill.snow.css" rel="stylesheet">

 		<script src="/packages/linus/forum/assets/js/modernizr.custom.js"></script>
		<style type="text/css">
			/* Added style for avatar */
			.meta__avatar{
				width: 40px;
				height: 40px;
			}
			pre.ql-syntax {
			    background-color: #23241f;
			    color: #f8f8f2;
			    overflow: visible;
			}
			.qrcode{
				width: 200px;
				height: 200px;
			}

		</style>
	</head>
	<body>
		<div class="container">
			<button id="menu-toggle" class="menu-toggle"><span>Menu</span></button>

			<div id="theSidebar" class="sidebar">
				<button class="close-button fa fa-fw fa-close"></button>

			</div>

			<div id="theGrid" class="main">
				<section class="grid">
					<header class="top-bar">
						<h2 class="top-bar__headline">Latest articles &nbsp;<a href="/write-article">Write your article</a></h2>
						<div class="filter">
							<span>Filter by:</span>
							<span class="dropdown">Popular</span>
						</div>
					</header>

					<!-- Link to all articles -->
					<a class="grid__item" href="#" style="display: none;">
						<h2 class="title title--preview">1111111</h2>
						<div class="loader"></div>
						<span class="category">Life &amp; News</span>
						<div class="meta meta--preview">
							<img class="meta__avatar" src="{{Auth::user()->avatar}}" alt="author04" />
							<span class="meta__date"><i class="fa fa-calendar-o"></i> 2017-09-09</span>
							<span class="meta__reading-time"><i class="fa fa-clock-o"></i> 1 min read</span>
						</div>
					</a>
					<!-- Generate all links -->
					@foreach($articles as $article)
					<a class="grid__item" href="#">
						<h2 class="title title--preview">{{$article->title}}</h2>
						<div class="loader"></div>
						<span class="category">Life &amp; News</span>
						<div class="meta meta--preview">
							<img class="meta__avatar" src="{{$article->user->avatar}}" alt="author04" />
							<span class="meta__date"><i class="fa fa-calendar-o"></i> {{ $article->created_at->format('Y-m-d') }}</span>
							<span class="meta__reading-time"><i class="fa fa-clock-o"></i> 1 min read</span>
						</div>
					</a>
					@endforeach

					<footer class="page-meta">
						<span>Load more...</span>
					</footer>
				</section>
				<section class="content">
					<div class="scroll-wrap">

						<article class="content__item" id="request_item">
							<span id="category" class="category category--full"></span>
							<h2 id="title" class="title title--full"></h2>
							<div class="meta meta--full">
								<div id="avatar"></div>
								<span id="author" class="meta__author"></span>
								<span class="meta__date"><i class="fa fa-calendar-o"></i></span>
								<span class="meta__reading-time"><i class="fa fa-clock-o"></i> 1 min read</span>
								<span class="meta__misc meta__misc--seperator"><i class="fa fa-comments-o"></i> 0 comments</span>
								<span class="meta__misc"><i class="fa fa-heart"></i> 0 favorites</span>
								<span class="meta__misc"><i class="fa fa-money"></i> Reward Auther</span>
								<div style="text-align: center;"><img  class="qrcode" src="/storage/users/QRcode.jpg"></div>
								<nav class="article-nav">
									<button class="previous"><i class="fa fa-angle-left"></i> <span>Previous</span></button>
									<button class="next"><span>Next</span> <i class="fa fa-angle-right"></i></button>
								</nav>
							</div>
							<div id="content"></div>
						</article>

						<!-- Show all published articles -->
						@foreach($articles as $article)
							<article class="content__item">
							<span class="category category--full">Life &amp; News</span>
							<h2 class="title title--full">{{$article->title}}</h2>
							<div class="meta meta--full">
								<img class="meta__avatar" src="{{$article->user->avatar}}" alt="author04" />
								<span class="meta__author">{{$article->user->username}}</span>
								<span class="meta__date"><i class="fa fa-calendar-o"></i> {{ $article->created_at->format('Y-m-d') }}</span>
								<span class="meta__reading-time"><i class="fa fa-clock-o"></i> 1 min read</span>
								<span class="meta__misc meta__misc--seperator"><i class="fa fa-comments-o"></i> 0 comments</span>
								<span class="meta__misc"><i class="fa fa-heart"></i> 0 favorites</span>
								<span class="meta__misc"><i class="fa fa-money"></i> Reward Auther</span>
								<div style="text-align: center;"><img  class="qrcode" src="/storage/users/QRcode.jpg"></div>
								<nav class="article-nav">
									<button class="previous"><i class="fa fa-angle-left"></i> <span>Previous</span></button>
									<button class="next"><span>Next</span> <i class="fa fa-angle-right"></i></button>
								</nav>
							</div>
							{!! $article->content !!}
							</article>
						@endforeach

					</div>
					<button class="close-button"><i class="fa fa-close"></i><span>Close</span></button>
				</section>
			</div>
		</div><!-- /container -->

		<script src="/packages/linus/forum/assets/js/classie.js"></script>
		<script src="/packages/linus/forum/assets/js/article-main.js"></script>
	</body>
</html>
