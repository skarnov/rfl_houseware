<option value="">Select One</option>
@foreach ($all_subcategories as $category)
<option value="{{ $category->subcategory_id }}">{{ $category->subcategory_name }}</option>
@endforeach