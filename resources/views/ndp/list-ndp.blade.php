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
                        Add New NDP
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/admin/ndp/add') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <table class="table table-sm">
                                <tr>
                                    <td><label class="form-control">Nurse's Name:</label></td>
                                    <td>
                                        <select name="nurse_id" class="form-control">
                                            @foreach($nurses as $nurse)
                                            <option value="{{$nurse->id}}">
                                                {{$nurse->name}}
                                            </option>
                                            @endforeach;
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class=" form-control">Duty:</label></td>
                                    <td>
                                        <select name="duty_id" class=" form-control" id="">
                                            @foreach($duties as $duty)
                                            <option value="{{$duty->id}}">
                                                {{$duty->name}}
                                            </option>
                                            @endforeach;
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class=" form-control">Position:</label></td>
                                    <td>
                                        <select name="position_id" class=" form-control" id="">
                                            @foreach($positions as $position)
                                            <option value="{{$position->id}}">
                                                {{$position->name}}
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
                                        <input type="text" name="description" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Fee</label>
                                    </td>
                                    <td>
                                        <input type="number" name="fee" class="form-control">
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
                        NDP Lists
                    </div>
                    <div class="card-body">
                        <table class="table table-primary table-sm">
                            <tr>
                                <td>ID</td>
                                <td>Nurse's Name</td>
                                <td>Duty's Name</td>
                                <td>Position's Name</td>
                                <td>Description</td>
                                <td>Fee</td>
                                <td>Delete</td>
                                <td>Update</td>
                            </tr>

                            @foreach ($ndps as $ndp)
                                <tr>
                                    <td>{{ $ndp->id }}</td>
                                    <td>{{ $ndp->nurse->name }}</td>
                                    <td>{{ $ndp->duty->name }}</td>
                                    <td>{{ $ndp->position->name }}</td>
                                    <td>{{ $ndp->description }}</td>
                                    <td>{{ $ndp->fee }}</td>
                                    <td>
                                        <a href="{{ url("/admin/ndp/del/{$ndp->id}") }}"
                                            class="btn btn-danger btn-sm"> Delete</a>
                                    </td>
                                    <td>
                                        <a href="{{ url("/admin/ndp/upd/{$ndp->id}") }}"
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
