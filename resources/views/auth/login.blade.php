@extends('layouts.app')

@section('css')

@endsection


@section('content')

@include('forum::widgets.slider')

<section class="content" style="padding: 0 15px;">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 breadcrumbf">
                        <a href="#">Login your account</a>
                    </div>
                </div>
            </div>


            <div class="container" style="position: relative">
                <div class="row">
                    <!-- <div class="col-lg-8 col-md-8"> -->
                    <!-- Sidebar -->
                    <div id="login-sidebar" class="col-lg-4 col-md-4">

                        <!-- Category -->
                        <div class="sidebarblock">
                            <h3>平台分类/Categories</h3>
                            <div class="divline"></div>
                            <div class="blocktxt">
                                <ul class="cats">

                                  <li><span class="is-circle icon" style="color: red"></span>
                                    <a href="/category/jobs">Jobs
                                      <span class="badge pull-right">1</span>
                                    </a>
                                  </li>

                                </ul>
                            </div>
                        </div>

                        <!-- Article -->
                        <div class="sidebarblock">
                            <h3>精选文章/Hot Topics</h3>

                            <div class="divline"></div>
                            <div class="blocktxt">
                                <a href="/article?id=1">Article</a>
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
                    </div>
                    <!-- End of Sidebar -->

                        <!-- POST -->
                        <div class="post col-lg-8 col-md-8">
                            <form  class="form newtopic" method="POST" action="{{ route('login') }}">

                                {{ csrf_field() }}

                                <div class="postinfotop">
                                    <h2>Login your account</h2>
                                </div>

                                <!-- acc section -->
                                <div class="accsection">

                                    <div class="topwrap">

                                        <div class="posttext pull-right">

                                        <div class="acccap" style="padding: 0 0 10px 0;">
                                            <div class="posttext"><h3>Required Fields</h3></div>
                                            <div class="clearfix"></div>
                                        </div>
                                        <!-- Login -->

                                        <div class="row">
                                            <div class="col-lg-10 col-md-10 col-sm-10">
                                                <input name="email" type="email" placeholder="User Email" value="{{old('email')}}" class="form-control" />

                                                @if ($errors->has('email'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('email') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="row">
                                          <div class="col-lg-10 col-md-10 col-sm-10">
                                                <input type="password" placeholder="Password" class="form-control" id="password" name="password" required />
                                            </div>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <span class="checkbox">
                                                    <label for="remember" style="line-height: 55px;">Remember Me</label>
                                                    <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                                </span>
                                            </div>
                                        </div>

                                        <!-- End login -->
                                        <div class="row" style="padding-bottom: 15px;">

                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <button type="submit" class="btn btn-primary">
                                                        Login
                                                    </button>

                                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                                        Forgot Your Password?
                                                    </a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
                            </div><!-- acc section END -->

                        </form>
                    </div><!-- POST -->
            </div>
        </div>
</section>

@endsection
