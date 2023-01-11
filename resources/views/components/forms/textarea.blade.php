@props(['name', 'label' => '', 'value' => null])

@if($label)
        <label for="{{ $name }}Input" class="form-label">{{ $label }}</label>
    @endif
<div class="mb-3">
    

    <textarea 
        name="{{ $name }}"
        id="{{ $name }}Input"
        class="form-control"
        {{ $attributes->merge(['class' => 'form-control']) }}
    >

    {{ $value }}

    </textarea>

    @error($name)
        <div class="form-text text-danger">{{ $message }}</div>
    @enderror

</div class>
<script src="https://cdn.ckeditor.com/ckeditor5/35.3.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#{{ $name }}Input' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
