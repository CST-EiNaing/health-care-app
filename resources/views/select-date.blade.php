@extends('master')

@section('content')
    <section id="appointment" class="appointment section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Booking</h2>
            <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

            <form action="{{ url('/appointment') }}" method="post" enctype="multipart/form-data" role="form">
                @csrf

                <div class="row mt-4">
                    <!-- Select Services -->
                    <div class="col-md-12 form-group">
                        <label for="service" class="form-label"><strong>Select Township</strong></label>
                        <select name="township" id="service" class="form-select">
                            @foreach ($townships as $township)
                                <option value="{{ $township->id }}">{{ $township->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <!-- From Date -->
                    <div class="col-md-6 form-group mt-3">
                        <label for="from_date" class="form-label"><strong>From Date</strong></label>
                        <input type="date" name="from_date" class="form-control" id="from_date" placeholder="From Date"
                            required="">
                    </div>
                    <!-- To Date -->
                    <div class="col-md-6 form-group mt-3">
                        <label for="to_date" class="form-label"><strong>To Date</strong></label>
                        <input type="date" name="to_date" class="form-control" id="to_date" placeholder="To Date"
                            required="">
                    </div>
                </div>



                <div class="mt-4">
                    {{-- <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div> --}}
                    <div class="text-center"><button type="submit" class="btn btn-primary">Check For Booking</button></div>
                </div>
            </form>




        </div>

    </section>
@endsection
