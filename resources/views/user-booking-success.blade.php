@extends('master')

@section('content')
    <section id="appointment" class="appointment section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Hospital Billing Slip</h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <div class="card shadow-sm p-4">
                <h4 class="text-center mb-5">Billing Details</h4>
                <form action="{{ url('/payment') }}" method="post" enctype="multipart/form-data" role="form">
                    {{-- {{$booking}} --}}
                    @csrf
                    <input type="hidden" name="booking_id" value="{{ $booking->id }}">
                    <div class="row mb-3">
                        <!-- From Date -->
                        <div class="col-md-6">
                            <label for="start_date" class="form-label"><strong>From Date:</strong></label>
                            <input type="text" name="start_date" value="{{ $booking->from_date }}" class="form-control"
                                readonly>
                        </div>
                        <!-- To Date -->
                        <div class="col-md-6">
                            <label for="end_date" class="form-label"><strong>To Date:</strong></label>
                            <input type="text" name="end_date" value="{{ $booking->to_date }}" class="form-control"
                                readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- Owner -->
                        <div class="col-md-6">
                            <label class="form-label"><strong>Owner's Name:</strong></label>
                            <input type="text" name="owner_id" value="{{ $booking->owner->name }}" class="form-control"
                                readonly>
                        </div>
                        <!-- Patient -->
                        <div class="col-md-6">
                            <label class="form-label"><strong>Patient's Name:</strong></label>
                            <input type="text" name="patient_id" value="{{ $booking->patient->name }}"
                                class="form-control" readonly>

                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- NDP -->
                        <div class="col-md-6">
                            <label class="form-label"><strong>Rent Type:</strong></label>
                            <input type="text" name="patient_id" value="{{ $booking->ndp->description }}"
                                class="form-control" readonly>
                        </div>
                        <!-- Service Fee -->
                        <div class="col-md-6">
                            <label class="form-label"><strong>Service Fee:</strong></label>
                            <input type="number" id="service_fee" name="service_fee" value="{{ $booking->service_fee }}"
                                class="form-control" readonly>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <!-- Nurse Fee -->
                        <div class="col-md-6">
                            <label class="form-label"><strong>Nurse Fee:</strong></label>
                            <input type="number" id="nurse_fee" name="nurse_fee" value="{{ $booking->nurse_fee }}"
                                class="form-control" readonly>
                        </div>
                        <!-- Total -->
                        <div class="col-md-6">
                            <label class="form-label"><strong>Total Amount:</strong></label>
                            <input type="number" id="total" name="total" value="{{ $booking->total }}"
                                class="form-control" readonly>
                        </div>
                    </div>

                    <!-- Hidden fields for calculations -->
                    <input type="hidden" id="nurse_profit" name="nurse_profit">
                    <input type="hidden" id="total_income" name="total_income">

                    <!-- Submit Button -->
                    <div class="row mt-4">
                        <div class="col text-center">
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#paymentModal">
                                Proceed to Payment
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Payment Confirmation Modal -->
        <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="paymentModalLabel">Confirm Payment</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Would you like to make a payment now?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="noButton">No</button>
                        <button type="submit" class="btn btn-primary" id="yesButton">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        document.getElementById('noButton').addEventListener('click', function() {
            window.location.href = "{{ url('/') }}"; // Redirect to home
        });

        document.getElementById('yesButton').addEventListener('click', function() {
            // Submit the form for payment
            document.querySelector('form').submit();
        });
    </script>
@endsection
