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
                        <input type="date" name="start_date" class="form-control" id="start_date" required>
                    </div>
                    <!-- To Date -->
                    <div class="col-md-6 form-group mt-3">
                        <label for="end_date" class="form-label"><strong>To Date</strong></label>
                        <input type="date" name="end_date" class="form-control" id="end_date" required>
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
                        @php
                            $renderedNurseIds = []; // Array to track rendered nurse IDs
                        @endphp

                        @foreach ($ndps as $ndp)
                            @if (isset($ndp['nurse_data']) && !in_array($ndp['nurse_data']['id'], $renderedNurseIds))
                                <div class="col-lg-6">
                                    <div class="team-member" style="height:370px;">
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
                                                <span>NurseID:
                                                    {{ $ndp['nurse_data']['member_code'] ?? 'Not provided' }}</span>

                                                <!-- Age and Township -->
                                                <div class="info-pairalign-items-center gap-3 mb-2">
                                                    <p><strong>Township:
                                                        </strong>{{ $ndp['nurse_data']['township']['name'] ?? 'Not provided' }}
                                                    </p>
                                                    <p><strong>Position:
                                                        </strong>{{ $ndp['nurse_data']['certificate'] ?? 'Not provided' }}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Experience Section -->
                                        <div class="experience mb-3">
                                            <p style="color: red; display: inline">*</p>
                                            လုပ်ငန်း အတွေ့အကြုံ <strong>နှစ်နှစ်</strong> နှင့် အထက် ရှိသူ ဖြစ်သည်။
                                            <p style="color: red; display: inline">*</p>
                                        </div>
                                        <!-- Dropdown for Nurse NDPs -->
                                        <div class="mb-2">
                                            <p style="color: red; display: inline">*</p>
                                            ကျေးဇူးပြု၍ ငှားရမ်းလိုသည့် ပုံစံအား ရွေးချယ်ပေးပါ
                                            <p style="color: red; display: inline">*</p>
                                        </div>
                                        <select class="form-select mb-2" name="nurse_ndp" id="nurse_ndp" required>
                                            <option value="" disabled selected>Select Nurse's Description</option>
                                            @foreach ($nurses as $nurse)
                                                @foreach ($ndps as $ndp)
                                                    @if ($nurse->id == $ndp->nurse_id)
                                                        <option value="{{ $ndp->id }}">
                                                            {{ $ndp->description }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @endforeach
                                        </select>

                                        <div class="d-flex justify-content-end">
                                            <a href="{{ url("/info/nurse/{$ndp->nurse_id}") }}"
                                                class="btn btn-primary mt-2 book-now-btn"
                                                data-ndp-id="{{ $ndp->nurse_id }}">Book Now</a>
                                        </div>
                                    </div>
                                </div>

                                @php
                                    // Add the nurse ID to the rendered list
                                    $renderedNurseIds[] = $ndp['nurse_data']['id'];
                                @endphp
                            @endif
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
                    "select[name='nurse_ndp']");

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
