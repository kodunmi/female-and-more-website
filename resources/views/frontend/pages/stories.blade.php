@extends('frontend.layouts.master')
@section('content')

<div class="main-content">
    <div class="container-fluid no-padding">
        <div class="profile-header gradient-bg">
            <img class="profile-header-image" src="{{ asset('images/logo.png') }}" alt="">
            <div class="profile-gtg">
                <em>All Wonderful Females On The Platform</em>
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
                            <a href="#" id="previous-stories"><i class="fa fa-superpowers"></i>Prev Stories</a>
                            <a href="#" id="up-coming-stories"><i class="fa fa-bolt"></i>Next Success</a>
                        </div>
                    </div>
                    <div class="story-wrapper">
                        <div class="tab-content story-of-the-day show pdl5 pdr5 text-center">
                            <div class="tab-content-header">
                                <p>Story Of The Day</p>
                            </div>
                            <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
                                <div class="our-causes">
                                    <div class="our-causes__image-wrap pr">
                                        <div class="day_no">
                                            <span>Story One</span>
                                        </div>
                                        <img data-src="{{ asset('images/story.png') }}" class="our-causes__image lazy" alt="">

                                        <div class="loader"></div>
                                        <div class="our-causes__percentage base-bg">
                                            <div class="our-causes__rised">
                                                WEEK &nbsp; <span class="base-color"> ONE </span>
                                            </div>
                                            <div class="our-causes__goal">
                                                <span class="nv-color">DAY &nbsp; </span> <span> ONE </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="our-causes__text-content text-center">
                                        <div class="progress-item">
                                            <div class="progress-bg">
                                                <div id='progress-one' class="progress-rate base-bg" data-value='80'>
                                                </div>
                                            </div>
                                            <span class="progress-percent">80%</span>
                                        </div>
                                        <!--/.progress-item-->
                                        <h4 class="text-uppercase our-causes__title"><a href="#">oke maduewesi</a>
                                        </h4>
                                        <p>Lorem ipsum dolor sit amet, consect adipisc elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna aliqua</p>
                                        <a href="{{ route('story.detail') }}" class="btn">Read Story</a>
                                    </div>
                                </div>
                                <!--/.our-causes-->
                            </div>
                        </div>
                        <div class="tab-content previous-stories pdl15 pdr15 text-center">
                            <div class="tab-content-header">
                                <p>Previous Stories</p>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12 col-md-4">
                                    <div class="our-causes">
                                        <div class="our-causes__image-wrap pr">
                                            <div class="day_no">
                                                <span>Story One</span>
                                            </div>
                                            <img data-src="images/stories/oke.jpg" class="our-causes__image lazy" alt="">

                                            <div class="loader"></div>
                                            <div class="our-causes__percentage base-bg">
                                                <div class="our-causes__rised">
                                                    WEEK  &nbsp; <span class="base-color"> ONE </span>
                                                </div>
                                                <div class="our-causes__goal">
                                                    <span class="nv-color">DAY &nbsp; </span> <span> ONE </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="our-causes__text-content text-center">
                                            <div class="progress-item">
                                                <div  class="progress-bg">
                                                    <div id='progress-one' class="progress-rate base-bg" data-value='80'>
                                                    </div>
                                                </div>
                                                <span class="progress-percent">80%</span>
                                            </div><!--/.progress-item-->
                                            <h4 class="text-uppercase our-causes__title"><a href="#">oke maduewesi</a></h4>
                                            <p>Lorem ipsum dolor sit amet, consect adipisc elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                            <a href="#" class="btn">Read Story</a>
                                        </div>
                                    </div><!--/.our-causes-->
                                </div>
                                <div class="col-sm-6 col-xs-12 col-md-4">
                                    <div class="our-causes">
                                        <div class="our-causes__image-wrap pr">
                                            <div class="day_no">
                                                <span>Story Two</span>
                                            </div>
                                            <img data-src="images/stories/amina.jpg" class="our-causes__image lazy" alt="">

                                            <div class="loader"></div>
                                            <div class="our-causes__percentage base-bg">
                                                <div class="our-causes__rised">
                                                    WEEK  &nbsp; <span class="base-color"> ONE </span>
                                                </div>
                                                <div class="our-causes__goal">
                                                    <span class="nv-color">DAY &nbsp; </span> <span> TWO </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="our-causes__text-content text-center">
                                            <div class="progress-item">
                                                <div  class="progress-bg">
                                                    <div id='progress-two' class="progress-rate base-bg" data-value='80'>
                                                    </div>
                                                </div>
                                                <span class="progress-percent">80%</span>
                                            </div><!--/.progress-item-->
                                            <h4 class="text-uppercase our-causes__title"><a href="#">amina slaoui</a></h4>
                                            <p>Lorem ipsum dolor sit amet, consect adipisc elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                            <a href="#" class="btn">Read Story</a>
                                        </div>
                                    </div><!--/.our-causes-->
                                </div>
                                <div class="col-sm-6 col-xs-12 col-md-4">
                                    <div class="our-causes">
                                        <div class="our-causes__image-wrap pr">
                                            <div class="day_no">
                                                <span>Story Three</span>
                                            </div>
                                            <img data-src="images/stories/stella.jpg" class="our-causes__image lazy" alt="">

                                            <div class="loader"></div>
                                            <div class="our-causes__percentage base-bg">
                                                <div class="our-causes__rised">
                                                    WEEK  &nbsp; <span class="base-color"> ONE </span>
                                                </div>
                                                <div class="our-causes__goal">
                                                    <span class="nv-color">DAY &nbsp; </span> <span> THREE </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="our-causes__text-content text-center">
                                            <div class="progress-item">
                                                <div  class="progress-bg">
                                                    <div id='progress-three' class="progress-rate base-bg" data-value='80'>
                                                    </div>
                                                </div>
                                                <span class="progress-percent">80%</span>
                                            </div><!--/.progress-item-->
                                            <h4 class="text-uppercase our-causes__title"><a href="#">oke maduewesi</a></h4>
                                            <p>Lorem ipsum dolor sit amet, consect adipisc elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                            <a href="#" class="btn">Read Story</a>
                                        </div>
                                    </div><!--/.our-causes-->
                                </div>
                            </div>
                        </div>
                        <div class="tab-content up-coming-stories pdl15 pdr15 text-center">
                            <div class="tab-content-header">
                                <p>Up Coming Stories</p>
                            </div>
                            <div class="row">
                                <div class="col-sm-6 col-xs-12 col-md-4">
                                    <div class="our-causes">
                                        <div class="our-causes__image-wrap pr">
                                            <div class="day_no">
                                                <span>Story One</span>
                                            </div>
                                            <img data-src="images/stories/oke.jpg" class="our-causes__image lazy" alt="">

                                            <div class="loader"></div>
                                            <div class="our-causes__percentage base-bg">
                                                <div class="our-causes__rised">
                                                    WEEK  &nbsp; <span class="base-color"> ONE </span>
                                                </div>
                                                <div class="our-causes__goal">
                                                    <span class="nv-color">DAY &nbsp; </span> <span> ONE </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="our-causes__text-content text-center">
                                            <div class="progress-item">
                                                <div  class="progress-bg">
                                                    <div id='progress-one' class="progress-rate base-bg" data-value='80'>
                                                    </div>
                                                </div>
                                                <span class="progress-percent">80%</span>
                                            </div><!--/.progress-item-->
                                            <h4 class="text-uppercase our-causes__title"><a href="#">oke maduewesi</a></h4>
                                            <p>Lorem ipsum dolor sit amet, consect adipisc elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                            <a href="#" class="btn">Read Story</a>
                                        </div>
                                    </div><!--/.our-causes-->
                                </div>
                                <div class="col-sm-6 col-xs-12 col-md-4">
                                    <div class="our-causes">
                                        <div class="our-causes__image-wrap pr">
                                            <div class="day_no">
                                                <span>Story Two</span>
                                            </div>
                                            <img data-src="images/stories/amina.jpg" class="our-causes__image lazy" alt="">

                                            <div class="loader"></div>
                                            <div class="our-causes__percentage base-bg">
                                                <div class="our-causes__rised">
                                                    WEEK  &nbsp; <span class="base-color"> ONE </span>
                                                </div>
                                                <div class="our-causes__goal">
                                                    <span class="nv-color">DAY &nbsp; </span> <span> TWO </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="our-causes__text-content text-center">
                                            <div class="progress-item">
                                                <div  class="progress-bg">
                                                    <div id='progress-two' class="progress-rate base-bg" data-value='80'>
                                                    </div>
                                                </div>
                                                <span class="progress-percent">80%</span>
                                            </div><!--/.progress-item-->
                                            <h4 class="text-uppercase our-causes__title"><a href="#">amina slaoui</a></h4>
                                            <p>Lorem ipsum dolor sit amet, consect adipisc elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                            <a href="#" class="btn">Read Story</a>
                                        </div>
                                    </div><!--/.our-causes-->
                                </div>
                                <div class="col-sm-6 col-xs-12 col-md-4">
                                    <div class="our-causes">
                                        <div class="our-causes__image-wrap pr">
                                            <div class="day_no">
                                                <span>Story Three</span>
                                            </div>
                                            <img data-src="images/stories/stella.jpg" class="our-causes__image lazy" alt="">

                                            <div class="loader"></div>
                                            <div class="our-causes__percentage base-bg">
                                                <div class="our-causes__rised">
                                                    WEEK  &nbsp; <span class="base-color"> ONE </span>
                                                </div>
                                                <div class="our-causes__goal">
                                                    <span class="nv-color">DAY &nbsp; </span> <span> THREE </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="our-causes__text-content text-center">
                                            <div class="progress-item">
                                                <div  class="progress-bg">
                                                    <div id='progress-three' class="progress-rate base-bg" data-value='80'>
                                                    </div>
                                                </div>
                                                <span class="progress-percent">80%</span>
                                            </div><!--/.progress-item-->
                                            <h4 class="text-uppercase our-causes__title"><a href="#">oke maduewesi</a></h4>
                                            <p>Lorem ipsum dolor sit amet, consect adipisc elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                                            <a href="#" class="btn">Read Story</a>
                                        </div>
                                    </div><!--/.our-causes-->
                                </div>
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
