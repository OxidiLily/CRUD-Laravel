@extends('layouts.main')

@section('content')
<h4>Tambah data student</h4>
<div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-sm btn-warning" onclick="window.location='{{ url('students') }}'">Kembali</button>
    </div>
    <div class="card-body">
        <form  method="POST" action="{{url('students')}}">
            @csrf
            <div class="row mb-3">
                <label for="txtid" class="col-sm-2 col-form-label ">ID Students</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form-control-sm @error('txtid') is-invalid @enderror" 
                        id="txtid" name="txtid" value="{{ old('txtid') }}">
                  @error('txtid')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="txtnama" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-4">
                  <input type="text" class="form-control form-control-sm @error('txtnama') is-invalid @enderror" id="txtnama" name="txtnama" value="{{ old('txtnama') }}">
                  @error('txtnama')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="txtgender" class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-4">
                  <select class="form-select form-select-sm @error('txtgender') is-invalid @enderror" id="txtgender" name="txtgender" >
                  <option value="" selected>-Pilih-</option>
                  <option value="M" {{ (old('txtgender')=='M') ? 'selected':'' }}>Male</option>
                  <option value="F" {{ (old('txtgender')=='F') ? 'selected':'' }}>Female</option>
                    </select>
                </div>
              </div>
              <div class="row mb-3">
                <label for="txtalamat" class="col-sm-2 col-form-label">Alamat</label>
                <div class="col-sm-10">
                  <textarea class="form-control @error('txtalamat') is-invalid @enderror" name="txtalamat" id="txtalamat" cols="30" rows="10"  >{{ old('txtalamat')}}</textarea>
                  @error('txtalamat')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="txtemail" class="col-sm-2 col-form-label">Email</label>
                <div class="col-sm-6">
                  <input type="email" name="txtemail" id="txtemail" class="form-control form-control-sm @error('txtemail') is-invalid @enderror" value="{{ old('txtemail') }}">
                  @error('txtemail')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
              @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="txtphone" class="col-sm-2 col-form-label">Phone</label>
                <div class="col-sm-6">
                  <input type="text" name="txtphone" id="txtphone" class="form-control form-control-sm @error('txtphone') is-invalid @enderror" value="{{ old('txtphone') }}">
                  @error('txtphone')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                  @enderror
                </div>
              </div>
              <div class="row mb-3">
                <label for="" class="col-sm-2 col-form-label"></label>
                <div class="col-sm-6">
                 <button type="submit" class="btn btn-sm btn-success">Save</button>
                </div>
              </div>
        </form>
    </div>
</div>
@endsection