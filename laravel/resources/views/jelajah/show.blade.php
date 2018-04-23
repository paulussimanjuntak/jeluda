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

p.pre {
    height: auto;
    overflow: auto;
    overflow-y: none;
    word-wrap: break-word;
    white-space: pre-wrap;
    word-break: normal;
}
  .scrollspy-example {
     position: sticky;
     height: 700px;
     overflow: auto;
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

.komen{
  width:100%;
  align:center; 
  border:2px dashed #304D6D; 
  border-radius:0px; 
  margin-top:20px;
  transition:.2s ease-in;
}

.komen:hover{
  border:2px solid #304D6D;
  background:#f9f9f9;
}


</style>
<div class="kusner">
  <div class="align-center text-center">
@if(Auth::check())
        <h1 class="text-center" style="z-index:1000; color:#fff;padding-bottom:200px;">Selamat menjelajah budaya {{$posting->kabupaten->nama}} di sistem kami <br>{{Auth::user()->name}}</h1>
@else
<h1 class="text-center" style="z-index:1000; color:#fff;margin-bottom:30px;">Selamat menjelajah budaya {{$posting->kabupaten->nama}} kawan</h1>
@endif
    </div>
  </div>
</div>

<div class="container-fluid" style="margin-top:40px; padding-left:30px;">
<div class="row">
<div class="col-sm-3" id="spy">
  <ul class="nav nav-pills flex-column">
    <li class="nav-item"><a class="nav-link active" href="#makanan">Makanan</a></li>
    <li class="nav-item"><a class="nav-link" href="#rumah">Rumah</a></li>
    <li class="nav-item"><a class="nav-link" href="#tarian">Tarian</a></li>
    <li class="nav-item"><a class="nav-link" href="#senjata">Senjata</a></li>
    <li class="nav-item"><a class="nav-link" href="#lokasi">Lokasi</a></li>
    <li class="nav-item"><a class="nav-link" href="#musik">Alat Musik</a></li>
    <li class="nav-item"><a class="nav-link" href="#pakaian">Pakaian Adat</a></li>
    <li class="nav-item"><a class="nav-link" href="#bahasa">Bahasa Daerah</a></li>

    <div class="col-12">
    @if(!Auth::guest())
        @if($posting->user->id == Auth::user()->id || Auth::user()->role == 2)        
        <a style="text-decoration:none;" href="{{url("/jelajah/{$posting->id}/edit")}}"><button style="margin:10px 0;" type="submit" class="btn btn-outline-info btn-block"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>                                                              
        @if(Auth::user()->role == 2)        
        <form action="{{url("/jelajah/{$posting->id}")}}" method="POST">                                                  
		{{ method_field('DELETE')   }}                                                                                             
        {{ csrf_field() }}
		<button type="submit" class="btn btn-outline-danger btn-block"><i class="fa fa-trash-o" aria-hidden="true"></i> Hapus</button>
        </form>          
    @endif
        <br>
        @if(Auth::user()->role == 2 && $posting->status == 0)
            <form action="{{url("/admin/{$posting->id}")}}" method="POST">
		        {{ method_field('PUT')   }}                                                                                             
                {{ csrf_field()  }}                                                                                                            
                <button type="submit" class="btn btn-outline-success btn-block"><i class="fa fa-check-square-o" aria-hidden="true"></i> Konfirmasi</button>
            </form>
        @endif
    @endif
@endif
  </div>                                                                                                          
  </ul>
</div>
<br>
@foreach($posting->makanan as $makanan)
    @foreach($posting->rumah as $rumah)
        @foreach($posting->tarian as $tarian)
            @foreach($posting->senjata as $senjata)
                @foreach($posting->music as $music)
                    @foreach($posting->pakaian as $pakaian)
                        @foreach($posting->bahasa as $bahasa)

<div class="col-sm-9 scrollspy-example" data-spy="scroll" data-target="#spy" style="padding-right:30px;">
  <div id="makanan">
    <h2 style="margin-bottom:15px;">Makanan Tradisional - <small><strong>{{$makanan->nama}}</strong></small></h2>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" style="height:550px; object-fit: cover;" src="{{asset("storage/makanan/{$makanan->foto1}")}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" style="height:550px; object-fit: cover;" src="{{asset("storage/makanan/{$makanan->foto2}")}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" style="height:550px; object-fit: cover;" src="{{asset("storage/makanan/{$makanan->foto3}")}}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

    <p class="pre" style="margin-top:10px; font-size:1.2rem;">
        {!!$makanan->desc!!}
    </p>
  </div>
  <div id="rumah">
    <h2 style="margin:40px 0 15px 0;">Rumah Adat - <small><strong>{{$rumah->nama}}</strong></small></h2>
<div id="carouselExampleControls1" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" style="height:550px; object-fit: cover;" src="{{asset("storage/rumah/{$rumah->foto1}")}}" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" style="height:550px; object-fit: cover;" src="{{asset("storage/rumah/{$rumah->foto2}")}}" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" style="height:550px; object-fit: cover;" src="{{asset("storage/rumah/{$rumah->foto3}")}}" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls1" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls1" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<p class="pre" style="margin-top:10px; font-size:1.2rem;">
        {!!$rumah->desc!!}
</p>

  </div>
  <div id="tarian">
    <h2 style="margin:40px 0 15px 0;">Tarian Tradisional - <small><strong>{{$tarian->nama}}</small></strong></h2>
<div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$id}}?rel=0" allowfullscreen></iframe>
</div>

<p class="pre" style="margin-top:10px; font-size:1.2rem;">
        {!!$tarian->desc!!}
</p>
  </div>
  <div id="senjata">
    <h2 style="margin:40px 0 15px 0;">Senjata Tradisional - <small><strong>{{$senjata->nama}}</small></strong></h2>
<div id="carouselExampleControls2" class="carousel slide" data-ride="carousel">                       
  <div class="carousel-inner">                                                                       
    <div class="carousel-item active">                                                               
      <img class="d-block w-100" style="height:550px; object-fit: cover;" src="{{asset("storage/senjata/{$senjata->foto1}")}}" alt="First slide"> 
    </div>                                                                                           
    <div class="carousel-item">                                                                      
      <img class="d-block w-100" style="height:550px; object-fit: cover;" src="{{asset("storage/senjata/{$senjata->foto2}")}}" alt="Second slide">
    </div>                                                                                           
    <div class="carousel-item">                                                                      
      <img class="d-block w-100" style="height:550px; object-fit: cover;" src="{{asset("storage/senjata/{$senjata->foto3}")}}" alt="Third slide"> 
    </div>                                                                                           
  </div>                                                                                             
  <a class="carousel-control-prev" href="#carouselExampleControls2" role="button" data-slide="prev">  
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>                              
    <span class="sr-only">Previous</span>                                                            
  </a>                                                                                               
  <a class="carousel-control-next" href="#carouselExampleControls2" role="button" data-slide="next">  
    <span class="carousel-control-next-icon" aria-hidden="true"></span>                              
    <span class="sr-only">Next</span>                                                                
  </a>                                                                                               
</div>                                                                                               
    
<p class="pre" style="margin-top:10px; font-size:1.2rem;">
        {!!$senjata->desc!!}
    </p>
  </div>
  <div id="lokasi">
    <h2 style="margin:40px 0 15px 0;">Lokasi</h2>
    <div style="width: 100%; height: 500px;">{!! Mapper::render() !!}</div>  
  </div>

  <div id="musik">
    <h2 style="margin:40px 0 15px 0;">Alat Musik - <small><strong>{{$music->nama}}</small></strong></h2>
<div id="carouselExampleControls3" class="carousel slide" data-ride="carousel">                                                                    
  <div class="carousel-inner">                                                                                                                    
    <div class="carousel-item active">                                                                                                            
      <img class="d-block w-100" style="height:550px; object-fit: cover;" src="{{asset("storage/music/{$music->foto1}")}}" alt="First slide"> 
    </div>                                                                                                                                        
    <div class="carousel-item">                                                                                                                   
      <img class="d-block w-100" style="height:550px; object-fit: cover;" src="{{asset("storage/music/{$music->foto2}")}}" alt="Second slide">
    </div>                                                                                                                                        
    <div class="carousel-item">                                                                                                                   
      <img class="d-block w-100" style="height:550px; object-fit: cover;" src="{{asset("storage/music/{$music->foto3}")}}" alt="Third slide"> 
    </div>                                                                                                                                        
  </div>                                                                                                                                          
  <a class="carousel-control-prev" href="#carouselExampleControls3" role="button" data-slide="prev">                                               
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>                                                                           
    <span class="sr-only">Previous</span>                                                                                                         
  </a>                                                                                                                                            
  <a class="carousel-control-next" href="#carouselExampleControls3" role="button" data-slide="next">                                               
    <span class="carousel-control-next-icon" aria-hidden="true"></span>                                                                           
    <span class="sr-only">Next</span>                                                                                                             
  </a>                                                                                                                                            
</div>                                                                                                                                            
<p class="pre" style="margin-top:10px; font-size:1.2rem;">
    {!!$music->desc!!}
</p>
  </div>
  
  <div id="pakaian">
    <h2 style="margin:40px 0 15px 0;">Pakaian Adat - <small><strong>{{$pakaian->nama}}</small></strong></h2>
<div id="carouselExampleControls4" class="carousel slide" data-ride="carousel">                                                                       
  <div class="carousel-inner">                                                                                                                       
    <div class="carousel-item active">                                                                                                               
      <img class="d-block w-100" style="height:550px; object-fit: cover;" src="{{asset("storage/pakaian/{$pakaian->foto1}")}}" alt="First slide">        
    </div>                                                                                                                                           
    <div class="carousel-item">                                                                                                                      
      <img class="d-block w-100" style="height:550px; object-fit: cover;" src="{{asset("storage/pakaian/{$pakaian->foto2}")}}" alt="Second slide">       
    </div>                                                                                                                                           
    <div class="carousel-item">                                                                                                                      
      <img class="d-block w-100" style="height:550px; object-fit: cover;" src="{{asset("storage/pakaian/{$pakaian->foto3}")}}" alt="Third slide">        
    </div>                                                                                                                                           
  </div>                                                                                                                                             
  <a class="carousel-control-prev" href="#carouselExampleControls4" role="button" data-slide="prev">                                                  
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>                                                                              
    <span class="sr-only">Previous</span>                                                                                                            
  </a>                                                                                                                                               
  <a class="carousel-control-next" href="#carouselExampleControls4" role="button" data-slide="next">                                                  
    <span class="carousel-control-next-icon" aria-hidden="true"></span>                                                                              
    <span class="sr-only">Next</span>                                                                                                                
  </a>                                                                                                                                               
</div>
<p class="pre" style="margin-top:10px; font-size:1.2rem;">
{!!$pakaian->desc!!}
    </p>
  </div>
  <div id="bahasa">
    <h2 style="margin:40px 0 15px 0;">Bahasa Daerah - <small><strong>{{$bahasa->nama}}</small></strong></h2>
    <p class="pre" style="font-size:1.2rem;">
        {!!$bahasa->desc!!}
    </p>
  </div>




</div>
</div>
</div>
@endforeach
@endforeach
@endforeach
@endforeach
@endforeach
@endforeach
@endforeach


<!-- KOMENTAR -->
<div class="container">
  <div class="card mx-auto" style="margin-top:50px; border:none; background-color:#304D6D;">
    <div class="card-body">
      <h3 class="card-text text-center" style="color:whitesmoke;">Komentar</h3>
    </div>
  </div>
</div>

@if(count($comment) > 0 )
@foreach($comment as $comments)
<div class="container">
  <div class="card mx-auto komen">
    <div class="card-body">
      <a class="col-1 float-left" style="padding-left:23px;" href="{{url("/profile/{$comments->user->id}")}}">
        <img src="{{asset("/storage/avatar/{$comments->user->avatar}")}}" class="rounded-circle" width="75px;" height="75px;" style="margin-right:5px; margin-left:-25px; object-fit:cover;">
      </a>        
      <a class="float-left text-muted" style="font-size:1.3rem; margin-left:40px;">oleh </a><a href="{{url("/profile/{$comments->user->id}")}}" class="card-title" style="font-size:1.5rem; padding-left:5px; color:#304D6D;">{{$comments->user->name}}</a>  
      </a>                                                                                                                                           
    <p class="card-text" style="padding-top:10px; padding-left:130px;">{{$comments->subject}}</p>
  </div>
  @if($comments->cekowner())
  <div class="float-right" style="margin:-10px 10px 10px 0">
    <table class="float-right">
      <tr>
        <td> 
          <a onclick="return confirmDelete()" href="{{url("/jelajah-comment/{$comments->id}/edit")}}">
            <button type="button" class="btn btn-outline-dark btn-sm" style="margin-right:5px;">
              <i class="fa fa-pencil-square-o" aria-hidden="true"></i> edit
            </button>
          </a>
        </td>
        <td>
          <form onclick="return confirmDelete()" action="{{url("/jelajah-comment/{$comments->id}")}}" method="POST">
          {{ method_field('DELETE')   }} 
          {{ csrf_field()   }}           
            <button style="margin-top:px;" type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"></i> hapus</button>
          </form>
        </td>
      </tr>
    </table>
  </div>
@endif
</div>
</div>
@endforeach
@endif

@if(count($comment) == 0)
    <div class="container" style="margin-top:20px;">
<div class="jumbotron">
    <h3 class="display-8 text-center" style="letter-spacing:2px;">Belum ada komentar</h3>
</div>
</div>
@endif
<!-- KOMENTAR -->

@guest
<div class="container">
    <a href="{{url('/login')}}" style="text-decoration:none;"><button class="container-fluid btn btn-outline-primary btn-block" name="submit" style="margin-top:15px;">Login Untuk Komentar</button></a>
</div>
<div class="container">
    <a href="{{url('/jelajah')}}" style="text-decoration:none;"><button class="container-fluid btn btn-outline-primary btn-block" name="submit" style="margin-top:15px;">Balik Ke Jelajah</button></a>
</div>
@endguest

@if(!Auth::guest())
<div class="container">
<form action="{{url("/jelajah-comment/{$posting->id}")}}" method="POST">
       {{ csrf_field()   }}
  <textarea class="col-12" id="exampleFormControlTextarea1" name="comment" rows="10" placeholder="tulis komentar anda disini..." style="margin-top:20px; padding-top:10px; border:solid 2px #304D6D;">{{old('comment')}}</textarea>

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
    <button class="container-fluid btn btn-outline-primary btn-block" name="submit" style="margin-top:15px;">Kirim Komentar</button>
  </div>
</form>
@endif

</div>  
</div>
<script>
function confirmDelete() {
var result = 'Kamu yakin ingin menghapusnya ?';
if (confirm(result)) {
        return true;
    } else {
        return false;
    }
}
</script>
@endsection

