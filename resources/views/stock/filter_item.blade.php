@forelse ($all_items as $category)
<tr>
    <td><span> {{ $category->item_serial }}</span></td>
    <td><span> {{ $category->subcategory_name }}</span></td>
    <td><span> {{ $category->item_name }}</span></td>
    <td>
        @if ($category->item_status == 'active')
        <span class="badge badge-success">Active</span>
        @endif
        @if ($category->item_status == 'inactive')
        <span class="badge badge-danger">Inactive</span>
        @endif
    </td>
    <td>
        <a href="edit_item/{{ $category->item_id }}" class="btn btn-sm btn-outline-success" title="Edit"><i class="icon-pencil"></i></a>
<!--        <a href="javascript:;" data-id="{{ $category->item_id }}" class="btn btn-sm btn-outline-danger show-alert" title="Delete"><i class="icon-trash"></i></a>-->
    </td>
</tr>
@empty
<tr>
    <td>
        <p class="text-danger text-bold">Nothing Found</p>
    </td>
</tr>
@endforelse