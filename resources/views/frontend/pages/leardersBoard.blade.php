@extends('frontend.layouts.master')
@section('js')
$(document).ready(function() {
    $('#lb').DataTable();
} );
@endsection
@section('content')
<div class="main-content section-padding">
    <div class="container">
        <!-- <div style="overflow-x:auto;">
        </div> -->
        <table id="lb"class="table table-dark table-hover  table-striped" style="overflow-x:auto;">
                 <thead class="thead-light">
                     <tr>
                         <th>Position</th>
                         <th>Name</th>
                         <th>No Of Referrals</th>
                         <th>Referral Score</th>
                         <th>No Of Stories</th>
                         <th>Story Score</th>
                         <th>Total Score</th>
                     </tr>
                 </thead>
                 <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->referrals()->count() }}</td>
                        <td>{{ $user->referral_score }}</td>
                        <td>0000</td>
                        <td>{{ $user->story_score }}</td>
                        <td>{{ $user->total_score }}</td>
                    </tr>
                    @endforeach
                 </tbody>
             </table>
        <!-- </div> -->
        <!-- <table id="lb" class="table table-striped table-bordered table-responsive" style="width:100%"> -->





        {{-- <a {{  $users->onFirstPage()? '': 'href='. $users->previousPageUrl()	 }}{{ $users->onFirstPage()?'disabled':'' }} class="btn btn-primary">previous</a>{{ $users->currentPage() }}
        <a {{  $users->hasMorePages()? 'href='. $users->nextPageUrl(): '' 	 }}{{ $users->hasMorePages()? '': 'disabled' }} class="btn btn-primary">Next</a> --}}

</div>
@endsection
