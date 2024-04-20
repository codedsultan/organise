
@extends('layouts.organiser')
@section('maincontent')
<div><h1>Create Events</h1></div>
<div class="w-50">
<form action="{{ route('organiser.store.events') }}" method="post"  enctype="multipart/form-data" id="create-event">
@csrf
    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Title</span>
        <input class="form-control" type="text" id="title" name="title" />
    </div>
    <span class="text-danger">@error('title') {{ $message }} @enderror</span>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Description</span>
        <textarea class="form-control" type="text" id="description" name="description"></textarea>
    </div>
    <span class="text-danger">@error('description') {{ $message }} @enderror</span>


    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Start Date</span>
        <input class="form-control" type="date" id="start_date" name="start_date" />
    </div>
    <span class="text-danger">@error('start_date') {{ $message }} @enderror</span>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">End Date</span>
        <input class="form-control" type="date" id="end_date" name="end_date" />
    </div>
    <span class="text-danger">@error('end_date') {{ $message }} @enderror</span>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Start Time</span>
        <input class="form-control" type="time" id="start_time"  name="start_time"/>
    </div>
    <span class="text-danger">@error('start_time') {{ $message }} @enderror</span>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">End Time</span>
        <input class="form-control" type="time" id="end_time" name="end_time" />
    </div>
    <span class="text-danger">@error('end_time') {{ $message }} @enderror</span>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Venue</span>
        <input class="form-control" type="text" id="venue" name="venue" />
    </div>
    <span class="text-danger">@error('venue') {{ $message }} @enderror</span>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Location</span>
        <input class="form-control" type="text" id="location" name="location"/>
    </div>
    <span class="text-danger">@error('location') {{ $message }} @enderror</span>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Location Address</span>
        <input class="form-control" type="text" id="location_address" name="location_address" />
    </div>
    <span class="text-danger">@error('location_address') {{ $message }} @enderror</span>

    <div class="input-group mb-3">
        <input type="file" class="form-control" id="bg_image" name="bg_image">
        <label class="input-group-text" for="inputGroupFile02">Upload</label>
    </div>

    <span class="text-danger">@error('bg_image') {{ $message }} @enderror</span>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="ticket_silver" checked />
        <label class="form-check-label" for="ticket_silver">
            Regular tickets
        </label>
        <span class="text-danger">@error('ticket_silver') {{ $message }} @enderror</span>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Regular tickets Price</span>
        <input class="form-control" type="text" name="ticket_silver_price" id="ticket_silver_price" />
    </div>
    <span class="text-danger">@error('ticket_silver_price') {{ $message }} @enderror</span>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="ticket_gold" />
        <label class="form-check-label" for="ticket_gold">
            Gold tickets
        </label>
        <span class="text-danger">@error('ticket_gold') {{ $message }} @enderror</span>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">Gold tickets Price</span>
        <input class="form-control" type="text" name="ticket_gold_price" id="ticket_gold_price" />
    </div>
    <span class="text-danger">@error('ticket_gold_price') {{ $message }} @enderror</span>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" name="ticket_platinum" />
        <label class="form-check-label" for="ticket_platinum">
            Platinum tickets
        </label>
        <span class="text-danger">@error('ticket_platinum') {{ $message }} @enderror</span>
    </div>

    <div class="input-group mb-3">
        <span class="input-group-text" id="basic-addon1">  Platinum tickets Price</span>
        <input class="form-control" type="text" name="ticket_platinum_price" id="ticket_platinum_price" />
    </div>
    <span class="text-danger">@error('ticket_platinum_price') {{ $message }} @enderror</span>

    <button type="submit" class="btn btn-primary w-100">Create</button>

</form>

</div>
@endsection
