@extends('master.app')
<title>@lang('msg.addProduct')</title>
@section('content')
<div class="main-panel">
<div class="content-wrapper">
  	<div class="container register-form">
            <form method="post" id="addProduct"  @if(isset($productData)) action="{{ url('product/update/'.$productData->id) }}" @else action="{{ url('product/store') }}" @endif enctype="multipart/form-data" >
            	 @csrf 
                <div class="note">
                    <p>@lang('msg.Product Data')</p>
                </div>
                  @if (Session::has('success'))
                  <div class="alert alert-success">
                     <p>{{ Session::get('success') }}</p>
                  </div>
                  @endif
                  @if ($message = Session::get('error'))
                  <div class="alert alert-danger alert-block">
                
                  <strong>{{ $message }}</strong>
                  </div>
                  @endif
                  @if (count($errors) > 0)
                  <div class="alert alert-danger">
                     <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                     </ul>
                  </div>
                  @endif

                <div class="form-content">
                   <div class="form-group row">
                     <div class="col-lg-3">
                        <label for="name">@lang('msg.Product Name')<span style="color:red;">*</span></label>
                     </div>
                     <div class="col-lg-8">
                        <input id="name" class="form-control" name="product_name" type="text" value='@if(isset($productData)){{$productData->product_name}} @endif' placeholder="@lang('msg.Enter Name')" >
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-lg-3">
                        <label for="description">@lang('msg.Description')</label>
                     </div>
                     <div class="col-lg-8">
                        <textarea rows="4" cols="50" id="description" class="form-control" name="description">
                          @if(isset($productData)){{$productData->description}} @endif
                        </textarea>
                     </div>
                  </div>
                   @if(!isset($productData))
                   <div class="form-group row">
                     <div class="col-lg-3">
                        <label for="Image">@lang('msg.Product Image')<span style="color:red;">*</span></label>
                     </div>
                     <div class="col-lg-8">
                        <input id="image" class="form-control" name="image" type="file" >
                     </div>
                  </div>                              
                  @endif
                    <button type="submit" class="btnSubmit">@lang('msg.Submit')</button>
                </div>
            </form>
    </div>

</div>

@endsection