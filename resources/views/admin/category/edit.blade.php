@extends('layouts.master')
@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Category</title>
</head>
<body>
	<div class="container">
		<div class="row">
        <div class="class col-md-11 box">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-info">
					<div class="panel-heading">
						<h2>Edit Category</h2>
					</div>
					<div class="panel-body">
						{!! Form::model($category, ['class'=>'form-horizontal', 'route' => ['category.update', $category->id], 'method'=>'PATCH']) !!}
						@include('admin.category._form',['submitButtonText' => 'Edit'])
						{!! Form::close() !!}
					</div>
				</div>
			</div>
		</div>
		</div>
	</div>
</div>

</body>
</html>
@stop