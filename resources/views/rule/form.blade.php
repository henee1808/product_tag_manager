@extends('layout.header')

@section('content')



<div class="dashboard-content w-100">
    <div class="product-list-section">
        <div class="breadcrumb_header">
            @if($id==0)
            <h3 class="title_main">Add Rule</h3>
            @else
            <h3 class="title_main">Update Rule</h3>
            @endif
            <div class="breadcrumbs">
                <a href="{{url('/rule-list')}}">Rule</a>
                <i class="fa-solid fa-angle-right"></i>
                @if($id==0)
                <span>Add Rule</span>
                @else
                <span>Update Rule</span>
                @endif
            </div>
        </div>

        <div class="main_col">
            <div class="addcategory_form">
                <form action="{{url('/store-rule')}}/{{$id}}" method="POST" role="form text-left" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 add-cat-left">
                            <div class="col-lg-6 d-flex category_field">
                                <label>
                                    Name
                                </label>
                                <div class="form-input">
                                    <input type="text" class="form-control" name="name" value="{{ $rule->name ?? '' }}">
                                    @error('name')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div id="conditions-wrapper" class="category_field">
                            <label>Rule Conditions</label>
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
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-lg-3">
                                <button type="button" id="add-condition" class="btn btn-sm btn-secondary">+ Add Condition</button>
                            </div>
                        </div>
                        


                         <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 add-cat-left">
                             <div class="col-lg-6 d-flex category_field">
                                <label>
                                    Tags
                                </label>
                                <div class="form-input">
                                    <input type="text" class="form-control" name="tags" value="{{$rule->tags ?? ''}}">
                                    @error('tags')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class=" col-xl-12 col-lg-12 col-md-12 col-sm-12  ">
                            <div class="col-12 Submit_btn d-flex">
                                <button class="btn btn_1" type="button"><a href="{{url('/rule-list')}}">Cancel</a></button>
                                <button class="btn btn_2" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script type="text/javascript">
document.getElementById('add-condition').addEventListener('click', function() {
    let wrapper = document.getElementById('conditions-wrapper');
    let index = wrapper.querySelectorAll('.condition-row').length;

    let row = `
        <div class="row mb-2 condition-row form-input">
            <div class="col-lg-3">
                <select name="conditions[${index}][field]" class="form-control" required>
                    <option value="">Select Field</option>
                    <option value="type">Type</option>
                    <option value="sku">SKU</option>
                    <option value="vendor">Vendor</option>
                    <option value="price">Price</option>
                    <option value="qty">Qty</option>
                </select>
            </div>
            <div class="col-lg-3">
                <select name="conditions[${index}][operator]" class="form-control" required>
                    <option value="">Select Operator</option>
                    <option value="==">==</option>
                    <option value=">">></option>
                    <option value="<"><</option>
                </select>
            </div>
            <div class="col-lg-3">
                <input type="text" name="conditions[${index}][value]" class="form-control" placeholder="Enter Value" required>
            </div>
            <div class="col-lg-3 delete-additional-button">
                <i class="fa-solid fa-trash"></i>
            </div>
        </div>
    `;
    wrapper.insertAdjacentHTML('beforeend', row);
});


document.addEventListener('click', function(e) {
    if (e.target.closest('.delete-additional-button')) {
        const conditionRow = e.target.closest('.condition-row');
        if (conditionRow) {
            conditionRow.remove();
        }
    }
});
</script>
    
@endsection
