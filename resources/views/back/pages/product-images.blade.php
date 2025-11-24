@extends('back.layout.pages-layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : 'Product Images')
@section('content')
    @livewire('admin.product-images', ['productId' => $productId])
@endsection