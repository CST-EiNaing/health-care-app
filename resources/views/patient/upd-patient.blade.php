@extends('layouts.app')

@section('content')
<style>
    .card-header
    {
        font-weight:bold;
    }
</style>
<div class="container">
<div class="row justify-content-center">
    @if(session('info'))
    <div class="alert alert-danger">
        {{session('info')}}
    </div>
    @endif
<div class="col-md-5">
        <div class="card">
            <div class="card-header">               
                <span class="float-start">Edit Patient</span>
            </div>
            <div class="card-body">
                <form action="{{ url("/admin/patient/upd/{$patient->id}") }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <table class="table table-sm">
                        <tr>
                            <td>
                                <label class="form-control">Owner's Name</label>
                            </td>
                            <td>
                                 <input type="text" name="owner_id" class="form-control" value="{{ $patient->owner->name }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-control">Township's Name</label>
                            </td>
                            <td>
                                <input type="text" name="township_id" class="form-control" value="{{ $patient->township ? $patient->township->name : '' }}" readonly>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-control">Name</label>
                            </td>
                            <td>
                                <input type="text" name="name" class="form-control" value="{{ $patient->name }}">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">Age</label>
                            </td>
                            <td>
                                <input type="text" name="age" class="form-control" value="{{ $patient->age }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-control">Gender</label>
                            </td>
                            <td>
                                <select name="gender" class="form-control">
                                    <option value="Male" {{ $patient->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                    <option value="Female" {{ $patient->gender == 'Female' ? 'selected' : '' }}>Female</option>
                                       
                                </select>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">Diagnotic</label>
                            </td>
                            <td>
                                <input type="text" name="diagnotic" class="form-control" value="{{ $patient->diagnotic }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-control">Phone</label>
                            </td>
                            <td>
                                <input type="text" name="phone" class="form-control" value="{{ $patient->phone }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-control">Address</label>
                            </td>
                            <td>
                                <input type="text" name="address" class="form-control" value="{{ $patient->address }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label class="form-control">Status</label>
                            </td>
                            <td>
                                <input type="text" name="status" class="form-control" value="{{ $patient->status }}">
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="form-control">Remark</label>
                            </td>
                            <td>
                                <input type="text" name="remark" class="form-control" value="{{ $patient->remark }}">
                            </td>
                        </tr>
                        <tr>
                            <td>
                                 <input type="hidden" name="owner_id" class="form-control" value="{{ $patient->owner_id}}" readonly>
                            </td>
                            <td>
                                <input type="hidden" name="township_id" class="form-control" value="{{ $patient->township_id}}" readonly>
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
</div> <!-- Row -->
</div> <!-- Container -->
@endsection

