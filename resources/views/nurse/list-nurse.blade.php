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
                        Add New Nurse
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/admin/nurse/add') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <table class="table table-sm">
                                <tr>
                                    <td><label class="form-control">Township's Name:</label></td>
                                    <td>
                                        <select name="township_id" class="form-control">
                                            @foreach($townships as $township)
                                            <option value="{{$township->id}}">
                                                {{$township->name}}
                                            </option>
                                            @endforeach;
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Nurse's Name</label>
                                    </td>
                                    <td>
                                        <input type="text" name="name" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Nurse's NRC</label>
                                    </td>
                                    <td>
                                        <input type="text" name="nrc" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Dath Of Birth</label>
                                    </td>
                                    <td>
                                        <input type="text" name="dob" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">RACE</label>
                                    </td>
                                    <td>
                                        <input type="text" name="race" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Religion</label>
                                    </td>
                                    <td>
                                        <input type="text" name="religion" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Maritial Status</label>
                                    </td>
                                    <td>
                                        <input type="text" name="maritial_status" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Height</label>
                                    </td>
                                    <td>
                                        <input type="text" name="height" class="form-control">
                                    </td>
                                </tr><tr>
                                    <td>
                                        <label class="form-control">Weight</label>
                                    </td>
                                    <td>
                                        <input type="text" name="weight" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Academic</label>
                                    </td>
                                    <td>
                                        <input type="text" name="academic" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Certificate</label>
                                    </td>
                                    <td>
                                        <input type="text" name="certificate" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Photo</label>
                                    </td>
                                    <td>
                                        <input type="file" name="photo" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Phone</label>
                                    </td>
                                    <td>
                                        <input type="number" name="phone" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Address</label>
                                    </td>
                                    <td>
                                        <input type="text" name="address" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Member Code</label>
                                    </td>
                                    <td>
                                        <input type="text" name="member_code" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Daily Fee</label>
                                    </td>
                                    <td>
                                        <input type="number" name="daily_fee" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Vip Fee</label>
                                    </td>
                                    <td>
                                        <input type="number" name="vip_fee" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Father Name</label>
                                    </td>
                                    <td>
                                        <input type="text" name="father_name" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Mother Name</label>
                                    </td>
                                    <td>
                                        <input type="text" name="mother_name" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Parent's Phone</label>
                                    </td>
                                    <td>
                                        <input type="number" name="parent_phone" class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Parent Address</label>
                                    </td>
                                    <td>
                                        <input type="text" name="parent_address" class="form-control">
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
                        Nurse Lists
                    </div>
                    <div class="card-body overflow-auto">
                        <table class="table table-primary table-sm">
                            <tr>
                                <td>ID</td>
                                <td>Township</td>
                                <td>Nurse's Name</td>
                                <td>NRC</td>
                                <td>Dath of Birth</td>
                                <td>Race</td>
                                <td>Religion</td>
                                <td>Maritial Status</td>
                                <td>Height</td>
                                <td>Weight</td>
                                <td>Academic</td>
                                <td>Certificate</td>
                                <td>Photo</td>
                                <td>Phone</td>
                                <td>Address</td>
                                <td>Member Code</td>
                                <td>Daily Fee</td>
                                <td>VIP Fee</td>
                                <td>Father Name</td>
                                <td>Mother Name</td>
                                <td>Parent's Phone</td>
                                <td>Parent's Address</td>
                                <td>Delete</td>
                                <td>Update</td>
                            </tr>

                            @foreach ($nurses as $nurse)
                                <tr>
                                    <td>{{ $nurse->id }}</td>
                                    <td>{{ $nurse->township->name }}</td>
                                    <td>{{ $nurse->name }}</td>
                                    <td>{{ $nurse->nrc }}</td>
                                    <td>{{ $nurse->dob }}</td>
                                    <td>{{ $nurse->race }}</td>
                                    <td>{{ $nurse->religion }}</td>
                                    <td>{{ $nurse->maritial_status }}</td>
                                    <td>{{ $nurse->height }}</td>
                                    <td>{{ $nurse->weight }}</td>
                                    <td>{{ $nurse->academic }}</td>
                                    <td>{{ $nurse->certificate }}</td>
                                    <td><img width="50px" height="50px" src="{{asset("images/nurses/$nurse->photo")}}"></td>
                                    <td>{{ $nurse->phone }}</td>
                                    <td>{{ $nurse->address }}</td>
                                    <td>{{ $nurse->member_code }}</td>
                                    <td>{{ $nurse->daily_fee }}</td>
                                    <td>{{ $nurse->vip_fee }}</td>
                                    <td>{{ $nurse->father_name }}</td>
                                    <td>{{ $nurse->mother_name }}</td>
                                    <td>{{ $nurse->parent_phone }}</td>
                                    <td>{{ $nurse->parent_address }}</td>

                                    <td>
                                        <a href="{{ url("/admin/nurse/del/{$nurse->id}") }}"
                                            class="btn btn-danger btn-sm"> Delete</a>
                                    </td>
                                    <td>
                                        <a href="{{ url("/admin/nurse/upd/{$nurse->id}") }}"
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
