@foreach ($all_products as $product)
<tr>
    <td>
        @if ($product->product_image)
        <img class="img-thumbnail table-image" src="{{ URL::to('/uploads/thumbnails') }}{{'/'}}{{ $product->product_image }}" alt="{{ $product->product_name }}" title="{{ $product->product_name }}">
        @else
        <img class="img-thumbnail table-image" src="{{ URL::to('/assets/noImage.png') }}" title="No Image Available">
        @endif
    </td>
    <td><span> {{ $product->product_name }}</span></td>
    <td><span> {{ $product->category_name }}</span></td>
    <td class="text-right"><span> {{ $product->product_price }}</span></td>
    <td>
        @if ($product->product_status == 'active')
        <span class="badge badge-success">Active</span>
        @endif
        @if ($product->product_status == 'inactive')
        <span class="badge badge-danger">Inactive</span>
        @endif
    </td>
    <td class="text-capitalize"><span> {{ $product->product_attribute }}</span></td>
    <td>
        <a href="edit_product/{{ $product->product_id }}" class="btn btn-sm btn-outline-success" title="Edit"><i class="icon-pencil"></i></a>
        <a href="javascript:;" data-id="{{ $product->product_id }}" class="btn btn-sm btn-outline-danger show-alert" title="Delete"><i class="icon-trash"></i></a>
    </td>
</tr>
@endforeach