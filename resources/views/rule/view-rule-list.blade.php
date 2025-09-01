@extends('layout.header')

@section('content')



<div class="dashboard-content w-100">
                <div class="product-list-section">
                    <div class="breadcrumb_header">
                        <h3 class="title_main">Rule Detail</h3>
                        <div class="breadcrumbs">
                            <a href="{{url('/rule-list')}}">Rules</a>
                            <i class="fa-solid fa-angle-right"></i>
                            <span>Rule Detail</span>
                        </div>
                    </div>
                    <div class="recent_orders main_col">
                        <div class="seller-detail">
                            <div class="row">
                                  <div class=" col-lg-6 seller-details-list ">
                                    <span class="seller_label ">Name : </span>
                                    <span class="seller_value">{{$rule->name}}</span>
                                </div>
                            @php
                               $decodedConditions = isset($rule->conditions) ? json_decode($rule->conditions, true) : null;

                                $conditions = old('conditions', $decodedConditions ?? [['field'=>'','operator'=>'','value'=>'']]);
                            @endphp
                            @foreach($conditions as $index => $condition)
                                <div class="row mb-2 condition-row form-input">
                                    <div class="col-lg-3">
                                        <select name="conditions[{{ $index }}][field]" class="form-control" required>
                                            <option value="">Select Field</option>
                                            <option value="type" {{ $condition['field']=='type' ? 'selected' : '' }}>Type</option>
                                            <option value="sku" {{ $condition['field']=='sku' ? 'selected' : '' }}>SKU</option>
                                            <option value="vendor" {{ $condition['field']=='vendor' ? 'selected' : '' }}>Vendor</option>
                                            <option value="price" {{ $condition['field']=='price' ? 'selected' : '' }}>Price</option>
                                            <option value="qty" {{ $condition['field']=='qty' ? 'selected' : '' }}>Qty</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <select name="conditions[{{ $index }}][operator]" class="form-control" required>
                                            <option value="">Select Operator</option>
                                            <option value="==" {{ $condition['operator']=='==' ? 'selected' : '' }}>==</option>
                                            <option value=">" {{ $condition['operator']=='>' ? 'selected' : '' }}>></option>
                                            <option value="<" {{ $condition['operator']=='<' ? 'selected' : '' }}><</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-3">
                                        <input type="text" name="conditions[{{ $index }}][value]" class="form-control" value="{{ $condition['value'] }}" placeholder="Enter Value" required>
                                    </div>
                                    <div class="col-lg-3 delete-additional-button">
                                        <i class="fa-solid fa-trash"></i>
                                    </div>
                                </div>
                            @endforeach

                                <div class=" col-lg-6 seller-details-list ">
                                    <span class="seller_label ">Tags : </span>
                                    <span class="seller_value"> {{$rule->tags}}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 seller-btns d-flex">
                            <button class="btn btn_2" id="verifyAnother"><a href="{{url('/add-rule')}}/{{$rule->id}}">Update</a></button>
                            <button class="btn btn_2" id="verifyAnother"><a href="{{url('/rule-list')}}">Back</a></button>
                        </div>
                </div>
                </div>
    </div>


@endsection