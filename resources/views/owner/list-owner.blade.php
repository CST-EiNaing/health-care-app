@extends('layouts.app')
@section ('content')

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
				<div class="card-header"  style="font-weight:bold;">
					Add New Owner					
				</div>
				<div class="card-body">
					<form action="{{url('/admin/owner/add')}}" method="post" enctype="multipart/form-data">
					@csrf

					<table class="table table-sm">
						<tr>
							<td>
								<label class="form-control">Owner's Name</label>
							</td>
							<td>
								<input type="text" name="name" class="form-control">
							</td>
						</tr>
						<tr>
							<td>
								<label class="form-control">NRC</label>
							</td>
							<td>
								<input type="text" name="nrc" class="form-control">
							</td>
						</tr>
						<tr>
							<td>
								<label class="form-control">Father's Name</label>
							</td>
							<td>
								<input type="text" name="father_name" class="form-control">
							</td>
						</tr>
						<tr>
							<td>
								<label class="form-control">Patient Relative</label>
							</td>
							<td>
								<input type="text" name="patient_relative" class="form-control">
							</td>
						</tr>
						<tr>
							<td>
								<label class="form-control">Phone</label>
							</td>
							<td>
								<input type="text" name="phone" class="form-control">
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
					Owner Lists				
				</div>
				<div class="card-body">
					<table class="table table-primary table-sm">
						<tr>
							<td>ID</td>
							<td>Owner's Name</td>							
							<td>NRC</td>							
							<td>Father's Name</td>							
							<td>Patient  Relative</td>							
							<td>Phone</td>							
							<td>Address</td>							
							<td>Remark</td>							
							<td>Delete</td>
							<td>Update</td>
						</tr>

						@foreach($owners as $owner)
						<tr>
							<td>{{ $owner->id }}</td>
							<td>{{ $owner->name }}</td>						
							<td>{{ $owner->nrc }}</td>						
							<td>{{ $owner->father_name }}</td>						
							<td>{{ $owner->patient_relative }}</td>						
							<td>{{ $owner->phone }}</td>						
							<td>{{ $owner->address }}</td>						
							<td>{{ $owner->remark }}</td>						
							<td>
								<a href="{{ url("/admin/owner/del/{$owner->id}")}}" class="btn btn-danger btn-sm"> Delete</a>
							</td>
							<td>
								<a href="{{ url("/admin/owner/upd/{$owner->id}")}}" class="btn btn-warning btn-sm"> Update</a>
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