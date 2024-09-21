@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
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
            <div class="col-md-4">
                <div class="card ">
                    <div class="card-header" style="font-weight:bold;">
                        Add New Nurse
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/admin/payment/add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <table class="table table-sm">
                                <tr>
                                    <td><label class="form-control">Booking ID</label></td>
                                    <td>
                                        <select name="booking_id" class="form-control" required>
                                            @foreach($bookings as $booking)
                                            <option value="{{$booking->id}}">
                                                {{ $booking->id }}
                                            </option>
                                            @endforeach;
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Payment Method</label>
                                    </td>
                                    <td>
                                        <select id="payment-method-select" name="payment_method_id" class="form-control" required>
                                            @foreach($payment_methods as $payment_method)
                                            <option value="{{ $payment_method->id }}"
                                                data-name="{{ $payment_method->name }}"
                                                data-qr_photo="{{ $payment_method->qr_photo }}"
                                                data-account_number="{{ $payment_method->account_number }}">
                                                {{ $payment_method->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr id="payment-details" style="display: none;">
                                   <td colspan="2">
                                        <div id="qr-photo-container">
                                            <tr>
                                                <td><label class="form-control">QR Photo:</label></td>
                                                <td> <img id="qr-photo" src="" alt="QR Photo" width="50px" height="50px"></td>
                                            </tr>
                                        </div>
                                        <div id="account-number-container">
                                            <tr>
                                                <td><label class="form-control">Account Number:</label></td>
                                                <td><label class="form-control"><span id="account-number"></span></label></td>
                                            </tr>
                                        </div>
                                    </td>
                                </tr> 
                                <tr>
                                    <td>
                                        <label class="form-control">Amount</label>
                                    </td>
                                    <td>
                                        <input type="text" name="amount" class="form-control" required>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Status</label>
                                    </td>
                                    <td>
                                        <input type="text" name="status" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Remark</label>
                                    </td>
                                    <td>
                                        <input type="text" name="remark" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                    <input type="submit" value="Add" class="btn btn-primary btn-sm form-control">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>

                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header" style="font-weight:bold;">
                        Payment Lists
                    </div>
                    <div class="card-body overflow-auto">
                        <table class="table table-primary table-sm">
                            <tr>
                                <td>ID</td>
                                <td>Booking ID</td>
                                <td>MethodName</td>
                                <td>Amount</td>
                                <td>Delete</td>
                            </tr>
                            @foreach ($payments as $payment)
                                <tr>
                                    <td>{{ $payment->id }}</td>
                                    <td>{{ $payment->booking_id }}</td>
                                    <td>{{ $payment->paymentMethod->name }}</td>
                                    <td>{{ $payment->amount }}</td>
                                    <td>
                                        <a href="{{ url("/admin/payment/del/{$payment->id}")}}" class="btn btn-danger btn-sm"> Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
    const paymentSelect = document.getElementById('payment-method-select');
    const qrPhotoContainer = document.getElementById('qr-photo-container');
    const accountNumberContainer = document.getElementById('account-number-container');
    const qrPhotoImg = document.getElementById('qr-photo');
    const accountNumberSpan = document.getElementById('account-number');
    const paymentDetailsRow = document.getElementById('payment-details');
    paymentSelect.addEventListener('change', function () {
        const selectedOption = paymentSelect.options[paymentSelect.selectedIndex];
        const paymentName = selectedOption.getAttribute('data-name');
        const qrPhoto = selectedOption.getAttribute('data-qr_photo');
        const accountNumber = selectedOption.getAttribute('data-account_number');
        console.log(paymentName, 'paymentName')
        if (paymentName === 'Cash') {
            paymentDetailsRow.style.display = 'block';
            qrPhotoImg.src = `{{ asset('images/payment_method/images.png') }}`;
            accountNumberSpan.textContent = 'No Account Number';
        } else {
            console.log(qrPhoto, 'qrPhoto')
            paymentDetailsRow.style.display = 'block';
            qrPhotoImg.src = qrPhoto ?  `{{ asset('images/payment_method/') }}/${qrPhoto}` : `{{ asset('images/payment_method/images.png') }}`;
            accountNumberSpan.textContent = accountNumber || 'No Account Number';
            qrPhotoContainer.style.display = qrPhoto ? 'block' : 'none';
            accountNumberContainer.style.display = accountNumber ? 'block' : 'none';
        }
    });
    paymentSelect.dispatchEvent(new Event('change'));
});
</script>
@endsection

