@extends('layouts.app')
<style>
.kusner{
width:100%;
background: #16222A;  /* fallback for old browsers */
background: -webkit-linear-gradient(to top, #3A6073, #16222A);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to top, #3A6073, #16222A); /* W3C, IE 10+/ Edge, Firefttox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

@media (min-width: 44px) {  
 h1 {font-size:1.8rem;} /*1rem = 16px*/
.kusner{
  height:200px;padding-top:100px;
}
} 

@media (min-width: 244px) {  
 h1 {font-size:1.8rem;} /*1rem = 16px*/
.kusner{
  height:250px;padding-top:100px;
}
} 

@media (min-width: 544px) {  
  h1 {font-size:1.8rem;} /*1rem = 16px*/
.kusner{
  height:300px;padding-top:130px;
}
}
 
/* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
@media (min-width: 768px) {  
  h1 {font-size:1.8rem;} /*1rem = 16px*/
.kusner{
  height:350px;padding-top:155px;
}
}
 
/* Large devices (desktops, 992px and up) */
@media (min-width: 992px) { 
  h1 {font-size:2rem;} /*1rem = 16px*/
.kusner{
  height:350px;padding-top:170px;
}
}
 
/* Extra large devices (large desktops, 1200px and up) */
@media (min-width: 1200px) {  
  h1 {font-size:2rem;} /*1rem = 16px*/    
.kusner{
  height:400px;padding-top:180px;
}
}

@media (min-width: 1366px) {  
  h1 {font-size:2.3rem;} /*1rem = 16px*/    
.kusner{
  height:400px;padding-top:180px;
}
}

@media (min-width: 1920px) {  
  h1 {font-size:2.4rem;} /*1rem = 16px*/    
.kusner{
  height:550px;padding-top:250px;
}
}
</style>

@section('content')
<div class="kusner">
    <div class="align-center text-center">
        <h1 class="text-center" style="z-index:1000; font-family:system-ui; color:#fff;padding-bottom:200px;">Masukkan email untuk mengatur ulang password</h1> 
    </div>
</div>
<div class="container" style="margin-top:60px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="background-color:#304D6D; color:#fff; font-family:system-ui;">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" style="color:#304D6D; font-family:system-ui;" class="col-md-4 col-form-label text-md-right">{{ __('Alamat Email') }}</label>

                            <div class="col-md-6" style="color:#304D6D; font-family:system-ui;">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary" style="font-family:system-ui;">
                                    {{ __('Kirim Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
