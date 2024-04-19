@extends('layouts.organiser')

@section('maincontent')

<div class="d-flex justify-content-between">
  <div><h1>Events</h1></div>
  <div>
    <a
    href="{{ route('organiser.create.events') }}"
    class="btn btn-primary"
    >
        Create Event
    </a>
</div>

</div>

<div class="table-responsive mt-10 border">
<table class="table table-hover table-striped table-borderless">
  <thead>
    <tr>
      <th >Title</th>
      <th >Description</th>
      <th >Start Date</th>
      <th >End Date</th>
      <th >Tickets</th>
      <th ></th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
  @foreach($events as $event)
    <tr>
      <td>
        <a href="#">{{$event->title}}</a>
      </td>
      <td class="text-break">{{substr($event->description, 0, 35) . '...'}}</td>
      <td>{{now()->parse($event->start_date)->format('M d Y')}}</td>
      <td>{{now()->parse($event->end_date)->format('M d Y')}}</td>
      <td>{{$event->tickets->count()}}</td>
      <td>
        <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button"
           data-bs-toggle="dropdown" aria-expanded="false">More</button>
          <ul class="dropdown-menu">
            <li>
              <a class="dropdown-item" href="#">Edit</a>
            </li>
          </ul>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
</div>
<ul>


</ul>



@endsection
