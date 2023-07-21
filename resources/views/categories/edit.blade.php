@extends('layouts.app')
@section('title', 'Edit Category')
@section('content')
    <h1 class="title new-item">Edit Category</h1>
    <form action="{{ url('categories.update', ['id' => $category->id]) }}" method="POST">
      <div class="input-field">
        <label for="category-name" class="label">Category Name</label>
        <input type="text" id="category-name" class="input-text" name="name" value="{{$category->name}}" />
      </div>
      <div class="input-field">
        <label for="category-code" class="label">Category Code</label>
        <input type="text" id="category-code" class="input-text" name="code" value="{{$category->code}}" />
      </div>
      <div class="actions-form">
        <a href="{{ url('categories.index') }}" class="action back">Back</a>
        <input class="btn-submit btn-action"  type="submit" value="Save" />
      </div>
    </form>
@endsection