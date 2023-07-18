@extends('layouts.app')
@section('title', 'Categories')

@section('content')
    <div class="header-list-page">
        <h1 class="title">Categories</h1>
        <a href="create.blade.php" class="btn-action">Add new Category</a>
    </div>
    <table class="data-grid">
        <tr class="data-row">
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Name</span>
            </th>
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Code</span>
            </th>
            <th class="data-grid-th">
                <span class="data-grid-cell-content">Actions</span>
            </th>
        </tr>
        @foreach($categories as $category)
            <tr class="data-row">
                <td class="data-grid-td">
                    <span class="data-grid-cell-content">{{ $category->name }}</span>
                </td>

                <td class="data-grid-td">
                    <span class="data-grid-cell-content">{{ $category->id }}</span>
                </td>

                <td class="data-grid-td">
                    <div class="actions">
                        <div class="action edit"><span>Edit</span></div>
                        <div class="action delete"><span>Delete</span></div>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection