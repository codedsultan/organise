@extends('layouts.main-template')
@section('title', isset($title) ? $title : 'Dashboard | Normal User')
@section('content')

<div class="row">
    <div class="col-md-12 mt-3">
        <h4>Normal user dashboard</h4>
        <td>
                                     <a href="{{ route('user.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                     <form action="{{ route('user.logout') }}" method="post" class="d-none" id="logout-form">@csrf</form>
                                 </td>

                                 <td>{{ Auth::guard('customer')->user()->name }}</td>
                                 <td>{{ Auth::guard('customer')->user()->email }}</td>
    </div>
</div>

@endsection
