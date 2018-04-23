<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Jelajah Budaya Indonesia</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="{{asset('css/font-awesome-4.7.0/css/font-awesome.min.css')}}" rel="stylesheet"> 
  <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{asset('css/index.css')}}" rel="stylesheet">      
  <link rel="stylesheet" href="{{asset('css/sweetalert2.min.css')}}"> 
  <link rel="shortcut icon" href="{{asset('photo/jeluda.png')}}">
</head>
<body>
  <style>
    .card-img-wrap {
      overflow: hidden;
      position: relative;
      border-radius:100px;
      width:200px;
      border:1.2px solid whitesmoke;
      box-shadow:0 1px 2px rgba(0,0,0,0.4);
    }
    .card-img-wrap:after {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0; bottom: 0;
    }
    .card-img-wrap img {
      transition: transform .25s;
      width: 200px;
      height:200px;
    }
    .card-img-wrap:hover img {
      transform: scale(1.25);
    }
  </style>
  <nav class="navbar navbar-expand-md bg-transparent navbar-dark">
    <img src="{{asset('photo/jeludakecil.png')}}" alt="Logo" style="width:150px; margin-top:10px;">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar" style="margin-top:-20px;">
      @if (Route::has('login'))  
      <ul class="navbar-nav ml-auto">
        @auth
        <li class="nav-item" style="padding:0px 15px 0 0;  font-family: system-ui;">
          <a class="hover_effect nav-link text-white" href="{{url('/jelajah')}}">Jelajah</a>
        </li>
        @else
        <li class="nav-item" style="padding:0px 15px 0 0; font-family: system-ui;">
          <a class="hover_effect nav-link text-white" href="{{url('login')}}">Masuk</a>
        </li>
        <li class="nav-item"  style="padding:0px 15px 0 0; font-family: system-ui;">
          <a class="hover_effect nav-link text-white" href={{(url('register'))}}>Daftar</a>
        </li>
      </ul>
        @endauth
    </div>
      @endif
  </nav>
  <div class="row">
    <div class="responsive-video fullscreen-bg" style="background: rgb(0, 0, 0); opacity:.8;">
      <video loop muted autoplay class="fullscreen-bg__video">
        <source src="{{asset('video/jeluda.mp4')}}" type="video/mp4">
      </video>
    </div>
  </div>
  <h1 class="writers" style="margin-top:100px;">
    <span style="font-family:monospace; color:whitesmoke; font-size:150%; font-weight:900;" class="typewrite" data-period="2000" data-type='[ "Jeluda", "jelajah budaya indonesia", "saya cinta indonesia" ]'>
      <span class="wrap"></span>
    </span>
  </h1>
  <form name="search"  method="GET" action="{{url('/jelajah')}}" style="text-align:center;">
    <label class="input-field search-box">
      <input type="text" name="search" autocomplete="off" autocorrect="off" autocapitalize="off" spellcheck="false"/>
      <span></span>
    </label>
  </form>
  <h3 class="writers">
    <span style="color:whitesmoke; font-family:monospace;" class="typewrite" data-type='[ "jelajahi disini...", "seputar budaya yang ada di indonesia"]'>
      <span class="wrap"></span>
    </span>
  </h3> 
  <div class="card-body" style="background-color:whitesmoke; font-family: system-ui; margin-top:250px;">
    <h2 style= "padding-bottom: 15px; margin:30px; color:#56564e;">JELUDA</h2>
    <h2 class="text-center" style= "border-bottom: solid 2px; color:#2d2d27; width:150px; text-align:center; margin-left: auto; margin-right: auto;"></h2>
    <p style="margin-top: 50px; color:#6d6d63; margin-left:10%; margin-right:10%; font-size: 22px;">Jeluda memberikan informasi yang lengkap seputar budaya yang terdapat di setiap daerah di Indonesia. Telusuri tarian, pakaian adat, rumah adat, makanan khas, bahasa daerah dan masih banyak lagi yang bisa anda dapatkan tentang kebudayaan Indonesia. Untuk melihat apa saja yang kami sajikan disini, anda dapat berkunjung ke link yang telah kami sediakan dengan mengklik tombol dibawah ini.</p>
    <a href="{{url('/jelajah')}}">
      <button type="button" class="btn btn-outline-secondary btn-lg" style="margin:30px 0; padding:10px 50px 10px 50px;">Jelajah</button>
    </a>
  </div>
  <div class="card-body" style="background-color:#E0E1D4; font-family: system-ui;">
    <h2 style= "padding-bottom: 15px; margin:30px; color:#22384F;">OUR TEAM</h2>
    <h2 class="text-center" style= "border-bottom: solid 2px; color:#2E4057; width:250px; text-align:center; margin-left: auto; margin-right: auto;"></h2>
    <p style="margin-top: 50px; margin-left:10%; margin-right:10%; letter-spacing: 2px; color:#304D6D; font-size:22px;">Website ini di bangun dengan <i class="fa fa-heartbeat" aria-hidden="true" style="color:#ed4444;"></i> dan semangat oleh orang-orang yang cinta dengan keberagaman budaya yang ada di Indonesia.
    </p>
  </div>
  <div class="card-body" style="background-color:#E0E1D4; padding-left:50px; color:#304D6D;">
    <div class="row col-12" style="font-family: system-ui;">
      <div class="col-md-4 col-sm-12" style=" padding-top: 10px; padding-bottom: 10px;">
        <div class="card-img-wrap" style="margin:0 auto;">
          <img src="{{asset('photo/kusuma.jpg')}}" style="object-fit: cover; " class="rounded-circle" >
        </div>
        <h5 style="margin-top:20px;">Kusuma</h5>
        <span style="border: solid 1px; border-color:#82A0BC; padding: 5px;">Designer</span>
        <p><br>Pasti ada jalan lain, jangan diam dan menyerah di tempat tersebut.</p>
      </div>
      <div class="col-md-4 col-sm-12" style=" padding-top: 10px; padding-bottom: 10px;">
        <div class="card-img-wrap" style="margin:0 auto;">
          <img src="{{asset('photo/pradipta.jpg')}}" style="object-fit: cover;" class="rounded-circle" width="200px;" height="200px;">
        </div>
        <h5 style="margin-top:20px;">Pradipta</h5>
        <span style="border: solid 1px; border-color:#82A0BC; padding: 5px;">Back-end</span>     
        <p><br>Tidak ada yang tidak bisa di dunia ini , yang ada hanyalah malas mencoba.</p>     
      </div>
      <div class="col-md-4 col-sm-12" style=" padding-top: 10px; padding-bottom: 10px;">
        <div class="card-img-wrap" style="margin:0 auto;">
          <img src="{{asset('photo/paulus.jpg')}}" style="object-fit: cover;" class="rounded-circle" width="200px;" height="200px;">
        </div>
        <h5 style="margin-top:20px;">Paulus</h5>
        <span style="border: solid 1px; border-color:#82A0BC; padding: 5px;">Front-end</span>
        <p><br>Jangan pernah malas untuk mencoba hal baru.</p>
      </div>                 
    </div>
  </div>
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
  <script src="{{ asset('js/index.js') }}"></script>
  <script src="{{asset('js/sweetalert2.min.js')}}"></script> 
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  @include('sweet::alert') 
  <script src="{{asset('js/slim.js')}}"></script>
</body>
</html>
