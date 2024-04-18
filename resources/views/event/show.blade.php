@extends('layouts.base')
@section('content')

<div class="row">
    <!-- {{$event}} -->
</div>
<div class="container">
    <div class="row">
        <div class="col-md-5 ">
            <div class="project-info-box mt-0">
                <h5>{{$event->title}}<h5>
            </div>
            <div class="project">
                <!-- {{$event->title}} -->
                <h5>Description</h5>
                <p class="mb-0">{{$event->description}}</p>
            </div><!-- / project-info-box -->

            <div class="detail-info-box">

                <p><b>Start Date:</b> {{$event->start_date}}</p>
                <p><b>End Date:</b> {{$event->end_time}}</p>
                <p><b>Start Time:</b> {{$event->start_time}}</p>
                <p><b>End Time:</b> {{$event->end_time}}</p>
                <p><b>Location:</b> {{$event->location}}</p>
                <p><b>Venue:</b> {{$event->venue_name}}</p>
                <p><b>Address:</b> {{$event->location_address}}</p>
                <!-- <p><b>Tickets:</b> Illustrator</p> -->
                <!-- <p class="mb-0"><b>Budget:</b> $500</p> -->
            </div>



            <!-- / project-info-box -->

            <!-- <div class="project-info-box mt-0 mb-0">
                <p class="mb-0">
                    <span class="fw-bold mr-10 va-middle hide-mobile">Share:</span>
                    <a href="#x" class="btn btn-xs btn-facebook btn-circle btn-icon mr-5 mb-0"><i class="fab fa-facebook-f"></i></a>
                    <a href="#x" class="btn btn-xs btn-twitter btn-circle btn-icon mr-5 mb-0"><i class="fab fa-twitter"></i></a>
                    <a href="#x" class="btn btn-xs btn-pinterest btn-circle btn-icon mr-5 mb-0"><i class="fab fa-pinterest"></i></a>
                    <a href="#x" class="btn btn-xs btn-linkedin btn-circle btn-icon mr-5 mb-0"><i class="fab fa-linkedin-in"></i></a>
                </p>
            </div -->
            <!-- / project-info-box -->
        </div><!-- / column -->

        <div class="col-md-7">
            <img class="border p-12 mt-10" src="{{$event->bg_image_path}}" alt="project-image" class="rounded">
        </div>
        <!-- / column -->
    </div>
    <div>
        <div class="px-9 mt-8 mb-8">
            <h5>Tickets</h5>
        </div>
        <div class="ticket-info-box">
            <div class="row flex">
                    @foreach($event->tickets as $ticket)
                    <div class="col-sm-3 mb-4">
                        <div class="card h-100">
                            <img src="{{$event->bg_image_path}}" class="card-img-top" alt="green iguana" />
                            <div class="card-body">
                                <h4>{{$ticket->type}}</h4>
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
                                ADD T0 CART
                            </a>
                                <!-- <small class="text-muted">Last updated 3 mins ago</small> -->
                            </div>
                        </div>

                    </div>
                    @endforeach

                </div>


            </div>
    </div>
</div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{asset('css/event.css')}}">
@endpush
