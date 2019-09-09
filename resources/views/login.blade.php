@extends('master.app')
<title>@lang('msg.Login')</title>
@section('content')
<div class="main-panel">
<div class="content-wrapper">

	    <form  method="POST" action="{{ url('user/login') }}">
                @csrf
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
                  <div class="form-group">
                     <label for="exampleInputEmail1">@lang('msg.Email')</label>
                     <input type="text" class="form-control"  name="email" value="" placeholder="@lang('msg.Email')">
                  </div>
                  <div class="form-group">
                     <label for="exampleInputPassword1">@lang('msg.Password')</label>
                     <input type="password" class="form-control"  name="password" value="" placeholder="@lang('msg.Password')">
                  </div>
                  <div class="custom-checkbox remember_btn">
                     <label class="checkbox-container">
                     <input type="checkbox" name="remember">@lang('msg.Remember Me')
                     <span class="checkmark"></span>
                     </label>  
                  
                  </div>
                  <button type="submit" class="btn btn-gradient-primary mr-2 login-bottom-btn">@lang('msg.Login')</button>
                  <button type="submit" class="btn btn-gradient-primary mr-2 login-bottom-btn"> <a href="{{ url('signup') }}" >@lang('msg.signup')</a></button>
        </form>
</div>

@endsection


