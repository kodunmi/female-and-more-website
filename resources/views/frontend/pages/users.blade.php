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
                <input class="user-search" placeholder="SEARCH NAME" type="search" name="" id="">
                @foreach ($users as $user)
                <div class="col-md-4 col-sm-6 mb10">
                    <a href="{{ route('profile',['username' => $user->username]) }}">
                        <div class="profile-card">
                            <img class="profile-card-img" src="{{ asset('storage/users/'.$user->image) }}" alt="">
                            <span style="margin-left: 20px;">{{ $user->name }}</span>
                            <i class="fa fa-star profile-card-star" aria-hidden="true"></i>
                        </div>
                    </a>
                </div>
                @endforeach
            </div>
            <div class="nav-btn pdt30 text-center">
                <a {{  $users->onFirstPage()? '': 'href='. $users->previousPageUrl()	 }}{{ $users->onFirstPage()?'disabled':'' }}
                    class="btn btn-primary">previous</a>{{ $users->currentPage() }}
                <a {{  $users->hasMorePages()? 'href='. $users->nextPageUrl(): '' 	 }}{{ $users->hasMorePages()? '': 'disabled' }}
                    class="btn btn-primary">Next</a>
            </div>
        </div>
    </div>
</div>
@endsection
