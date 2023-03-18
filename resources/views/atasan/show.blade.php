@extends('layouts/masteratasan')

@push('sideDash')
    active
@endpush

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Detail Permintaan {{$data->nama}}</h6>
            </div>
            <!-- Card Body -->
            
            <div class="card-body">
                <form action="/atasan/{{$data->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Atas Nama</label>
                        <input type="text" class="form-control" value="{{$data->nama}}" disabled>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Alasan Peminjaman</label>
                        <textarea name="alasan" class="form-control" disabled>{{$data->alasan}}</textarea>
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1" class="d-block">Driver</label>
                            <input type="text" class="form-control" disabled name="driver_id" value="{{$data->driver->nama}}">
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1" class="d-block">Kendaraan</label>
                            <input type="text" disabled class="form-control" name="kendaraan_id" value="{{$data->kendaraan->plat}}">
                        </div>
                    </div>
                    <button type="submit" name="action" class="btn btn-primary" value="setuju">Setuju</button>
                    <button type="submit" name="action" class="btn btn-danger" value="tolak">Tolak</button>
                </form>   
            </div>
        </div>
    </div>
</div> 
@endsection