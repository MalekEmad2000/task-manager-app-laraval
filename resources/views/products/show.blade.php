

<x-app-layout>




    <div class="card" style="width: 100%;">
        <div class="card-body">
            <h5 class="card-title">welcome back</h5>
            <p class="card-text">your task are waiting</p>

        </div>
    </div>
    <div class="card" style="width: 100%;background-color: coral">
        <div class="card-body">
            <h5 class="card-title">My Tasks</h5>
            <a href="{{route('products.create')}}" style="background-color: white" class="btn btn-info btn-sm">add task</a>
        </div>
    </div>
        @foreach($products as $product)
 <div class="card" style="width: 18rem;float:left; display: flex;	flex-direction: column;	 border-color: coral; border-radius: 7px; box-shadow: 0 2px 5px #ccc;  padding: 10px; width: 240px; margin: 16px;">
    <div class="card-body">
        <p class="card-title">{{$product->name}}</p>
        <p class="card-text">{{$product->description}}</p>
        <a href="{{ route('products.edit',  $product->id) }}" class="btn btn-info btn-sm">edit</a>
        <a href="{{ route('products.edit',  $product->id) }}" class="btn btn-info btn-sm">delete</a>
    </div>
    </div>
        @endforeach
    <footer>
        <p>Copyright ⓒ </p>
    </footer>
</x-app-layout>




