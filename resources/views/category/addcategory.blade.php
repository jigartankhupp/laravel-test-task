@extends('master.app')
<title>@lang('msg.addCategory')</title>
@section('content')
<div class="main-panel">
<div class="content-wrapper">
  	<div class="container register-form">
            <form method="post" id="addCategory"  @if(isset($categoryData)) action="{{ url('category/update/'.$categoryData->id) }}" @else action="{{ url('category/store') }}" @endif enctype="multipart/form-data" >
            	 @csrf 
                <div class="note">
                    <p>@lang('msg.Category Data')</p>
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
                        <label for="name">@lang('msg.Select Product')<span style="color:red;">*</span></label>
                     </div>
                     <div class="col-lg-8">
                       <select name="product">
                          <option value="">@lang('msg.Select Product') </option>
                          @if(isset($allProduct))
                           @foreach ($allProduct as $data)                           
                            <option @if (isset($categoryData) && ($categoryData->product_id == $data['id'] ))  selected @endif value="{{$data['id']}}"> {{$data['product_name']}}</option>                        

                          @endforeach
                          @endif

                       </select>
                     </div>
                  </div>

                   <div class="form-group row">
                     <div class="col-lg-3">
                        <label for="name">@lang('msg.Category Name')<span style="color:red;">*</span></label>
                     </div>
                     <div class="col-lg-8">
                        <input id="name" class="form-control" name="category_name" type="text" value='@if(isset($categoryData)){{$categoryData->category_name}} @endif' placeholder="@lang('msg.Enter Name')" >
                     </div>
                  </div>
                  <div class="form-group row">
                     <div class="col-lg-3">
                        <label for="price">@lang('msg.price')</label>
                     </div>
                     <div class="col-lg-8">
                        <input id="price" class="form-control" name="price" type="text" value='@if(isset($categoryData)){{$categoryData->price}} @endif' placeholder="@lang('msg.Enter Price')" >
                        
                        
                     </div>
                  </div>
                   @if(!isset($categoryData))
                   <div class="form-group row">
                     <div class="col-lg-3">
                        <label for="Image">@lang('msg.Category Image')<span style="color:red;">*</span></label>
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