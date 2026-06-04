@extends('products.layout')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Editar Produto</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')
        <div>
            <label class="block font-medium">Nome:</label>
            <input type="text" name="name" value="{{ $product->name }}" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label class="block font-medium">Descrição:</label>
            <textarea name="description" class="w-full border p-2 rounded">{{ $product->description }}</textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-medium">Preço (R$):</label>
                <input type="number" step="0.01" name="price" value="{{ $product->price }}"
                    class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label class="block font-medium">Estoque:</label>
                <input type="number" name="stock" value="{{ $product->stock }}" class="w-full border p-2 rounded" required>
            </div>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Atualizar</button>
            <a href="{{ route('products.index') }}" class="bg-gray-300 px-4 py-2 rounded">Cancelar</a>
        </div>
    </form>
@endsection