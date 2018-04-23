@extends('layouts.app')
@section('content')
<style>
.note-editor .note-editable {
    font-size: 20px;
}
</style>
<link href="{{asset('markdown/summernote-bs4.css')}}" rel="stylesheet">
<div class="col" style="margin-top:150px;">
  <p><h2 style="text-align:center; font-family: system-ui; margin:40px 0 0 0;">Edit Budaya</h2></p>
  <h2 class="text-center" style= "margin-bottom:10px; border-bottom: solid 2px; color:#304D6D; width:20%; text-align:center; margin-left: auto; margin-right: auto;"></h2>  
</div>

<div class="container" style="margin-top:100px;">
<form method="POST" action="{{url("/jelajah/{$posting->id}")}}" enctype="multipart/form-data">
    {{ method_field('PUT')   }} 
      {{ csrf_field()  }}
  <div class="form-group">
      <label for="exampleFormControlSelect1">Deskripsi singkat budaya anda, <strong class="alert-info">Note : Deskripsi maksimal 140 karakter</strong></label>
    
    <textarea class="form-control {{ $errors->has('deskripsi_singkat') ? ' is-invalid' : ''  }}" onkeyup="countChar(this)" name="deskripsi_singkat" id="exampleFormControlTextarea1" rows="3">{{$posting->deskripsi}}</textarea>
    <p class="text-center" style="padding-top:5px;"><strong id="charNum"></strong></p>
@if ($errors->has('deskripsi_singkat'))
    <span class="invalid-feedback">
        <strong>{{ $errors->first('deskripsi_singkat') }}</strong>
    </span>
@endif
    <br>
<label for="exampleFormControlSelect1">Kabupaten</label>
  <select class="form-control" id="exampleFormControlSelect1" name="kabupaten">
            <option value="0" hidden></option>
    @foreach ($provinsi as $provinsis)
        <optgroup label="{{$provinsis->nama}}">
        @foreach ($provinsis->kabupaten as $kabupaten)
            <option value="{{$kabupaten->id}}">{{$kabupaten->nama}}</option>
        @endforeach
    </optgroup>
  @endforeach
</select>
<label for="exampleFormControlInput1" style="margin-top:15px;">Foto Sampul</label>
<div class="form-group" style="margin-top:5px;">
    <input type="file" name="files[]"> 
</div>
</div>
<ul class="list-group">                                                                      
@if ($errors->has('files.*'))                                                                
    @if ($errors->has('files.0'))                                                            
    <li class="list-group-item list-group-item-danger">{{ $errors->first('files.0')  }}</li> 
	@endif
@endif                                                                                       
</ul>                                                                                        
@foreach($posting->makanan as $makanan)
  <p><h4 style="text-align:center; font-family: system-ui; margin:70px 0 0 0;">Makanan Tradisional</h4></p>  
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama Makanan</label>
    <input type="text" name="nama_makanan_tradisional" class="form-control {{ $errors->has('nama_makanan_tradisional') ? ' is-invalid' : ''   }}" id="exampleFormControlInput1" value="{{$makanan->nama}}">
@if ($errors->has('nama_makanan_tradisional'))                           
    <span class="invalid-feedback">                       
        <strong>{{ $errors->first('nama_makanan_tradisional') }}</strong>
    </span>                                               
@endif                                                      
</div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Deskripsi Makanan</label>
    <textarea class="summernote form-control {{ $errors->has('deskripsi_makanan_tradisional') ? ' is-invalid' : '' }}" name="deskripsi_makanan_tradisional" id="exampleFormControlTextarea1" >{{$makanan->desc}}</textarea>
@if ($errors->has('deskripsi_makanan_tradisional'))                            
    <span class="invalid-feedback">                           
        <strong>{{ $errors->first('deskripsi_makanan_tradisional') }}</strong> 
    </span>                                                   
@endif                                                          
</div>
@endforeach
  <label for="exampleFormControlTextarea1">Foto Makanan</label>  
  <div class="form-group">
    <input type="file" name="files[]" style="margin-bottom:5px;" > 
    <input type="file" name="files[]" style="margin-bottom:5px;">
   <input type="file" name="files[]" style="margin-bottom:5px;">
 </div>
<ul class="list-group">
@if ($errors->has('files.*'))
    @if ($errors->has('files.1'))
    <li class="list-group-item list-group-item-danger">{{ $errors->first('files.1')  }}</li>
    @endif
    @if ($errors->has('files.2'))
    <li class="list-group-item list-group-item-danger">{{ $errors->first('files.2')  }}</li>
    @endif
    @if ($errors->has('files.3'))
    <li class="list-group-item list-group-item-danger">{{ $errors->first('files.3')  }}</li>
    @endif
@endif
</ul>

@foreach($posting->rumah as $rumah)
  <p><h4 style="text-align:center; font-family: system-ui; margin:70px 0 0 0;">Rumah Adat Tradisional</h4></p>  
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama Rumah Adat</label>
    <input type="text" name="nama_rumah_adat_tradisional" class="form-control {{ $errors->has('nama_rumah_adat_tradisional') ? ' is-invalid' : ''}}" id="exampleFormControlInput1" value="{{$rumah->nama}}">
@if ($errors->has('nama_rumah_adat_tradisional'))                            
    <span class="invalid-feedback">                           
        <strong>{{ $errors->first('nama_rumah_adat_tradisional') }}</strong> 
    </span>                                                   
@endif                                                        
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Deskripsi Rumah Adat</label>
    <textarea class="summernote form-control {{ $errors->has('deskripsi_rumah_adat_tradisional') ? ' is-invalid' : ''}}" name="deskripsi_rumah_adat_tradisional" id="exampleFormControlTextarea1" rows="10">{{$rumah->desc}}</textarea>
@if ($errors->has('deskripsi_rumah_adat_tradisional'))                            
    <span class="invalid-feedback">                           
        <strong>{{ $errors->first('deskripsi_rumah_adat_tradisional') }}</strong> 
    </span>                                                   
@endif                                                        
  </div>
@endforeach
  <label for="exampleFormControlTextarea1">Foto Rumah Adat</label>  
  <div class="form-group">
    <input type="file" name="files[]" style="margin-bottom:5px;" > 
    <input type="file" name="files[]" style="margin-bottom:5px;"> 
    <input type="file" name="files[]" style="margin-bottom:5px;"> 
  </div> 
<ul class="list-group">
@if ($errors->has('files.*'))
    @if ($errors->has('files.4'))
    <li class="list-group-item list-group-item-danger">{{ $errors->first('files.4')  }}</li>
    @endif
    @if ($errors->has('files.5'))
    <li class="list-group-item list-group-item-danger">{{ $errors->first('files.5')  }}</li>
    @endif
    @if ($errors->has('files.6'))
    <li class="list-group-item list-group-item-danger">{{ $errors->first('files.6')  }}</li>
    @endif
@endif
</ul>
@foreach($posting->tarian as $tarian)
  <p><h4 style="text-align:center; font-family: system-ui; margin:70px 0 0 0;">Tarian Tradisional</h4></p>  
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama Tarian</label>
    <input type="text" name="nama_tarian_tradisional" class="form-control {{ $errors->has('nama_tarian_tradisional') ? ' is-invalid' : '' }}" id="exampleFormControlInput1" value="{{$tarian->nama}}">
@if ($errors->has('nama_tarian_tradisional'))                           
    <span class="invalid-feedback">                                              
        <strong>{{ $errors->first('nama_tarian_tradisional') }}</strong>
    </span>                                                                      
@endif                                                                           
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Deskripsi Tarian</label>
    <textarea class="form-control {{ $errors->has('deskripsi_tarian_tradisional') ? ' is-invalid' : '' }}" name="deskripsi_tarian_tradisional" id="exampleFormControlTextarea1" rows="10">{{$tarian->desc}}</textarea>
@if ($errors->has('deskripsi_tarian_tradisional'))                           
    <span class="invalid-feedback">                                     
        <strong>{{ $errors->first('deskripsi_tarian_tradisional') }}</strong>
    </span>                                                             
@endif                                                                  
  </div>
  <label for="exampleFormControlTextarea1">Video Tarian - Youtube Url</label>  
  <div class="form-group">
    <input type="text" name="video_tarian_tradisional" class="form-control {{ $errors->has('video_tarian_tradisional') ? ' is-invalid' : '' }}" id="exampleFormControlInput1" value="{{$tarian->video}}">
@if ($errors->has('video_tarian_tradisional'))                             
    <span class="invalid-feedback">                                            
        <strong>{{ $errors->first('video_tarian_tradisional') }}</strong>  
    </span>                                                                    
@endif                                                                         
  </div> 
@endforeach
  @foreach($posting->senjata as $senjata)
  <p><h4 style="text-align:center; font-family: system-ui; margin:70px 0 0 0;">Senjata Tradisional</h4></p>  
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama Senjata</label>
    <input type="text" name="nama_senjata_tradisional" class="form-control {{ $errors->has('nama_senjata_tradisional') ? ' is-invalid' : ''  }}" id="exampleFormControlInput1" value="{{$senjata->nama}}">
@if ($errors->has('nama_senjata_tradisional'))    
    <span class="invalid-feedback">                                      
        <strong>{{ $errors->first('nama_senjata_tradisional') }}</strong>
    </span>                                                              
@endif                                                                   
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Deskripsi Senjata</label>
    <textarea class="form-control {{ $errors->has('deskripsi_senjata_tradisional') ? ' is-invalid' : ''   }}" name="deskripsi_senjata_tradisional" id="exampleFormControlTextarea1" rows="10">{{$senjata->desc}}</textarea>
@if ($errors->has('deskripsi_senjata_tradisional'))                           
    <span class="invalid-feedback">                                      
        <strong>{{ $errors->first('deskripsi_senjata_tradisional') }}</strong>
    </span>                                                              
@endif                                                                   
  </div>
  @endforeach
  <label for="exampleFormControlTextarea1">Foto Senjata</label>  
  <div class="form-group">
    <input type="file" name="files[]" style="margin-bottom:5px;"> 
    <input type="file" name="files[]" style="margin-bottom:5px;"> 
    <input type="file" name="files[]" style="margin-bottom:5px;"> 
  </div>
<ul class="list-group">                                                                     
@if ($errors->has('files.*'))                                                               
    @if ($errors->has('files.7'))                                                           
    <li class="list-group-item list-group-item-danger">{{ $errors->first('files.7')  }}</li>
    @endif                                                                                  
    @if ($errors->has('files.8'))                                                           
    <li class="list-group-item list-group-item-danger">{{ $errors->first('files.8')  }}</li>
    @endif                                                                                  
    @if ($errors->has('files.9'))                                                           
    <li class="list-group-item list-group-item-danger">{{ $errors->first('files.9')  }}</li>
    @endif                                                                                  
@endif                                                                                      
</ul>                                                                                       
@foreach($posting->lokasi as $lokasi)
  <p><h4 style="text-align:center; font-family: system-ui; margin:70px 0 0 0;">Lokasi</h4></p>  
  <div class="form-group">
    <label for="exampleFormControlInput1" class="col-6 text-center">Latitude</label><label for="exampleFormControlInput1" class="col-6 text-center">Longtitude</label>
    <div class="row">
    <input type="text" name="latitude" class="form-control col-6 {{ $errors->has('latitude') ? ' is-invalid' : ''}}" id="exampleFormControlInput1" value="{{$lokasi->latitude}}"><input type="text" name="longitude" class="form-control col-6 {{ $errors->has('longitude') ? ' is-invalid' : '' }}" id="exampleFormControlInput1" value="{{$lokasi->longitude}}">
@if ($errors->has('latitude'))                             
    <span class="invalid-feedback col-6 text-center">                                             
        <strong>{{ $errors->first('latitude') }}</strong>  
    </span>                                                                     
@endif                                                                          
@if ($errors->has('longitude'))                     
    <span class="invalid-feedback col-6 text-center">                       
        <strong>{{ $errors->first('longitude') }}</strong>
    </span>                                               
@endif                                                    
    <a href="https://www.latlong.net/" target="_blank" class="text-center" style="margin:0 auto; margin-top:5px;">Cari lokasi?</a> 
  </div>
  </div>
@endforeach
@foreach($posting->music as $musik)
  <p><h4 style="text-align:center; font-family: system-ui; margin:70px 0 0 0;">Alat Musik Tradisional</h4></p>  
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama Alat Musik</label>
    <input type="text" name="nama_alat_musik_tradisional" class="form-control {{ $errors->has('nama_alat_musik_tradisional') ? ' is-invalid' : ''}}" id="exampleFormControlInput1" value="{{$musik->nama}}">
@if ($errors->has('nama_alat_musik_tradisional'))                            
    <span class="invalid-feedback">      
        <strong>{{ $errors->first('nama_alat_musik_tradisional') }}</strong> 
    </span>                                                
@endif                                                     
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Deskripsi Alat Musik</label>
    <textarea class="form-control {{ $errors->has('deskripsi_alat_musik_tradisional') ? ' is-invalid' : '' }}" name="deskripsi_alat_musik_tradisional" id="exampleFormControlTextarea1" rows="10">{{$musik->desc}}</textarea>
@if ($errors->has('deskripsi_alat_musik_tradisional'))                            
    <span class="invalid-feedback">      
        <strong>{{ $errors->first('deskripsi_alat_musik_tradisional') }}</strong> 
    </span>                                                
@endif                                                     
  </div>
@endforeach
  <label for="exampleFormControlTextarea1">Foto Alat Musik</label>  
  <div class="form-group">
    <input type="file" name="files[]" style="margin-bottom:5px;"> 
    <input type="file" name="files[]" style="margin-bottom:5px;"> 
    <input type="file" name="files[]" style="margin-bottom:5px;"> 
  </div>
<ul class="list-group">                                                                      
@if ($errors->has('files.*'))                                                                
    @if ($errors->has('files.10'))                                                            
    <li class="list-group-item list-group-item-danger">{{ $errors->first('files.10')  }}</li> 
    @endif                                                                                   
    @if ($errors->has('files.11'))                                                            
    <li class="list-group-item list-group-item-danger">{{ $errors->first('files.11')  }}</li> 
    @endif                                                                                   
    @if ($errors->has('files.12'))                                                            
    <li class="list-group-item list-group-item-danger">{{ $errors->first('files.12')  }}</li> 
    @endif                                                                                   
@endif                                                                                       
</ul>                                                                                        
@foreach($posting->pakaian as $pakaian)
  <p><h4 style="text-align:center; font-family: system-ui; margin:70px 0 0 0;">Pakaian Adat</h4></p>  
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama Pakaian Adat</label>
    <input type="text" name="nama_pakaian_adat" class="form-control {{ $errors->has('nama_pakaian_adat') ? ' is-invalid' : '' }}" id="exampleFormControlInput1" value="{{$pakaian->nama}}">
@if ($errors->has('nama_pakaian_adat'))                           
    <span class="invalid-feedback">                                              
        <strong>{{ $errors->first('nama_pakaian_adat') }}</strong>
    </span>                                                                      
@endif                                                                           
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Deskripsi Pakaian Adat</label>
    <textarea class="form-control {{ $errors->has('deskripsi_pakaian_adat') ? ' is-invalid' : ''}}" name="deskripsi_pakaian_adat" id="exampleFormControlTextarea1" rows="10">{{$pakaian->desc}}</textarea>
@if ($errors->has('deskripsi_pakaian_adat'))               
    <span class="invalid-feedback">
        <strong>{{ $errors->first('deskripsi_pakaian_adat') }}</strong>
    </span>                                                       
@endif                                                            
  </div>
  @endforeach
  <label for="exampleFormControlTextarea1">Foto Pakaian Adat</label>  
  <div class="form-group">
    <input type="file" name="files[]" style="margin-bottom:5px;"> 
    <input type="file" name="files[]" style="margin-bottom:5px;"> 
    <input type="file" name="files[]" style="margin-bottom:5px;">
  </div>
<ul class="list-group">                                                                      
@if ($errors->has('files.*'))                                                                
    @if ($errors->has('files.13'))                                                            
    <li class="list-group-item list-group-item-danger">{{ $errors->first('files.13')  }}</li> 
    @endif                                                                                   
    @if ($errors->has('files.14'))                                                           
    <li class="list-group-item list-group-item-danger">{{ $errors->first('files.14')  }}</li>
    @endif                                                                                   
    @if ($errors->has('files.15'))                                                           
    <li class="list-group-item list-group-item-danger">{{ $errors->first('files.15')  }}</li>
    @endif                                                                                   
@endif                                                                                       
</ul>                                                                                        
@foreach($posting->bahasa as $bahasa)
  <p><h4 style="text-align:center; font-family: system-ui; margin:70px 0 0 0;">Bahasa Daerah</h4></p>  
  <div class="form-group">
    <label for="exampleFormControlInput1">Nama Bahasa Daerah</label>
    <input type="text" name="nama_bahasa_daerah" class="form-control {{ $errors->has('nama_bahasa_daerah') ? ' is-invalid' : ''}}" id="exampleFormControlInput1" value="{{$bahasa->nama}}">
@if ($errors->has('nama_bahasa_daerah'))                           
    <span class="invalid-feedback">                                    
        <strong>{{ $errors->first('nama_bahasa_daerah') }}</strong>
    </span>                                                            
@endif                                                                 
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Deskripsi Bahasa Daerah</label>
    <textarea class="form-control {{ $errors->has('deskripsi_bahasa_daerah') ? ' is-invalid' : ''}}" name="deskripsi_bahasa_daerah" id="exampleFormControlTextarea1" rows="10">{{$bahasa->desc}}</textarea>
@if ($errors->has('deskripsi_bahasa_daerah'))                           
    <span class="invalid-feedback">                                    
        <strong>{{ $errors->first('deskripsi_bahasa_daerah') }}</strong>
    </span>                                                            
@endif                                                                 
  </div>
@endforeach
  <br>
  <button class="btn btn-outline-primary btn-block" name="submit">Edit Budaya</button>
</form>
<script>
    function countChar(val) {
    var len = val.value.length;
    var angka = 140;
    if (len >= 140) {
    val.value = val.value.substring(0, 140);                                  
        } else {
            $('#charNum').text("Sisa karakter kamu tinggal : "+(angka - len ));                              
        }                      
};
</script>
  <script src="{{ asset('markdown/summernote-bs4.js') }}"></script>
    <script>
        $(document).ready(function() {
$('.summernote').summernote({
height: 300, 
fontSizes: ['20','24','36','48','64'],
focus: true,
  toolbar: [
    ['style', ['bold', 'italic', 'underline', 'clear']],
	['fontname'],
    ['fontsize', ['fontsize']],
    ['color', ['color']],
	['insert', ['link']],
    ['para', ['ul', 'ol', 'paragraph']],
    ['height', ['height']],
	['fullscreen']
  ]
    });
});

    </script>
@endsection
