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
                    <!-- Select Township -->
                    <div class="col-md-12 form-group">
                        <label for="service" class="form-label"><strong>Select Township</strong></label>
                        <select name="township_id" id="service" class="form-select" required>
                            @foreach ($townships as $township)
                                <option value="{{ $township->id }}" @if (old('township_id', $township_id ?? '') == $township->id) selected @endif>
                                    {{ $township->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <!-- From Date -->
                    <div class="col-md-6 form-group mt-3">
                        <label for="start_date" class="form-label"><strong>From Date</strong></label>
                        <input type="date" name="start_date" class="form-control" id="start_date"
                            value="{{ old('start_date', $start_date ?? '') }}" required>
                    </div>
                    <!-- To Date -->
                    <div class="col-md-6 form-group mt-3">
                        <label for="end_date" class="form-label"><strong>To Date</strong></label>
                        <input type="date" name="end_date" class="form-control" id="end_date"
                            value="{{ old('end_date', $end_date ?? '') }}" required>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-center"><button type="submit" class="btn btn-primary">Check For Available
                            Nurses</button></div>
                </div>

                <!-- Display available nurses -->
                {{-- @foreach ($ndps as $ndp)
                <div>
                    <p>ID: {{ $ndp['id'] }}</p>
                    <p>Description: {{ $ndp['description'] }}</p>
                    <p>Fee: {{ $ndp['fee'] }}</p>
                    @if (isset($ndp['nurse_data']))
                        <p>Nurse Name: {{ $ndp['nurse_data']['name'] }}</p>
                    @endif
                </div>
                <hr>
                @endforeach --}}
                <div class="doctors section">
                    <div class="container">
                        <div class="row gy-4"
                        style="height: 638px; scroll-behavior: smooth; overflow: scroll;"
                        >
                            @foreach ($ndps as $ndp)
                                <div class="col-lg-6" >
                                    <div class="team-member">
                                        <div class="d-flex align-items-start mb-2">
                                            <div class="pic">
                                                @php
                                                    $nurseImage = isset($ndp['nurse_data']['photo'])
                                                        ? asset('images/nurses/' . $ndp['nurse_data']['photo'])
                                                        : asset('images/default-image.jpg');
                                                @endphp
                                                <img src="{{ $nurseImage }}"
                                                    alt="{{ $ndp['nurse_data']['name'] ?? 'Nurse' }}" class="img-fluid">
                                            </div>
                                            <div class="member-info">
                                                <h4>{{ $ndp['nurse_data']['name'] ?? 'Not provided' }}</h4>
                                                <span></span>

                                                <!-- Age and Township -->
                                                <div class="info-pair d-flex align-items-center gap-3 mb-2">
                                                    <p style="width: 120px" class="border-end"><strong>Age:
                                                        </strong>{{ $ndp['nurse_data']['age'] ?? 'Not provided' }}</p>
                                                    <p><strong>Township:
                                                        </strong>{{ $ndp['nurse_data']['township']['name'] ?? 'Not provided' }}
                                                    </p>
                                                </div>

                                                <!-- Education and Position -->
                                                <div class="info-pair d-flex align-items-center gap-3 mb-2">
                                                    <p style="width: 120px" class="border-end"><strong>Education:
                                                        </strong>{{ $ndp['nurse_data']['education'] ?? 'B.A' }}</p>
                                                    <p><strong>Position:
                                                        </strong>{{ $ndp['nurse_data']['position'] ?? 'HCA' }}</p>
                                                </div>

                                                <!-- Height and Weight -->
                                                <div class="info-pair d-flex align-items-center gap-3 mb-2">
                                                    <p style="width: 120px" class="border-end"><strong>Height:
                                                        </strong>{{ $ndp['nurse_data']['height'] ?? 'Not provided' }}cm</p>
                                                    <p><strong>Weight:
                                                        </strong>{{ $ndp['nurse_data']['weight'] ?? 'Not provided' }}Kg</p>
                                                </div>

                                                <!-- Religion and Marital Status -->
                                                <div class="info-pair d-flex align-items-center gap-3 mb-2">
                                                    <p style="width: 120px" class="border-end"><strong>Religion:
                                                        </strong>{{ $ndp['nurse_data']['religion'] ?? 'Not provided' }}</p>
                                                    <p><strong>Status:
                                                        </strong>{{ $ndp['nurse_data']['maritial_status'] ?? 'Not provided' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Experience Section -->
                                        <div class="experience mb-2">
                                            <p style="color: red; display: inline">*</p>
                                            လုပ်ငန်း အတွေ့အကြုံ <strong>နှစ်နှစ်</strong> နှင့် အထက် ရှိသူများသာ ဖြစ်သည်။
                                            <p style="color: red; display: inline">*</p>
                                        </div>
                                        <div class="d-flex justify-content-end">
                                            <a href="{{ url("/info ")}}" class="btn btn-primary mt-2">Book Now</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@endsection
