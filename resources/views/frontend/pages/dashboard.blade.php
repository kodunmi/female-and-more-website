@extends('frontend.layouts.master')
@section('js')
function myFunction() {
  /* Get the text field */
  var copyText = document.getElementById("myInput");

  /* Select the text field */
  copyText.select();
  copyText.setSelectionRange(0, 99999); /*For mobile devices*/

  /* Copy the text inside the text field */
  document.execCommand("copy");

  /* Alert the copied text */
  var snackbar  = new SnackBar;
    snackbar.make("message",
  [
    "Your Link As Been Copied",
    null,
    "bottom",
    "center"
  ], 4000);
}

@endsection
@section('content')
<snackbar></snackbar>
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
            <div class="personal-info">
                <span>{{ auth()->user()->name }}</span><br>
                <i style="font-size: small;" class="text-muted"> joined
                    {{ auth()->user()->created_at->diffForHumans() }}</i>
            </div>
            <div class="profile-body-body pdr30 pdl30">
                <div class="event-details-counter-wrap mt50 mb30 lazy"
                    style="display: flex; background-image: url(&quot;images/events/event-details2.jpg&quot;);">
                    <div class="event-counter">
                        <div class="musica-counter-active is-countdown">
                            <span class="countdown-row">
                                <span class="countdown-section pdr15 pdl15">
                                    <span class="countdown-amount">{{ auth()->user()->referrals()->count() }}</span>
                                    <span class="countdown-period">No Of Referrals</span>
                                </span>
                                <span class="countdown-section pdr15 pdl15">
                                    <span class="countdown-amount">0</span>
                                    <span class="countdown-period">No Of Responses</span>
                                </span>
                                <span class="countdown-section pdr15 pdl15">
                                    <span class="countdown-amount">{{ auth()->user()->total_score }}</span>
                                    <span class="countdown-period">Total Score</span>
                                </span>
                            </span>
                        </div>
                    </div>
                    <div class="buy-ticket all-text-white hidden-sm hidden-xs">
                            <a href="#" class="btn base-bg">Leader Board</a>
                            <div class="pdt15">check all score</div>
                    </div>
                </div>
                <section>
                    <h3 class="text-center base-color">Copy Your Referral Link</h3>
                    <div class="newsletter-form">
                        <input id="myInput" value="{{ auth()->user()->getAffiliateLink($url) }}" readonly="readonly" class="form-control newsletter-form__input" />
                        <button  class="btn base-bg newsletter-form__submit"  onclick="myFunction()" >COPY</button>
                    </div>
                            
                </section>
                <p></p>
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