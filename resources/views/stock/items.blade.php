<option value="">Select One</option>
@foreach ($all_items as $category)
<option value="{{ $category->item_id }}">{{ $category->item_name }}</option>
@endforeach