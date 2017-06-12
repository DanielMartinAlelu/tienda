@extends('store.template')

@section('content')

@include('store.partials.slider')

<div class="container text-center">
	<div id="products">
		@foreach($products as $product)
			<div class="product white-panel">
				<h3>{{ $product->name }}</h3><hr>
				<img src="{{ $product->image }}">
				<div class="product-info panel">
					<p>{{ $product->extract }}</p>
					<h3><span class="label label-primary">Precio: {{ number_format($product->price,2) }} €</span></h3>
					<p>
						<a class="btn btn-success" href="{{ route('cart-add', $product->slug) }}">
							<i class="fa fa-cart-plus"></i> Añadir al carro
						</a>
						<a class="btn btn-default" href="{{ route('product-detail', $product->slug) }}"><i class="fa fa-chevron-circle-right"></i> Detalles</a>
					</p>
				</div>
			</div>
		@endforeach
	</div>
</div>

<div id="overbox3">
    <div id="infobox3">
        <p>Esta web utiliza cookies para obtener datos estadísticos de la navegación de sus usuarios. Si continúas navegando consideramos que aceptas su uso.
        <a target="_blank" href="http://politicadecookies.com">Más información</a>
        <a onclick="aceptar_cookies();" style="cursor:pointer;">X Cerrar</a></p>
    </div>
</div>
@stop