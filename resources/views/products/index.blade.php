@extends('products.layout')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Lista de Produtos</h2>
        <a href="{{ route('products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Novo Produto</a>
    </div>

    @if ($message = Session::get('success'))
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">{{ $message }}</div>
    @endif

    <table class="w-full text-left border-collapse">
        <thead>
            <tr class="border-b bg-gray-50">
                <th class="p-3">Nome</th>
                <th class="p-3">Preço</th>
                <th class="p-3">Estoque</th>
                <th class="p-3 text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="border-b">
                    <td class="p-3">{{ $product->name }}</td>
                    <td class="p-3">R$ {{ number_format($product->price, 2, ',', '.') }}</td>
                    <td class="p-3">{{ $product->stock }}</td>
                    <td class="p-3 flex justify-center gap-2">
                        <a href="{{ route('products.show', $product->id) }}"
                            class="bg-gray-500 text-white px-3 py-1 rounded text-sm">Ver</a>
                        <a href="{{ route('products.edit', $product->id) }}"
                            class="bg-yellow-500 text-white px-3 py-1 rounded text-sm">Editar</a>
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST"
                            onsubmit="return confirm('Tem certeza?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded text-sm">Excluir</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-4">
        {{ $products->links() }}
    </div>
@endsection