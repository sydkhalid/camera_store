<?php

namespace App\Http\Controllers\API;


use Illuminate\Http\Request;
use App\Http\Controllers\API\ResponseController as ResponseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\model\Category;
use App\model\Product;
use App\model\Cart;
use Validator;

class CategoryController extends ResponseController
{
    //categories list
    public function getCategories()
    {
        try{
            $categories = Category::get();
            if (!empty($categories)) {
                $response = [
                    'code' => 200,
                    'message' => 'Categories Fetched Successfully',
                    'data' => $categories
                ];
                return $this->sendResponse($response);
            }else{
                $response = [
                    'code' => 201,
                    'message' => 'No Categories Avalible',
                ];
                return $this->sendResponse($response);
            }
        } catch (\Exception $exception) {
            $response = [
                'code' => 400,
                'message' => 'SomeThing Went Wrong While Fetch Categories',
            ];
            return $this->sendError($response,400);
        }
    }
    //product list
    public function getProducts()
    {
        try{
            $product = Product::select('products.*','categories.name as Catname')
            ->join('categories','categories.id','products.category_id')
            ->get();
            if(!empty($product)) {
                $response = [
                    'code' => 200,
                    'message' => 'Products Fetched Successfully',
                    'data' => $product
                ];
                return $this->sendResponse($response);
            }else{
                $response = [
                    'code' => 201,
                    'message' => 'No Products Avalible',
                ];
                return $this->sendResponse($response);
            }
        } catch (\Exception $exception) {
            $response = [
                'code' => 400,
                'message' => 'SomeThing Went Wrong While Fetch Products',
            ];
            return $this->sendError($response,400);
        }
    }
    //single product
    function getProduct($product_id)
    {
        try{
            $product = Product::select('products.*','categories.name as Catname')
            ->join('categories','categories.id','products.category_id')
            ->where('products.category_id', $product_id)
            ->get();
            if(!empty($product)) {
                $response = [
                    'code' => 200,
                    'message' => 'Product Fetched Successfully',
                    'data' => $product
                ];
                return $this->sendResponse($response);
            }else{
                $response = [
                    'code' => 201,
                    'message' => 'No Product Avalible',
                ];
                return $this->sendResponse($response);
            }
        } catch (\Exception $exception) {
            $response = [
                'code' => 400,
                'message' => 'SomeThing Went Wrong While Fetch Products',
            ];
            return $this->sendError($response,400);
        }
    }
    //add to cart
    function addtoCart(Request $request){
        try{
            $check_cart = Cart::where('product_id', $request->product_id)
            ->where('user_id', Auth()->user()->id)
            ->where('status', 1)
            ->first();
            if ($check_cart) {
                $count = $check_cart->count + 1;
                $user = Cart::where('id', $check_cart->id)->update(['count' => $count]);
            } else {
                $user = new Cart();
                $user->product_id = $request->product_id;
                $user->user_id = Auth()->user()->id;
                $user->status = 1;
                $user->created_at = date("Y-m-d H:i:s");
                $user->save();
            }

            $count = Cart::where('user_id', Auth()->user()->id)
                ->where('status', 1)
                ->count();
            $response = [
                'code' => 200,
                'message' => 'Added to Cart Successfully',
                'data' => $count
            ];
            return $this->sendResponse($response);
        } catch (\Exception $exception) {
            $response = [
                'code' => 400,
                'message' => 'SomeThing Went Wrong While Fetch Products',
            ];
            return $this->sendError($response,400);
        }
    }
    //cart of current user
    function getCart()
    {
        try{
            $cart = Cart::select('products.*','carts.count','categories.name as Catname')
            ->join('products','products.id','carts.product_id')
            ->join('categories','categories.id','products.category_id')
            ->where('carts.user_id', Auth()->user()->id)
            ->where('carts.status', 1)
            ->get();
            if(!empty($cart)) {
                $response = [
                    'code' => 200,
                    'message' => 'Cart Fetched Successfully',
                    'data' => $cart
                ];
                return $this->sendResponse($response);
            }else{
                $response = [
                    'code' => 201,
                    'message' => 'Cart is Empty',
                ];
                return $this->sendResponse($response);
            }
        } catch (\Exception $exception) {
            $response = [
                'code' => 400,
                'message' => 'SomeThing Went Wrong While Fetch Products',
            ];
            return $this->sendError($response,400);
        }
    }

}
