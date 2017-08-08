@extends('layouts.app')

@section('content')

	<div class="col-sm-8 blog-main">
		<h1>Make a Trade</h1>

		<hr>

		<form method="POST" action="/trades">

			{{ csrf_field() }}

			  <div class="form-group">
				<select name="product_id" required>
				    @foreach($products as $key => $value)
				    	<option value="{{ $value }}">{{ $key }}</option>
				    @endforeach
				</select>
			  </div>

			  <div class="form-group">
			    <label for="amount">Amount:</label>
			    <input type="integer" id="amount" name="amount" class="form-control" required>
			  </div>

			  <div class="form-group">
			    <label for="total">Total:</label>
			    <input type="float" id="total" name="total" class="form-control" disabled="">
			  </div>


			  <button type="submit" class="btn btn-primary">Make</button>

			  @include('layouts.errors')

		  </form>


	<hr>
	<a href="{{route('trades')}}" class="btn btn-default">Return to Index</a>


	</div>

<script type="text/javascript">
	

	$("#amount").keydown(function(){
		alert( event.type ); 
		//$("#total").value = "999";
	});

</script>


@endsection