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
					Add New Position					
				</div>
				<div class="card-body">
					<form action="{{url('/admin/position/add')}}" method="post" enctype="multipart/form-data">
					@csrf

					<table class="table table-sm">
						<tr>
							<td>
								<label class="form-control">Position Name</label>
							</td>
							<td>
								<input type="text" name="name" class="form-control">
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
					Positions Lists				
				</div>
				<div class="card-body">
					<table class="table table-primary table-sm">
						<tr>
							<td>ID</td>
							<td>Position's Name</td>							
							<td>Position's Fee</td>							
							<td>Delete</td>
							<td>Update</td>
						</tr>

						@foreach($positions as $position)
						<tr>
							<td>{{ $position->id }}</td>
							<td>{{ $position->name }}</td>						
							<td>{{ $position->description }}</td>						
							<td>
								<a href="{{ url("/admin/position/del/{$position->id}")}}" class="btn btn-danger btn-sm"> Delete</a>
							</td>
							<td>
								<a href="{{ url("/admin/position/upd/{$position->id}")}}" class="btn btn-warning btn-sm"> Update</a>
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