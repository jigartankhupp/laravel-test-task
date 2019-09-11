@extends('master.app')
<title>@lang('msg.Dashboard') </title>
@section('content')
<div class="main-panel">
<div class="content-wrapper">

	 <a href="{{ URL('/product/list')}}">    
	 	<button>@lang('msg.Product')</button>
     </a>

      <a href="{{ URL('/category/list')}}">    
	 	<button>@lang('msg.Category')</button>
     </a>

  
  
</div>

@endsection
