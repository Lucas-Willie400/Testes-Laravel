<?php
namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // 1. Listar todos os produtos
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('products.index', compact('products'));
    }

    // 2. Mostrar o formulário de criação
    public function create()
    {
        return view('products.create');
    }

    // 3. Salvar o novo produto no banco
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);

        Product::create($request->all());

        return redirect()->route('products.index')->with('success', 'Produto criado com sucesso!');
    }

    // 4. Mostrar detalhes de um produto específico
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    // 5. Mostrar formulário de edição
    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    // 6. Atualizar o produto no banco
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
        ]);


        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Produto atualizado com sucesso!');
    }

    // 7. Deletar o produto
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Produto excluído com sucesso!');
    }
}
