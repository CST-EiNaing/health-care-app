@extends('master')

@section('content')
    <section id="appointment" class="appointment section">
        <div class="container section-title" data-aos="fade-up">
            <h2>Filling Payment Info</h2>
            <h4>ကျေးဇူးပြု၍ ငွေပေးချေလိုသည့် ပုံစံအား ရွေးချယ်ပေးပါ။</h4>
        </div>

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <form action="{{ url('/success-payment') }}" method="post" enctype="multipart/form-data" role="form">
                @csrf
                <div class="row d-flex justify-content-center align-items-center">
                    <div class="col-md-8 form-group mt-3 pe-2">
                        <h4 class="text-center mb-5">Payment</h4>

                        <div class="d-flex align-items-center">
                            <label class="form-label me-2" style="width: 250px"><strong>Booking ID:</strong></label>
                            <input type="text" name="booking_id" value="{{ $booking_id }}" class="form-control"
                                readonly>
                        </div>

                        <div class="d-flex align-items-center mt-4">
                            <label class="form-label me-2" style="width: 250px"><strong>Owner's Name:</strong></label>
                            <input type="text" name="owner_name" value="{{ $owner_name }}" class="form-control"
                                readonly>
                        </div>

                        <div class="d-flex align-items-center mt-4">
                            <label class="form-label me-2" style="width: 250px"><strong>Payment Method:</strong></label>
                            <select id="payment-method-select" name="payment_method_id" class="form-control" required>
                                @foreach ($payment_methods as $payment_method)
                                    <option value="{{ $payment_method->id }}"
                                        data-qr="{{ $payment_method->qr_photo ? asset('images/payment_method/' . $payment_method->qr_photo) : asset('images/payment_method/images.png') }}"
                                        data-account="{{ $payment_method->account_number }}">
                                        {{ $payment_method->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div id="payment-details" style="display: none;">
                            <div class="d-flex align-items-center mt-4" id="qr-photo-container">
                                <label class="form-label me-2" style="width: 250px"><strong>QR Code:</strong></label>
                                <img id="qr-photo" src="" alt="QR Photo" width="300" height="350">
                            </div>

                            <div class="d-flex align-items-center mt-4" id="account-number-container">
                                <label class="form-label me-2" style="width: 250px"><strong>Account Number:</strong></label>
                                <label class="form-control" id="account-number"></label>
                            </div>
                        </div>

                        <div class="d-flex align-items-center mt-4">
                            <label class="form-label me-2" style="width: 250px"><strong>Total Amount:</strong></label>
                            <input type="text" name="amount" value="{{ $total }}" class="form-control" readonly>
                        </div>

                        <div class="d-flex align-items-center mt-4">
                            <label class="form-label me-2" style="width: 250px"><strong>Remark:</strong></label>
                            <input type="text" name="remark" class="form-control" placeholder="Remark">
                        </div>
                    </div>
                </div>

                <div class="mt-4 text-center"><button type="submit" class="btn btn-primary">Confirm Payment</button></div>
            </form>
        </div>
    </section>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const paymentSelect = document.getElementById('payment-method-select');
            const qrPhoto = document.getElementById('qr-photo');
            const accountNumber = document.getElementById('account-number');
            const paymentDetails = document.getElementById('payment-details');

            paymentSelect.addEventListener('change', function() {
                const selectedOption = paymentSelect.options[paymentSelect.selectedIndex];
                const qrUrl = selectedOption.getAttribute('data-qr');
                const account = selectedOption.getAttribute('data-account');

                qrPhoto.src = qrUrl;
                accountNumber.textContent = account || 'No Account Number';
                paymentDetails.style.display = 'block';
            });
            paymentSelect.dispatchEvent(new Event('change'));
        });
    </script>
@endsection
