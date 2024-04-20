@extends('layouts.base')
@section('content')
<div class="row flex">
                @foreach($events as $event)
                <div class="col-sm-3 mb-4">
                    <div class="card h-100">
                        <img src="{{$event->featured_image}}" class="card-img-top" alt="green iguana" />
                        <div class="card-body">
                            <h4>{{$event->title}}</h4>
                                <!-- <p class="card-text text-wrap">
                                   {{$event->description}}
                                </p> -->
                            <!-- <div>
                            <button class="btn btn-primary" type="button">Share</button>
                            <button class="btn btn-link" type="button">Learn More</button>
                            <button class="btn btn-link" type="button">Learn More</button>
                            </div> -->
                        </div>
                        <div class="card-footer">
                        <!-- <button class="btn btn-link" type="button">
                            Learn More
                        </button> -->

                        <a
                            href="{{ route('event.show',$event->id) }}"
                            class="btn btn-primary"
                        >
                            Learn More
                        </a>
                            <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                        </div>
                    </div>

                </div>
                @endforeach

            </div>
            @endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('css/event.css')}}">
@endpush
