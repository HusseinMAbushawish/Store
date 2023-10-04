<?php

use App\Models\Categorie;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('get_data', function () {

    //1.  $data = Product::all()->count();
    //2.  $data = Product::all()->max('quantity');
    //3.  $data = Product::all()->min('prise');
    //4.  $data = Product::all()->avg('prise');
    //5.  $data = Product::all()->avg('quantity');
    //6.  $data = Product::all()->take(10);
    //7.  $data = Product::all()->skip(10)->take(10); // This is statement same result with after statment
    //8.  $data = Product::all()->skip(10);
    //9. $data = Product::all()->take(10)->skip(10); // Empty data
    //10. $data = Product::all()->take(10);
    //11. $data = Product::skip()->get(10); // This is statemet dosent correct
    //    $data = Product::limit(10)->get();
    //    $data = Product::offset(10)->limit(10)->get();   
    //    $data = Product::limit(10)->offset(10)->get();
    //    $data = Product::offset(10)->get(); // This is statemet dosent correct

    /* ######################## Relations ########################################## */

    //    $data = Categorie::with('products')->get();// left join 
    //    $data = Product::with('categorie')->get(); // Right join
    //    $data = Categorie::withcount('products')->get();
    //    $data = Categorie::with('products')->skip(2)->take(3)->get(); // رجعنا الفئات بعد م عملت سكيب لاول 2 وجبت الثلاثة يلي بعدهم 
    //    $data = Product::where('title', 'like', 'e%')->get(); // جبنا المنتجات يلي بتبدا e
    /*    $data = Categorie::withcount(['products' => function ($query) {
          $query->where('title', 'like', 'e%');
          }])->get();
    */

    // $data = Categorie::has('products','>=',3)->get();
    /*
انا هنا عملت فلتر على  الفئات + المتنجات 

$data = Categorie::with(['products'=> function ($query) {
        $query->where('quantity', '>=', 400);
    }])->whereHas('products', function ($query) {
        $query->where('quantity', '>=', 400);
    })->get();

*/
    // $data = Categorie::doesntHave('products')->get();
    $data = Categorie::where('is_active', 'off')->get();


    return response()->json(['date' => $data]);
});