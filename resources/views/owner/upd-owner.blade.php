@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            @if (session('info'))
                <div class="alert alert-danger">
                    {{ session('info') }}
                </div>
            @endif
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header" style="">
                        Edit OwnerInfo
                    </div>
                    <div class="card-body">
                        <form action="{{ url("/admin/owner/update/{$owner->id}") }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <table class="table table-sm">

                                <tr>
                                    <td>
                                        <label class="form-control">Name</label>
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
                                        <label class="form-control">Father Name</label>
                                    </td>
                                    <td>
                                        <input type="text" name="father_name" class="form-control"
                                            value="{{ $owner->father_name }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Patient Name</label>
                                    </td>
                                    <td>
                                        <input type="text" name="patient_relative" class="form-control"
                                            value="{{ $owner->patient_relative }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Phone Number</label>
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
