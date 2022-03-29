<?php

namespace App\Http\Controllers\Office\Master;

use Illuminate\Http\Request;
use App\Models\Master\Product;
use App\Traits\OfficeResponseView;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    use OfficeResponseView;
    public function index(Request  $request)
    {
        if ($request->ajax()) {
            $collection = Product::where('title','LIKE','%'.$request->keyword.'%')->paginate(10);;
            return $this->render_view('master.product.list',compact('collection'));
        }
        $counter = Product::get()->count();
        return $this->render_view('master.product.main',compact('counter'));
    }
    public function create()
    {
        //
    }
    public function store(Request $request)
    {
        //
    }
    public function show(Product $product)
    {
        //
    }
    public function edit(Product $product)
    {
        //
    }
    public function update(Request $request, Product $product)
    {
        //
    }
    public function destroy(Product $product)
    {
        //
    }
}
