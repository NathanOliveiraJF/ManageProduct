@extends('layouts.app')
@section('title', 'Products')

@section('content')
    <div class="header-list-page">
        @if(isset($_SESSION['message']))
            <span>
            {{ $_SESSION['message'] }}
        </span>
        @endif
        <h1 class="title">Products</h1>
        <a href="{{ url('products.create') }}" class="btn-action">Add new Product</a>
    </div>
    <table class="data-grid">
        <tr class="data-row">
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Name</span>
            </th>
            <th class="data-grid-th">
                <span class="data-grid-cell-content">SKU</span>
            </th>
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Price</span>
            </th>
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Quantity</span>
            </th>
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Categories</span>
            </th>

            <th class="data-grid-th">
                <span class="data-grid-cell-content">Actions</span>
            </th>
        </tr>
        @foreach($products as $product)
            <tr class="data-row">
                <td class="data-grid-td">
                    <span class="data-grid-cell-content">{{ $product->name }}</span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content">{{ $product->sku }}</span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content">{{ $product->price }}</span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content">{{ $product->quantity }}</span>
                </td>

                <td class="data-grid-td">
                    @foreach($product->categories as $category)
                        <span class="data-grid-cell-content">{{ $category->name }}<br> </span>
                    @endforeach
                </td>

                <td class="data-grid-td">
                    <div class="actions">
                        <a href="{{ url('products.edit', ['id' => $product->id]) }}" class="action edit"><span>Edit</span></a>
                        <form method="post" action="{{ url('products.delete', ['id' => $product->id]) }}">
                            <input type="hidden" name="_method" value="DELETE" />
                            <button class="btn-action">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
