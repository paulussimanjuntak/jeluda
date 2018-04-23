@extends('layouts.app')
@section('content')
<style>
.kusner{
width:100%;
background: #16222A;  /* fallback for old browsers */
background: -webkit-linear-gradient(to top, #3A6073, #16222A);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to top, #3A6073, #16222A); /* W3C, IE 10+/ Edge, Firefttox 16+, Chrome 26+, Opera 12+, Safari 7+ */
}

body{
    font-family: system-ui;        
  }

@media (min-width: 44px) {  
 h1 {font-size:1.2rem;} /*1rem = 16px*/
.kusner{
  height:200px;padding-top:80px;
}
} 

@media (min-width: 244px) {  
 h1 {font-size:1.8rem;} /*1rem = 16px*/
.kusner{
  height:250px;padding-top:100px;
}
} 

@media (min-width: 320px) {  
 h1 {font-size:1.4rem;} /*1rem = 16px*/
.kusner{
  height:250px;padding-top:110px;
}
} 

@media (min-width: 360px) {  
 h1 {font-size:1.6rem;} /*1rem = 16px*/
.kusner{
  height:250px;padding-top:95px;
}
} 

@media (min-width: 375px) {  
 h1 {font-size:1.6rem;} /*1rem = 16px*/
.kusner{
  height:250px;padding-top:105px;
}
} 


@media (min-width: 412px) {  
 h1 {font-size:1.6rem;} /*1rem = 16px*/
.kusner{
  height:250px;padding-top:110px;
}
} 

@media (min-width: 544px) {  
  h1 {font-size:2rem;} /*1rem = 16px*/
.kusner{
  height:300px;padding-top:130px;
}
}
 
/* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
@media (min-width: 768px) {  
  h1 {font-size:2rem;} /*1rem = 16px*/
.kusner{
  height:350px;padding-top:155px;
}
}
 
/* Large devices (desktops, 992px and up) */
@media (min-width: 992px) { 
  h1 {font-size:2.2rem;} /*1rem = 16px*/
.kusner{
  height:350px;padding-top:170px;
}
}
 
/* Extra large devices (large desktops, 1200px and up) */
@media (min-width: 1200px) {  
  h1 {font-size:2.2rem;} /*1rem = 16px*/    
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
<div class="kusner">
  <div class="align-center text-center">
@if(Auth::check())
    <h1 class="text-center" style="z-index:1000; color:#fff;">Kamu sedang mengedit komentar kamu di kebudayaan <br> {{$comment->posting->kabupaten->nama}}</h1>
@else
    <h1 class="text-center" style="z-index:1000; color:#fff;">Selamat menjelajah budaya kawan</h1>
@endif
    </div>
  </div>
</div>


<div class="container" style="margin-top:50px;">
<form action="{{url("/jelajah-comment/{$comment->id}")}}" method="POST">
    {{ method_field('PUT')   }} 
    {{ csrf_field()    }}       
  <textarea class="col-12" name="edit_comment" rows="10" placeholder="tulis komentar anda disini..." style="margin-top:20px; padding-top:10px; border:solid 2px #304D6D; background-color:transparent;">{{$comment->subject}}</textarea>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

</div>      
  <div class="container">
    <button class="container-fluid btn btn-outline-primary btn-block" name="submit" style="margin-top:15px;">Edit Komentar</button>                                           
  </div>
</form>
@endsection
