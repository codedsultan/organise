@extends('layouts.main-template')
@section('title', isset($title) ? $title : 'Dashboard | Organiser')
@section('content')

<div class="row">
    <div class="col-md-12 mt-3">
        <h4>Organiser dashboard</h4>

        <td>
                                     <a href="{{ route('organiser.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                     <form action="{{ route('organiser.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                                 </td>

                                 <td>{{ Auth::guard('organiser')->user()->name }}</td>
                                 <td>{{ Auth::guard('organiser')->user()->email }}</td>
    </div>
</div>

@endsection
