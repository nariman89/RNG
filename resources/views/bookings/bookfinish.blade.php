@extends('layouts/app')

@section('content')
@php
use App\Booking;
$bookings = Booking::where('article_id', auth()->id())->get();
@endphp
<div class="container mt-3">

 @if(session()->has('message'))
      <div class="alert alert-success">
         {{ session()->get('message') }}
      </div>
    @endif
@foreach ($bookings as $booking)
{{-- visa om nån ala bokat min article NA --}}
<h1>Booking Info:</h1>

 <p><strong>Firstname:</strong> nar</p>


 <p><strong>Firstname:</strong> {{ $booking->name }}</p>
<p><strong>Email:</strong> {{ $booking->email }}</p>
<p><strong>Phone:</strong> {{ $booking->phone }}</p>
<p><strong>Date Start:</strong> {{ $booking->date_start }}</p>
<p><strong>Date End:</strong> {{ $booking->date_end }}</p>


@endforeach

@endsection
