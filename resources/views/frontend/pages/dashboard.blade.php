@extends('frontend.layouts.master')
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
                        <img src="{{ asset('storage/users/'.auth()->user()->image) }}">
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
                    @hasStartedLevel(auth()->user()->level_number)
                    <div class="buy-ticket all-text-white hidden-sm hidden-xs">
                            <a href="{{ route('learders-board') }}" class="btn base-bg">Leader Board</a>
                            <div class="pdt15">check all score</div>
                    </div>
                    @else
                    <div class="buy-ticket all-text-white hidden-sm hidden-xs">
                            <a disabled class="btn base-bg">Leader Board</a>
                            <div class="pdt15">check all score</div>
                    </div>

                    @endhasStartedLevel

                </div>
                @hasStartedLevel(auth()->user()->level_number)
                    <section>
                        <h3 class="text-center base-color">Copy Your Referral Link</h3>
                        <div class="newsletter-form">
                            <input id="myInput" value="{{ auth()->user()->getAffiliateLink($url) }}" readonly="readonly" class="form-control newsletter-form__input" />
                            <button  class="btn base-bg newsletter-form__submit"  onclick="myFunction()" >COPY</button>
                        </div>
                    </section>
                @else
                <section>
                    <div class="alert alert-success alert-dismissible show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="alert-heading text-center">Hey {{ auth()->user()->name }}</h4>
                      <h3 class="text-center mb40">No programme is running for your level ({{ auth()->user()->level_number }}) yet</h3>
                      <p class="text-center mb40">level {{auth()->user()->level_number }} will start soon</p>
                    </div>
                    {{-- <div class="alert alert-success mb40 " role="alert">
                      <h4 class="alert-heading text-center">Hey {{ auth()->user()->name }}</h4>
                      div.alert-b
                      <h3 class="text-center mb40">No programme is running for your level ({{ auth()->user()->level_number }}) yet</h3>
                      <p class="text-center mb40">level {{auth()->user()->level_number }} will start soon</p>
                    </div> --}}
                </section>
                @endhasStartedLevel
                <section class="mb20">
                    <div class="alert alert-success alert-dismissible show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Close</span>
                        </button>
                        <h4 class="alert-heading text-center">Hey {{ auth()->user()->name }}</h4>
                      <h3 class="text-center mb40">for you to get a certificate for level {{ auth()->user()->level_number }}</h3>
                      <h2 class="text-center mb40">You need to score at least <span class="base-color bold">300</span></h2>
                      <h3 class="text-center">You need to have a minimum score of 250 (25days) in responding to stories questions and minimum of 50 (10 people) in referral</h3>
                    </div>
                </section>
                <section >
                        <div class="profile-details text-center mt40">
                                <div class="col-md-4 col-sm-6 mb10">
                                    <div class="profile-card " style="padding-top: 15px; padding-bottom: 15px;">
                                        <i class="fa fa-globe profile-details-font" aria-hidden="true"></i>
                                        <p>Country</p>
                                        <h3 style="margin-left: 20px;">{{ auth()->user()->country }}</h3>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 mb10">
                                    <div class="profile-card" style="padding-top: 15px; padding-bottom: 15px;">
                                        <i class="fa fa-map-marker profile-details-font" aria-hidden="true"></i>
                                        <p>State</p>
                                        <h3 style="margin-left: 20px;">{{ auth()->user()->state }}</h3>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6  mb10">
                                    <div class="profile-card " style="padding-top: 15px; padding-bottom: 15px;">
                                        <i class="fa fa-calendar-times-o profile-details-font" aria-hidden="true"></i>
                                        <p>Date Of Birth</p>
                                        <h3 style="margin-left: 20px;">{{ auth()->user()->dob }}</h3>
                                    </div>
                                </div>

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
                    <form id="reg-form" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" id="id" value="{{ auth()->id() }}">
                        <div class="form-file">
                            <input type="file" class="inputfile" name="image" id="image"  onchange="readURL(this);" data-multiple-caption="{count} files selected" multiple />
                            <label for="image">
                                <figure>
                                    <img src="{{ asset('storage/users/'.auth()->user()->image) }}" alt="" class="your_picture_image">
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
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ auth()->user()->name }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="country" class="col-md-4 col-form-label text-md-right">{{ __('Country') }}</label>

                            <div class="col-md-6">
                                <input id="country" type="text" class="form-control @error('country') is-invalid @enderror" name="country" value="{{ auth()->user()->country }}" required autocomplete="country">

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
                                <input id="state" type="text" class="form-control @error('state') is-invalid @enderror" name="state" value="{{ auth()->user()->state }}" required autocomplete="country">

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
                                <input id="dob" type="date" data-provide="datepicker" data-date-format="mm/dd/yyyy" class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ auth()->user()->dob }}" required autocomplete="date of birth" placeholder="choose date of birth mm/dd/yyyy">

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
                                <textarea id="goalTogreatness" maxlength="80" class="form-control @error('goal-to-greatness') is-invalid @enderror" name="goal_to_greatness"  required autocomplete="goal-to-greatness" placeholder="write your goal to greatness" rows="5">{{ auth()->user()->goal_to_greatness }}</textarea>

                                @error('goal-to-greatness')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" id="update-profile" class="btn btn-default">Update</button><button class="btn btn-default"  data-dismiss="modal" aria-label="Close">Close</button>
                </div></form>
            </div>
        </div>
    </div>

</div>
</div>
@endsection
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
};

function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('.your_picture_image')
                .attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
};

$('#reg-form').on('submit', function(e){
    e.preventDefault();

    var id = $("#id").val();
    console.log(id);

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        method:'POST',
        url:'/dashboard/profile-update/'+id,
        data: new FormData(this),
        dataType:'JSON',
        contentType: false,
        cache: false,
        processData: false,
       success:function(data){
           //location.reload();
        var snackbar  = new SnackBar;
        snackbar.make("message",
      [
        "Profile uploaded successfully | Reload Page",
        null,
        "bottom",
        "center"
      ], 8000);
       },
       error: function(error){
           if(error.status == 422){
            var snackbar  = new SnackBar;
            snackbar.make("message",
          [
            "Your image must not be more than 50kb",
            null,
            "bottom",
            "center"
          ], 8000);
           }else{
            var snackbar  = new SnackBar;
            snackbar.make("message",
          [
            "something went wrong please refresh",
            null,
            "bottom",
            "center"
          ], 8000);
           }

        }
    });

});



@endsection
