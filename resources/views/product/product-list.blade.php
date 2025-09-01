@extends('layout.header')

@section('content')

<div class="dashboard-content w-100">
    <div class="product-list-section">
        <div class="breadcrumb_header">
            <h3 class="title_main">Product List</h3>
        </div>
        <div class="search-export justify-content-between">
            <a href="{{url('/add-product')}}/0" class="export-btn">
                <i class="fa-solid fa-arrow-up-from-bracket"></i> Add
            </a>
        </div>
        <div class="recent_orders main_col">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th><input type="checkbox"></th>
                            <th>ID</th>
                            <th>Name</th>
                            <th>SKU</th>
                            <th>Price</th>
                            <th>Vendor</th>
                            <th>Type</th>
                            <th>Tags</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="product-table-body">
                        @foreach($products as $k=>$p)
                        <tr class="change_visibility_{{$p->id}}">
                            <td><input type="checkbox"></td>
                            <td>{{$k+1}}</td>
                            <td>{{$p->name}}</td>
                            <td>{{$p->sku}}</td>
                            <td>{{$p->price}}</td>
                            <td>{{$p->vendor}}</td>
                            <td>{{$p->type}}</td>
                            <td>
                            @php
                                $tags = json_decode($p->tags, true) ?? [];
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
                            </td>
                            <td class="prd-action-icons">
                                <a href="{{url('/view-product-list')}}/{{$p->id}}" class="mx-0" data-bs-toggle="tooltip" data-bs-original-title="View">
                                   <i class="fa-solid fa-eye"></i>
                                </a>
                                <a href="{{url('/add-product')}}/{{$p->id}}" class="mx-0" data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                </a>
                                <span onclick="delete_product_data({{$p->id}})">
                                    <i class="fa-solid fa-trash"></i>
                                </span>   
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="pagination" id="pagination-controls">
        </div>
    </div>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<script type="text/javascript">
    function delete_product_data(id) {
        swal({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            buttons: {
                confirm: {
                    text: 'Yes, delete it!',
                    className: 'btn btn-success'
                },
                cancel: {
                    visible: true,
                    text: 'Cancel',
                    className: 'btn btn-danger'
                }
            }
        }).then((willDelete) => {
            if (willDelete) {
                var BASE_URL = "{{ url('/') }}";

                $.ajax({
                    url: BASE_URL + '/product/' + id,
                    type: 'DELETE',
                    data: {
                        "_token": "{{ csrf_token() }}" 
                    },
                    success: function(response) {
                        $('.change_visibility_' + id).hide();
                        swal("Deleted!", "Your product has been deleted.", "success");
                    },
                    error: function(xhr) {
                        swal("Error!", "Something went wrong.", "error");
                    }
                });
            } else {
                swal.close();
            }
        });
    }
</script>

@endsection
