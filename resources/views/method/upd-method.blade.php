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
                        Edit Payment Method
                    </div>
                    <div class="card-body">
                        <form action="{{ url("/admin/method/upd/{$method->id}") }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <table class="table table-sm">
                                <tr>
                                    <td>
                                        <label class="form-control">Name</label>
                                    </td>
                                    <td>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $method->name }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="form-control">OldPhoto:</label></td>
                                    <td>
                                        <img width="50px" height="50px"
                                            src="{{ asset("images/payment_method/$method->qr_photo") }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="form-control">NewPhoto:</label></td>
                                    <td><input class="form-control" type="file" name="qr_photo"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Account Number</label>
                                    </td>
                                    <td>
                                        <input type="text" name="account_number" class="form-control"
                                            value="{{ $method->account_number }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Status</label>
                                    </td>
                                    <td>
                                        <input type="text" name="status" class="form-control"
                                            value="{{ $method->status }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Remark</label>
                                    </td>
                                    <td>
                                        <input type="text" name="remark" class="form-control"
                                            value="{{ $method->remark }}">
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
