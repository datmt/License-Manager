<?php

namespace App\Http\Controllers;

use App\Helpers\ProductHelper;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class ProductController extends Controller
{
    /**
     * Retrieve the user for the given ID.
     *
     * @param  int  $id
     * @return Response
     */
    public function getOne($id)
    {
        return Product::findOrFail($id);
    }

    public function create(Request $request) {
        if (!$request->has(['name', 'description', 'machine_count', 'price', 'add_time'])) {
            return response()->json(['r' => -1, 'message' => 'missing params'], 200);
        }

        ProductHelper::create($request->name, $request->description, $request->machine_count, $request->price, $request->add_time, $request->landing_page_url);

        return response()->json(['r' => 0, 'message' => 'Product created!']);
    }

    public function getAll() {
        return response()->json(Product::all());
    }

    public function delete($id)
    {
        Product::findOrFail($id)->delete();
        return response()->json('Deleted Successfully', 200);
    }

    public function update($id, Request $request) {
        $product = Product::findOrFail($id);
        $product->update($request->all());

        return response()->json($product, 200);
    }
}
