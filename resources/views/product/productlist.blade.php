@extends('master.app')
<title>@lang('msg.allProduct')</title>
@section('content')
<div class="main-panel">
<div class="content-wrapper">

  	<div class="container allproduct-list">
      <div class="card-body">
         <div class="col-sm-12">
            <div class="row card-body-margin">
               <div class="col-sm-6">
                  <h4 class="card-title">@lang('msg.Product')</h4>
               </div>
               <div class="col-sm-6 add_product">
                    <a class="card-title float-right validation_btn" href="{{ url('product/add') }}">
                  <span class="btn" >+ @lang('msg.Add Product')</span>
                  </a>
               </div>
            </div>
         </div>
         
        <div class="col-sm-12">
         <div class="table-responsive">
          @if(count($productData) > 0)            
            <table id="order-listing" class="table">
               <thead>   
                   <tr>
                  <th>@lang('msg.Name')</th>
                  <th>@lang('msg.CreatedAt')</th>
                  <th class="action_title">@lang('msg.Edit')</th>
                  <th class="action_title">@lang('msg.Delete')</th>
               </tr>
               </thead>               
               <tbody>
                 
                 @foreach($productData as $data)
                  <tr>
                        <td><a href="{{ URL('/product/detail/'.$data->id )}}"> {{$data->product_name}} </a> </td>
                        <td>{{$data->created_at}} </td>
                        <td>                     
                        <a href="{{ URL('/product/edit/'.$data->id )}}"> 
                          <button class="btn btn-default" type="button" >@lang('msg.Edit')
                          </button>   
                        </a>                                      
                        </td>
                        <td>   
                        <a href="{{ URL('/product/delete/'.$data->id )}}">                   
                          <button class="btn btn-default" type="button" >@lang('msg.Delete')<span class="caret"></span>
                          </button>
                        </a>                                         
                        </td>
                  </tr>
                 @endforeach
              </tbody>
            </table>  
         @else
              <h4 style="text-align:center;">@lang('msg.Empty Data')</h4>
         @endif   
         <div class="float-right">{{ $productData->links() }}</div>
         </div>
         </div>
      </div>
           
    </div>

</div>

@endsection