@extends('frontend.layouts.master')
@section('content')

<div class="main-content">
    <div class="container-fluid no-padding">
        @if($user == null)
        <div class="profile-header gradient-bg">
            <img class="profile-header-image" src="{{ asset('images/logo.png') }}" alt="">
        </div>
        <div class="profile-body">
            <div class="profile-body-body pdr30 pdl30">

                <div class="no-user">
                    <p style="font-style: italic;">Hey Beautify female</p>
                    <p>No user with that name</p>
                    <p>Perhaps you should check the spelling</p>
                </div>
            </div>
        </div>
        @else
        <div class="profile-header gradient-bg">
            <img class="profile-header-image" src="{{ asset('images/logo.png') }}" alt="">
            <div class="profile-gtg">
                <em>{!! $user->goal_to_greatness !!}</em>
            </div>

            <div class="profile-image">
                <div class="image_outer_container">
                    <div class="green_icon"></div>
                    <div class="image_inner_container">
                        <img src="{{ asset('storage/users/'.$user->image) }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-body">
            <div class="personal-info">
                <span>{{ $user->name }}</span><br>
                <i style="font-size: small;" class="text-muted"> joined
                    {{ $user->created_at->diffForHumans() }}</i>
            </div>
            <div class="profile-body-body pdr30 pdl30">
                <div class="event-details-counter-wrap mt50 mb30 lazy"
                    style="display: flex; background-image: url(&quot;images/events/event-details2.jpg&quot;);">
                    <div class="event-counter">
                        <div class="musica-counter-active is-countdown">
                            <span class="countdown-row">
                                <span class="countdown-section pdr15 pdl15">
                                    <span class="countdown-amount">{{ $user->referrals()->count() }}</span>
                                    <span class="countdown-period">No Of Referrals</span>
                                </span>
                                <span class="countdown-section pdr15 pdl15">
                                    <span class="countdown-amount">0</span>
                                    <span class="countdown-period">No Of Responses</span>
                                </span>
                                <span class="countdown-section pdr15 pdl15">
                                    <span class="countdown-amount">{{ $user->total_score }}</span>
                                    <span class="countdown-period">Total Score</span>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="buy-ticket all-text-white hidden-sm hidden-xs">
                        <a href="{{ route('learders-board') }}" class="btn base-bg">Leader Board</a>
                        <div class="pdt15">check all score</div>
                    </div>
                </div>
                <div class="profile-details text-center">
                    <div class="col-md-4 col-sm-6 mb10">
                        <div class="profile-card " style="padding-top: 15px; padding-bottom: 15px;">
                            <i class="fa fa-globe profile-details-font" aria-hidden="true"></i>
                            <p>Country</p>
                            <h3 style="margin-left: 20px;">{{ $user->country }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 mb10">
                        <div class="profile-card" style="padding-top: 15px; padding-bottom: 15px;">
                            <i class="fa fa-map-marker profile-details-font" aria-hidden="true"></i>
                            <p>State</p>
                            <h3 style="margin-left: 20px;">{{ $user->state }}</h3>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6  mb10">
                        <div class="profile-card " style="padding-top: 15px; padding-bottom: 15px;">
                            <i class="fa fa-calendar-times-o profile-details-font" aria-hidden="true"></i>
                            <p>Date Of Birth</p>
                            <h3 style="margin-left: 20px;">{{ $user->dob }}</h3>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        @endif

    </div>
</div>
@endsection
