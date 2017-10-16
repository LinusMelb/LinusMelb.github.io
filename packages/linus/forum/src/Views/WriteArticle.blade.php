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
		.WriteCover-wrapper {
	    background: #f7f8f9;
	    line-height: 200px;
	    color: #808080;
	    min-height: 200px;
	    text-align: center;
	}
	.WriteCover-previewWrapper {
	    height: 100%;
	    -webkit-box-flex: 1;
	    -ms-flex: 1;
	    flex: 1;
	    -webkit-box-pack: center;
	    -ms-flex-pack: center;
	    justify-content: center;
	    position: relative;
	}
	.WriteCover-uploadIcon {
	    font-size: 42px;
	    color: rgba(0, 0, 0, .2);
	}
	.WriteCover-uploadInput {
	    position: absolute;
	    display: block;
	    top: 0;
	    left: 0;
	    height: 100%;
	    width: 100%;
	    opacity: 0;
	    cursor: pointer;
	    z-index: 2;
	}
	.fa-camera{
		font-size: 3.5em;
	}
	.WriteCover-previewWrapper:hover:after {
	    content: 'Please upload your cover';
	    color: #b3b3b3;
	    position: absolute;
	    width: 100%;
	    text-align: center;
	    left: 0;
	    bottom: 50px;
	    line-height: 1;
	    opacity: 50;
	    z-index: 0;
	    -webkit-transform: translateY(-12px);
	    transform: translateY(-12px);
	    -webkit-transition: all .2s;
	    transition: all .2s;
	}
	input[type="file" i] {
	    align-items: baseline;
	    color: inherit;
	    text-align: start;
	}
	input[type="hidden" i], input[type="image" i], input[type="file" i] {
	    -webkit-appearance: initial;
	    background-color: initial;
	    padding: initial;
	    border: initial;
	}

	.WriteIndex-titleInput {
	    margin: 16px 0;
	    border: 0;
	    padding: 0;
	    height: auto;
	    width: 100%;
	    position: relative;
	    background-color: #989c9e;
	}
	.WriteIndex-titleInput .Input {
	    height: 44px;
	    min-height: 44px;
	    display: block;
	    width: 100%;
	    border: 0;
	    font-size: 32px;
	    line-height: 1.4;
	    font-weight: 700;
	    outline: none;
	    -webkit-box-shadow: none;
	    box-shadow: none;
	}
    /* Displays on Desktop */
    @media (min-width: 768px){
	    .article-container{
	    	width: 800px;
	    	padding: 0px;
	    	margin: 0 auto;
	    }
	}
	
	/* Displays on Mobile */
	@media (max-width: 768px){
		.article-container{
	    	padding: 0px 10px 0px 10px;
	    }
	}


	/* Changes color of placeholder */
	input::-webkit-input-placeholder {
		color: #989c9e !important;
	}
	 
	input:-moz-placeholder { /* Firefox 18- */
		color: #989c9e !important;  
	}
	 
	input::-moz-placeholder {  /* Firefox 19+ */
		color: #989c9e !important;  
	}
	 
	input:-ms-input-placeholder {  
		color: #989c9e !important;  
	}
	input{
		color: black;
	}

	#description_ifr {
		background:none repeat scroll 0 0 #333333!important;
		color:#FFF!important;
		text-align:left;
	}
</style>

@endsection

@section('content')

<div class="article-container" style="padding-top: 90px; margin-bottom: 200px;">

<form id="article-form" method="POST" action="/write-article">
	{{ csrf_field() }}
	<div class="WriteCover-wrapper">
		<div class="WriteCover-previewWrapper">
			<i class="fa fa-camera"></i>
			<input type="file" class="WriteCover-uploadInput" name="upload_file" accept=".jpeg, .jpg, .png">
		</div>
	</div>

	<div class="WriteIndex-titleInput">
			<input required name="title" class="Input" placeholder="请输入标题"></input>
	</div>

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
	<div id="editor-container">
	</div>

	<!-- Hidden input -->
	<input id="hidden_text" type="text" name="content" style="display: none">

	@if ($errors->has('content'))
    <span class="help-block">
        <strong>{{ $errors->first('content') }}</strong>
    </span>
    @endif


	<button type="submit" style="margin-top: 30px;" class="btn btn-default pull-right">Submit</button>


</form>




</div>

@endsection('content')

@section('js')
<!-- Quill editor -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
<script type="text/javascript" src="/packages/linus/forum/assets/vendor/quill/quill.min.js"></script>

<script type="text/javascript">
	var quill = new Quill('#editor-container', {
			    modules: {
			      syntax: true,
			      toolbar: '#toolbar-container',
			    },
			    placeholder: 'Compose an epic...',
			    theme: 'snow'
			  });

	$("#article-form").on("submit", function(){
	  var about = $('#hidden_text');

	  // Populate hidden form on submit
	  about.val(quill.root.innerHTML);

	  // console.log(about.val());
	  
	  // console.log(about.val());
		  
	  // No back end to actually submit to!
	  return true;
	});

</script>

@endsection