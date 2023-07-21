@extends('layouts.app')
@section('title', 'Categories')

@section('content')
    <div class="header-list-page">
        <h1 class="title">Categories</h1>
        <a href="{{ url('categories.create') }}" class="btn-action">Add new Category</a>
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
                    <span class="data-grid-cell-content">{{ $category->code }}</span>
                </td>

                <td class="data-grid-td">
                    <div class="actions">
                        <a href="{{ url('categories.edit', ['id' => $category->id]) }}" class="action edit"><span>Edit</span></a>
                        <form method="post" action="{{ url('categories.delete', ['id' => $category->id]) }}">
                            <input type="hidden" name="_method" value="DELETE" />
                            <button class="btn-action">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
@endsection