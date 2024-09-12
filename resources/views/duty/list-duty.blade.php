@extends('layouts.app')
@section ('content')

<div class="container-fluid">
	<div class="row justify-content-center">
		@if(session('info'))
		<div class="alert alert-danger">
			{{session('info')}}
		</div>
		@endif
		<div class="col-md-4">
			<div class="card ">
				<div class="card-header"  style="font-weight:bold;">
					Add New Duty					
				</div>
				<div class="card-body">
					<form action="{{url('/admin/duty/add')}}" method="post" enctype="multipart/form-data">
					@csrf

					<table class="table table-sm">
						<tr>
							<td>
								<label class="form-control">Duty Name</label>
							</td>
							<td>
								<input type="text" name="name" class="form-control">
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
					Duties Lists				
				</div>
				<div class="card-body">
					<table class="table table-primary table-sm">
						<tr>
							<td>ID</td>
							<td>Duty's Name</td>							
							<td>Duty's Fee</td>							
							<td>Delete</td>
							<td>Update</td>
						</tr>

						@foreach($duties as $duty)
						<tr>
							<td>{{ $duty->id }}</td>
							<td>{{ $duty->name }}</td>						
							<td>{{ $duty->fee }}</td>						
							<td>
								<a href="{{ url("/admin/duty/del/{$duty->id}")}}" class="btn btn-danger btn-sm"> Delete</a>
							</td>
							<td>
								<a href="{{ url("/admin/duty/upd/{$duty->id}")}}" class="btn btn-warning btn-sm"> Update</a>
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