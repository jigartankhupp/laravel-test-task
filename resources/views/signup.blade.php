@extends('master.app')
<title>@lang('msg.signup')</title>
@section('content')
<div class="main-panel">
<div class="content-wrapper">
  	<div class="container register-form">
            <form method="post" id="signupForm" action="{{ url('user/signup') }}" >
            	 @csrf 
                <div class="note">
                    <p>@lang('msg.signup')</p>
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
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text"  name="name" class="form-control" placeholder="@lang('msg.Name')*" />
                            </div>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="@lang('msg.Email') *" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="@lang('msg.Password') *" />
                            </div>
                            <div class="form-group">
                                <input type="password" name ="confirmpassword" class="form-control" placeholder="@lang('msg.Confirm Password') *" />
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btnSubmit">@lang('msg.Submit')</button>
                </div>
            </form>
    </div>

</div>

@endsection
