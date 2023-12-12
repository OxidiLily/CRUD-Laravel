@extends('layouts.main')

@section('content')
<h4>Data Student</h4>
<div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-sm btn-primary" onclick="window.location='{{ url('students/add') }}'">Add Data</button>
    </div>
    <div class="card-body">
      @if (session('msg'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Berhasil!</strong> {{ session('msg') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
@endif
      <div class="alert alert-info">
        <form action="" method="get">
          <div class="row mb-3">
            <label for="txtphone" class="col-sm-2 col-form-label">Cari Data</label>
            <div class="col-sm-6">
              <input type="text" class="form-control form-control-sm" value="{{ $search }}" placeholder="Masukkan Data" name="search" autofocus>
            </div>
          </div>

        </form>
        <table class="table table-sm table-striped table-bordered">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Id Students</th>
                    <th>Nama</th>
                    <th>Kelamin</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
              @php
                $nomor = 1+(($students->currentPage()-1)* $students->perPage());
              @endphp
                @foreach ($students as $row)
                    <tr>
                        {{-- <th>{{ $loop->iteration }}</th> --}}
                        <th>{{ $nomor++ }}</th>
                        <td>{{ $row->idstudents }}</td>
                        <td>{{ $row->nama }}</td>
                        <td>{{ ($row->genre=='M') ? 'Male':'Female'}}</td>
                        <td>{{ $row->alamat }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone }}</td>
                        <td>
                          <button onclick="window.location='{{ url('students/'.$row->idstudents) }}'" type="button" class="btn btn-sm btn-info" title="Edit Data">Edit</button>
                          <form onsubmit="return hapus('{{ $row->nama }}')" style="display: inline" action="{{ url('students/'.$row->idstudents) }}" method="post">
                          @csrf
                          @method('DELETE')
                          <button type="submit" title="Hapus Data" class="btn btn-danger btn-sm">
                            Delete
                          </button>
                          </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{-- {{ $students->links() }} --}}
        {!! $students->appends(Request::except('page'))->render() !!}
      </div>
    </div>
  </div>
  <script>
    function hapus(params) {
      pesan = confirm('yakin Anda ingin menghapus data ini?');
      if(pesan) return true;
      else return false;
    }
    
  </script>
@endsection