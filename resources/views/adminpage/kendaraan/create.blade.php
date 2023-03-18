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
                <h6 class="m-0 font-weight-bold text-primary">Tambah Kendaraan Baru</h6>
            </div>
            <!-- Card Body -->
            
            <div class="card-body">
                <form action="/kendaraan" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Plat Nomer</label>
                        <input type="text" class="form-control @error('plat') is-invalid @enderror" name="plat" placeholder="Masukan Plat Kendaraan">
                        @error('plat')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Kepemilikan Kendaraan</label>
                        <input type="text" class="form-control @error('milik') is-invalid @enderror" name="milik" placeholder="Masukan Kepemilikan Kendaraan">
                        @error('milik')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="d-block">Jenis Kendaraan</label>
                        <select class="custom-select w-25 @error('jenis_id') is-invalid @enderror" id="inlineFormCustomSelectPref" name="jenis_id">
                            <option selected value="">Choose...</option>
                            @forelse ($jenis as $item)
                                <option value="{{$item->id}}">{{$item->kategori}}</option> 
                            @empty
                                <option value="">Tidak Ada</option>
                            @endforelse
                        </select>
                        @error('jenis_id')
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