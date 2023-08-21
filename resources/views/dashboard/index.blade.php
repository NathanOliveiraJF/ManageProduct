@extends('layouts.app')
@section('title', 'Webjump | Backend Test | Dashboard')
@section('content')
    <main class="content">
        <div class="header-list-page">
            <h1 class="title">Dashboard</h1>
        </div>
        <div class="infor">
            You have {{ $quantityProduct }} products added on this store: <a href="{{ url('products.create') }}" class="btn-action">Add new Product</a>
        </div>
        <ul class="product-list">
            @foreach($products as $product)
                <li>
                    <div class="product-image">
                        <img src="../../resources/images/product/tenis-runner-bolt.png" layout="responsive" width="164" height="145"
                             alt="Tênis Runner Bolt"/>
                    </div>
                    <div class="product-info">
                        <div class="product-name"><span>{{ $product->name }}</span></div>
                        <div class="product-price"><span class="special-price">{{ $product->quantity }} available</span> <span>R${{ $product->price }}</span>
                        </div>
                    </div>
                </li>
            @endforeach
        </ul>
    </main>
@endsection