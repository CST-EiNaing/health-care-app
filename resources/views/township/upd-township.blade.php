@extends('layouts.app')
@section ('content')

<div class="container">
	<div class="row justify-content-center">
		@if(session('info'))
		<div class="alert alert-danger">
			{{session('info')}}
		</div>
		@endif
		<div class="col-md-6">
			<div class="card">
				<div class="card-header" style="">
					Edit Township					
				</div>
				<div class="card-body">
					<form action="{{url("/admin/township/upd/{$township->id}")}}" method="post" enctype="multipart/form-data">
					@csrf

					<table class="table table-sm">
						
						<tr>
							<td>
								<label class="form-control">Name</label>
							</td>
							<td>
								<input type="text" name="name" class="form-control" value="{{ $township->name }}">
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