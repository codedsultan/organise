@extends('layouts.base')
@section('content')
<h1>Events</h1>
<ul>
    @foreach($events as $event)
        <li>{{ $event->title }}</li>
    @endforeach
</ul>

@endsection
