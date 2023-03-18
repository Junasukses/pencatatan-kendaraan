@extends('layouts/master')

@push('sideKndr')
    active
@endpush

@push('header')
    Detail Kendaraan {{$data->plat}}
@endpush

@section('content')
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Digunakan</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data->permintaan->where('status', 'setuju')->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-truck fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Bensin Yang Habis</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data->bbm}}L</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-gas-pump fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Total Service</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{$data->service->count()}}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-star-of-life fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 

    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-7 col-lg-7">
            <div class="card shadow mb-4">
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Jadwal Service</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-striped align-middle">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Tanggal Service</th>
                            <th scope="col">Edit Action</th>
                            <th scope="col">Delete Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @if ($data->service != null)
                                @foreach ($data->service as $value=>$item)
                                <tr>
                                    <th scope="row" class="align-middle">{{$value+1}}</th>
                                    <td class="align-middle">{{$item->jadwal}}</td>
                                    <td class="align-middle">
                                        <a href="/service/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                                    </td>
                                    <td class="align-middle">
                                        <form action="/service/{{$item->id}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger delet_confirm">Delete</button>
                                            </form>
                                    </td>
                                </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4">Tidak ada Data</td>
                                </tr>
                            @endif
                       
                        </tbody>
                    </table>
                    <a href="/service/{{$data->id}}" class="btn btn-primary">Tambah</a>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-5 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Riwayat Penggunaan</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-striped align-middle">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Permintaan</th>
                            <th scope="col">Atasan</th>
                            <th scope="col">Keberangkatan</th>
                        </tr>
                        </thead>
                        <tbody>
                                @foreach ($data->permintaan->where('status', 'setuju') as $value=>$item)
                                <tr>
                                    <th scope="row" class="align-middle">{{$value+1}}</th>
                                    <td class="align-middle">{{$item->nama}}</td>
                                    <td class="align-middle">{{$item->atasan->name}}</td>
                                    <td class="align-middle">{{$item->keberangkatan}}</td>
                                </tr>
                                @endforeach
                       
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready( function () {
            $('#tabelBarang').DataTable();
        });
    </script>
    <script>
        $('.delet_confirm').click( function (event) {
            var form =  $(this).closest("form");
            event.preventDefault();
            Swal.fire({
                title: 'Yakin ingin menghapus data?',
                text: "Anda tidak akan bisa mengembalikannya !",
                icon: 'warning',
                showCancelButton: true,
                focusCancel: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes',
                closeOnConfirm: false,
                closeOnCancel: false
            }).then((willDelete) => {
                if (willDelete.value) {
                    form.submit();
                }
             });
        })
    </script>
@endpush