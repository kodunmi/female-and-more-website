@extends('frontend.layouts.master')
@section('content')
<div class="main-content section-padding">
    <div class="container">
        <div class="alert alert-success" role="alert">
          <h4 class="alert-heading">hello</h4>
          <p>{{ auth()->user()->name }}</p>
          <p class="mb-0"></p>
        </div>
    </div>
</div>
@endsection