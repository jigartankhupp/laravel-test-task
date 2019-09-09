@extends('master.app')
<title>@lang('msg.Dashboard') </title>
@section('content')
<div class="main-panel">
<div class="content-wrapper">

	 <a href="{{ URL('/product/add')}}">    
	 	<button>@lang('msg.Product')</button>
     </a>

      <a href="{{ URL('/category/add')}}">    
	 	<button>@lang('msg.Category')</button>
     </a>

  
  
</div>

@endsection
