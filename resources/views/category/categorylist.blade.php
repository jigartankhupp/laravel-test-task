@extends('master.app')
<title>@lang('msg.allCategory')</title>
@section('content')
<div class="main-panel">
<div class="content-wrapper">

  	<div class="container allcategory-list">
      <div class="card-body">
         <div class="col-sm-12">
            <div class="row card-body-margin">
               <div class="col-sm-6">
                  <h4 class="card-title">@lang('msg.Category')</h4>
               </div>
               <div class="col-sm-6 add_product">
                    <a class="card-title float-right validation_btn" href="{{ url('category/add') }}">
                  <span class="btn" >+ @lang('msg.Add Category')</span>
                  </a>
               </div>
            </div>
         </div>
         
        <div class="col-sm-12">
         <div class="table-responsive">
          @if(count($categoryData) > 0)            
            <table id="order-listing" class="table">
               <thead>   
                   <tr>
                  <th>@lang('msg.Name')</th>
                  <th class="action_title">@lang('msg.Edit')</th>
                  <th class="action_title">@lang('msg.Delete')</th>
               </tr>
               </thead>               
               <tbody>
                 
                 @foreach($categoryData as $data)
                  <tr>
                        <td>{{$data->category_name}} </td>
                        <td>                     
                        <a href="{{ URL('/category/edit/'.$data->id )}}"> 
                          <button class="btn btn-default" type="button" >@lang('msg.Edit')
                          </button>   
                        </a>                                      
                        </td>
                        <td>   
                        <a href="{{ URL('/category/delete/'.$data->id )}}">                   
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
         <div class="float-right">{{ $categoryData->links() }}</div>
         </div>
         </div>
      </div>
           
    </div>

</div>

@endsection