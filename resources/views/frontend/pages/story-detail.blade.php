@extends('frontend.layouts.master')
@section('title')
    female and more | Story Detail
@endsection
@section('content')
<div class="main-content">
    <div class="container-fluid no-padding">
        <div class="story-image-container">
            <img class="story-image" src="{{ asset('images/story.png') }}" alt="">
        </div>
        @if (Session::has('message'))
            <div class="alert alert-{{Session::get('alert-type')}} alert-dismissible show text-center" role="alert" style="margin-bottom:0px;">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>{{ auth()->user()->name }}</strong> {{Session::get('message')}}
            </div>
        @endif
        <div class="story-header">
            <div class="day-number">
                <p>{{ $story->story_number }}</p>
            </div>
            <div class="story-title">
                <p>{{ $story->icon_career_path }}</p>
            </div>
            <div class="icon-title">
                <h3>{{ $story->icon_name }}</h3>
            </div>
        </div>
        <div class="story-body">
            <div class="col-md-6 col-md-offset-3 col-sm-12">
                <p class="quote">"{{ $story->icon_quote }}"</p>
                <span class="quote-name">{{ $story->icon_name }}</span>
            </div>
            <div class="text-center mt50">
                <div class="tabs text-center">
                    <div class="selector"></div>
                    <a href="#" id="profile" class="active"><i class="fa fa-superpowers"></i>Profile</a>
                    <a href="#" id="experience"><i class="fa fa-hand-rock"></i>The Experience</a>
                    <a href="#" id="stepToSuccess"><i class="fa fa-bolt"></i>Steps To Success</a>
                </div>
            </div>

            <div class="tab-contents-wrapper mt20">
                <div class="tab-content profile show pdl30 pdr30">
                    <div class="tab-content-header">
                        <p>Profile</p>
                    </div>
                    <div class="tab-content-body">
                        {{ $story->icon_profile }}
                    </div>
                    <div class="tab-content-counter">
                        <p> 1 / 3 &#62</p>
                    </div>
                </div>
                <div class="tab-content experience pdl30 pdr30">
                    <div class="tab-content-header">
                        <p>Experience</p>
                    </div>
                    <div class="tab-content-body">
                        {{ $story->icon_experience }}
                    </div>
                    <div class="tab-content-counter">
                        <p>&#60 2 / 3 &#62</p>
                    </div>
                </div>
                <div class="tab-content stepToSuccess pdl30 pdr30">
                    <div class="tab-content-header">
                        <p>Steps to success</p>
                    </div>
                    <div class="tab-content-body">
                        {{ $story->icon_step_to_glory }}
                    </div>
                    <div class="tab-content-counter">
                        <p> &#60 3 / 3 </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mb30 mt20">
            @if ($story->is_current == 'yes')
            @hasAnswerForTheDay($story->story_number)
                <button disabled class="btn disabled">Already answered</button>
            @else
                <button data-toggle="modal" data-target="#questionModal" class="btn">Go To Question</button>
            @endhasAnswerForTheDay
            @else
                <button disabled class="btn disabled">Day {{ $story->story_number }} has closed</button>
            @endif

        </div>
    </div>
</div>
<div id="questionModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center gradient-bg all-text-white">
                    <h4 class="modal-title w-100 font-weight-bold ">Questions Of THe Day</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3 justify-content-center">
                    <form id="question-form" method="POST" action="{{ route('response.submit',['story_number' => $story->story_number]) }}">
                        @csrf
                        <input type="hidden" id="id" value="{{ auth()->id() }}">
                        <div class="form-file">
                            <label for="image">
                                <figure>
                                    <img src="{{ asset('images/story.png') }}" alt="" class="your_picture_image">
                                </figure>
                            </label>
                        </div>
                        <div class="form-group row">
                            <label for="question_one" class="col-md-4 col-form-label text-md-right">{{ __('What aspect of this story touches and inspires you and why') }}</label>

                            <div class="col-md-6">
                                <textarea id="question_one" minlength="80" class="form-control @error('question_one') is-invalid @enderror" name="question_one"  required autocomplete="question_one" rows="5"></textarea>

                                @error('question_one')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="question_two" class="col-md-4 col-form-label text-md-right">{{ __('What personal or societal factors could have prevented this icon from pursuing and achieving her dreams') }}</label>

                            <div class="col-md-6">
                                <textarea id="question_two" minlength="20" class="form-control @error('question_two') is-invalid @enderror" name="question_two"  required autocomplete="question_two" rows="5"></textarea>

                                @error('question_two')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="question_three" class="col-md-4 col-form-label text-md-right">Do you have a past or present experience similar to any aspect of the story you read today? if <span class="base-color">YES</span> share briefly.</label>

                            <div class="col-md-6">
                                <textarea id="question_three" minlength="50" class="form-control @error('question_three') is-invalid @enderror" name="question_three"  required autocomplete="question_three" rows="5"></textarea>

                                @error('question_three')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="question_four" class="col-md-4 col-form-label text-md-right">{{ __('What personal qualities helped her overcome her challenges and achieve greatness') }}</label>

                            <div class="col-md-6">
                                <textarea id="question_four" class="form-control @error('question_four') is-invalid @enderror" name="question_four"  required autocomplete="question_four" rows="5"></textarea>

                                @error('question_four')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="question_five" class="col-md-4 col-form-label text-md-right">{{ __('In what ways or areas has this story changed how you think about your self and your future?') }}</label>

                            <div class="col-md-6">
                                <textarea id="question_five" minlength="80" class="form-control @error('question_five') is-invalid @enderror" name="question_five"  required autocomplete="question_five" rows="5"></textarea>

                                @error('question_five')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="question_six" class="col-md-4 col-form-label text-md-right">{{ __('What practical action steps are you going to take based on what you learnt from this story? Share with us!') }}</label>

                            <div class="col-md-6">
                                <textarea id="question_six" minlength="80" class="form-control @error('question_six') is-invalid @enderror" name="question_six"  required autocomplete="question_six" rows="5"></textarea>

                                @error('question_six')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" id="answer" class="btn btn-default">Submit</button><button class="btn btn-default"  data-dismiss="modal" aria-label="Close">Close</button>
                </div></form>
            </div>
        </div>
    </div>
@endsection
@section('js')
var tabs = $('.tabs');
var selector = $('.tabs').find('a').length;
//var selector = $(".tabs").find(".selector");
var activeItem = tabs.find('.active');
var activeWidth = activeItem.innerWidth();
$(".selector").css({
"left": activeItem.position.left + "px",
"width": activeWidth + "px"
});

$(".tabs").on("click","a",function(e){
e.preventDefault();
$('.tabs a').removeClass("active");
$(this).addClass('active');
var activeWidth = $(this).innerWidth();
var itemPos = $(this).position();
$(".selector").css({
"left":itemPos.left + "px",
"width": activeWidth + "px"
});

var a = $(this).attr('id');
$(".tab-contents-wrapper").find("div").removeClass('show');
var current = $(".tab-contents-wrapper").find("."+a).addClass('show');

});

$("#question-form").validate();
@endsection
