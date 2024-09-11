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
					Add New Township					
				</div>
				<div class="card-body">
					<form action="{{url('/admin/township/add')}}" method="post" enctype="multipart/form-data">
					@csrf

					<table class="table table-sm">
						<tr>
							<td>
								<label class="form-control">Township Name</label>
							</td>
							<td>
								<input type="text" name="name" class="form-control">
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
					Township Lists				
				</div>
				<div class="card-body">
					<table class="table table-primary table-sm">
						<tr>
							<td>ID</td>
							<td>Township's Name</td>							
							<td>Delete</td>
							<td>Update</td>
						</tr>

						@foreach($townships as $township)
						<tr>
							<td>{{ $township->id }}</td>
							<td>{{ $township->name }}</td>						
							<td>
								<a href="{{ url("/admin/township/del/{$township->id}")}}" class="btn btn-danger btn-sm"> Delete</a>
							</td>
							<td>
								<a href="{{ url("/admin/township/upd/{$township->id}")}}" class="btn btn-warning btn-sm"> Update</a>
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