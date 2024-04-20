

@extends('layouts.organiser')
@section('maincontent')



    <div><h1>Organiser Dashboard</h1></div>
    <!-- <h4>Organiser Dashboard</h4> -->
    <p>{{ Auth::guard('organiser')->user()->name }}<p>
    <p>{{ Auth::guard('organiser')->user()->email }}<p>

@endsection

