@extends('layouts.app')


@section('css')
<style>

/* Hover effects for uploading avatar */
.avatar-box .image {
  opacity: 1;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.avatar-box .image:hover {
  z-index: -1;
  opacity: 0.6;
}

#uploadAvatar:hover {
  z-index: -1;
  opacity: 0.75;
}

/* End of avartar box effects*/
</style>
@endsection

@section('js')

<script type="text/javascript">
/* Upload avatar image via AJAX */
(function() {

  $('#uploadAvatar').on('click', function(){
      $('#avatar-input').click();
  });

  $('#uploadCover').on('click', function(){
      $('#cover-input').click();
  });

  /* Users selects new avatar image */
  $('#avatar-input').on('change', function(){
    uploadImageAJAX("#avatar-input", 'avatar')
  });

  /* Users selects new cover image */
  $('#cover-input').on('change', function(){
    uploadImageAJAX("#cover-input", 'cover')
  });

})();

function uploadImageAJAX(id, ele) {
  /* Update current avatar */
  var image = $(id).prop('files')[0];
  var marker = 'false';

  /* Image validation */
  // if(ele == 'cover'){
  //   // console.log(image.clientWidth);
  //   // console.log(image.clientHeight);
  //
  //   var img = new Image();
  //
  //   img.src = window.URL.createObjectURL( image );
  //
  //   img.onload = function() {
  //       var width = img.naturalWidth,
  //           height = img.naturalHeight;
  //
  //       if(width / height < 3 || width / height > 4){
  //           alert("不好意思, 为了更好的显示效果, 请上传宽高比例为3.0 - 4.0之间的图片, 谢谢! e.g. 900x300 - 1200x300");
  //           marker = 'true';
  //       }
  //   };
  //
  //   if(marker == 'true'){
  //     console.log('aaa');
  //     return;
  //   }
  //
  // }

  var fd = new FormData();
  fd.append('img', image);
  fd.append('type', ele);


  /* Upload image via AJAX */
  $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });

  $.ajax({
      url: '/edit-profile/update-avatar',
      data: fd,
      dataType:'json',
      type:'post',
      processData: false,
      contentType: false,
      enctype: "multipart/form-data",
      success:function(response){
        console.log(response);
        if(ele == 'avatar'){
          /* Update user's avatar */
          $('#uploadAvatar').attr( 'src', response['src']);
          $('.profileAvatar').attr( 'src', response['src'] );
          
        }else{
          /* Update user's cover */
          $('#uploadCover').attr('src', response['src']);
        }

      },
      error: function (xhr, status, error) {
          // console.log(xhr.responseText);
          console.log('Pls re-upload your avatar');
      }
  });

}

</script>
@endsection

@section('content')

<section class="content" style="padding-top: 80px">

    <div class="container">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-lg-3 col-md-3" style="padding-top: 50px;">

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

            <!-- Main Content -->
            <!-- Right side Content -->
            <div class="col-lg-9 col-md-9" style="padding-top: 50px;">

                <!-- Display all personal info -->
                <div id="info-box" class="post" style="padding: 20px 30px">

                  <div class="container" style="width: 100%">
                    <!-- User Image -->
                    <div class="row" style="text-align: center">
                      <div class="avatar-box">

                        <!-- Cover image -->
                        <img id ="uploadCover" name="cover" src="{{Auth::user()->cover}}" style="width: 100%; z-index: -1;" class="image">
                        <input type="file" accept="image/jpeg, image/x-png" id="cover-input" name="cover" style="display: none"/>

                        <!-- Avatar image -->
                        <img id="uploadAvatar" alt="upload new avatar" src="{{Auth::user()->avatar}}" style="width: 18%; margin-top: -10%; position: relative; z-index: 10" class="image avatar-lg">
                        <input type="file" accept="image/jpeg, image/x-png" id="avatar-input" name="avatar" style="display: none"/>

                      </div>
                    </div>

                    <br />

                    <!-- Personal details -->
                    <div class="row">
                      <div class="col-lg-offset-3 col-md-offset-3 col-sm-offset-2 col-lg-6 col-md-6 col-sm-8" style="text-align: center">

                        <h4>Firstname: <span style="color: black">{{$data->firstname}}</span></h4>
                        <hr>

                        <h4>Lastname: <span style="color: black">{{$data->lastname}}</span></h4>
                        <hr>

                        <h4>Username: <span style="color: black">{{$data->username}}</span></h4>
                        <hr>

                        <h4>Gender: <span style="color: black">{{$data->gender}}</span></h4>
                        <hr>

                        <h4>Join Date: <span style="color: black">{{$data->created_at}}</span></h4>
                        <hr>

                      </div>

                    </div>
                    <!-- End of Personal details -->
                  </div>

                </div>
                <!-- End of personal info -->
            </div>
            <!-- End of Main Content -->

        </div>
    </div>

</section>

@endsection
