@extends('layouts.app')

@section('css')

<link rel="stylesheet" type="text/css" href="/packages/linus/forum/assets/css/cs-select.css">

<link rel="stylesheet" type="text/css" href="/packages/linus/forum/assets/css/cs-skin-elastic.css">

<link href="/packages/linus/forum/assets/vendor/quill/quill.snow.css" rel="stylesheet">

<style type="text/css">
    strong{
        color: red;
    }
    /* Make sure footer stick to bottom */
/*    html {
        position: relative;
        min-height: 100%;
    }

    body {
        margin: 0 0 50px; 
        padding: 25px;
    }

    footer {
        background-color: white;
        position: absolute;
        left: 0;
        bottom: 0;
        height: 70px;
        width: 100%;
        overflow:hidden;
    }*/
    section{
        padding-top: 20px;
    }
    .sidebarblock{
        padding: 20px;
    }

    @media (max-width: 767px){
        .post .posttext {
            /* width: 70%; */
            padding-right: 15px;
            padding-top: 15px;
            padding-bottom: 15px;
        }
    }
    .post .posttext {
        padding: 5%;
        width: 100%;

        color: #989c9e;
        font-size: 14px;
        font-family: 'Open Sans Light', sans-serif;
        line-height: 25px;
        /* margin-left: 5%; */
    }

</style>
@endsection

@section('content')

        <!-- Content -->
        <div class="container">
                    <div class="row" style="margin-top: 110px">

                        <!-- Sidebar -->
                        <div class="col-lg-3 col-md-8 col-sm-8">
    
                                                            <!-- Sidebar -->
                            <div class="sidebarblock">

                                <div class="card">
                                    <div class="">
                                        <h4 class="">热门科目</h4>
                                    </div>
                                    <hr>
                                    <ul>
                                        <li>
                                            <i class="fa fa-thumbs-up" aria-hidden="true">&nbsp;COMP20007</i>
                                        </li>
                                        <li>
                                            <i class="fa fa-certificate" aria-hidden="true">&nbsp;MAST20006</i>
                                        </li>
                                        <li>
                                            <i class="fa fa-book" aria-hidden="true">                           
                                            COMP30036
                                            </i>
                                        </li>
                                        <li>
                                            <i class="fa fa-bolt" aria-hidden="true">&nbsp;LAK10001
                                            </i>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                            <div class="sidebarblock">
                                <header>
                                    <h4>评分细则</h4>
                                </header>
                                <hr>
                                <ul class="divided">
                                    <li><a href="#">H1</a>: <strong>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </strong></li>
                                    <li><a href="#">H2A</a>: <strong>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </strong></li>
                                    <li><a href="#">H2B</a>: <strong>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </strong></li>
                                    <li><a href="#">H3</a>: <strong>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                        <i class="fa fa-star" aria-hidden="true"></i>

                                    </strong></li>
                                    <li><a href="#">P</a>: <strong>
                                        <i class="fa fa-star" aria-hidden="true"></i>
                                    </strong></li>
                                </ul>
                                
                            </div>

                        </div>

                        <!-- Main content -->
                        <div class="col-lg-8 col-md-8">

                            <form class="post" method="POST" action="/university/NewSubject">
                                    {{ csrf_field() }}

                                <!-- acc section -->
                                <div class="accsection">
                                    <div class="acccap">
                                        <div class="posttext pull-left" style="padding: 5% 1% 0% 5%"><h3>Required Fields</h3></div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="topwrap newtopic">
                                        
                                        <div class="posttext pull-left">

                                            <div class="row">
                                                
                                                <div class="col-lg-6">
                                                    <input type="text" value="{{old('code')}}" placeholder="Subject Code" name="code" class="form-control" required />
                                                </div>

                                                <div class="col-lg-6">
                                                    <input type="text" value="{{old('name')}}" placeholder="Subject Name" name="name" class="form-control" required />
                                                </div>

                                            </div>

                                            <div class="row">
                                                <div class="col-lg-6 col-md-6">
                                                    <select name="uni_id" class="form-control" required>
                                                        <option value="" disabled {{empty(old('uni_id')) ? 'selected':''}}>Select University</option>
                                                        <option value="1" {{old('university')=='1' ? 'selected':''}}>Melbourne University</option>
                                                        <option value="2" {{old('university')=='2' ? 'selected':''}}>Monash University</option>
                                                    </select>
                                                        
                                                </div>
                                                <div class="col-lg-6 col-md-6">
                                                    <select name="faculty" class="form-control" required>
                                                        <option value="" disabled {{empty(old('faculty')) ? 'selected':''}}>Select Faculty</option>
                                                        <option value="science" {{old('science')=='M' ? 'selected':''}}> Science</option>
                                                        <option value="commerce" {{old('commerce')=='F' ? 'selected':''}}> Commerce</option>
                                                    </select>

                                                </div>
                                            </div>
                                            <div class="row">
                                                
                                                <div class="col-lg-6">
                                                    <input type="number" value="" placeholder="Fees" name="fees" class="form-control" required />
                                                </div>

                                                <div class="col-lg-6">
                                                    <select name="availability" class="form-control" required>
                                                        <option value="" disabled {{empty(old('availability')) ? 'selected':''}}>Select Availability</option>
                                                        <option value="1" {{old('availability')=='1' ? 'selected':''}}> Semester 1</option>
                                                        <option value="2" {{old('availability')=='2' ? 'selected':''}}> Semester 2</option>
                                                        <option value="12" {{old('availability')=='12' ? 'selected':''}}> Semester 1 &amp; 2</option>

                                                    </select>
                                                </div>

                                            </div>
                                            <div>
                                                <input name="handbook" type="text" placeholder="Handbook Link" value="{{old('handbook')}}" class="form-control" required />

                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <textarea class="form-control" name="description" placeholder="Description"></textarea>
                                                    @if ($errors->has('description'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('description') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>

                                        </div>
                                        <!-- Submit button -->
                                        <div class="pull-right postreply" style="padding: 10px 40px 20px 0px;">
                                            <div class="pull-left smile"><a><i class="fa fa-smile-o"></i></a></div>
                                            <div class="pull-left"><button type="submit" class="btn btn-primary">Submit</button></div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>  
                                </div><!-- acc section END -->

                            </form>

                        </div>

                    </div>
                </div>

        <!-- End Content -->
@endsection

@section('js')

<script type="text/javascript" src="/packages/linus/forum/assets/vendor/quill/quill.min.js"></script>


@endsection