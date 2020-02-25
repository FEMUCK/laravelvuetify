<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function AddProduct(Request $request)
    {
        $product = new Product;
        $product->name = $request->get('name');
        $product->price = $request->get('price');
        $product->qty = $request->get('qty');
        $product->save();
        // echo 'aaa';
        return response()->json(['success'], 200);
    }

    public function GetProduct(Request $request)
    {
        $product = Product::all(); // ใช้ eloquent เพื่อดึงข้อมูลใน product table มาทั้งหมด
        return response()->json($product, 200); // เลข 200 คือ error code 200 คือ Success คือถ้าจะให้เป็น success ต้องใส่ 200 ถ้ามไ่ใส่ default ก็เป็น 200 อยู่แล้ว เช็คได้ใน inspecxt console
    }

    public function deleteProduct($id) // ลบจาก DB เท่านั้น

    {
        $product = Product::find($id); // ใช้ eloquent เพื่อดึงข้อมูลใน product table ที่ id ตรงกับ parameter
        $product->delete();
        return response()->json($product, 200);
        // return back()->with('status', 'Product Deleted Successfully!');
    }
    public function getProductDetail($id)
    {
        $product = Product::find($id); // ใช้ eloquent เพื่อดึงข้อมูลใน product table ที่ id ตรงกับ parameter
        return response()->json($product, 200);
    }

    public function updateProduct(Request $request, $id)
    {
        $product = Product::find($id); // ใช้ eloquent เพื่อดึงข้อมูลใน product table ที่ id ตรงกับ parameter
        $product->name = $request->name;
        $product->price = $request->price;
        $product->qty = $request->qty;

        $product->save();
        return response()->json($product, 200);
    }
}
