@extends('frontend.layouts.master')
@section('content')
<div class="main-content">
    <div class="container-fluid no-padding">
        <div class="profile-header gradient-bg">
            <img class="profile-header-image" src="{{ asset('images/logo.png') }}" alt="">
            <div class="profile-gtg">
                <em>{!! auth()->user()->goal_to_greatness !!}</em>
            </div>

            <div class="profile-image">
                <div class="image_outer_container">
                    <div class="green_icon"></div>
                    <div class="image_inner_container">
                        <img src="{{ asset(auth()->user()->image) }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="profile-body">
            <button class="btn btn-default change-profile-btn" data-toggle="modal" data-target="#my-modal">Change profile</button>
            <div class="personal-info">
                <span>{{ auth()->user()->name }}</span><br>
                <i style="font-size: small;" class="text-muted"> joined {{ auth()->user()->created_at->diffForHumans() }}</i>
            </div>
            <div class="profile-body-body">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Earum officia ipsam excepturi unde, dolores rem nihil ex sit vel nobis alias, labore veritatis a laudantium facere iusto rerum pariatur eius!</p>
               
                <p>{{ auth()->user()->getAffiliateLink($url) }}</p>
                <p>{{ auth()->user()->referrals()->count() }}</p>
            
            </div>
        </div>

</div>
<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header text-center gradient-bg all-text-white">
                <h4 class="modal-title w-100 font-weight-bold ">Update Profile</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body mx-3">
                <div class="md-form mb-5">
                  <i class="fas fa-envelope prefix grey-text"></i>
                  <input type="email" id="defaultForm-email" class="form-control validate">
                  <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
                </div>
        
                <div class="md-form mb-4">
                  <i class="fas fa-lock prefix grey-text"></i>
                  <input type="password" id="defaultForm-pass" class="form-control validate">
                  <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
                </div>
        
              </div>
              <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-default">Update</button>
              </div>
            </div>        
        </div>
    </div>
</div>
</div>
@endsection