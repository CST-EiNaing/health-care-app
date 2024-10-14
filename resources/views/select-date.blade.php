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
                                    {{ $township->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <!-- From Date -->
                    <div class="col-md-6 form-group mt-3">
                        <label for="start_date" class="form-label"><strong>From Date</strong></label>
                        <input type="date" name="start_date" value="{{ $start_date }}" class="form-control"
                            id="start_date" required>
                    </div>
                    <!-- To Date -->
                    <div class="col-md-6 form-group mt-3">
                        <label for="end_date" class="form-label"><strong>To Date</strong></label>
                        <input type="date" name="end_date" value="{{ $end_date }}" class="form-control"
                            id="end_date" required>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-center"><button type="submit" class="btn btn-primary">Check For Available
                            Nurses</button></div>
                </div>
            </form>
            <div class="doctors section">
                <div class="container">
                    <div class="row gy-4" style="height: 638px; scroll-behavior: smooth; overflow: scroll;">
                        @foreach ($filterNurses as $nurse)
                        <form action="{{ url('/info/nurse') }}" method="get" enctype="multipart/form-data" role="form">
                         @csrf
                            <input type="hidden" name="start_date" class="form-control" value="{{ $start_date }}">
                            <input type="hidden" name="end_date" class="form-control" value="{{ $end_date }}">
                            <input type="hidden" name="township_id" class="form-control" value="{{ $township_id }}">
                            <input type="hidden" name="nurse_id" class="form-control" value="{{ $nurse['id'] }}">
                            <div class="col-lg-6">
                                <div class="team-member" style="height:370px;">
                                    <div class="d-flex align-items-start mb-2">
                                        <div class="pic">
                                            @php
                                                $nurseImage = isset($nurse['photo'])
                                                    ? asset('images/nurses/' . $nurse['photo'])
                                                    : asset('images/default-image.jpg');
                                            @endphp
                                            <img src="{{ $nurseImage }}" alt="{{ $nurse['name'] ?? 'Nurse' }}"
                                                class="img-fluid">
                                        </div>
                                        <div class="member-info">
                                            <h4>{{ $nurse['name'] ?? 'Not provided' }}</h4>
                                            <!-- Age and Township -->
                                            <div class="info-pairalign-items-center gap-3 mb-2">
                                                <p><strong>Township:
                                                    </strong>{{ $nurse['township_name'] ?? 'Not provided' }}
                                                </p>
                                                <p><strong>Position:
                                                    </strong>{{ $nurse['certificate'] ?? 'Not provided' }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Experience Section -->
                                    <div class="experience mb-3">
                                        <p style="color: red; display: inline">*</p>
                                        လုပ်ငန်း အတွေ့အကြုံ <strong> {{ $nurse['remark'] }}</strong> နှင့် အထက် ရှိသူ
                                        ဖြစ်သည်။
                                        <p style="color: red; display: inline">*</p>
                                    </div>
                                    <select class="form-select mb-2" name="ndp_id" id="ndp_id" required>
                                        <option value="" disabled selected>Select Nurse's Description</option>
                                        @foreach ($nurse['ndp'] as $ndp)
                                            <option value="{{ $ndp->id }}">
                                                {{ $ndp->id }} {{ $ndp->description }} {{ $nurse['id'] }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="d-flex justify-content-end">
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary mt-2 book-now-btn">Book Now</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal for missing nurse description -->
        <div class="modal fade" id="nurseModal" tabindex="-1" aria-labelledby="nurseModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="nurseModalLabel">Warning!</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ကျေးဇူးပြု၍ ငှားရမ်းလိုသည့် ပုံစံအား ရွေးချယ်ပေးပါ။
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Get all the "Book Now" buttons
        const bookNowButtons = document.querySelectorAll(".book-now-btn");
        // Initialize the Bootstrap modal
        const nurseModal = new bootstrap.Modal(document.getElementById("nurseModal"));
        bookNowButtons.forEach(button => {
            button.addEventListener("click", function(event) {
                // Get the nurse_ndp dropdown for the current nurse
                const nurseNdpDropdown = this.closest(".team-member").querySelector(
                    "select[id='nurse_ndp']");
                if (!nurseNdpDropdown.value) {
                    // Prevent the default link action
                    event.preventDefault();
                    // Show the modal instead of an alert
                    nurseModal.show();
                }
            });
        });
    });


</script>
