@extends('base')
@section('content')

      <div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title">Data Buku</h5>
                @if(Session::has('alert-success'))
                <div class="alert alert-success">
                    <strong>{{ \Illuminate\Support\Facades\Session::get('alert-success') }}</strong>
                </div>
                @endif
                <hr>
                <button><a href="{{route('buku.create')}}">TAMBAH</a></button><br><br>
                <table class="table table-bordered">
                  <thead>
                  <tr>
                      <td>no</td>
                      <td>Gambar</td>
                      <td>Judul</td>
                      <td>Penulis</td>
                      <td>Penerbit</td>
                      <td>Genre</td>
                      <td>Tahun</td>
                      <td>ISBN</td>
                      <td>Stok</td>
                      <td>Harga</td>
                      <td>Aksi</td>
                  </tr>
                  </thead>
                  <tbody>
                  @php $no = 1; @endphp
                  @foreach($bukus as $buku)
                      <tr>
                          <td>{{ $no++ }}</td>
                          <td><img src="{{ URL::to('uploads/file/'.$buku->gambar) }}" style="width: 90px; height: 140px;"> </td>
                          <td>{{ $buku->judul }}</td>
                          <td>{{ $buku->penulis }}</td>
                          <td>{{ $buku->penerbit }}</td>
                          <td>{{ $buku->kategori_id }}</td>
                          <td>{{ $buku->tahun }}</td>
                          <td>{{ $buku->isbn }}</td>
                          <td>{{ $buku->stok }}</td>
                          <td>{{ $buku->harga }}</td>
                            <td>
                              <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                                  {{ csrf_field() }}
                                  {{ method_field('DELETE') }}
                                  <a href="{{ route('buku.edit',$buku->id) }}" class=" btn btn-sm btn-primary">Edit</a> <br>
                                  <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                              </form>
                          </td>
                      </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
@endsection
      