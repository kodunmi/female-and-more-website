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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading text-center">
                            <h2 class="section-title wow fadeInUpXsd" data-wow-duration=".7s" data-wow-delay=".1s">OUR <span class="base-color">GALLERY</span></h2>
                            <span class="section-sub-title wow fadeInUpXsd disinb" data-wow-duration=".9s" data-wow-delay=".1s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore</span>
                            <div class="section-heading-separator wow fadeInUpXsd" data-wow-duration="1.1s" data-wow-delay=".1s"></div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center pdb35 wow fadeInUpXsd" data-wow-duration=".7s" data-wow-delay=".3s">
                            <ul class="list-inline filter-options">
                                <li><a href="#!" class="filter-options__item active filter btn" data-filter=".all">Show All</a></li>
                                <li><a href="#!" class="filter-options__item filter btn" data-filter=".charity">Charity</a></li>
                                <li><a href="#!" class="filter-options__item filter btn" data-filter=".children">Children</a></li>
                                <li><a href="#!" class="filter-options__item filter btn" data-filter=".natureal">Natureal</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row wow fadeInUpXsd" data-wow-duration=".7s" data-wow-delay=".3s">
                    <div class="col-md-12">
                        <div class="row row-eq-height" id="mixitup-grid">
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mix all charity natureal">
                                <a class="gallery-item pr  wow fadeInUpSmd" data-wow-duration="1.5s" data-wow-delay=".2s" href="images/home/popup/gallery-1.jpg" >
                                    <img  data-src="images/home/gallery-1.jpg" class="gallery-item__photo lazy"  />
                                    <div class="loader"></div>
                                </a><!--/.portfolio-item-->
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mix all charity children natureal">
                                <a class="gallery-item  wow fadeInUpSmd" data-wow-duration="1.5s" data-wow-delay=".4s" href="images/home/popup/gallery-2.jpg">
                                    <img  data-src="images/home/gallery-2.jpg" class="gallery-item__photo lazy"  />
                                    <div class="loader"></div>
                                </a><!--/.portfolio-item-->
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mix all children natureal">
                                <a class="gallery-item  wow fadeInUpSmd" data-wow-duration="1.5s" data-wow-delay=".6s" href="images/home/popup/gallery-3.jpg">
                                    <img  data-src="images/home/gallery-3.jpg" class="gallery-item__photo lazy"  />
                                    <div class="loader"></div>
                                </a><!--/.portfolio-item-->
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mix all charity children">
                                <a class="gallery-item  wow fadeInUpSmd"  data-wow-duration="1.5s" data-wow-delay=".8s" href="images/home/popup/gallery-4.jpg">
                                    <img  data-src="images/home/gallery-4.jpg" class="gallery-item__photo lazy"  />
                                    <div class="loader"></div>
                                </a><!--/.portfolio-item-->
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mix all children natureal">
                                <a class="gallery-item  wow fadeInUpSmd" data-wow-duration="1.5s" data-wow-delay=".2s" href="images/home/popup/gallery-5.jpg">
                                    <img  data-src="images/home/gallery-5.jpg" class="gallery-item__photo lazy"  />
                                    <div class="loader"></div>
                                </a><!--/.portfolio-item-->
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mix all charity children">
                                <a class="gallery-item  wow fadeInUpSmd"  data-wow-duration="1.5s" data-wow-delay=".4s" href="images/home/popup/gallery-6.jpg">
                                    <img  data-src="images/home/gallery-6.jpg" class="gallery-item__photo lazy"  />
                                    <div class="loader"></div>
                                </a><!--/.portfolio-item-->
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mix all charity natureal">
                                <a class="gallery-item  wow fadeInUpSmd"  data-wow-duration="1.5s" data-wow-delay=".6s" href="images/home/popup/gallery-7.jpg">
                                    <img  data-src="images/home/gallery-7.jpg" class="gallery-item__photo lazy"  />
                                    <div class="loader"></div>
                                </a><!--/.portfolio-item-->
                            </div>
                            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mix all children natureal">
                                <a class="gallery-item  wow fadeInUpSmd"  data-wow-duration="1.5s" data-wow-delay=".8s" href="images/home/popup/gallery-8.jpg">
                                    <img  data-src="images/home/gallery-8.jpg" class="gallery-item__photo lazy"  />
                                    <div class="loader"></div>
                                </a><!--/.portfolio-item-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  
</div>
@endsection