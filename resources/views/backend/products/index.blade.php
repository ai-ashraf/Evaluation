<x-backend.master>
    <x-slot:title>
        Products List
        </x-slot>

        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Products info</h1>
            <div class="btn-toolbar mb-2 mb-md-0">
                <a href="{{ route('products.create') }}">
                    <button type="button" class="btn btn-sm btn-outline-primary">
                        <span data-feather="plus"></span>
                        Add New
                    </button>
                </a>
            </div>
        </div>

        <x-forms.message />

        <table class="table">
            <thead>
                <tr>
                    <th>SL#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Subcategory</th>
                    <th>Image</th>
                    <th width="180">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->title }}</td>
                    <td>{!! Str::limit($product->description,100) !!}</td>
                    <td>{{ $product->price }} TK</td>
                    <td>{{ $product->subcategory?->title }}</td>
                    <td> <img src="{{ asset('storage/products/'.$product->thumbnail) }}" height="60" /></td>
                    <td class="d-flex">
                       
                         <a class="btn btn-sm btn-outline-info mx-2" href="{{ route('products.show', $product->id) }}">Show</a>
                       
                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-sm btn-outline-danger mx-2" onclick="return confirm('Are you sure want to delete?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

</x-backend.master>