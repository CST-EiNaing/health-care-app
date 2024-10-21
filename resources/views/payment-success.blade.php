@extends('master')

@section('content')
    <section id="appointment" class="appointment section">
        @if (session('info_success'))
            <div class="alert alert-success">
                {{ session('info_success') }}
            </div>
        @endif
        @if (session('info_danger'))
            <div class="alert alert-danger">
                {{ session('info_danger') }}
            </div>
        @endif

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Payment Success</h2>
            <div class="">
                <h4>ငွေပေးချေခြင်း အောင်မြင်ပါသည်။</h4>

            <a href="{{url('/')}}" class=" mt-3 btn btn-primary">OK</a>
            </div>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">

        </div>

    </section>
@endsection
