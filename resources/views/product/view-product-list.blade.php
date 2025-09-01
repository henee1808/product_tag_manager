@extends('layout.header')

@section('content')


<div class="dashboard-content w-100">
                <div class="product-list-section">
                    <div class="breadcrumb_header">
                        <h3 class="title_main">Product Detail</h3>
                        <div class="breadcrumbs">
                            <a href="{{url('/product-list')}}">Products</a>
                            <i class="fa-solid fa-angle-right"></i>
                            <span>Product Detail</span>
                        </div>
                    </div>
                    <div class="recent_orders main_col">
                        <div class="seller-detail">
                            <div class="row">
                                <div class=" col-lg-12 seller-details-list ">
                                    <span class="seller_label ">Image : </span>
                                    <span class="seller_value"><img class="list-image" src="/uploads/product/{{$product->image}}" alt="{{$product->name}}"></span>
                                </div>
                                  <div class=" col-lg-6 seller-details-list ">
                                    <span class="seller_label ">Name : </span>
                                    <span class="seller_value">{{$product->name}}</span>
                                </div>
                                 <div class=" col-lg-6 seller-details-list ">
                                    <span class="seller_label ">Description: </span>
                                    <span class="seller_value">{!!$product->description!!}</span>
                                </div>
                                  <div class=" col-lg-6 seller-details-list ">
                                    <span class="seller_label ">Price : </span>
                                    <span class="seller_value">{{$product->price}}</span>
                                </div>
                                  <div class=" col-lg-6 seller-details-list ">
                                    <span class="seller_label ">SKU : </span>
                                    <span class="seller_value">{{$product->sku}}</span>
                                </div>
                                <div class=" col-lg-6 seller-details-list ">
                                    <span class="seller_label ">Quantity : </span>
                                    <span class="seller_value"> {{$product->qty}}</span>
                                </div>
                                <div class=" col-lg-6 seller-details-list ">
                                    <span class="seller_label ">Type : </span>
                                    <span class="seller_value"> {{$product->type}}</span>
                                </div>
                                <div class=" col-lg-6 seller-details-list ">
                                    <span class="seller_label ">Vendor : </span>
                                    <span class="seller_value"> {{$product->vendor}}</span>
                                </div>
                                <div class=" col-lg-6 seller-details-list ">
                                    <span class="seller_label ">Tags : </span>
                                    <span class="seller_value">
                                    @php
                                        $tags = json_decode($product->tags, true) ?? [];
                                        $allTags = [];
                                        foreach ($tags as $val) {
                                            $allTags = array_merge($allTags, explode(',', $val));
                                        }
                                        $uniqueTags = array_unique(array_map('trim', $allTags));
                                    @endphp

                                    @if(!empty($uniqueTags))
                                        {{ implode(', ', $uniqueTags) }}
                                    @else
                                        No tags
                                    @endif
                                </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 seller-btns d-flex">
                            <button class="btn btn_2" id="verifyAnother"><a href="{{url('/add-product')}}/{{$product->id}}">Update</a></button>
                            <button class="btn btn_2" id="verifyAnother"><a href="{{url('/product-list')}}">Back</a></button>
                        </div>
                </div>
                </div>
    </div>


@endsection