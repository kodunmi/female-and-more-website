@extends('frontend.layouts.master')
@section('content')
<div class="banner-area banner-area--causes all-text-white text-center lazy" data-src="images/causes/banner.jpg">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-title">CAUSES</h1>
                    <ul class="fund-breadcumb">
                        <li><a href="index.html">Home</a> </li>
                        <li><a href="causes.html">Causes</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="main-content section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
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
                    <div class="fund-pagination mb30">
                        <a href="#" class="active">1</a>
                        <a href="#">2</a>
                        <a href="#" class="next">Next</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection