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
                        Edit Duty
                    </div>
                    <div class="card-body">
                        <form action="{{ url("/admin/duty/upd/{$duty->id}") }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <table class="table table-sm">

                                <tr>
                                    <td>
                                        <label class="form-control">Name</label>
                                    </td>
                                    <td>
                                        <input type="text" name="name" class="form-control"
                                            value="{{ $duty->name }}">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Fee</label>
                                    </td>
                                    <td>
                                        <input type="number" name="fee" class="form-control"
                                            value="{{ $duty->fee }}">
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
