<?php

namespace App\Http\Controllers\Shop;

use App\models\Product;
use App\models\ProductCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ProductCategory::all();

        return view('shop.category.list', compact('items'));
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
            return redirect()->route('shop.categories.index');
        }

        $category = new ProductCategory();

        return view('shop.category.edit', compact('category'));
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

        $category = (new ProductCategory())->create($data);

        if($category)
        {
            return redirect()
                ->route('shop.categories.edit', $category->id)
                ->with(['success' => 'Категория создана']);
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
        $category = ProductCategory::find($id);

        $products = Product::where('category_id', $id)->get();

        return view('shop.category.id', compact('category', 'products'));
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
            return redirect()->route('shop.categories.index');
        }

        $category = ProductCategory::find( $id);

        return view('shop.category.edit', compact('category'));
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

        $category = ProductCategory::find($id);

        if(empty($category))
        {
            return back()->withInput();
        }

        $data = $request->input();

        $result = $category->fill($data)->save();

        if($result)
        {
            return redirect()
                ->route('shop.categories.edit', $id)
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

        /*
         * Не удалять, если существует продукт уже по данной категории
         */
        $product = Product::where('category_id', $id)->take(1)->get();
        if($product->isNotEmpty())
        {
            return back()
                ->withErrors(['msg' => 'Существуют продукты по категории']);
        }

        $result = ProductCategory::destroy($id);

        if($result)
        {
            return redirect()
                ->route('shop.categories.index')
                ->with(['success' => 'Категория удалена']);
        }
        else
        {
            return back()
                ->withErrors(['msg' => 'Ошибка при удалении']);
        }
    }
}
