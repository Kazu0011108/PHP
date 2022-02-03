<?php

namespace App\Http\Controllers;

use App\Product;
  use App\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $products = Product::all();//Productモデルを使ってすべての商品データをデータベースから取得、取得したデータを変数＄productsに代入している。

        return view('products.index', compact('products'));
        //view関数の第一引数'products.index'で表示させるビューのファイルを指定すると左のresource\views\の中にあるindex(welcome).blade.phpが呼び出される。
        //第二引数はコントローラからviewに渡す変数を指定。よく使われるのがcompact()で上記のように記述すると、変数$productsがviewに渡される。
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();//$categoriesにすべてのカテゴリを保存し、ビューへと渡している
        return view('products.create', compact('categories'));//view関数を使って使用するビューを指定するだけ
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $product = new Product();//Productモデルの変数を作成する
      $product->name = $request->input('name');
      $product->discription = $request->input('discription');
      $product->price = $request->input('price');
      //フォームから送信されたデータが格納されている$request変数の中から、nameとdescriptionなどの項目のデータをそれぞれのカラムに保存。
      $product->category_id = $request->input('category_id');
      $product->save();//データベースへと保存

      return redirect()->route('products.show',['id =>$product->id']);
      //データが保存された後、リダイレクト（別のページに移動すること）を行っています。storeなどのアクションではビューを持たないので、この処理を書き忘れると真っ白な画面のまま。
      //リダイレクトさせる場合はredirect()を使います。またリダイレクト先はredirect()->route('products.show', ['id' => $product->id]);のようにroute関数にリダイレクトするコントローラとアクションを指定する。
      //今回の場合は新しく作成したデータを表示するshowアクションへとリダイレクトさせています。そういった場合はroute('products.show', ['id' => $product->id])のように、表示したいデータのIDを渡す。
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $product->name =$request->input('name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->category_id = $request->input('category_id');
        $product-> update();

        return redirect()->route('products.show',['id'=> $product->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
       $product->delete();

       return redirect()->route('products.index');
    }
}
