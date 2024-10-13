@extends('master')

@section('content')
    <section id="appointment" class="appointment section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Filling Payment Info</h2>
            <h4>အချက်အလက်များအား မှန်ကန်စွာ ဖြည့်ပေးပါ။</h4>
        </div><!-- End Section Title -->

        <div class="container" data-aos="fade-up" data-aos-delay="100">
            <form action="{{ url('/') }}" method="post" enctype="multipart/form-data" role="form">
                @csrf
                <div class="row d-flex justify-content-center align-items-center">

                    <div class="col-md-8 form-group mt-3 pe-2">
                        <h4 class=" text-center mb-5">Payment</h4>
                        <div class="d-flex align-items-center ">
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
                            <label for="father_name" class="form-label me-2" style="width: 250px"><strong>Payment Method
                                    :</strong></label>
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
                                <label for="qr-photo" class="form-label me-2" style="width: 250px"><strong>QR Code
                                        :</strong></label>
                                        <img id="qr-photo" src="" alt="QR Photo"
                                        width="300px" height="350px">
                            </div>


                            <div class="d-flex align-items-center mt-4" id="account-number-container">
                                <label for="account-number" class="form-label me-2" style="width: 250px"><strong>Account
                                        Number
                                        :</strong></label>
                                {{-- <input style="color: black;" name="account-number" id="account-number" class="form-control"
                                    readonly> --}}
                                <label class="form-control"><span id="account-number"></span></label>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-4">
                            <label for="total" class="form-label me-2" style="width: 250px"><strong>
                                    Total:</strong></label>
                            <input type="text" name="total" id="total" class="form-control" readonly>
                        </div>

                        <div class="d-flex align-items-center mt-4">
                            <label for="amount" class="form-label me-2" style="width: 250px"><strong>Amount: <span
                                        style="color: red">*</span>
                                </strong></label>
                            <input type="text" name="amount" class="form-control" id="amount" required>
                        </div>




                        <div class="d-flex align-items-center mt-4">
                            <label for="remark" class="form-label me-2" style="width: 250px"><strong>Remark
                                    :</strong></label>
                            <input type="text" name="remark" id="remark" class="form-control" placeholder="remark">
                        </div>

                    </div>

                </div>



                <div class="mt-4">
                    <div class="text-center"><button type="submit" class="btn btn-primary">Save</button>
                    </div>
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
    </script>
@endsection
