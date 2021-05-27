<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link href="{{ asset('/css/karyawan.css')}}" rel="stylesheet" type="text/css">
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
        <div class="card card-signin my-5">
          <div class="card-body">
            <center>
              <img src="{{ asset('/img/logo_kadin.png')}}" width="150" height="150" class="img-fluid mt-2" alt="Responsive image">
            </center>
            <h5 class="card-title text-center mt-5">Absen Karyawan</h5>
            @if ($errors->any())
                  <div class="container">
                      <div class="alert alert-danger">
                          <ul>
                              @foreach ($errors->all() as $error)
                                  <li>{{ $error }}</li>
                              @endforeach
                          </ul>
                      </div>
                  </div>
              @elseif (session('berhasil'))
                <div class="alert alert-success">
                  {{ session('berhasil')}}
                </div>
              @elseif (session('gagal_keluar'))
                <div class="alert alert-danger">
                  {{ session('gagal_keluar')}}
                </div>
              @elseif (session('gagal_masuk'))
                <div class="alert alert-danger">
                  {{ session('gagal_masuk')}}
                </div>
              @elseif (session('gagal'))
                <div class="alert alert-danger">
                  {{ session('gagal')}}
                </div>
              @elseif(session('izin'))
                <div class="alert alert-danger">
                  {{ session('izin')}}
                </div>
              @endif
            <form class="form-signin" method="post" action="{{ url('/')}}">
              {{ csrf_field() }}
              <div class="form-group">
                <input type="ID" class="form-control" placeholder="{{ $detail->uuid}}">
                <input type="hidden" name="user_id" value="{{ $detail->id}}">
                <input type="hidden" name="level" value="{{ $detail->level}}">
                <small id="emailHelp" class="form-text text-muted">nomor identitas anda</small>
              </div>
              <div class="form-group">
                <label>Nama : </label>
                <input type="ID" class="form-control" name="name" placeholder="{{ $detail->name}}" value="{{ $detail->name}}">
              </div>

              <div class="form-group">
                <label>Absen : </label><br>
                <select class="custom-select mb-1" name="type" id="absen">
                  <option selected disabled="">Tipe Absen</option>
                  <option value="masuk">Masuk</option>
                  <option value="keluar">Pulang</option>
                  <option value="izin">Izin</option>
                </select>
              </div>

              <div class="keterangan"></div>
              <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Submit</button>
                          
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#absen').on('change', function(){
        var menu = $(this).val();
        if ( menu == "izin") {
          $(".keterangan").empty();
          $('.keterangan').append('<div class="form-group"><label>Keterangan : </label><textarea class="form-control" cols="50" rows="5" name="explanation" placeholder="tulis keterangan jika izin atau sakit"></textarea></div>');  
        }
        else{
          $(".keterangan").empty();
        }
      });
    });
  </script>
</body>