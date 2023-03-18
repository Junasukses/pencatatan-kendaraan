@extends('layouts/master')

@push('sideJenis')
    active
@endpush

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Tambah Jenis Kendaraan Baru</h6>
            </div>
            <!-- Card Body -->
            
            <div class="card-body">
                <form action="/jenis" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kategori Kendaraan</label>
                        <input type="text" class="form-control @error('kategori') is-invalid @enderror" name="kategori" placeholder="Kategori Kendaraan">
                        @error('kategori')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>   
            </div>
        </div>
    </div>
</div> 
@endsection