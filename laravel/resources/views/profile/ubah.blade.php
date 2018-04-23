 @extends('layouts.app')
 @section('content')

<style>
.card-img-wrap {
  overflow: hidden;
  position: relative;
  border-radius:50%;
  width:250px;
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
  width: 250px;
  height:250px;
}
.card-img-wrap:hover img {
  transform: scale(1.25);
}
</style>


<div class="col" style="margin-top:150px;">
  <p><h2 style="text-align:center; font-family: system-ui; margin:40px 0 0 0;">Ubah Profile</h2></p>
  <h2 class="text-center" style= "margin-bottom:60px; border-bottom: solid 2px; color:#304D6D; width:250px; text-align:center; margin-left: auto; margin-right: auto;"></h2>  
</div>

<div class="col-12" style="text-align:center;">
  <p>
    <div class="card-img-wrap" style="margin:0 auto;">
      <img src="{{asset("/storage/avatar/{$user->avatar}")}}" class="rounded-circle" style="object-fit:cover;">
    </div>
  </p>
</div>

@if($user->id == Auth::user()->id)
<form action="{{url("/ubah-profile/{$user->id}")}}" method="POST" enctype="multipart/form-data">
  {{ method_field('PUT')  }}
  {{ csrf_field()   }}
  <div class="col-12" style="text-align:center;">
    <label class="btn btn-default btn-file">
      Ganti Foto<input type="file" name="file_avatar" style="display:none;">
    </label>
  </div>
  <div class="container">
    
@if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
@endif

<div class="row" style=" margin-top:50px;">
      <div class="col-lg-6 col-sm-12" style="color:#304D6D;">
        <label for="exampleInputName">Nama</label>
        <input type="name" class="form-control" name="name" value="{{$user->name}}" style="margin-bottom:20px;">    
        <label for="exampleInputEmail1">Alamat Email</label>
        <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" value="{{$user->email}}" style="margin-bottom:20px;">
      </div>
      <div class="col-lg-6 col-sm-12" style="color:#304D6D;">
        <label for="exampleInputPassword1">Atur ulang sandi</label>
        <input type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Sandi baru" style="margin-bottom:20px;">
        <label for="exampleInputPassword1">Konfirmasi sandi</label>
        <input type="password" class="form-control" name="password_confirmation" id="exampleInputPassword1" placeholder="Ulang sandi baru" style="margin-bottom:20px;">
      </div>
    </div>
    <button type="submit" class="btn btn-primary btn-block btn-lg">Simpan</button>
  </div>
</form>
@endif
@endsection
