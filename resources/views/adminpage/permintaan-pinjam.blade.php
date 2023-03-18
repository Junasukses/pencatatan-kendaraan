@extends('layouts/master')

@push('sideMinta')
    active
@endpush

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Permintaan Peminjaman Kendaraan</h6>
            </div>
            <!-- Card Body -->
            
            <div class="card-body">
                <form action="/permintaan" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Atas Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Masukan Atas Nama Perminjam">
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alasan Peminjaman</label>
                        <textarea name="alasan" class="form-control @error('alasan') is-invalid @enderror" placeholder="Masukan Alasan Meminjam Kendaraan"></textarea>
                        @error('alasan')
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