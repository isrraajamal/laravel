<?php

namespace App\Http\Controllers\product;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductCommentRequest;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Rate;

class ProductDetailsController extends Controller
{
    public function show($id)
    {
        $product = product::findOrFail($id);
        return view('product.product-details', compact('product'));
    }

    // public function ProductComment(ProductCommentRequest $request, $id){
    //     Rate::create([
    //         'user_id' => Auth::user()->id,
    //         'product_id' => $id,
    //         'comment' => $request->comment
    //     ]);
    //     return redirect()->back()->with('success', 'Comment Added Successfully');
    // }
}
