@extends('layouts.vendor')

@section('maincontent')

<div class="d-flex justify-content-between">
  <div><h1>Applications</h1></div>
  <div>
    <a
    href="{{ route('vendor.create.bookings') }}"
    class="btn btn-primary"
    >
        Create Application
    </a>
</div>

</div>

<div class="table-responsive mt-10 border">
<table class="table table-hover table-striped table-borderless">
  <thead>
    <tr>
      <th >Name</th>
      <th >Description</th>
      <th >Start Date</th>
      <th >Status</th>
      <th ></th>
    </tr>
  </thead>
  <tbody class="table-group-divider">
  @foreach($bookings as $booking)
    <tr>
      <td>
        <a href="#">{{$booking->name}}</a>
      </td>
      <td class="text-break">{{substr($booking->description, 0, 35) . '...'}}</td>
      <td>{{now()->parse($booking->start_date)->format('M d Y')}}</td>
      <td>
        @if($booking->status == "pending")
            <span class="badge rounded-pill text-bg-secondary p-2 text-capitalize">{{$booking->status}}</span>
        @elseif($booking->status == "approved")
            <span class="badge rounded-pill text-bg-success p-2 text-capitalize">{{$booking->status}}</span>
        @elseif($booking->status == "invoice")
            <span class="badge rounded-pill text-bg-info p-2 text-capitalize">{{$booking->status}}</span>
        @endif

      </td>
      <td>
        <div class="dropdown">
          <button class="btn btn-default dropdown-toggle" type="button"
           data-bs-toggle="dropdown" aria-expanded="false">More</button>
          <ul class="dropdown-menu">
            <li>

              <a class="dropdown-item" href="#">View Application</a>
              <!-- <a class="dropdown-item" href="#">View Tickets</a> -->
              @if($booking->status == "invoice")
              <a class="dropdown-item" href="#">Invoice</a>
              @endif
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
