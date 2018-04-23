@extends('layouts.app')
@section('content')
<style>
.box{
 transition: box-shadow .3s;
}
.box:hover {
  box-shadow: 0 0 15px rgba(11, 0, 0, 1); 
}
.scrollable-menu {
    height: auto;
    max-height: 250px;
    overflow-x: hidden;
    width:100%;
    text-align:center;
}

.carousel-caption {
padding-bottom:0!important;
}
.img-txt{
    font-family:system-ui;
    color:#22384F;
}

@media (min-width: 44px) {  
.img-txt {
  font-size:1.2rem;
  padding-bottom:-80px;
}
.banner h1 {
  height:200px;padding-top:200px;
}
} 

@media (min-width: 244px) {  
.img-txt {
  font-size:1rem;
  margin-bottom:-10px;
}
.banner h1 {
  height:250px;padding-top:200px;
}
} 

@media (min-width: 360px) {  
.img-txt {
  font-size:1rem;
  margin-bottom:-5px;
}
} 

@media (min-width: 412px) {  
.img-txt {
  font-size:1rem;
  margin-bottom:5px;
}
} 

@media (min-width: 414px) {  
.img-txt {
  font-size:1rem;
  margin-bottom:8px;
}
} 

@media (min-width: 544px) {  
.img-txt {
  font-size:1.5rem;
  padding-top:100px;
  padding-bottom:0;
}
.banner h1 {
  height:300px;padding-top:230px;
}
}
 
@media (min-width: 768px) {  
.img-txt{
  font-size:1.8rem;
  margin-bottom:40px;
}
.banner h1 {
  height:350px;padding-top:250px;
}
}
 
@media (min-width: 992px) { 
.img-txt {
  font-size:1.9rem;
  padding-bottom:60px;
}
.banner h1 {
  height:350px;padding-top:250px;
}
}
 
@media (min-width: 1200px) {  
.img-txt {
  font-size:2rem;
  padding-bottom:80px;
} 

.banner h1 {
  height:400px;padding-top:250px;
}
}

@media (min-width: 1366px) {  
.img-txt {
  font-size:2.3rem;
  padding-bottom:90px;
}    
.banner {
  height:100px;padding-top:250px;
  width:100%;
}
}

@media (min-width: 1920px) {  
.img-txt {
  font-size:2.4rem;
  padding-bottom:160px;
}    
.banner h1 {
  height:550px;padding-top:250px;
}
}

</style>
<div id="carouselExampleControls" class="carousel" data-ride="carousel" style=" margin-top:60px;">
  <div class="align-center text-center carousel-inner">
    <div class="carousel-item active">
      <img class="w-100 h-100" src="{{asset('photo/banner1.jpg')}}" alt="First slide">
      <div class="carousel-caption">
    @guest                                                                               
        <h1 class="img-txt">Selamat menjelajah budaya Indonesia</h1>                           
    @else                                                                                      
        <h1 class="img-txt">Selamat menjelajah budaya Indonesia <br>{{Auth::user()->name}}</h1>
    @endguest                                                                                  
      </div>
    </div>
  </div>
</div>

<div class="container" style="margin-top:40px; margin-bottom:30px;">
<div class="btn-group" style="width:100%;">
                <button type="button" class="btn text-left btn-outline-dark" style="width:100%;" data-toggle="dropdown">Provinsi <span style="float:right" class="dropdown-toggle"></span></button>
                <ul class="dropdown-menu scrollable-menu" role="menu">
                    @foreach($provinsis as $kategori)
                        <li><a class="dropdown-item text-left" href="{{url("/jelajah/filter")}}/{{str_slug($kategori->nama)}}">{{$kategori->nama}}</a></li>
                @endforeach
                </ul>
</div>
</div>

<div class="row col-12" style="padding-left:50px;">
@foreach($provinsi as $kategori)
    @foreach($kategori->kabupaten as $kabupaten)
        @foreach($kabupaten->posting as $posting)
            @if($posting->status !== 0)
  <div class="col-lg-3 col-md-4 col-sm-6 box" style="padding:10px;">
    <div class="card" style="height:100%; border:solid 1px rgba(48, 77, 109, 0.6);">
    <img class="card-img-top" src="{{asset("storage/posting/{$posting->foto}")}}" alt="Card image cap" style="width:100%; height:290px; object-fit:cover;">
      <div class="card-body">
          <h6 class="card-title"><b>Provinsi {{$kategori->nama}} | Kabupaten {{$kabupaten->nama}}</b></h6>
        <p class="card-text" style="font-size:1rem; margin-bottom:0px;">
           {{$posting->deskripsi}} 
        </p>
      </div>
      <div class="card-footer" style="position:initial; border-top:solid 1px rgba(48, 77, 109, 0.6);">
        <a href="{{url("/jelajah/{$posting->slug}")}}" class="btn btn-outline-dark btn-sm">Selengkapnya</a>        
        <p class="text-muted" style="float:right; font-size:.9rem; margin-top:6px; margin-bottom:-10px;">{{$posting->comment->count()}} <i class="fa fa-comments-o" aria-hidden="true"></i></p>        
    </div>
    </div>
  </div>
  @endif
        @endforeach
    @endforeach
@endforeach
</div>
@endsection
