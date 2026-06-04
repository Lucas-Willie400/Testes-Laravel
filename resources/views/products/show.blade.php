@extends('products.layout')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Detalhes do Produto</h2>

    <div class="space-y-2 mb-6">
        <p><strong>Nome:</strong> {{ $product->name }}</p>
        <p><strong>Descrição:</strong> {{ $product->description ?? 'Nenhuma descrição informada.' }}</p>
        <p><strong>Preço:</strong> R$ {{ number_format($product->price, 2, ',', '.') }}</p>
        <p><strong>Estoque:</strong> {{ $product->stock }} unidades</p>
    </div>

    <a href="{{ route('products.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded">Voltar</a>
@endsection