@extends('layouts.admin')
@section('content')

<div class="container-fluid mt-5">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h6 class="mb-0">
                        Collection||Edit Products
                        <a href="{{ url('products') }}" class="badge bg-danger p-2 text-white float-right">BACK</a>
                    </h6>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-3">
        <div class="col-md-12">

            <div class="card">
                <div class="card-body">
                @if(session('status'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>Hey!</strong>{{session('status')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                @endif

                    <form action="{{ url('update-products/'.$products->id) }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT')}}


                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                              <a class="nav-link active" id="product-tab" data-toggle="tab" data-target="#product" role="tab">Product</a>
                            </li>
                            <li class="nav-item" role="presentation">
                              <a class="nav-link" id="descriptions-tab" data-toggle="tab" data-target="#descriptions" role="tab" >Descriptions</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="seo-tab" data-toggle="tab" data-target="#seo" role="tab" >SEO</a>
                              </li>
                            <li class="nav-item" role="presentation">
                              <a class="nav-link" id="status-tab" data-toggle="tab" data-target="#status" role="tab">Product Status</a>
                            </li>
                        </ul>
                        <div class="tab-content border p-3" id="myTabContent">
                            <div class="tab-pane fade show active" id="product" role="tabpanel" >

                                <div class="row mt-3">

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Product Name</label>
                                            <input type="text" name="name" value="{{ $products->name}}" class="form-control" placeholder="Product Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Select Sub-Category (Eg: Brands)</label>
                                            <select name="sub_category_id" class="form-control" required>
                                                <option value="{{ $products->sub_category_id }}">{{ $products->subcategory->name }}</option>
                                                @foreach ($subcategory as $subcateitem)
                                                <option value="{{ $subcateitem->id }}">{{ $subcateitem->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Custom URL (Slug)</label>
                                            <input type="text" name="url" value="{{ $products->url}}" placeholder="Custom URL" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Small Description</label>
                                            <textarea name="small_description" id="summ_descr" placeholder="Small Description about product" rows="4" class="form-control">{{$products->small_description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label for="">Product Image</label>
                                            <input type="file" name="prod_image" placeholder="Product Image" class="form-control">
                                            <img src="{{asset('uploads/products/'.$products->image)}}" width="60px" alt="">
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Sale Tag</label>
                                            <input type="number" name="saletag" value="{{ $products->saletag}}" placeholder="sale tag" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Original Price</label>
                                            <input type="number" name="original_price" value="{{ $products->original_price}}" placeholder="Original Price" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Offer Price</label>
                                            <input type="number" name="offer_price" value="{{ $products->offer_price}}" placeholder="Offer Price" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Quantity</label>
                                            <input type="number" name="quantity" value="{{ $products->quantity}}" placeholder="Quantity" class="form-control" />
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Priority</label>
                                            <input type="number" name="priority" value="{{ $products->priority}}" placeholder="Priority" class="form-control" />
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="tab-pane fade" id="descriptions" role="tabpanel" >
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">High Lights</label>
                                            <input type="text"  name="p_highlight_heading" value="{{ $products->p_highlight_heading}}" placeholder="High-Light Heading" class="form-control">
                                            <textarea name="p_highlights" id="summ_highlight1" placeholder="High-Light Description" rows="4" class="form-control">{{ $products->p_highlights}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Product Description</label>
                                            <input type="text" name="p_description_heading" value="{{ $products->p_description_heading}}" placeholder="Product Description" class="form-control">
                                            <textarea name="p_description" id="summ_highlight2" placeholder="Product Description" rows="4" class="form-control">{{ $products->p_description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Product Details/Specification</label>
                                            <input type="text" name="p_details_heading" value="{{ $products->p_details_heading}}" placeholder="Product Details/Specification Heading" class="form-control">
                                            <textarea name="p_details" id="summ_highlight3" placeholder="Product Details/Specification" rows="4" class="form-control">{{ $products->p_details}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="seo" role="tabpanel" >
                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Meta Title</label>
                                            <textarea name="meta_title" id="summ_prod_desc1" placeholder="Meta Title" rows="4" class="form-control">{{ $products->meta_title}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Meta Description</label>
                                            <textarea name="meta_description" id="summ_prod_desc2" placeholder="Product Description" rows="4" class="form-control">{{$products->meta_description}}</textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Meta Keywords</label>
                                            <textarea name="meta_keyword" id="summ_prod_desc3" placeholder="Product Details/Specification" rows="4" class="form-control">{{$products->meta_keyword}}</textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="status">
                                <div class="row">

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">New Arrivals</label>
                                            <input type="checkbox" name="new_arrival" class="form-control" {{ $products->new_arrival == '1' ? 'checked':''}}/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Featured Products</label>
                                            <input type="checkbox" name="featured_products" class="form-control" {{ $products->featured_products == '1' ? 'checked' : ''}}/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Popular Products</label>
                                            <input type="checkbox" name="popular_products" class="form-control" {{ $products->popular_products == '1' ? 'checked':''}}/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Offer Products</label>
                                            <input type="checkbox" name="offers_products" class="form-control" {{ $products->offers_products == '1' ? 'checked':''}}/>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="">Show Hide</label>
                                            <input type="checkbox" name="status" class="form-control"  {{ $products->status == '1' ? 'checked' : ''}}/>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="form-group mt-3 text-right">
                            <button type="submit" class="btn btn-primary">SAVE</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
      $('#summ_descr').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
      $('#summ_highlight1').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
      $('#summ_highlight2').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
      $('#summ_highlight3').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
      $('#summ_prod_desc1').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
      $('#summ_prod_desc2').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
      $('#summ_prod_desc3').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
</script>

@endsection
