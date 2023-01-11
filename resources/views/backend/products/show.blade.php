<x-backend.master>
    <x-slot:title>
        Product Details
    </x-slot:title>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-7">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Product Details</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <a href="{{ route('products.index') }}">
                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span data-feather="list"></span>
                    List
                </button>
            </a>
        </div>
    </div>

    <h1>Title: {{ $product->title }}</h1>
    <p>Description: {!! $product->description !!} </p>
    <p>Price: {{ $product->price }} TK</p>
    <p>Subcategory: {{ $product->subcategory?->title }} </p>
    <div>
    <img src="{{ asset('storage/products/'.$product->thumbnail) }}" height="400" /></td>
    </div>

                
    </div>
    </div>
</div>
</x-backend.master>