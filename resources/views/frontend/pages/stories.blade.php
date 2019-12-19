@extends('frontend.layouts.master')
@section('content')

<div class="main-content">
    <div class="container-fluid no-padding">
        <div class="profile-header">
            <img class="profile-header-image" src="{{ asset('images/logo.png') }}" alt="">
            <div class="profile-gtg">

                <h3>{{ $level->level_name }}</h3>
                <em>{{ $level->level_description }}</em>
            </div>
        </div>
        <div class="profile-body">
            <div class="profile-body-body">
                <div>
                    <div class="story-selector-wrapper">
                        <div class="tabs text-center mt220">
                            <div class="selector"></div>
                            <a href="#" id="story-of-the-day" class="active"><i class="fa fa-hand-rock"></i>Story Of The
                                Day</a>
                            <a href="#" id="previous-stories"><i class="fa fa-superpowers"></i>Previous Stories</a>
                        </div>
                    </div>
                    <div class="story-wrapper">
                        <div class="tab-content story-of-the-day show pdl5 pdr5 text-center">
                            <div class="tab-content-header">
                                <p>Story Of The Day</p>
                            </div>
                            @if ($level->currentStory->count() > 0)
                            @foreach ($level->currentStory as $currentStory)
                            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                                <div class="our-causes">
                                    <div class="our-causes__image-wrap pr">
                                        <div class="day_no">
                                            <span>Story {{ $currentStory->story_number }}</span>
                                        </div>
                                        <img data-src="{{ asset('images/story.png') }}" class="our-causes__image lazy"
                                            alt="">

                                        <div class="loader"></div>
                                        <div class="our-causes__percentage base-bg">
                                            <div class="our-causes__rised">
                                                WEEK &nbsp; <span class="base-color">
                                                    {{ $currentStory->story_week_number }} </span>
                                            </div>
                                            <div class="our-causes__goal">
                                                <span class="nv-color">DAY &nbsp; </span> <span>
                                                    {{ $currentStory->story_number }} </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="our-causes__text-content text-center">
                                        <div class="progress-item">
                                            <div class="progress-bg">
                                                <div id='progress-one' class="progress-rate base-bg" data-value='80'>
                                                </div>
                                            </div>
                                            <span class="progress-percent">50%</span>
                                        </div>
                                        <!--/.progress-item-->
                                        <h4 class="text-uppercase our-causes__title"><a
                                                href="#">{{ $currentStory->icon_name }}</a>
                                        </h4>
                                        <p>{{ Str::limit($currentStory->icon_quote, $limit = 60, $end = '...') }}</p>
                                        <a href="{{ route('story.show',['story' => $currentStory->story_number]) }}" class="btn">Read Story</a>
                                    </div>
                                </div>
                                <!--/.our-causes-->
                            </div>
                            @endforeach
                            @else
                            <h1 class="mb30">No current Story</h1>
                            @endif

                        </div>
                        <div class="tab-content previous-stories pdl15 pdr15 text-center">
                            <div class="tab-content-header">
                                <p>Previous Stories</p>
                            </div>
                            <div class="row">
                                @if ($level->completedStories->count() > 0)
                                @foreach ($level->completedStories as $stories)
                                <div class="col-sm-6 col-xs-12 col-md-4">
                                    <div class="our-causes">
                                        <div class="our-causes__image-wrap pr">
                                            <div class="day_no">
                                                <span>Story {{ $stories->story_number }}</span>
                                            </div>
                                            <img data-src="{{ asset('images/story.png') }}" class="our-causes__image lazy"
                                                alt="">
                                            <div class="loader"></div>
                                            <div class="our-causes__percentage base-bg">
                                                <div class="our-causes__rised">
                                                    WEEK &nbsp; <span class="base-color">
                                                        {{ $stories->story_week_number }} </span>
                                                </div>
                                                <div class="our-causes__goal">
                                                    <span class="nv-color">DAY &nbsp; </span> <span>
                                                        {{ $stories->story_number }} </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="our-causes__text-content text-center">
                                            <div class="progress-item">
                                                <div class="progress-bg">
                                                    <div id='progress-one' class="progress-rate base-bg"
                                                        data-value='80'>
                                                    </div>
                                                </div>
                                                <span class="progress-percent">100%</span>
                                            </div>
                                            <!--/.progress-item-->
                                            <h4 class="text-uppercase our-causes__title"><a
                                                    href="#">{{ $stories->icon_name }}</a></h4>
                                            <p>{{ Str::limit($stories->icon_quote, $limit = 60, $end = '...') }}</p>
                                            <a href="{{ route('story.show',['story' => $stories->story_number]) }}" class="btn">Read Story</a>
                                        </div>
                                    </div>
                                    <!--/.our-causes-->
                                </div>
                                @endforeach
                                @else
                                <h1 class="mb30">No Previous Story</h1>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
$(".story-wrapper").find("div").removeClass('show');
var current = $(".story-wrapper").find("."+a).addClass('show');

});
@endsection
