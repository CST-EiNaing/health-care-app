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
                    <div class="card-header" style="">
                        Edit Owner
                    </div>
                    <div class="card-body">
                        <form action="{{ url("/admin/owner/upd/{$owner->id}") }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <table class="table table-sm">

                                <tr>
                                    <td>
                                        <label class="form-control">Owner's Name</label>
                                    </td>
                                    <td>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $owner->name }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">NRC</label>
                                    </td>
                                    <td>
                                        <input type="text" name="nrc" class="form-control"
                                            value="{{ $owner->nrc }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Father's Name</label>
                                    </td>
                                    <td>
                                        <input type="text" name="father_name" class="form-control"
                                            value="{{ $owner->father_name }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Patient Relative</label>
                                    </td>
                                    <td>
                                        <input type="text" name="patient_relative" class="form-control"
                                            value="{{ $owner->patient_relative }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Phone</label>
                                    </td>
                                    <td>
                                        <input type="text" name="phone" class="form-control"
                                            value="{{ $owner->phone }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Address</label>
                                    </td>
                                    <td>
                                        <input type="text" name="address" class="form-control"
                                            value="{{ $owner->address }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Remark</label>
                                    </td>
                                    <td>
                                        <input type="text" name="remark" class="form-control"
                                            value="{{ $owner->remark }}">
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
