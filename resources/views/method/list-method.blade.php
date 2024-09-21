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
					Add New Method					
				</div>
				<div class="card-body">
					<form action="{{url('/admin/method/add')}}" method="post" enctype="multipart/form-data">
					@csrf
					<table class="table table-sm">
						<tr>
							<td>
								<label class="form-control">Method Name</label>
							</td>
							<td>
								<input required type="text" name="name" class="form-control">
							</td>
						</tr>
						<tr>
							<td>
								<label class="form-control">QR Photo</label>
							</td>
							<td>
								<input required type="file" name="qr_photo" class="form-control">
							</td>
						</tr>
						<tr>
							<td>
								<label class="form-control">Account Number</label>
							</td>
							<td>
								<input required type="text" name="account_number" class="form-control">
							</td>
						</tr>
						<tr>
							<td>
								<label class="form-control">Status</label>
							</td>
							<td>
								<input type="text" name="stauts" class="form-control">
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
					Method Lists				
				</div>
				<div class="card-body">
					<table class="table table-primary table-sm">
						<tr>
							<td>ID</td>
							<td>Method Name</td>							
							<td>QR Photo</td>							
							<td>Account Number</td>						
							<td>Status</td>						
							<td>Remark</td>						
							<td>Delete</td>
							<td>Update</td>
						</tr>
						@foreach($methods as $method)
						<tr>
							<td>{{ $method->id }}</td>
							<td>{{ $method->name }}</td>	
							<td>
							@if($method->qr_photo)
								<img width="50px" height="50px" src="{{ asset('images/payment_method/' . $method->qr_photo) }}" alt="QR Code">
							@else
							 <span></span>
							@endif
							</td>					
							<td>{{ $method->account_number }}</td>					
							<td>{{ $method->status }}</td>					
							<td>{{ $method->remark }}</td>					
							<td>
								<a href="{{ url("/admin/method/del/{$method->id}")}}" class="btn btn-danger btn-sm"> Delete</a>
							</td>
							<td>
								<a href="{{ url("/admin/method/upd/{$method->id}")}}" class="btn btn-warning btn-sm"> Update</a>
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