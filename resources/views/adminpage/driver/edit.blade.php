@extends('layouts/master')

@push('sideDrive')
    active
@endpush

@section('content')
<div class="row">
    <div class="col">
        <div class="card shadow mb-4">
            <!-- Card Header - Dropdown -->
            <div
                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Edit Driver {{$data->nama}}</h6>
            </div>
            <!-- Card Body -->
            
            <div class="card-body">
                <form action="/driver/{{$data->id}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nama Driver</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" value="{{$data->nama}}">
                        @error('nama')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Foto Driver</label>
                        <input type="file" class="form-control-file @error('foto') is-invalid @enderror" name="foto">
                        @error('foto')
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