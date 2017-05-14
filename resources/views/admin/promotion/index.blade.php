@extends('layouts.app')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Promotion</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="panel-heading">
				<h2>Promotions</h2>
				<div class="panel-body">

					@if (session('status'))
						<div class="alert alert-success">
						{{ session('status') }}
						</div>
					@endif

					<div class="btn-group" role="group">
						<button type="button" class="btn btn-default"><a href="{{ route('category.index') }}">Category</a></button>
						<button type="button" class="btn btn-default"><a href="{{ route('promotion.index') }}">Promotion</a></button>
						<button type="button" class="btn btn-default"><a href="{{ route('product.index') }}">Product</a></button>
					</div>

					<a class="btn btn-success" href="{{ route('promotion.create') }}">New</a>
					<table class="table table-striped table-responsive">
						<thead>
							<th>#</th>
							<th>Promotion</th>
							<th>Description</th>
							<th>Action</th>
						</thead>
						<tbody>
								@foreach($promotions as $key=> $promotion)
								<tr>
									<td>{{ ++$key }}</td>
									<td>{{ $promotion->promotion_name }}</td>
									<td>{{ $promotion->description }}</td>
									<td>
										//
									</td>
								</tr>
								@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
@stop