@extends('layouts.app')
@section('title', 'Edit Product')
@section('content')
    @if(isset($_SESSION['message']))
        <span>
            {{ $_SESSION['message'] }}
        </span>
    @endif
    <h1 class="title new-item">Edit Product</h1>
    <form action="{{ url('products.update', ['id' => $product->id]) }}" method="POST">
        <div class="input-field">
            <label for="sku" class="label">Product SKU</label>
            <input type="text" id="sku" class="input-text" name="sku" value="{{ $product->sku }}"/>
        </div>
        <div class="input-field">
            <label for="name" class="label">Product Name</label>
            <input type="text" id="name" class="input-text" name="name" value="{{ $product->name }}"/>
        </div>
        <div class="input-field">
            <label for="price" class="label">Price</label>
            <input type="text" id="price" class="input-text" name="price" value="{{ $product->price }}"/>
        </div>
        <div class="input-field">
            <label for="quantity" class="label">Quantity</label>
            <input type="text" id="quantity" class="input-text" name="quantity" value="{{ $product->quantity }}"/>
        </div>
        <div class="input-field">
            <label for="category" class="label">Categories</label>
            <select name="categories[]" multiple id="category" class="input-text">
                @foreach($categories as $category)
                    @if(in_array($category->id, $product->categories->modelKeys()))
                        <option selected value="{{ $category->id }}">{{ $category->name }}</option>
                        @continue(true)
                    @endif
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-field">
            <label for="description" class="label">Description</label>
            <textarea id="description" class="input-text" name="description">
                {{ $product->description }}
            </textarea>
        </div>
        <div class="actions-form">
            <a href="{{ url('products.index') }}" class="action back">Back</a>
            <input class="btn-submit btn-action" type="submit" value="Save Product"/>
        </div>
    </form>
@endsection