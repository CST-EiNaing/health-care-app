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
                        Add New Booking
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/admin/booking/add') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <table class="table table-sm">
                                <tr>
                                    <td><label class="form-control">Owner's Name:</label></td>
                                    <td>
                                        <select name="owner_id" class="form-control">
                                            @foreach ($owners as $owner)
                                                <option value="{{ $owner->id }}">
                                                    {{ $owner->name }}
                                                </option>
                                            @endforeach;
                                        </select>
                                    </td>

                                </tr>
                                <tr>
                                    <td><label class=" form-control">Patient:</label></td>
                                    <td>
                                        <select name="patient_id" class=" form-control" id="">
                                            @foreach ($patients as $patient)
                                                <option value="{{ $patient->id }}">
                                                    {{ $patient->name }}
                                                </option>
                                            @endforeach;
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class=" form-control">NDP:</label></td>
                                    <td>

                                        <select name="ndp_id" class=" form-control" id="">
                                            @foreach ($ndps as $ndp)
                                                {{ $ndp->id }}
                                                <option value="{{ $ndp->id }}">
                                                    {{ $ndp->id }}
                                                </option>
                                            @endforeach;
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">From Date</label>
                                    </td>
                                    <td>
                                        <input type="date" name="from_date" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">To Date</label>
                                    </td>
                                    <td>
                                        <input type="date" name="to_date" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Service Fee</label>
                                    </td>
                                    <td>
                                        <input type="number" name="service_fee" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Nurse Fee</label>
                                    </td>
                                    <td>
                                        <input type="number" name="nurse_fee" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Total</label>
                                    </td>
                                    <td>
                                        <input type="number" name="total" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Nurse Profit</label>
                                    </td>
                                    <td>
                                        <input type="number" name="nurse_profit" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Company's Total Income</label>
                                    </td>
                                    <td>
                                        <input type="number" name="company_total" class="form-control">
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
                        Township Lists
                    </div>
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
                                <td>Nurse Profit</td>
                                <td>Company Total</td>
                                <td>Delete</td>
                                <td>Update</td>
                            </tr>

                            @foreach ($bookings as $booking)
                                <tr>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->owner->name }}</td>
                                    <td>{{ $booking->patient->name }}</td>
                                    <td>{{ $booking->ndp->nurse_name }}</td>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->id }}</td>
                                    <td>{{ $booking->name }}</td>
                                    <td>
                                        <a href="{{ url("/admin/booking/del/{$booking->id}") }}"
                                            class="btn btn-danger btn-sm"> Delete</a>
                                    </td>
                                    <td>
                                        <a href="{{ url("/admin/booking/upd/{$booking->id}") }}"
                                            class="btn btn-warning btn-sm"> Update</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>
@endsection
