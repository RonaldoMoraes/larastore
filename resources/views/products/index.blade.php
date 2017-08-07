@extends ('layouts.app')

@section ('content')

<div class="">
  <a href="{{route('new_product')}}" class="btn btn-primary">Novo Produto</a>
</div>
<h1>Listing all products</h1>

<table class="table table-bordered">
  <thead>
    <tr>
      <th>Nome</th>
      <th>Preço</th>
    </tr>
  </thead>

  <tbody>
    @foreach($products as $product)
      <tr>
        <td><a href="{{route('product', $product->id)}}" class="">{{$product->name}}</a></td>
        <td>{{$product->price}}</td>
      </tr>
    @endforeach
  </tbody>
</table>


@endsection