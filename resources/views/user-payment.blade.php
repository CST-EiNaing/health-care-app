@extends('master')

@section('content')
<section id="appointment" class="appointment section">

    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Filling Payment Info</h2>
        <h4>ကျေးဇူးပြု၍ ငွေပေးချေလိုသည့် ပုံစံအား ရွေးချယ်ပေးပါ။</h4>
    </div><!-- End Section Title -->

    <div class="container" data-aos="fade-up" data-aos-delay="100">
        <form action="{{ url('/success-payment') }}" method="post" enctype="multipart/form-data" role="form">
            @csrf
            <div class="row d-flex justify-content-center align-items-center">

                <div class="col-md-8 form-group mt-3 pe-2">
                    <h4 class=" text-center mb-5">Payment</h4>
                    
                    <!-- Booking ID -->
                    <div class="d-flex align-items-center">
                        <label for="booking_id" class="form-label me-2" style="width: 250px"><strong>Booking ID:</strong></label>
                        <input type="text" id="booking_id" name="booking_id" value="{{ $booking_id }}" class="form-control" readonly>
                    </div>

                    <!-- Owner's Name -->
                    <div class="d-flex align-items-center mt-4">
                        <label for="owner_name" class="form-label me-2" style="width: 250px"><strong>Owner's Name:</strong></label>
                        <input type="text" name="owner_name" id="owner_name" value="{{$owner_name}}" class="form-control" readonly>
                    </div>

                    <!-- Payment Method -->
                    <div class="d-flex align-items-center mt-4">
                        <label for="payment-method-select" class="form-label me-2" style="width: 250px"><strong>Payment Method:</strong></label>
                        <select id="payment-method-select" name="payment_method_id" class="form-control" required>
                            @foreach ($payment_methods as $payment_method)
                                <option value="{{ $payment_method->id }}" data-name="{{ $payment_method->name }}"
                                        data-qr_photo="{{ $payment_method->qr_photo }}"
                                        data-account_number="{{ $payment_method->account_number }}">
                                    {{ $payment_method->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div id="payment-details" class="payment-details" style="display: none;">
                        <div class="d-flex align-items-center mt-4" id="qr-photo-container">
                            <label for="qr-photo" class="form-label me-2" style="width: 250px"><strong>QR Code:</strong></label>
                            <img id="qr-photo" src="" alt="QR Photo" width="300px" height="350px">
                        </div>

                        <div class="d-flex align-items-center mt-4" id="account-number-container">
                            <label for="account-number" class="form-label me-2" style="width: 250px"><strong>Account Number:</strong></label>
                            <label class="form-control"><span id="account-number"></span></label>
                        </div>
                    </div>

                    <!-- Total Amount -->
                    <div class="d-flex align-items-center mt-4">
                        <label for="total" class="form-label me-2" style="width: 250px"><strong>Total Amount:</strong></label>
                        <input type="text" name="amount" id="total" value="{{ $total }}" class="form-control" readonly>
                    </div>

                    <!-- Amount to Pay -->
                    {{-- <div class="d-flex align-items-center mt-4">
                        <label for="amount" class="form-label me-2" style="width: 250px"><strong>Amount To Pay: <span style="color: red">*</span></strong></label>
                        <input type="text" name="amount" class="form-control" id="amount" required>
                    </div> --}}

                    <!-- Remarks -->
                    <div class="d-flex align-items-center mt-4">
                        <label for="remark" class="form-label me-2" style="width: 250px"><strong>Transition Number:</strong></label>
                        <input type="text" name="remark" id="remark" class="form-control">
                    </div>
                </div>

            </div>

            <div class="mt-4">
                <div class="text-center"><button type="submit" class="btn btn-primary">Confirm Payment</button></div>
            </div>
        </form>
    </div>

</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const paymentSelect = document.getElementById('payment-method-select');
        const qrPhotoContainer = document.getElementById('qr-photo-container');
        const accountNumberContainer = document.getElementById('account-number-container');
        const qrPhotoImg = document.getElementById('qr-photo');
        const accountNumberSpan = document.getElementById('account-number');
        const paymentDetailsRow = document.getElementById('payment-details');
        const remarkInput = document.getElementById('remark');

        paymentSelect.addEventListener('change', function() {
            const selectedOption = paymentSelect.options[paymentSelect.selectedIndex];
            const paymentName = selectedOption.getAttribute('data-name');
            const qrPhoto = selectedOption.getAttribute('data-qr_photo');
            const accountNumber = selectedOption.getAttribute('data-account_number');

            if (paymentName === 'Cash') {
                paymentDetailsRow.style.display = 'block';
                qrPhotoImg.src = `{{ asset('images/payment_method/images.png') }}`;
                accountNumberSpan.textContent = 'No Account Number';
                remarkInput.removeAttribute('required');
            } else {
                paymentDetailsRow.style.display = 'block';
                qrPhotoImg.src = qrPhoto ? `{{ asset('images/payment_method/') }}/${qrPhoto}` :
                    `{{ asset('images/payment_method/images.png') }}`;
                accountNumberSpan.textContent = accountNumber || 'No Account Number';
                qrPhotoContainer.style.display = qrPhoto ? 'block' : 'none';
                accountNumberContainer.style.display = accountNumber ? 'block' : 'none';
                remarkInput.setAttribute('required', 'required');
            }
        });

        paymentSelect.dispatchEvent(new Event('change'));
    });
</script>
@endsection
