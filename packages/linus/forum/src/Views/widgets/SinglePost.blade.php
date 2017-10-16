<div class="post" id="question" data-id="{{$post_id}}">
    <div class="wrap-ut pull-left">
        <div class="userinfo pull-left">
            <div class="avatar">
                </a><img src="/packages/linus/forum/assets/img/unimelb-logo.jpg" class="avatar" alt="">
                <!-- <div class="status green">&nbsp;</div> -->
            </div>

            <div class="icons">
                <img src="/packages/linus/forum/assets/img/icon1.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon4.jpg">
            </div>
        </div>
        <div class="posttext pull-left">
            <h2>如何评价 {{$SubjectPost->code}} {{$SubjectPost->name}}</h2>
            <p><span>难度系数:</span> @if ($SubjectPost->difficulty == 0)
                            <b>-</b>
                        @else

                            @for ($i = 0; $i < floor($SubjectPost->difficulty); $i++)
                                <i class="fa fa-star" aria-hidden="true"></i>
                            @endfor
                            {{ number_format($SubjectPost->difficulty,1) }}

                        @endif

            </p>
            <p><span>实用程度: </span>
                        @if ($SubjectPost->practicality == 0)
                            <b>-</b>
                        @else

                            @for ($i = 0; $i < floor($SubjectPost->practicality); $i++)
                                <i class="fa fa-star" aria-hidden="true"></i>
                            @endfor
                            {{ number_format($SubjectPost->practicality,1) }}

                        @endif
            </p>
            <p><span>费用: </span>${{ $SubjectPost->fees }}</p>
            <p><span>开课时间: </span>Semester 1, Semester 2</p>
            <p><span>课程介绍: </span> {!! strip_tags($SubjectPost->description, '<a><br><img>') !!}</p>
            <p><span>选课要求: </span>CS1010 or its equivalence</p>
            <hr>
            <p>希望学过这门课的同学们能够分享自己关于这门课的体会及心得。最后，大家可以为这门课的难度，实用性进行评分，为想学这门课的同学提供帮助，谢谢！</p>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="clearfix"></div>
</div><!-- POST -->

<!-- Answers below -->
<!-- Answers -->
    @foreach ($answers as $answer)
    <div class="post">
        <div class="topwrap">
            <div class="userinfo pull-left">
                <div class="avatar">
                    <a href="/profile/{{$answer->user->id}}"><img class="avatar" src="{{$answer->user->avatar}}" alt=""></a>
                    <!-- <div class="status red">&nbsp;</div> -->
                </div>

                <div class="icons">
                    <img src="/packages/linus/forum/assets/img/icon3.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon4.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon5.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon6.jpg" alt="">
                </div>
            </div>
            <div class="posttext pull-left">

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

            <p>{!! strip_tags($answer->answer, '<a><br><img>') !!}</p>


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
    @endforeach

<div id='new-answer'>

</div>

@if (Auth::guest())

    <p>You can post your answer after you log in</p>

@else
<!-- Writting comments here -->
    <!-- If already answered this question -->


<div class="post">
    <form id="answer-form" onsubmit="return false">
        <div class="topwrap">
            <div class="userinfo pull-left">
                <div class="avatar">
                    <img src="{{Auth::user()->avatar}}" class="avatar" alt="">
                    <div class="status red">&nbsp;</div>
                </div>

                <div class="icons">
                    <img src="/packages/linus/forum/assets/img/icon3.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon4.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon5.jpg" alt=""><img src="/packages/linus/forum/assets/img/icon6.jpg" alt="">
                </div>
            </div>
            <div class="posttext pull-left">
                <div class="textwraper">
                    <div class="postreply">Write a answer</div>

                    <!-- Create the toolbar container -->
                    <div id="toolbar-container">
                      <span class="ql-formats">
                          <select class="ql-size"></select>
                      </span>
                        <span class="ql-formats">
                          <button class="ql-bold"></button>
                          <button class="ql-italic"></button>
                          <button class="ql-underline"></button>
                        </span>
                        <span class="ql-formats">
                          <select class="ql-color"></select>
                          <select class="ql-background"></select>
                        </span>
                        <span class="ql-formats">
                          <button class="ql-list" value="ordered"></button>
                          <button class="ql-list" value="bullet"></button>
                        </span>
                        <span class="ql-formats">
                          <button class="ql-link"></button>
                          <button class="ql-image"></button>
                        </span>
                        <span class="ql-formats">
                          <button class="ql-clean"></button>
                        </span>
                    </div>

                    <div id="editor-container" name="answer" placeholder="Type your answer here"></div>
                    <input type="text" id="hidden_text" name="answer" style="display: none;">

                </div>
                <fieldset class="rating">难度评分:
                <input type="radio" id="star5" name="difficulty" value="5" /><label class = "full" for="star5" title="Awesome - 5 stars"></label>
                <input type="radio" id="star4" name="difficulty" value="4" /><label class = "full" for="star4" title="Pretty good - 4 stars"></label>
                <input type="radio" id="star3" name="difficulty" value="3" /><label class = "full" for="star3" title="Meh - 3 stars"></label>
                <input type="radio" id="star2" name="difficulty" value="2" /><label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
                <input type="radio" id="star1" name="difficulty" value="1" /><label class = "full" for="star1" title="Sucks big time - 1 star"></label>
                </fieldset>

                <fieldset class="rating">&nbsp;实用性评分:
                <input type="radio" id="star6" name="practicality" value="5" /><label class = "full" for="star6" title="Awesome - 5 stars"></label>
                <input type="radio" id="star7" name="practicality" value="4" /><label class = "full" for="star7" title="Pretty good - 4 stars"></label>
                <input type="radio" id="star8" name="practicality" value="3" /><label class = "full" for="star8" title="Meh - 3 stars"></label>
                <input type="radio" id="star9" name="practicality" value="2" /><label class = "full" for="star9" title="Kinda bad - 2 stars"></label>
                <input type="radio" id="star10" name="practicality" value="1" /><label class = "full" for="star10" title="Sucks big time - 1 star"></label>
                </fieldset>
            </div>

            <div class="clearfix"></div>
        </div>
        <div class="postinfobot">

            <div class="notechbox pull-left">
                <input type="checkbox" name="note" id="note" class="form-control">
            </div>

            <div class="pull-left">
                <label for="note"> Email me when some one post a reply</label>
            </div>

            <div class="pull-right postreply">
                <div class="pull-left smile"><a href=""><i class="fa fa-smile-o"></i></a></div>
                <div class="pull-left"><button id="submit-answer" class="btn btn-primary">Post Answer</button></div>
                <div class="clearfix"></div>
            </div>


            <div class="clearfix"></div>
        </div>
    </form>
</div><!-- POST -->

<script type="text/javascript">


    (function() {

        var quill = new Quill('#editor-container', {
            modules: {
              toolbar: '#toolbar-container',
            },
            placeholder: 'Compose an epic...',
            theme: 'snow'
          });

        /* Set up Asjax token */
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });


         /* Ajax send data to the server */
        /* Update  */
        $('#submit-answer').on('click', function(){

            var content = $('#hidden_text');

            // Populate hidden form on submit
            content.val(quill.root.innerHTML);

            var data = $("#answer-form").serializeArray();

            var answer = data[0]['value'];

            var difficulty = data[1]['value'];

            var practicality = data[2]['value'];

            /* Get post_id */
            var post_id = $('#question').attr('data-id');

            data = {'answer': answer, 'difficulty': difficulty, 'practicality': practicality, 'post_id' : post_id };


            // answer: answer, difficulty: difficulty, practicality: practicality
          /* Ajax send data to the server */
          $.post("/university/NewAnswer", {data: data}, function(result, status){

            if(status == 'success'){

                /* Ajax get new comment and append it to current page */
                /* result is id of this comment */
              $.get("/university/SubjectAnswer/"+result, function(data, status){

                    if(status == 'success'){

                        /* Append new answer to current page */
                        $('#new-answer').after(data);

                        /* Remove answer form */
                        $('#answer-form').remove();

                    }
              });

            }else{

                /* Failed, issues in server */
                console.log(result);
            }

        });
      });
    })();
</script>
@endif
