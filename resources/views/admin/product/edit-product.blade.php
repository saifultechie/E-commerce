@extends('admin.master')
@section('body')
<br/>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <div class="panel panel-default">
            <div class="panel-body">

            <h1 class="text-center text-success">{{ Session::get('message')}}</h1>
                {{ Form::open(['route'=>'update-product','method'=>'POST','class'=>'form-horizontal','enctype'=>'multipart/form-data','name'=>'editProduct']) }}

                    <div class="form-group">
                        <label class="control-label col-md-3">Category Name</label>
                        <div class="col-md-9">
                            <select class="form-control" name="category_id">
                                <option >-----Select Category -----</option>
                                @foreach( $categories as $category)
                                <option value="{{ $category->id}}">{{ $category->category_name}}</option>
                                @endforeach
                                
                            </select>
                            <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name') : ' '}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Brand Name</label>
                        <div class="col-md-9">
                            <select class="form-control" name="brand_id">
                                <option >-----Select Brand -----</option>
                                @foreach( $brands as $brand)
                                <option value="{{ $brand->id}}">{{ $brand->brand_name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name') : ' '}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Product Name</label>
                        <div class="col-md-9">
                            <input type="text" name="product_name" value="{{ $product->product_name}}" class="form-control">
                            <input type="hidden" name="product_id" value="{{ $product->id}}" class="form-control">
                            <span class="text-danger">{{ $errors->has('brand_name') ? $errors->first('brand_name') : ' '}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Product Price</label>
                        <div class="col-md-9">
                            <input type="text" name="product_price" value="{{ $product->product_price}}" class="form-control">
                            <span class="text-danger">{{ $errors->has('brand_price') ? $errors->first('brand_price') : ' '}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Product Quantity</label>
                        <div class="col-md-9">
                            <input type="text" name="product_quantity" value="{{ $product->product_quantity}}" class="form-control">
                            <span class="text-danger">{{ $errors->has('product_quantity') ? $errors->first('product_quantity') : ' '}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">short Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" name="short_description">{{ $product->short_description}}</textarea>
                            <span class="text-danger">{{ $errors->has('brand_description') ? $errors->first('brand_description') : ' '}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Long Description</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="editor" name="long_description">{{ $product->long_description}}</textarea>
                            <span class="text-danger">{{ $errors->has('brand_description') ? $errors->first('brand_description') : ' '}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3">Product Image</label>
                        <div class="col-md-9">
                            <input type="file" name="product_image" accept="image/*">
                            <br>
                            <img src="{{ asset($product->product_image)}}" alt="" height="80" width="80">
                            <span class="text-danger">{{ $errors->has('product_quantity') ? $errors->first('product_quantity') : ' '}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-md-3">Publication status</label>
                        <div class="col-md-9 radio">
                            <label><input type="radio" name="publication_status" {{ $product->publication_status==1?'checked': ''}} value="1"/> Published</label>
                            <label><input type="radio" name="publication_status" {{ $product->publication_status==0?'checked': ''}} value="0"/> Unpublished</label><br>
                            <span class="text-danger">{{ $errors->has('publication_status') ? $errors->first('publication_status') : ' '}}</span>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-9 col-md-offset-3">
                            <input type="submit" name="btn" value="Save Product Info" class="btn btn-success btn-block"/>
                        </div>
                    </div>

                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    document.forms['editProduct'].elements['category_id'].value = {{ $product->category_id}};
    document.forms['editProduct'].elements['brand_id'].value = {{ $product->brand_id}};
</script>

@endsection