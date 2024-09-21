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
                        Add New Patient
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/admin/patient/add') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <table class="table table-sm">
                                <tr>
                                    <td>
                                        <label class="form-control">Owner Name</label>
                                    </td>
                                    <td>
                                        <select name="owner_id" class="form-control" id="owner_id">
                                            @foreach ($owners as $owner)
                                                <option value="{{ $owner->id }}">
                                                    {{ $owner->name }} ({{ $owner->nrc }})
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Township Name</label>
                                    </td>
                                    <td>
                                        <select name="township_id" class="form-control" id="township_id">
                                            @foreach ($townships as $township)
                                                <option value="{{ $township->id }}">
                                                    {{ $township->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Name</label>
                                    </td>
                                    <td>
                                        <input required type="text" name="name" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Age</label>
                                    </td>
                                    <td>
                                        <input required type="text" name="age" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control col-form-label">Gender</label>
                                    </td>
                                    <td>
                                        <select id="gender" class="form-select @error('type') is-invalid @enderror"
                                            name="gender">
                                            <option value="Male">Male</option>
                                            <option value="Female">Female</option>

                                        </select>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Diagnotic</label>
                                    </td>
                                    <td>
                                        <input required type="text" name="diagnotic" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Phone</label>
                                    </td>
                                    <td>
                                        <input required type="text" name="phone" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Address</label>
                                    </td>
                                    <td>
                                        <input required type="text" name="address" class="form-control">
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
                        Patient Lists
                    </div>
                    <div class="card-body">
                        <table class="table table-primary table-sm">
                            <tr>
                                <td>ID</td>
                                <td>Owner's Name</td>
                                <td>Township's Name</td>
                                <td>Patient's Name</td>
                                <td>Age</td>
                                <td>Gender</td>
                                <td>Diagnotic</td>
                                <td>Phone</td>
                                <td>Address</td>
                                <td>Status</td>
                                <td>Remark</td>
                                <td>Delete</td>
                                <td>Update</td>
                            </tr>

                            @foreach ($patients as $patient)
                                <tr>
                                    <td>{{ $patient->id }}</td>
                                    <td> {{ $patient->owner->name }}</td>
                                    <td>{{ $patient->township ? $patient->township->name : 'N/A' }}</td>
                                    <td>{{ $patient->name }}</td>
                                    <td>{{ $patient->age }}</td>
                                    <td>{{ $patient->gender }}</td>
                                    <td>{{ $patient->diagnotic }}</td>
                                    <td>{{ $patient->phone }}</td>
                                    <td>{{ $patient->address }}</td>
                                    <td>{{ $patient->status }}</td>
                                    <td>{{ $patient->remark }}</td>
                                    <td>
                                        <a href="{{ url("/admin/patient/del/{$patient->id}") }}"
                                            class="btn btn-danger btn-sm"> Delete</a>
                                    </td>
                                    <td>
                                        <a href="{{ url("/admin/patient/upd/{$patient->id}") }}"
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
