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
                        Edit NDP
                    </div>
                    <div class="card-body">
                        <form action="{{ url("/admin/ndp/upd/{$ndp->id}") }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <table class="table table-sm">

                                <tr>
                                    <td>
                                        <label class="form-control">Nurse's Name</label>
                                    </td>
                                    <td>
                                        <select name="nurse_id" class=" form-control">
                                            @foreach ($nurses as $nurse)
                                                <option value="{{ $nurse->id }}"
                                                    @if ($nurse->id == $ndp->nurse_id) selected @endif>
                                                    {{ $nurse->name }}
                                                </option>
                                            @endforeach;
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Duty's Name</label>
                                    </td>
                                    <td>
                                        <select name="duty_id" class=" form-control" id="">
                                            @foreach ($duties as $duty)
                                                <option value="{{ $duty->id }}"
                                                    @if ($duty->id == $ndp->duty_id) selected @endif>
                                                    {{ $duty->name }}
                                                </option>
                                            @endforeach;
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Position's Name</label>
                                    </td>
                                    <td>
                                        <select name="position_id" class=" form-control" id="">
                                            @foreach ($positions as $position)
                                                <option value="{{ $position->id }}"
                                                    @if ($position->id == $ndp->position_id) selected @endif>
                                                    {{ $position->name }}
                                                </option>
                                            @endforeach;
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Description</label>
                                    </td>
                                    <td>
                                        <input type="text" name="description" value="{{ $ndp->description }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Fee</label>
                                    </td>
                                    <td>
                                        <input type="number" name="fee" value="{{ $ndp->fee }}"
                                            class="form-control">
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
