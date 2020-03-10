<div class="card-columns">
  @foreach ($product as $product)
      <div class="card">
          <img class="card-img-top img-thumbnail border-0 p-0 rounded-0" src="{{asset('storage/uploads/'.$product['image'])}}" alt="">
          <div class="card-body bg-light" style="height: 200px">
              <h5 class="card-title">{{$product->title }}</h5>
              <p class="card-text">{{$product->description }}</p>
              <p class="card-text font-weight-bold">€ {{$product->price }}</p>
              <div>
                <p class="card-text">Category: {{ @$product->category->name }}</p>
              </div>
            </div>
            <div class="card-footer" >
              <a class="nav-link btn btn-dark" href="{{ route('cart', ['id' => $product->id]) }}">Add to Cart</a>
          </div>
      </div>
  @endforeach
</div>