<?php

namespace App\Http\Controllers\Shop;

use App\models\Product;
use App\models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->orderByDesc('id')->get();

        return view('shop.product.list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::guest())
        {
            return redirect()->route('shop.products.index');
        }

        $product = new Product();

        $categories = ProductCategory::all();

        return view('shop.product.edit', compact('product', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::guest())
        {
            abort(403, 'Unauthorized action.');
        }

        $data = $request->input();

        $product = (new Product())->create($data);

        if($product)
        {
            return redirect()
                ->route('shop.products.edit', $product->id)
                ->with(['success' => 'Продукт создан']);
        }
        else
        {
            return back()
                ->withErrors(['msg' => 'Ошибка при создании'])
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::where('id', $id)->with('category')->first();

        return view('shop.product.id', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::guest())
        {
            return redirect()->route('shop.products.index');
        }

        $product = Product::where('id', $id)->with('category')->first();
        $categories = ProductCategory::all();

        return view('shop.product.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(Auth::guest())
        {
            abort(403, 'Unauthorized action.');
        }

        $product = Product::find($id);

        if(empty($product))
        {
            return back()->withInput();
        }

        $data = $request->input();

        $result = $product->fill($data)->save();

        if($result)
        {
            return redirect()
                ->route('shop.products.edit', $id)
                ->with(['success' => 'Данные изменены']);
        }
        else
        {
            return back()
                ->withErrors(['msg' => 'Ошибка при заполнении'])
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Auth::guest())
        {
            abort(403, 'Unauthorized action.');
        }

        $result = Product::destroy($id);

        if($result)
        {
            return redirect()
                ->route('shop.products.index')
                ->with(['success' => 'Продукт удалён']);
        }
        else
        {
            return back()
                ->withErrors(['msg' => 'Ошибка при удалении']);
        }
    }
}
