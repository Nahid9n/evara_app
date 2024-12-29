
@foreach($subCategories as $key => $subcategory)
    <select name="" class="p-2" id="subCategoryId{{$key}}">
        <option {{--{{$subCategorySlug == $subcategory->slug ? 'selected':''}}--}} value="{{ $subcategory->id }}">{{ $subcategory->name }}</option>
    </select>
@endforeach
