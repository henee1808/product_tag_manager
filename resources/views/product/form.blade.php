@extends('layout.header')

@section('content')


<div class="dashboard-content w-100">
    <div class="product-list-section">
        <div class="breadcrumb_header">
            @if($id==0)
            <h3 class="title_main">Add Product</h3>
            @else
            <h3 class="title_main">Update Product</h3>
            @endif
            <div class="breadcrumbs">
                <a href="{{url('/product-list')}}">Product</a>
                <i class="fa-solid fa-angle-right"></i>
                @if($id==0)
                <span>Add Product</span>
                @else
                <span>Update Product</span>
                @endif
            </div>
        </div>

        <div class="main_col">
            <div class="addcategory_form">
                <form action="{{url('/store-product')}}/{{$id}}" method="POST" role="form text-left" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 add-cat-left">
                            <div class="col-lg-6 d-flex category_field">
                                <label>
                                    Image
                                </label>
                                <div class="upload_file">
                                    <input type="file" id="imageUpload" name="image" readonly onchange="readURL(this);"/>
                                    @if($product->image !='')
                                    <div for="imageUpload" class="upload-area">
                                        <img src="/uploads/product/{{$product->image}}">
                                    </div>
                                    @endif
                                    @error('image')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 add-cat-left">
                            <div class="col-lg-6 d-flex category_field">
                                <label>
                                    Name
                                </label>
                                <div class="form-input">
                                    <input type="text" class="form-control" name="name" value="{{$product->name}}">
                                    @error('name')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-lg-6 d-flex category_field">
                                <label>
                                    Description
                                </label>
                                <div class="form-input">
                                    <textarea class="form-control summernote" type="text" name="description">{{$product->description}}</textarea>
                                    @error('description')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                         <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 add-cat-left">
                            <div class="col-lg-6 d-flex category_field">
                                <label>
                                    Price
                                </label>
                                <div class="form-input">
                                    <input type="number" class="form-control" name="price" value="{{$product->price}}">
                                    @error('price')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                             <div class="col-lg-6 d-flex category_field">
                                <label>
                                    SKU
                                </label>
                                <div class="form-input">
                                    <input type="text" class="form-control" name="SKU" value="{{$product->sku}}">
                                    @error('SKU')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                         <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 add-cat-left">
                            <div class="col-lg-6 d-flex category_field">
                                <label>
                                    Quantity
                                </label>
                                <div class="form-input">
                                    <input type="number" class="form-control" name="qty" value="{{$product->qty}}">
                                    @error('qty')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                             <div class="col-lg-6 d-flex category_field">
                                <label>
                                    Type
                                </label>
                                <div class="form-input">
                                    <input type="text" class="form-control" name="type" value="{{$product->type}}">
                                    @error('type')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                         <div class="row col-xl-12 col-lg-12 col-md-12 col-sm-12 add-cat-left">
                            <div class="col-lg-6 d-flex category_field">
                                <label>
                                    Vendor
                                </label>
                                <div class="form-input">
                                    <input type="text" class="form-control" name="vendor" value="{{$product->vendor}}">
                                    @error('vendor')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>

                             <div class="col-lg-6 d-flex category_field">
                                <label>
                                    Tags
                                </label>
                                <div class="form-input">
                                    @php
                                    $tags = json_decode($product->tags, true) ?? [];
                                    $allTags = [];
                                    foreach ($tags as $val) {
                                        $allTags = array_merge($allTags, explode(',', $val));
                                    }
                                    $uniqueTags = array_unique(array_map('trim', $allTags));
                                    @endphp
                                    <input type="text" class="form-control" name="tags" value="{{ implode(', ', $uniqueTags) }}" readonly>
                                    @error('tags')
                                        <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class=" col-xl-12 col-lg-12 col-md-12 col-sm-12  ">
                            <div class="col-12 Submit_btn d-flex">
                                <button class="btn btn_1" type="button"><a href="{{url('/product-list')}}">Cancel</a></button>
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
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

        <script type="text/javascript">
           function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                $('.upload-area').html(`<img src="" style="width:100%;height:auto;border-radius:10px;">`);
                reader.onload = function (e) {
                    $('.upload-area img')
                        .attr('src', e.target.result)
                        .width(150)
                        .height(150);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }

         $('.summernote').summernote({
            placeholder: 'Enter description',
            tabsize: 2,
            height: 120,
            callbacks: {
                    onImageUpload: function(image) {
                        uploadImage(image[0]);
                    }
            },
            toolbar: [
              ['style', ['style']],
              ['font', ['bold', 'underline', 'clear']],
              ['color', ['color']],
              ['para', ['ul', 'ol', 'paragraph']],
              ['table', ['table']],
              ['insert', ['link', 'picture', 'video']],
              ['view', ['fullscreen', 'codeview']]
            ]
          });

       </script>
@endsection
