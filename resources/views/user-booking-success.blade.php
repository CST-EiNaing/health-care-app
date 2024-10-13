@extends('master')

@section('content')
    <section id="appointment" class="appointment section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Successful Booking Slip</h2>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            {{$booking}}
            <form action="{{ url('/') }}" method="post" enctype="multipart/form-data" role="form">
                @csrf
                <div class="row d-flex justify-content-center align-items-center">
                    <h4 class=" text-center mb-5">Details Information</h4>
                    <!-- From Date -->
                    <div class="col-md-6 form-group mt-3">
                        <label for="start_date" class="form-label"><strong>From Date:</strong></label>
                        <input name="start_date" class="form-control" id="start_date"
                            readonly>
                    </div>
                    <!-- To Date -->
                    <div class="col-md-6 form-group mt-3">
                        <label for="end_date" class="form-label"><strong>To Date:</strong></label>
                        <input name="end_date" class="form-control" id="end_date" readonly>
                    </div>
                    {{-- <div class="col-md-8 form-group mt-3 pe-2">
                        
                        <div class="d-flex align-items-center mt-4">
                            <label for="booking_id" class="form-label me-2" style="width: 250px"><strong>BookingID
                                    :</strong></label>
                            <input type="text" id="booking_id" name="booking_id" class="form-control" readonly>
                        </div>
                        <div class="d-flex align-items-center mt-4">
                            <label for="owner_name" class="form-label me-2" style="width: 250px"><strong>Owner's Name
                                    :</strong></label>
                            <input type="text" name="owner_name" id="owner_name" class="form-control" readonly>
                        </div>
                        <div class="d-flex align-items-center mt-4">
                            <label for="booking_id" class="form-label me-2" style="width: 250px"><strong>Patient's Name
                                    :</strong></label>
                            <input type="text" id="booking_id" name="booking_id" class="form-control" readonly>
                        </div>
                        <div class="d-flex align-items-center mt-4">
                            <label for="booking_id" class="form-label me-2" style="width: 250px"><strong>Nurse's Name
                                    :</strong></label>
                            <input type="text" id="booking_id" name="booking_id" class="form-control" readonly>
                        </div>
                        <div class="d-flex align-items-center mt-4">
                            <label for="booking_id" class="form-label me-2" style="width: 250px"><strong>Rent Type
                                    :</strong></label>
                            <input type="text" id="booking_id" name="booking_id" class="form-control" readonly>
                        </div> 
                        <div class="d-flex align-items-center mt-4">
                            <label for="amount" class="form-label me-2" style="width: 250px"><strong>Service Fee:
                                </strong></label>
                            <input type="text" name="amount" class="form-control" id="amount" required>
                        </div>
                        <div class="d-flex align-items-center mt-4">
                            <label for="amount" class="form-label me-2" style="width: 250px"><strong>Nurse Fee:
                                </strong></label>
                            <input type="text" name="amount" class="form-control" id="amount" required>
                        </div>
                        <div class="d-flex align-items-center mt-4">
                            <label for="total" class="form-label me-2" style="width: 250px"><strong>
                                    Total:</strong></label>
                            <input type="text" name="total" id="total" class="form-control" readonly>
                        </div> 
                        <div class="d-flex align-items-center mt-4">
                            <label for="remark" class="form-label me-2" style="width: 250px"><strong>Remark
                                    :</strong></label>
                            <input type="text" name="remark" id="remark" class="form-control">
                        </div>

                    </div> --}}

                </div>
                <table class="table table-sm">
                    <!-- Owner -->
                    <tr>
                        <td><label class="form-control">Owner's Name:</label></td>
                        <td>
                            <select name="owner_id" class="form-control">
                                {{-- @foreach ($owners as $owner)
                                    <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                @endforeach --}}
                            </select>
                        </td>
                    </tr>

                    <!-- Patient -->
                    <tr>
                        <td><label class="form-control">Patient:</label></td>
                        <td>
                            <select name="patient_id" class="form-control">
                                {{-- @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                @endforeach --}}
                            </select>
                        </td>
                    </tr>

                    <!-- NDP -->
                    <tr>
                        <td><label class="form-control">NDP:</label></td>
                        <td>
                            <select id="ndp_id" name="ndp_id" class="form-control">
                                {{-- @foreach ($ndps as $ndp)
                                    <option value="{{ $ndp->id }}" data-duty-id="{{ $ndp->duty_id }}"
                                        data-fee="{{ $ndp->fee }}">
                                        {{ $ndp->description }}
                                    </option>
                                @endforeach --}}
                            </select>
                        </td>
                    </tr>

                    <!-- From Date -->
                    <tr>
                        <td><label class="form-control">From Date</label></td>
                        <td><input required type="date" id="from_date" name="from_date" class="form-control"></td>
                    </tr>

                    <!-- To Date -->
                    <tr>
                        <td><label class="form-control">To Date</label></td>
                        <td><input required type="date" id="to_date" name="to_date" class="form-control"></td>
                    </tr>

                    <!-- Service Fee -->
                    <tr>
                        <td><label class="form-control">Service Fee</label></td>
                        <td><input required type="number" id="service_fee" name="service_fee" class="form-control" readonly></td>
                    </tr>

                    <!-- Nurse Fee (auto-calculated) -->
                    <tr>
                        <td><label class="form-control">Nurse Fee</label></td>
                        <td><input type="number" id="nurse_fee" name="nurse_fee" class="form-control" readonly>
                        </td>
                    </tr>

                    <!-- Total (auto-calculated) -->
                    <tr>
                        <td><label class="form-control">Total</label></td>
                        <td><input type="number" id="total" name="total" class="form-control" readonly>
                        </td>
                    </tr>

                    <!-- Nurse Profit (auto-calculated) -->
                    <tr style="display: none;">
                        <td><label class="form-control">Nurse Profit</label></td>
                        <td><input type="number" id="nurse_profit" name="nurse_profit" class="form-control"
                                readonly></td>
                    </tr>

                    <!-- Company Total (auto-calculated) -->
                    <tr style="display: none;">
                        <td><label class="form-control">Company Total</label></td>
                        <td><input type="number" id="total_income" name="total_income" class="form-control"
                                readonly></td>
                    </tr>

                    <tr>
                        <td><input type="submit" value="Save" class="btn btn-primary btn-sm form-control">
                        </td>
                    </tr>
                </table>



                {{-- <div class="mt-4">
                    <div class="text-center"><button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div> --}}
            </form>
        </div>

    </section>
    {{-- <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paymentSelect = document.getElementById('payment-method-select');
            const qrPhotoContainer = document.getElementById('qr-photo-container');
            const accountNumberContainer = document.getElementById('account-number-container');
            const qrPhotoImg = document.getElementById('qr-photo');
            const accountNumberSpan = document.getElementById('account-number');
            const paymentDetailsRow = document.getElementById('payment-details');
            paymentSelect.addEventListener('change', function() {
                const selectedOption = paymentSelect.options[paymentSelect.selectedIndex];
                const paymentName = selectedOption.getAttribute('data-name');
                const qrPhoto = selectedOption.getAttribute('data-qr_photo');
                const accountNumber = selectedOption.getAttribute('data-account_number');
                if (paymentName === 'Cash') {
                    paymentDetailsRow.style.display = 'block';
                    qrPhotoImg.src = `{{ asset('images/payment_method/images.png') }}`;
                    accountNumberSpan.textContent = 'No Account Number';
                } else {
                    paymentDetailsRow.style.display = 'block';
                    qrPhotoImg.src = qrPhoto ? `{{ asset('images/payment_method/') }}/${qrPhoto}` :
                        `{{ asset('images/payment_method/images.png') }}`;
                    accountNumberSpan.textContent = accountNumber || 'No Account Number';
                    qrPhotoContainer.style.display = qrPhoto ? 'block' : 'none';
                    accountNumberContainer.style.display = accountNumber ? 'block' : 'none';
                }
            });
            paymentSelect.dispatchEvent(new Event('change'));
        });
    </script> --}}
@endsection
