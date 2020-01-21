@extends('frontend.layouts.master')
@section('content')
<div class="main-content">
    <div class="container-fluid no-padding">
        <div class="profile-header mb20 ">
            <img class="profile-header-image" src="{{ asset('images/logo.png') }}" alt="">
            <div class="profile-gtg">

                <p>All Actions Taken So Far</p>

            </div>
        </div>
        <div class="main-content section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        @foreach ($actions as $action)
                            <div class="col-md-6 col-sm-12 mb10">
                                <div class="profile-card mh30">
                                    <small class="text-muted disb">By {{ $action->user->name }}</small>
                                    <span style="margin-left: 20px;">{{ $action->action_text }}</span>
                                    <i class="fa fa-star profile-card-star" aria-hidden="true"></i>
                                </div>
                            </div>
                        @endforeach
                        <div class="nav-btn pdt30 text-center mb30">
                            <a {{  $actions->onFirstPage()? '': 'href='. $actions->previousPageUrl()	 }}{{ $actions->onFirstPage()?'disabled':'' }}
                                class="btn btn-primary">previous</a>{{ $actions->currentPage() }}
                            <a {{  $actions->hasMorePages()? 'href='. $actions->nextPageUrl(): '' 	 }}{{ $actions->hasMorePages()? '': 'disabled' }}
                                class="btn btn-primary">Next</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <aside class="sidebar">
                            <form class="search-form widget">
                                <input class="form-control search-form__input" placeholder="Search" type="search">
                            </form>
                            <div class="widget">
                                <div class="widget__heading">
                                    <h4 class="widget__title">LATEST <span class="base-color">CAUSES</span></h4>
                                </div>
                                <div class="widget__text-content">
                                    <div class="widget-latest-causes">
                                        <div class="widget-latest-causes__image-wrap">
                                            <a href="#"><img alt="" class="widget-latest-causes__thubnail lazy" data-src="images/sidebar/latest-causes1.jpg">
                                                <div class="loader"></div>
                                            </a>
                                        </div>
                                        <div class="widget-latest-causes__text-content">
                                            <h4 class="widget-latest-causes__title"><a href="#">Cause Title Gose here</a></h4>
                                            <div class="widget-latest-causes__admin small-text">
                                                by <a href="#">Admin</a>
                                            </div>
                                            <div class="widget-latest-causes__time text-mute">
                                                10 Minutes Ago
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.widget-latest-causes-->
                                    <div class="widget-latest-causes">
                                        <div class="widget-latest-causes__image-wrap">
                                            <a href="#"><img alt="" class="widget-latest-causes__thubnail lazy" data-src="images/sidebar/latest-causes2.jpg">
                                                <div class="loader"></div>
                                            </a>
                                        </div>
                                        <div class="widget-latest-causes__text-content">
                                            <h4 class="widget-latest-causes__title"><a href="#">Cause Title Gose here</a></h4>
                                            <div class="widget-latest-causes__admin small-text">
                                                by <a href="#">Admin</a>
                                            </div>
                                            <div class="widget-latest-causes__time text-mute">
                                                10 Minutes Ago
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.widget-latest-causes-->
                                    <div class="widget-latest-causes">
                                        <div class="widget-latest-causes__image-wrap">
                                            <a href="#"><img alt="" class="widget-latest-causes__thubnail lazy" data-src="images/sidebar/latest-causes3.jpg">
                                                <div class="loader"></div>
                                            </a>
                                        </div>
                                        <div class="widget-latest-causes__text-content">
                                            <h4 class="widget-latest-causes__title"><a href="#">Cause Title Gose here</a></h4>
                                            <div class="widget-latest-causes__admin small-text">
                                                by <a href="#">Admin</a>
                                            </div>
                                            <div class="widget-latest-causes__time text-mute">
                                                10 Minutes Ago
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.widget-latest-causes-->
                                    <div class="widget-latest-causes">
                                        <div class="widget-latest-causes__image-wrap">
                                            <a href="#"><img alt="" class="widget-latest-causes__thubnail lazy" data-src="images/sidebar/latest-causes4.jpg">
                                                <div class="loader"></div>
                                            </a>
                                        </div>
                                        <div class="widget-latest-causes__text-content">
                                            <h4 class="widget-latest-causes__title"><a href="#">Cause Title Gose here</a></h4>
                                            <div class="widget-latest-causes__admin small-text">
                                                by <a href="#">Admin</a>
                                            </div>
                                            <div class="widget-latest-causes__time text-mute">
                                                10 Minutes Ago
                                            </div>
                                        </div>
                                    </div>
                                    <!--/.widget-latest-causes-->
                                </div>
                            </div>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
