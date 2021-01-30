@forelse ($all_subcategories as $category)
<tr>
    <td><span> {{ $category->subcategory_serial }}</span></td>
    <td><span> {{ $category->category_name }}</span></td>
    <td><span> {{ $category->subcategory_name }}</span></td>
    <td>
        @if ($category->subcategory_status == 'active')
        <span class="badge badge-success">Active</span>
        @endif
        @if ($category->subcategory_status == 'inactive')
        <span class="badge badge-danger">Inactive</span>
        @endif
    </td>
    <td>
        <a href="edit_subcategory/{{ $category->subcategory_id }}" class="btn btn-sm btn-outline-success" title="Edit"><i class="icon-pencil"></i></a>
        <a href="javascript:;" data-id="{{ $category->subcategory_id }}" class="btn btn-sm btn-outline-danger show-alert" title="Delete"><i class="icon-trash"></i></a>
    </td>
</tr>
@empty
<tr>
    <td>
        <p class="text-danger text-bold">Nothing Found</p>
    </td>
</tr>
@endforelse