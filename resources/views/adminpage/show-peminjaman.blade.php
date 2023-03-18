@extends('layouts/master')

@push('sideKndr')
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
                <form action="/permintaan/{{$data->id}}" method="post" enctype="multipart/form-data">
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
                    <div class="form-group">
                        <label for="exampleInputEmail1">Atasan Yang Menyetujui</label>
                        <select class="custom-select w-100 @error('user_id') is-invalid @enderror" id="inlineFormCustomSelectPref" name="user_id">
                            <option selected value="">Pilih Atasan...</option>
                            @forelse ($atasan as $item)
                                <option value="{{$item->id}}">{{$item->name}}</option> 
                            @empty
                                <option value="">Tidak Ada</option>
                            @endforelse
                        </select>
                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1" class="d-block">Driver</label>
                            <select class="custom-select w-100 @error('driver_id') is-invalid @enderror" id="inlineFormCustomSelectPref" name="driver_id">
                                <option selected value="">Pilih Driver...</option>
                                @forelse ($drivers->where('status', 'kosong') as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option> 
                                @empty
                                    <option value="">Tidak Ada</option>
                                @endforelse
                            </select>
                            @error('driver_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-6">
                            <label for="exampleInputEmail1" class="d-block">Kendaraan</label>
                            <select class="custom-select w-100 @error('kendaraan_id') is-invalid @enderror" id="inlineFormCustomSelectPref" name="kendaraan_id">
                                <option selected value="">Pilih Kendaraan...</option>
                                @forelse ($kendaraan->where('status', 'kosong') as $item)
                                    <option value="{{$item->id}}">{{$item->plat}}</option> 
                                @empty
                                    <option value="">Tidak Ada</option>
                                @endforelse
                            </select>
                            @error('kendaraan_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Ajukan</button>
                </form>   
            </div>
        </div>
    </div>
</div> 
@endsection