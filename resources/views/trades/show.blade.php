@extends ('layouts.app')

@section ('content')

<h1>Product ID: {{ $product->id }}</h1>
<ul>
  <li><strong>Name:</strong> {{ $product->name }}</li>
  <li><strong>Price:</strong> {{ $product->price }}</li>
  <li><strong>Included on:</strong> {{ $product->created_at }}</li>
  <li><a class="btn btn-sm btn-info"href="{{ route('edit_product', $product->id) }}">Editar</a></li>
  <li><a class="btn btn-sm btn-danger" href="{{ route('delete_product', $product->id) }}" 
			onclick="event.preventDefault();
			document.getElementById('delete-product-form').submit();">
		Deletar
		</a>
		<form id="delete-product-form" action="{{ route('delete_product', $product->id) }}" method="POST" style="display: none;">
		{{ method_field('DELETE') }}
            {{ csrf_field() }}
        </form>
	</li>
</ul>

<a href="{{route('products')}}" class="btn btn-default">Return to Index</a>

@endsection