@extends('layouts.app')

@section('content')

	<div class="col-sm-8 blog-main">
		<h1>Create a Product</h1>

		<hr>

		<form method="POST" action="{{route('update_product', $product->id)}}">
			{{ method_field('PUT') }}
			{{ csrf_field() }}

			  <div class="form-group">
			    <label for="name">Name:</label>
			    <input type="text" class="form-control" id="name" placeholder="" name="name" value="{{$product->name}}">
			  </div>



			  <div class="form-group">
			    <label for="price">Price:</label>
			    <input type="float" id="price" name="price" class="form-control" value="{{$product->price}}">
			  </div>


			  <button type="submit" class="btn btn-primary">Update</button>

			  @include('layouts.errors')

		  </form>


	<hr>
	<a href="{{route('products')}}" class="btn btn-default">Return to Index</a>


	</div>



@endsection