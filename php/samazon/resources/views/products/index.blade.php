@foreach($products as $product)//変数$productsに格納されている商品データを1つずつ$productに渡しています。
 {{$product->name}} //各カラムの内容を表示
 {{$product->description}}
 {{$product->price}}
 <a href="{{route('products.show', $product)}}">Show</a>
 <a href="{{route('products.edit', $product)}}">Edit</a>
@endforeach


<a href="{{route('products.create')}}">New</a>