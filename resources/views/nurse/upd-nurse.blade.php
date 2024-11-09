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
                        Edit Nurse
                    </div>
                    <div class="card-body">
                        <form action="{{ url("/admin/nurse/upd/{$nurse->id}") }}" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <table class="table table-sm">
                                <tr>
                                    <td><label class="form-control">Township's Name:</label></td>
                                    <td>
                                        <select name="township_id" class="form-control">
                                            @foreach ($townships as $township)
                                                <option value="{{ $township->id }}"
                                                    @if ($township->id == $nurse->township_id) selected @endif>
                                                    {{ $township->name }}
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
                                        <input type="text" name="name" value="{{ $nurse->name }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Nurse's NRC</label>
                                    </td>
                                    <td>
                                        <input type="text" name="nrc" value="{{ $nurse->nrc }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Dath Of Birth</label>
                                    </td>
                                    <td>
                                        <input type="text" name="dob" value="{{ $nurse->dob }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">RACE</label>
                                    </td>
                                    <td>
                                        <input type="text" name="race" value="{{ $nurse->race }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Religion</label>
                                    </td>
                                    <td>
                                        <input type="text" name="religion" value="{{ $nurse->religion }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Maritial Status</label>
                                    </td>
                                    <td>
                                        <input type="text" name="maritial_status" value="{{ $nurse->maritial_status }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Height</label>
                                    </td>
                                    <td>
                                        <input type="text" name="height" value="{{ $nurse->height }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Weight</label>
                                    </td>
                                    <td>
                                        <input type="text" name="weight" value="{{ $nurse->weight }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Academic</label>
                                    </td>
                                    <td>
                                        <input type="text" name="academic" value="{{ $nurse->academic }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Certificate</label>
                                    </td>
                                    <td>
                                        <input type="text" name="certificate" value="{{ $nurse->certificate }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td><label class="form-control">OldPhoto:</label></td>
                                    <td>
                                        <img width="50px" height="50px" src="{{ asset("images/nurse/$nurse->photo") }}">
                                    </td>
                                </tr>

                                <tr>
                                    <td><label class="form-control">NewPhoto:</label></td>
                                    <td><input class="form-control" type="file" name="photo"></td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Phone</label>
                                    </td>
                                    <td>
                                        <input type="number" name="phone" value="{{ $nurse->phone }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Address</label>
                                    </td>
                                    <td>
                                        <input type="text" name="address" value="{{ $nurse->address }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Member Code</label>
                                    </td>
                                    <td>
                                        <input type="text" name="member_code" value="{{ $nurse->member_code }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Daily Fee</label>
                                    </td>
                                    <td>
                                        <input type="number" name="daily_fee" value="{{ $nurse->daily_fee }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Vip Fee</label>
                                    </td>
                                    <td>
                                        <input type="number" name="vip_fee" value="{{ $nurse->vip_fee }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Father Name</label>
                                    </td>
                                    <td>
                                        <input type="text" name="father_name" value="{{ $nurse->father_name }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Mother Name</label>
                                    </td>
                                    <td>
                                        <input type="text" name="mother_name" value="{{ $nurse->mother_name }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Parent's Phone</label>
                                    </td>
                                    <td>
                                        <input type="number" name="parent_phone" value="{{ $nurse->parent_phone }}"
                                            class="form-control">
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <label class="form-control">Parent Address</label>
                                    </td>
                                    <td>
                                        <input type="text" name="parent_address" value="{{ $nurse->parent_address }}"
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
