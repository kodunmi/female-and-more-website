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
                <button class="btn change-profile-btn" data-toggle="modal" data-target="#changeProfileModal">Change Profile</button>
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
                            <a href="{{ route('learders-board') }}" class="btn base-bg">Leader Board</a>
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

            </div>
        </div>

    </div>
    <div id="changeProfileModal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header text-center gradient-bg all-text-white">
                    <h4 class="modal-title w-100 font-weight-bold ">Update Profile</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3 justify-content-center">
                    <form  method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-file">
                            <input type="file" class="inputfile" name="image" id="your_picture" required  onchange="readURL(this);" data-multiple-caption="{count} files selected" multiple />
                            <label for="your_picture">
                                <figure>
                                    <img src="{{ asset('images/your-picture.png') }}" alt="" class="your_picture_image">
                                </figure>
                                <span class="file-button">choose picture</span>
                                @error('image')
                                    <div class="error" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </div>
                                @enderror
                            </label>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('User Name') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" placeholder="your username should be one"utofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ old('country') }}" required autocomplete="country">

                                @error('country')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="state" class="col-md-4 col-form-label text-md-right">{{ __('State') }}</label>

                            <div class="col-md-6">
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ old('state') }}" required autocomplete="country">

                                @error('state')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dob" class="col-md-4 col-form-label text-md-right">{{ __('Date Of Birth') }}</label>

                            <div class="col-md-6">
                                <input id="dob" type="date" data-provide="datepicker" data-date-format="mm/dd/yyyy" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required autocomplete="date of birth" placeholder="choose date of birth mm/dd/yyyy">

                                @error('dob')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="goalTogreatness" class="col-md-4 col-form-label text-md-right">{{ __('Goal To Greatness') }}</label>

                            <div class="col-md-6">
                                <textarea id="goalTogreatness" maxlength="80" class="form-control @error('goal-to-greatness') is-invalid @enderror" name="goal-to-greatness" value="{{ old('state') }}" required autocomplete="goal-to-greatness" placeholder="write your goal to greatness" rows="5"></textarea>

                                @error('goal-to-greatness')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="btn btn-default">Update</button><button class="btn btn-default"  data-dismiss="modal" aria-label="Close">Close</button>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
@endsection
