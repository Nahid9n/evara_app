<h5 class="section-title style-1 wow fadeIn animated">Select Your Choice</h5>
@foreach($subCategories as $subcategory)
    <div class="form-check">
        <input type="checkbox" id="{{ $subcategory->id }}" onclick="filter()" {{$subCategorySlug == $subcategory->slug ? 'checked':''}}  class="form-check-input subCategoryCheckBox"  value="{{ $subcategory->id }}">
        <label class="form-check-label">{{ $subcategory->name }}</label>
    </div>
@endforeach
