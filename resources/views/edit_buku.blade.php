@extends('base')
@section('content')

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Edit Buku</h5>
                <hr>
                <form action="{{ route('buku.update', $bukus->id) }}" method="post" enctype="multipart/form-data">                
                {{ csrf_field() }}
                {{ method_field('PUT') }}
                <div class="form-group">
                    <label for="file">Gambar Lama:</label>
                    <img src="{{ URL::to('uploads/file/'.$bukus->gambar) }}" style="width: 150px; height: 150px;">
                </div>
                <div class="form-group">
                    <label for="gambar">Gambar:</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" value="{{ $bukus->gambar }}">
                </div>
                <div class="form-group">
                    <label for="judul">Judul:</label>
                    <input type="text" class="form-control" id="judul" name="judul" value="{{ $bukus->judul }}">
                </div>
                <div class="form-group">
                    <label for="penulis">Penulis:</label>
                    <input type="text" class="form-control" id="penulis" name="penulis" value="{{ $bukus->penulis }}">
                </div>
                <div class="form-group">
                    <label for="penerbit">Penerbit:</label>
                    <input type="text" class="form-control" id="penerbit" name="penerbit" value="{{ $bukus->penerbit }}">
                </div>
                <div class="form-group">
                    <label for="kategori_id">Kategori:</label>
                        <select name="kategori_id" required >
                            <option selected disabled>Pilih Kategori</option>
                            @foreach($kategoris as $item)
                            <option value="{{ $item->id }}" class="form-control">{{ $item->kategori_name }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun:</label>
                    <input type="text" class="form-control" id="tahun" name="tahun" value="{{ $bukus->tahun }}">
                </div>
                <div class="form-group">
                    <label for="isbn">ISBN:</label>
                    <input type="text" class="form-control" id="isbn" name="isbn" value="{{ $bukus->isbn }}">
                </div>
                <div class="form-group">
                    <label for="kota_id">Location:</label>
                    <select name="kota_id" required >
                            <option selected disabled>Pilih Kota</option>
                            @foreach($kotas as $kot)
                            <option value="{{ $kot->id }}" class="form-control">{{ $kot->kota_name }}</option>
                            @endforeach
                        </select>
                </div>
                <div class="form-group">
                    <label for="harga">Harga:</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="{{ $bukus->harga }}">
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi:</label>
                    <input type="text" class="form-control" id="deskripsi" name="deskripsi" value="{{ $bukus->deskripsi }}">
                </div>
                <div class="form-group">
                    <label for="stok">Stok:</label>
                    <input type="number" class="form-control" id="stok" name="stok" value="{{ $bukus->stok }}">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    <button type="reset" class="btn btn-md btn-danger">Cancel</button>
                </div>
            </form>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection