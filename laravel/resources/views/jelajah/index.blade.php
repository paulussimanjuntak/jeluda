@extends('layouts.app')
@section('content')
<link href="{{asset('aos-master/dist/aos.css')}}" rel="stylesheet">
<style>
.box{
 transition: box-shadow .3s;
}
.box:hover {
  box-shadow: 0 30px 75px -5px rgba(50,50,93,.3), 0 25px 40px -20px rgba(0,0,0,.1);
  /*box-shadow: 0 0 15px rgba(11, 0, 0, 1); */
}
.scrollable-menu {
    height: auto;
    max-height: 250px;
    overflow-x: hidden;
    width:100%;
    text-align:left;
    padding:10px;
}

.carousel-caption {
padding-bottom:0!important;
}
.img-txt{
    font-family:system-ui;
    color:#22384F;
}

.banner{
width:100%;
object-fit:cover;
background-image: ;
}

@media (min-width: 44px) {  
.img-txt {
  font-size:1.2rem;
  padding-bottom:-80px;
} /*1rem = 16px*/
.banner h1 {
  height:200px;padding-top:200px;
}
} 

@media (min-width: 244px) {  
.img-txt {
  font-size:1rem;
  margin-bottom:-10px;
} /*1rem = 16px*/
.banner h1 {
  height:250px;padding-top:200px;
}
} 

@media (min-width: 360px) {  
.img-txt {
  font-size:1rem;
  margin-bottom:-5px;
} /*1rem = 16px*/
} 

@media (min-width: 412px) {  
.img-txt {
  font-size:1rem;
  margin-bottom:5px;
} /*1rem = 16px*/
} 

@media (min-width: 414px) {  
.img-txt {
  font-size:1rem;
  margin-bottom:8px;
} /*1rem = 16px*/
} 

@media (min-width: 544px) {  
.img-txt {
  font-size:1.5rem;
  padding-top:100px;
  padding-bottom:0;
} /*1rem = 16px*/
.banner h1 {
  height:300px;padding-top:230px;
}
}
 
/* Medium devices (tablets, 768px and up) The navbar toggle appears at this breakpoint */
@media (min-width: 768px) {  
.img-txt{
  font-size:1.8rem;
  margin-bottom:40px;
} /*1rem = 16px*/
.banner h1 {
  height:350px;padding-top:250px;
}
}
 
/* Large devices (desktops, 992px and up) */
@media (min-width: 992px) { 
.img-txt {
  font-size:1.9rem;
  padding-bottom:60px;
} /*1rem = 16px*/
.banner h1 {
  height:350px;padding-top:250px;
}
}
 
/* Extra large devices (large desktops, 1200px and up) */
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
} /*1rem = 16px*/    
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

<div class="container" style="margin-top:40px; margin-bottom:20px;">
<div class="btn-group" style="width:50%;">
  <button type="button" class="btn btn-outline-dark text-left" style="width:100%; border-radius:solid 2px" data-toggle="dropdown">Filter Provinsi <span style="float:right;" class="dropdown-toggle"></span></button>
    <ul class="dropdown-menu scrollable-menu" role="menu">
      @foreach($provinsi as $kategori)
      <li><a class="dropdown-item" href="{{url("/jelajah/filter")}}/{{str_slug($kategori->nama)}}">{{$kategori->nama}}</a></li>
      @endforeach
    </ul>
</div>
<div class="btn-group" style="width:50%; margin-left:55%; margin-top:-63px;">
    <button type="button" class="btn btn-outline-dark text-left" style="width:100%; border-radius:solid 2px" data-toggle="dropdown">Urutkan Berdasarkan<span style="float:right;" class="dropdown-toggle"></span></button>
    <ul class="dropdown-menu scrollable-menu" role="menu">
      <li><a class="dropdown-item" href="{{url("/jelajah/filter")}}/">test</a></li>
    </ul>
</div>

</div>

<div class="row col-12" style="padding-left:50px;">
    @foreach($posting as $postingan)
        @if($postingan->status !== 0)
  <div data-aos="zoom-in-left" data-aos-once="true" class="col-lg-3 col-md-4 col-sm-6" style="padding:10px;">
            <a style="text-decoration:none; color:black" href="{{url("/jelajah/{$postingan->slug}")}}">        
    <div class="card box" style="height:100%; border:solid 1px rgba(48, 77, 109, 0.6);">
    <img class="card-img-top" src="{{asset("storage/posting/{$postingan->foto}")}}" alt="Card image cap" style="width:100%; height:290px; object-fit:cover;">
      <div class="card-body">
          <h6 class="card-title"><b>Provinsi {{$postingan->kabupaten->provinsi->nama}} | Kabupaten {{$postingan->kabupaten->nama}} </b></h6>
        <p class="card-text" style="font-size:1rem; margin-bottom:0px;">
            {{$postingan->deskripsi}}
        </p>
      </div>
      <div class="card-footer" style="position:initial; border-top:solid 1px rgba(48, 77, 109, 0.6);">
          <i class="fa fa-clock-o" aria-hidden="true" style="margin-top:4px; margin-bottom:-1px;"> {{Date::parse($postingan->created_at)->ago()}}</i>
        <p class="text-muted" style="float:right; font-size:.9rem; margin-top:4px; margin-bottom:-1px;">{{$postingan->comment->count()}}  <i class="fa fa-comments-o" aria-hidden="true"></i></p>        
    </div>
    </div>
  </a>
  </div>
  @endif
@endforeach
</div>
    
<div class="pagination justify-content-center" style="margin-top:60px;">{{$posting->links()}}</div>
<script src="{{asset('aos-master/dist/aos.js')}}"></script>
<script>
  AOS.init();
</script>
@endsection
