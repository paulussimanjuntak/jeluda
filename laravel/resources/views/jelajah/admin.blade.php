<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Jelajah Budaya Indonesia</title>
	<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
	<link href="{{asset('css/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet"> 
  	<link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}"> 
	<link rel="shortcut icon" href="{{asset('photo/jeluda.png')}}">
    <link href="{{asset('css/admin.css')}}" rel="stylesheet"> 
	{!! Charts::assets() !!}
</head>
<body>

<style>
body{
  font-family:system-ui;
}
.box{
 transition: box-shadow .3s;
}
.box:hover {
  box-shadow: 0 0 15px rgba(11, 0, 0, 1); 
}

  #search {
    position:fixed;
    top: 0px;
    left: 0px;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.7);
    -webkit-transition: all 0.5s ease-in-out;
       -moz-transition: all 0.5s ease-in-out;
        -ms-transition: all 0.5s ease-in-out;
  	     -o-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;
    -webkit-transform: translate(0px, -100%) scale(0, 0);
  	   -moz-transform: translate(0px, -100%) scale(0, 0);
  	    -ms-transform: translate(0px, -100%) scale(0, 0);
         -o-transform: translate(0px, -100%) scale(0, 0);
  	        transform: translate(0px, -100%) scale(0, 0);    
    opacity: 0;
    display: none;
  }

  #search.open {
    -webkit-transform: translate(0px, 0px) scale(1, 1);
       -moz-transform: translate(0px, 0px) scale(1, 1);
    	  -ms-transform: translate(0px, 0px) scale(1, 1);
  	     -o-transform: translate(0px, 0px) scale(1, 1);
  	         transform: translate(0px, 0px) scale(1, 1); 
    opacity: 1;
    z-index: 106;
    display: block;
  }

  #search input[type="search"] {
    position: absolute;
    top: 50%;
    left: 0;
    margin-top: -51px;
    width: 60%;
    margin-left: 20%;
    color: rgb(255, 255, 255);
    background: transparent;
    border-top: 1px solid rgba(255, 255, 255, .8);
    border-bottom: 2px solid rgba(255, 255, 255, .5);
    border-left: 0px solid transparent;
    border-right: 0px solid transparent;
    font-size: 2rem;
    font-family: system-ui;
    font-weight: 300;
    text-align: center;
    outline: none;
    padding: 10px;
  }


.hover_effect:hover{
  -webkit-mask-image: linear-gradient(-75deg, rgba(0,0,0,.6) 30%, #000 50%, rgba(0,0,0,.6) 70%);
  -webkit-mask-size: 200%;
  animation: shine .5s infinite;
}

@-webkit-keyframes shine {
  from {
    -webkit-mask-position: 150%;
  }
  
  to {
    -webkit-mask-position: -50%;
  }
}
</style>

<nav class="navbar fixed-top navbar-expand-md navbar-dark" style="background-color:#22384F; margin-top:-9px;"> 
  <a href="{{url('/')}}"><img src="{{asset('photo/jeludakecil.png')}}" alt="Logo" style="width:150px; margin:-8px 0 -12px -4px; padding-top:5px;"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="collapsibleNavbar" style="margin-top:-30px;">
    @guest
    <ul class="navbar-nav ml-auto">
      <li class="nav-item" style="margin-top:10px; padding:2px 10px 0 0; font-family: system-ui;">
        <a class="hover_effect nav-link text-white" href="{{url('/')}}">
        <i class="fa fa-home" aria-hidden="true"></i> &nbsp; Beranda</a>
      </li>
      <li class="nav-item" style="margin-top:10px; padding:2px 10px 0 0; font-family: system-ui;">
        <a class="hover_effect nav-link text-white" href="{{url('/jelajah')}}">
        <i class="fa fa-list-ul" aria-hidden="true"></i> &nbsp; Jelajah</a>
      </li> 
      <li class="nav-item" style="margin-top:10px; padding:2px 10px 0 0; font-family: system-ui;">               
        <a class="hover_effect nav-link text-white" href="{{route('login')}}">
        <i class="fa fa-user" aria-hidden="true"></i> &nbsp; Masuk</a>
      </li>                         
      <li class="nav-item" style="margin-top:10px; padding:2px 10px 0 0; font-family: system-ui;">
        <a class="hover_effect nav-link text-white" href="{{route('register')}}">
        <i class="fa fa-user-plus" aria-hidden="true"></i> &nbsp; Daftar</a>            
      </li> 
      <li class="nav-item btn" style="margin-top:12px; padding:2px 10px 0 0; font-family: system-ui;">
        <a href="#search" style="padding:10px;">
        <i class="fa fa-search fa-2x" aria-hidden="true" data-toggle="modal" data-target="#exampleModalCenter" style="color:white;"></i>
        </a>                
      </li> 
    </ul>
    @else
    <ul class="navbar-nav ml-auto"> 
      <li class="nav-item btn" style="margin-top:36px; padding:18px 10px 0 0; font-family: system-ui;">
        <a href="#search" style="padding:10px;">
        <i class="fa fa-search fa-1x" aria-hidden="true" data-toggle="modal" data-target="#exampleModalCenter" style="color:white;"></i>
        </a>                
      </li> 
      <li class="nav-item" style="margin-top:26px; cursor:pointer; padding:22px 10px 0 0; font-family: system-ui;">
        <a class="hover_effect nav-link text-white" data-toggle="modal" data-target="#exampleModal">
        <i class="fa fa-plus" aria-hidden="true"></i> &nbsp; Tambahkan Budaya
        </a>                                                                               
      </li>   
      <li class="nav-item" style="margin-top:26px; padding:22px 10px 0 0; font-family: system-ui;">
        <a class="hover_effect nav-link text-white" href="{{url('/')}}"><i class="fa fa-home" aria-hidden="true"></i> &nbsp; Beranda</a>                                                                               
      </li> 
      <li class="nav-item" style="margin-top:26px; padding:22px 10px 0 0; font-family: system-ui;">
        <a class="hover_effect nav-link text-white" href="{{url('/jelajah')}}">
        <i class="fa fa-list-ul" aria-hidden="true"></i> &nbsp; Jelajah
        </a>                                                                               
      </li>     
    @if(!Auth::guest() && Auth::user()->role == 2)
      <li class="nav-item" style="margin-top:26px; padding:22px 10px 0 0; font-family: system-ui;">
        <a class="hover_effect nav-link text-white" href="{{url('/admin')}}">
        <i class="fa fa-user" aria-hidden="true"></i> &nbsp; Admin
        </a>                                                                               
      </li>
    @endif
      <li class="nav-item" style="margin-top:26px; padding:22px 0px 6px 0px; font-family: system-ui;">
       @if(Auth::user()->posting()->where('status','=','0')->count() == 0)
        <a class="hover_effect nav-link text-white dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">{{Auth::user()->name}} <span class="badge badge-light">{{Auth::user()->posting()->where('status','=','0')->count()}}</span></a>   
    @else
 <a class="hover_effect nav-link text-white dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" href="#">{{Auth::user()->name}} <span class="badge badge-danger">{{Auth::user()->posting()->where('status','=','0')->count()}}</span></a>   
    @endif
          @if(Auth::user()->posting()->where('status','=','0')->count() == 0)
        <div class="dropdown-menu dropdown-menu-right"  style="margin:10px;">                                                                           
            <a href="{{url('/profile')}}" style="text-decoration:none;"><button class="dropdown-item btn" type="button">Profil <span class="badge badge-dark" style="float:right; margin-top:3px;">{{Auth::user()->posting()->where('status','=','0')->count()}}</span></button></a>
        @else
<div class="dropdown-menu dropdown-menu-right"  style="margin:10px;">                                                                           
            <a href="{{url('/profile')}}" style="text-decoration:none;"><button class="dropdown-item btn" type="button">Profil <span class="badge badge-danger" style="float:right; margin-top:3px;">{{Auth::user()->posting()->where('status','=','0')->count()}}</span></button></a>
        @endif

        <a href="{{url('/ubah-profile')}}/{{Auth::user()->id}}" style="text-decoration:none;"><button class="dropdown-item btn" type="button">Ubah Profil</button></a>
        <a href="{{ route('logout')  }}" class="dropdown-item" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
		  {{ __('Keluar') }}
        </a>                                                                      
		  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
		    {{ csrf_field() }}
		  </form>                                                                                    
        </div>
      </li>
      <li class="nav-item">
        <a href="{{url('/profile')}}" style="text-decoration:none;">
          <img src="{{asset('storage/avatar/')}}/{{Auth::user()->avatar}}" class="rounded-circle" width="50px;" height="50px;" style="margin-top:43px; margin-right:10px; margin-left:10px; object-fit:cover;">        
        </a>
      </li>
    </ul>
    @endguest
  </div>                                                 
</nav>                                                                                                          

<!-- Tambah Budaya -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Budaya</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Apakah budaya anda belum terdaftar di situs kami? <br>Jika belum, anda dapat menambahkan budaya didaerah anda ke situs kami dengan cara mengklik tombol tambah dibawah ini.
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <a href="{{url('/jelajah/create')}}"><button type="button" class="btn btn-primary">Tambah</button></a>
      </div>
    </div>
  </div>
</div>

<div id="search"> 
	<form role="search" id="searchform" action="{{url('/jelajah')}}" method="get">
		<input type="search" name="search" placeholder="cari budaya"/>
	</form>
</div>

<div class="wrapper">
  <!-- Sidebar Holder -->
  <nav id="sidebar" style="margin-top:70px;">
    <div class="sidebar-header">
      <h3 style="padding-top:20px;">Menu</h3>
    </div>
    <ul class="list-unstyled components">
      <li>
        <a href="{{url('/jelajah')}}">Jelajah</a>
      </li>
      <li>
        <a data-toggle="collapse" href="#belum" role="button" aria-expanded="false" aria-controls="collapseExample">Posting</a>
      </li>
      <li>
        <a data-toggle="collapse" href="#user" role="button" aria-expanded="false" aria-controls="collapseExample">User</a>
      </li>
      <li>
        <a data-toggle="collapse" href="#komentar" role="button" aria-expanded="false" aria-controls="collapseExample">Komentar</a>
      </li>
    </ul>
    <ul class="list-unstyled CTAs">
      <li><a href="{{url('/')}}" class="article">Beranda</a></li>
    </ul>
  </nav>

<!-- Page Content Holder -->
  <div id="content" style="width:100%;">

    <nav class="navbar navbar-default" style="background-color:transparent;">
      <div class="container-fluid">
        <div class="navbar-header">
	<button type="button" id="sidebarCollapse" class="btn btn-transparent navbar-btn" style="background-color:transparent;margin-top:100px;">
          <span style="color:#000;"><i class="fa fa-bars fa-2x" aria-hidden="true"></i></span>
        </button>
    	</div>
        <div class="navbar-collapse nav-item" id="bs-example-navbar-collapse-1">
          <h1 class="text-center">Dashboard Admin</h1>
        </div>
      </div>
    </nav>

<!-- MENU ADMIN -->
  <div id="content" style="padding:20px;"> 
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-12">
          <div class="card" style="margin-top:10px;">
            <div class="card-header bg-success text-white"><i class="fa fa-check fa-4x" aria-hidden="true"></i>
              <span class="pull-right" style="font-size:1.8rem;"> {{$sudah->count()}}</span>
              <p class="text-right" style="margin-top:-20px; font-size:.9rem; margin-bottom:-2px;">Jumlah Budaya</p>
            </div>
          </div>
        </div>
       
        <div class="col-lg-3 col-md-4 col-sm-12">
          <div class="card" style="margin-top:10px;">
            <div class="card-header bg-danger text-white">
              <i class="fa fa-pencil-square-o fa-4x" aria-hidden="true"></i>
              <span class="pull-right" style="font-size:1.8rem;"> {{$belum->count()}}</span>
              <p class="text-right" style="margin-top:-20px; font-size:.9rem; margin-bottom:-2px;">Belum di konfirmasi</p>
            </div>
          </div>
        </div>
        
        <div class="col-lg-3 col-md-4 col-sm-12">
          <div class="card" style="margin-top:10px;">
            <div class="card-header bg-primary text-white"><i class="fa fa-users fa-4x" aria-hidden="true"></i>
              <span class="pull-right" style="font-size:1.8rem;"> {{$user->count()}}</span>
              <p class="text-right" style="margin-top:-20px; font-size:.9rem; margin-bottom:-2px;">Jumlah User</p>
            </div>
          </div>
        </div>
            
        <div class="col-lg-3 col-md-4 col-sm-12">
          <div class="card" style="margin-top:10px;">
            <div class="card-header bg-secondary text-white"><i class="fa fa-comments-o fa-4x" aria-hidden="true"></i>
              <span class="pull-right" style="font-size:1.8rem;"> {{$comment->count()}}</span>
              <p class="text-right" style="margin-top:-20px; font-size:.9rem; margin-bottom:-2px;">Jumlah komentar</p>
            </div>
          </div>
        </div>

      </div><!-- row -->
    </div><!-- /container -->

    <!-- GRAFIK -->
    <div class="container-fluid" style="margin-top:75px; margin-bottom:75px;">
      <div class="row">
          <div class="col">
              {!! $chart->render() !!}
          </div>
      </div>
    </div>                 
    <!-- GRAFIK -->

    <!-- USER -->
    <div class="collapse show" id="user">
      <div class="col" style="margin-top:40px;">
        <p><h2 style="text-align:center; font-family: system-ui;">Jumlah User</h2></p>
        <h2 class="text-center" style= "margin-bottom:40px; border-bottom: solid 2px; color:#304D6D; width:150px; text-align:center; margin-left: auto; margin-right: auto;"></h2>
      </div>
      <div class="container-fluid" style="margin-bottom:10px;">
        <div class="row" id="user">
          @foreach($user as $users) 
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="card" style="margin-top:10px;">
              <div class="card-body">
                <a href="{{url("/profile/{$users->id}")}}" style="text-decoration:none;"> 
                  <img src="{{asset("storage/avatar/{$users->avatar}")}}" class="rounded-circle" width="50px;" height="50px;" style="object-fit:cover;">        
                  <a href="{{url("/profile/{$users->id}")}}" class="card-title" style="margin-left:5px; color:#000; font-size:1.3rem;">{{$users->name}}<br></a>  
                </a>
                <p class="card-text" style="margin-top:10px;">
                <i class="fa fa-envelope-o" aria-hidden="true"></i> {{$users->email}}<br>
                Kiriman budaya : {{$users->posting_count}} | Total komentar : {{$users->comment_count}} 
                @if($users->status == 0)
                  <br> Status akun: Belum dikonfirmasi 
                @else
                  <br> Status akun: Sudah dikonfirmasi 
                @endif
                </p>  
              </div>
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
    <!-- USER -->

    <!-- KOMEN -->
    <div class="collapse" id="komentar"> 
      <div class="col" style="margin-top:40px;">
        <p><h2 style="text-align:center; font-family: system-ui;">Kumpulan Komentar</h2></p>
        <h2 class="text-center" style= "margin-bottom:40px; border-bottom: solid 2px; color:#304D6D; width:150px; text-align:center; margin-left: auto; margin-right: auto;"></h2>
      </div>
      <div class="container-fluid" style="margin-bottom:10px;">
        <div class="row" id="user">
        @foreach($comment as $comments)
          <div class="col-lg-4 col-md-6 col-sm-12" style="margin-top:10px;">
            <div class="card">
              <div class="card-body">
                <a href="{{url("/profile/{$comments->user->id}")}}" style="text-decoration:none;"> 
                  <img src="{{asset("storage/avatar/{$comments->user->avatar}")}}" class="rounded-circle" width="50px;" height="50px;" style="object-fit:cover;">        
                  <a href="{{url("/profile/{$comments->user->id}")}}" class="card-title" style="margin-left:5px; font-size:1.3rem; color:#000;">{{$comments->user->name}}<br></a>  
                </a>
                <p class="card-text" style="margin-top:10px;">
                <a href="{{url("/jelajah/{$comments->posting->slug}")}}" style="text-decoration:none;">Provinsi {{$comments->posting->kabupaten->provinsi->nama}} | Kabupaten {{$comments->posting->kabupaten->nama}}</a><br> 
                Komentar : {{$comments->subject}}<br>
                </p>  
              </div>
            </div>
          </div>
        @endforeach
        </div>
      </div>
    </div>
    <!-- KOMEN -->

    <!-- POSTING YANG BELUM -->
    <div class="collapse" id="belum">
      <div class="col" style="margin-top:40px;">
        <p><h2 style="text-align:center; font-family: system-ui;">Posting yang belum dikonfirmasi</h2></p>
        <h2 class="text-center" style= "margin-bottom:40px; border-bottom: solid 2px; color:#304D6D; width:150px; text-align:center; margin-left: auto; margin-right: auto;"></h2>  
      </div>
      <div class="container-fluid" style="margin-bottom:10px;"> 
        <div class="row col-12" style="margin-left:5px;">
        @foreach($posting as $postingan)
        @if($postingan->status == 0)
          <div class="col-lg-3 col-md-4 col-sm-6 box" style="padding:10px;">
            <div class="card" style="height:100%; border:solid 1px rgba(48, 77, 109, 0.6);">
              <img class="card-img-top" src="{{asset("storage/posting/{$postingan->foto}")}}" alt="Card image cap" style="width:100%; height:290px; object-fit:cover;">
              <div class="card-body">
                <h6 class="card-title"><b>Provinsi {{$postingan->kabupaten->provinsi->nama}} | Kabupaten {{$postingan->kabupaten->nama}} </b></h6>
                <p class="card-text" style="font-size:1rem; margin-bottom:0px;">
                {{$postingan->deskripsi}}
                </p>
              </div>
            <div class="card-footer" style="position:initial; border-top:solid 1px rgba(48, 77, 109, 0.6);">
              <a href="{{url("/jelajah/{$postingan->slug}")}}" class="btn btn-outline-info btn-sm">Selengkapnya</a>
              <p class="text-muted" style="float:right; font-size:.9rem; margin-top:6px; margin-bottom:-10px;">{{$postingan->comment->count()}}  <i class="fa fa-comments-o" aria-hidden="true"></i></p>        
            </div>
          </div>
        </div>
        @endif
        @endforeach
      </div>
    </div>
    <!-- POSTING YANG BELUM -->

   

  </div><!-- /content -->
<! -- /MENU ADMIN -->
 
</div><!-- /content -->
</div><!-- /content -->
</div><!-- /wrapper -->
   <footer style="background-color:#304D6D; color:white; padding-top:25px; font-family: system-ui;">                                                     
     <div class="container">                                                                                                                             
       <div class="row">                                                                                                                                 
         <div class="col-lg-5 offset-1 col-sm-12" style="color:#E0E1D4;">                                                                                
           <h3 class="text-left">Jelajah Budaya Indonesia</h3>                                                                                           
           <p class="text-left">Jeluda adalah sebuah website yang dapat memudahkan anda dalam menelusuri kebudayaan yang dimiliki oleh indonesia.</p>    
         </div>                                                                                                                                          
         <div class="col-lg-5 offset-1 col-sm-12" style="color:#E0E1D4;">                                                                                
           <h4 class="text-left">Contact Us</h4>                                                                                                         
             <p class="text-left"><i class="fa fa-map-marker" aria-hidden="true"></i> &nbsp; Jl. Raya Kampus Udayana No.20, Jimbaran, Badung, Bali 80361.
             <br><i class="fa fa-phone" aria-hidden="true"></i> &nbsp; 087862265363                                                                      
             <br><i class="fa fa-envelope-o" aria-hidden="true"></i> &nbsp; info.jeluda@gmail.com</p>                                                    
         </div>                                                                                                                                          
       </div>                                                                                                                                            
     </div>                                                                                                                                              
     <div class="footer-copyright" style="background-color:#22384F;">                                                                                    
       <div class="container text-center" style="padding:15px;">                                                                                         
       © 2018 Jelajah Budaya Indonesia                                                                                                                   
       </div>                                                                                                                                            
     </div>                                                                                                                                              
     </footer>                                                                                                                                           

<script src="{{ asset('js/jquery.js') }}"></script>       
<script src="{{ asset('js/popper.js') }}"></script>
<script src="{{asset('js/sweetalert2.min.js')}}"></script>  
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
{!! Charts::scripts() !!}
{!! $chart->script() !!}
<script src="{{asset('js/admin.js')}}"></script>
@include('sweet::alert') 
<script>
  $(document).ready(function(){
	$('a[href="#search"]').on('click', function(event) {                    
		$('#search').addClass('open');
		$('#search > form > input[type="search"]').focus();
	});            
	$('#search, #search button.close').on('click keyup', function(event) {
		if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
			$(this).removeClass('open');
		}
	});            
});
</script>
</body>
</html>


