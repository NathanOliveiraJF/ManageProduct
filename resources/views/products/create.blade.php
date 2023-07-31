@extends('layouts.app')
@section('title', 'New Product')
@section('content')
    <h1 class="title new-item">New Product</h1>
    <form>
        <div class="input-field">
            <label for="sku" class="label">Product SKU</label>
            <input type="text" id="sku" class="input-text" name="sku"/>
        </div>
        <div class="input-field">
            <label for="name" class="label">Product Name</label>
            <input type="text" id="name" class="input-text" name="name"/>
        </div>
        <div class="input-field">
            <label for="price" class="label">Price</label>
            <input type="text" id="price" class="input-text" name="price"/>
        </div>
        <div class="input-field">
            <label for="quantity" class="label">Quantity</label>
            <input type="text" id="quantity" class="input-text" name="quantity"/>
        </div>
        <div class="input-field">
            <label for="category" class="label">Categories</label>
            <select multiple id="category" class="input-text" name="categoryId">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-field">
            <label for="description" class="label">Description</label>
            <textarea id="description" class="input-text"></textarea>
        </div>
        <div class="actions-form">
            <a href="index.blade.php" class="action back">Back</a>
            <input class="btn-submit btn-action" type="submit" value="Save Product"/>
        </div>

    </form>
@endsection