@extends('layouts.app')
@section('content')
    <div class="container">
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
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="font-weight:bold;">
                        Edit Booking
                    </div>
                    <div class="card-body">
                        <form action="{{ url("/admin/booking/upd/{$booking->id}") }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <table class="table table-sm">

                                <tr>
                                    <td><label class="form-control">Owner's Name:</label></td>
                                    <td>
                                        <select name="owner_id" class="form-control">
                                            @foreach ($owners as $owner)
                                                <option value="{{ $owner->id }}"
                                                    @if ($owner->id == $booking->owner_id) selected @endif>
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
                                                <option value="{{ $patient->id }}"
                                                    @if ($patient->id == $booking->patient_id) selected @endif>
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
                                                <option value="{{ $ndp->id }}"
                                                    @if ($ndp->id == $booking->ndp_id) selected @endif>
                                                    {{$ndp->nurse->name}} - {{ $ndp->description }}
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
                                        <input type="date" name="from_date" value="{{ $booking->from_date }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">To Date</label>
                                    </td>
                                    <td>
                                        <input type="date" name="to_date" value="{{ $booking->to_date }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Service Fee</label>
                                    </td>
                                    <td>
                                        <input type="number" name="service_fee" value="{{ $booking->service_fee }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Nurse Fee</label>
                                    </td>
                                    <td>
                                        <input type="number" name="nurse_fee" value="{{ $booking->nurse_fee }}"
                                            class="form-control" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Total</label>
                                    </td>
                                    <td>
                                        <input type="number" name="total" value="{{ $booking->total }}"
                                            class="form-control" readonly>
                                    </td>
                                </tr>
                                <tr style="display: none;">
                                    <td>
                                        <label class="form-control">Nurse Profit</label>
                                    </td>
                                    <td>
                                        <input type="number" name="nurse_profit" value="{{ $booking->nurse_profit }}"
                                            class="form-control" readonly>
                                    </td>
                                </tr>
                                <tr style="display: none;">
                                    <td>
                                        <label class="form-control">Company's Total Income</label>
                                    </td>
                                    <td>
                                        <input type="number" name="total_income" value="{{ $booking->total_income }}"
                                            class="form-control" readonly>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <input type="submit" value="Update" class="btn btn-primary btn-sm form-control">
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
