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
  <p><h2 style="text-align:center; font-family: system-ui; margin:40px 0 0 0;">Profile</h2></p>
  <h2 class="text-center" style= "margin-bottom:60px; border-bottom: solid 2px; color:#304D6D; width:150px; text-align:center; margin-left: auto; margin-right: auto;"></h2>  
</div>

<div class="col-12" style="text-align:center;">
  <p>
    <div class="card-img-wrap" style="margin:0 auto;">
      <img src="{{asset("/storage/avatar/{$user->avatar}")}}" class="rounded-circle" style="object-fit:cover;">
    </div>
  </p>
</div>

<p><h2 style="text-align:center; font-family: system-ui; margin:20px 0 70px 0;">{{$user->name}}</h2></p>
<div class="container">
<div class="row"> 
  <div id="accordion" class="col-lg-6 col-md-12">
    <div class="card" style="margin-top:20px;">
      <div class="card-header" id="headingOne">
        <a align="center" style="cursor:pointer; font-size:1.1rem; " data-toggle="collapse" data-target="#kiriman-budaya" aria-expanded="true" aria-controls="kiriman-budaya">
          <a class="mb-0" style="text-align:left;">Kiriman Budaya</a>
          <p class="text-muted" style="float:right; font-size:.9rem; margin-top:6px; margin-bottom:-10px;"><i class="fa fa-upload" aria-hidden="true"></i> {{$postings->count()}}</p> 
        </a>
      </div>
      <div id="kiriman-budaya" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion" style="max-height:245px; overflow-x:auto;">
          @foreach($postings as $posting)
        <div class="card-body list-group-item">
                <a href="{{url("/jelajah/{$posting->slug}")}}" style="text-decoration:none;">{{$posting->kabupaten->nama}}
                </a>@if($posting->status == 0) <small class="text-muted" style="float:right;"> Belum dikonfirmasi</small>@endif
        </div>
        @endforeach
      </div>
    </div>
  </div>
  <div id="accordion" class="col-lg-6 col-md-12" style="margin-bottom:30px;margin-top;30px;">
    <div class="card" style="margin-top:20px;">
      <div class="card-header" id="headingOne">
        <a style="cursor:pointer; font-size:1.1rem;" data-toggle="collapse" data-target="#komentar" aria-expanded="true" aria-controls="komentar">
          <a class="mb-0" style="text-align:left;">Komentar</a>
          <p class="text-muted" style="float:right; font-size:.9rem; margin-top:6px; margin-bottom:-10px;"><i class="fa fa-comments-o" aria-hidden="true"></i> {{$comments->count()}}</p> 
        </a>
      </div>
      <div id="komentar" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion" style="max-height:245px; overflow-x:auto;">
          @foreach($comments as $comment)
        <div class="card-body list-group-item">
          <a href="{{url("/jelajah/{$comment->posting->slug}")}}" style="text-decoration:none;">{{$comment->subject}}</a>
        </div>
    @endforeach
      </div>
    </div>
  </div>
</div>
</div>
@endsection
