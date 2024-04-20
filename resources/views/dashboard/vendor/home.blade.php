

@extends('layouts.vendor')
@section('maincontent')



    <div><h1>Dashboard</h1></div>
    <!-- <h4>vendor Dashboard</h4> -->
    <p>{{ Auth::guard('vendor')->user()->name }}<p>
    <p>{{ Auth::guard('vendor')->user()->email }}<p>

@endsection

