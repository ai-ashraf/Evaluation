<x-backend.master>
    <x-slot:title>
        Coupon Product
        </x-slot>

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2"> Create Product</h1>
        <div class="btn-toolbar mb-2 mb-md-0">     
            <a href="{{ route('products.index') }}">
                <button type="button" class="btn btn-sm btn-outline-primary">
                    <span data-feather="list"></span>
                   Product List
                </button>
            </a>
        </div>
    </div>

    <x-forms.errors />

    <form action="{{ route('products.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <x-forms.input type="text" name="title" label="Title" :value="old('title')" required placeholder="Enter product title" />
        
        <x-forms.textarea name="description" :value="old('description')" label="Description" required placeholder="Enter product description"/>

        <x-forms.select name="subcategory_id" label="Subcategory" :options="$subcategories" :selected="old('subcategory_id')" required/>

        <x-forms.input type="number" name="price" label="Price" :value="old('price')" required placeholder="Enter product price" />
        
        <x-forms.input type="file" name="thumbnail" label="Thumbnail"/>

        <button type="submit" class="btn btn-primary">Submit</button>
    
    </form>

    </x-backend.master>