@extends('master')
@section('content')
    <section id="appointment" class="appointment section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Booking</h2>
        </div><!-- End Section Title -->
        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <form action="{{ url('/check-appointment') }}" method="POST" role="form">
                @csrf
                <div class="row mt-n3">
                    <!-- Select Services -->
                    <div class="col-md-12 form-group">
                        <label for="service" class="form-label"><strong>Select Township</strong></label>
                        <select name="township_id" id="service" class="form-select" required>
                            @foreach ($townships as $township)
                                <option value="{{ $township->id }}" 
                                @if (isset($township_id) && $township->id == $township_id) 
                                    selected 
                                @elseif (!isset($township_id) && $township->id) 
                                    selected 
                                @endif>  {{ $township->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <!-- From Date -->
                    <div class="col-md-6 form-group mt-3">
                        <label for="start_date" class="form-label"><strong>From Date</strong></label>
                        <input type="date" name="start_date" class="form-control" id="start_date" value="{{ $start_date }}" placeholder="From Date"
                            required>
                    </div>
                    <!-- To Date -->
                    <div class="col-md-6 form-group mt-3">
                        <label for="end_date" class="form-label"><strong>To Date</strong></label>
                        <input type="date" name="end_date" class="form-control" id="end_date" value="{{ $end_date }}" placeholder="To Date"
                            required>
                    </div>
                </div>
                <div class="mt-4">
                    {{-- <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div> --}}
                    <div class="text-center"><button type="submit" class="btn btn-primary">Check For Available Nurses</button></div>
                </div>
                @foreach($ndps as $ndp)
                <div>
                    <p>ID: {{ $ndp['id'] }}</p>
                    <p>Description: {{ $ndp['description'] }}</p>
                    <p>Fee: {{ $ndp['fee'] }}</p>
                    @if(isset($ndp['nurse_data']))
                        <p>Nurse Name: {{ $ndp['nurse_data']['name'] }}</p>
                    @endif
                </div>
                <hr>
                @endforeach
            </form>
        </div>
    </section>
@endsection
