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
                  <h4 class="card-title">@lang('msg.Product Info')</h4>
               </div>
             
            </div>
         </div>
         
        <div class="col-sm-12">
         <div class="table-responsive">
         @if($productData)             
          <table border="1" width="80%">
            <tr> 
              <td> product name</td>
              <td>{{$productData->product_name}} </td>
            </tr>
            <tr> 
              <td> product description</td>
              <td>{{$productData->description}} </td>
            </tr>
             </table>

             @if(isset($categoryData))
             <h4> Category info</h4>  
              <table border="1" width="80%">
                @foreach($categoryData as $data)
                <tr> 
                <td> category name</td>
                <td>{{$data->category_name}} </td>
                </tr>
                <tr> 
                <td> category price</td>
                <td>{{$data->price}} </td>
                </tr>          

                @endforeach
                 </table> 
             @endif 
           
         
         @else
              <h4 style="text-align:center;">@lang('msg.Empty Data')</h4>
         @endif   
        
         </div>
         </div>
      </div>
           
    </div>

</div>

@endsection