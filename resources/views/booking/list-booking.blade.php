@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <!-- Success and Error Messages -->
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

            <!-- Add New Booking Form -->
            <div class="col-md-4">
                <div class="card ">
                    <div class="card-header" style="font-weight:bold;">
                        Add New Booking
                    </div>
                    <div class="card-body">
                        <form id="booking-form" action="{{ url('/admin/booking/add') }}" method="post">
                            @csrf

                            <table class="table table-sm">
                                <!-- Owner -->
                                <tr>
                                    <td><label class="form-control">Owner's Name:</label></td>
                                    <td>
                                        <select name="owner_id" class="form-control">
                                            @foreach ($owners as $owner)
                                                <option value="{{ $owner->id }}">{{ $owner->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <!-- Patient -->
                                <tr>
                                    <td><label class="form-control">Patient:</label></td>
                                    <td>
                                        <select name="patient_id" class="form-control">
                                            @foreach ($patients as $patient)
                                                <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <!-- NDP -->
                                <tr>
                                    <td><label class="form-control">NDP:</label></td>
                                    <td>
                                        <select id="ndp_id" name="ndp_id" class="form-control">
                                            @foreach ($ndps as $ndp)
                                                <option value="{{ $ndp->id }}" data-duty-id="{{ $ndp->duty_id }}"
                                                    data-fee="{{ $ndp->fee }}">
                                                    {{ $ndp->nurse ? $ndp->nurse->name : 'Unknown' }} - {{ $ndp->description }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>

                                <!-- From Date -->
                                <tr>
                                    <td><label class="form-control">From Date</label></td>
                                    <td><input required type="date" id="from_date" name="from_date" class="form-control">
                                    </td>
                                </tr>

                                <!-- To Date -->
                                <tr>
                                    <td><label class="form-control">To Date</label></td>
                                    <td><input required type="date" id="to_date" name="to_date" class="form-control">
                                    </td>
                                </tr>

                                <!-- Service Fee -->
                                <tr>
                                    <td><label class="form-control">Service Fee</label></td>
                                    <td><input required type="number" id="service_fee" name="service_fee"
                                            class="form-control" readonly></td>
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
                                    <td><input type="submit" value="Add" class="btn btn-primary btn-sm form-control">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Booking List -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header textwh" style="font-weight:bold;">Booking Lists</div>
                    <div class="card-body">
                        <table class="table table-primary table-sm">
                            <tr>
                                <td>ID</td>
                                <td>Owner's Name</td>
                                <td>Patient's Name</td>
                                <td>NDP's Name</td>
                                <td>From Date</td>
                                <td>To Date</td>
                                <td>Service Fee</td>
                                <td>Nurse Fee</td>
                                <td>Total</td>
                                <td>Nurse profit</td>
                                <td>Total income</td>
                                <td>Delete</td>
                                <td>Update</td>
                            </tr>
                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->owner ? $booking->owner->name : 'Unknown' }}</td>
                                    <td>{{ $booking->patient ? $booking->patient->name : 'Unknown' }}</td>
                                    <td> {{ $booking->ndp->nurse ? $booking->ndp->nurse->name : 'Unknown' }}<br>
                                        {{ $booking->ndp->description }}</td>
                                    <td>{{ $booking->from_date }}</td>
                                    <td>{{ $booking->to_date }}</td>
                                    <td>{{ $booking->service_fee }}</td>
                                    <td>{{ $booking->nurse_fee }}</td>
                                    <td>{{ $booking->total }}</td>
                                    <td>{{ $booking->nurse_profit }}</td>
                                    <td>{{ $booking->total_income }}</td>
                                    <td><a href="{{ url("/admin/booking/del/{$booking->id}") }}"
                                            class="btn btn-danger btn-sm">Delete</a></td>
                                    <td><a href="{{ url("/admin/booking/upd/{$booking->id}") }}"
                                            class="btn btn-warning btn-sm">Update</a></td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="7" class="text-end"><strong>Totals:</strong></td>
                                <td><strong>{{ $totalNurseFee }}</strong></td>
                                <td><strong>{{ $totalAmount }}</strong></td>
                                <td><strong>{{ $totalNurseProfit }}</strong></td>
                                <td><strong>{{ $totalIncome }}</strong></td>
                                <td colspan="2"></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#booking-form').on('input', function() {
                const fromDate = $('#from_date').val();
                const toDate = $('#to_date').val();
                const ndp = $('#ndp_id option:selected');
                const dutyId = ndp.data('duty-id');
                const fee = parseFloat(ndp.data('fee'));
                const duties = @json($duties);
                if (fromDate && toDate && !isNaN(fee)) {
                    dutyData = duties.find(duty => duty.id === dutyId);
                    const start = new Date(fromDate);
                    const end = new Date(toDate);
                    let nurseFee = 0;
                    // Calculate nurseFee based on dutyId
                    if (dutyId == 1) { // Daily Rate
                        const days = (end - start) / (1000 * 60 * 60 * 24) + 1;
                        nurseFee = days * fee;
                    } else if (dutyId == 2) { // Monthly Rate
                        const months = (end.getMonth() - start.getMonth() + (12 * (end.getFullYear() - start
                            .getFullYear())));
                        nurseFee = months * fee;
                    }
                    // Updated nurse_profit logic based on dutyId
                    let nurseProfit;
                    if (dutyId == 1) {
                        nurseProfit = parseFloat(fee); // Set nurse_profit to the value of fee
                    } else {
                        nurseProfit = nurseFee * 0.5; // Default to 50% of nurseFee
                    }
                    const dutyFee = dutyData?.fee;
                    const total = dutyFee + nurseFee;
                    const totalIncome = dutyFee + nurseProfit;
                    $('#nurse_fee').val(nurseFee);
                    $('#total').val(total);
                    $('#nurse_profit').val(nurseProfit);
                    $('#total_income').val(totalIncome);
                    $('#service_fee').val(dutyFee);
                }
            });
        });
    </script>
@endsection
