@extends('products.layout')

@section('content')
    <h2 class="text-2xl font-bold mb-4">Criar Novo Produto</h2>

    @if ($errors->any())
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
        @csrf
        <div>
            <label class="block font-medium">Nome:</label>
            <input type="text" name="name" class="w-full border p-2 rounded" required>
        </div>
        <div>
            <label class="block font-medium">Descrição:</label>
            <textarea name="description" class="w-full border p-2 rounded"></textarea>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="block font-medium">Preço (R$):</label>
                <input type="number" step="0.01" name="price" class="w-full border p-2 rounded" required>
            </div>
            <div>
                <label class="block font-medium">Estoque:</label>
                <input type="number" name="stock" class="w-full border p-2 rounded" required>
            </div>
        </div>
        <div class="flex gap-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Salvar</button>
            <a href="{{ route('products.index') }}" class="bg-gray-300 px-4 py-2 rounded">Cancelar</a>
        </div>
    </form>
@endsection