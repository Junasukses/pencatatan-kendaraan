@extends('layouts/master')

@push('sideKndr')
    active
@endpush

@section('content')
    @php
        $noSetuju=1;
        $noTolak=1;
        $no=1
    @endphp
    <div class="row">
        <div class="col">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List Permintaan Peminjaman Kendaraan</h6>
                </div>
                <!-- Card Body -->
                
                <div class="card-body table-responsive">
                    <table id="tabelBarang" class="table table-striped align-middle">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Atas Nama</th>
                            <th scope="col">Alasan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($data as $value=>$item)
                            @if ($item->status != "setuju" and $item->status != "tolak")
                                <tr>
                                    <th scope="row" class="align-middle">{{$no}}</th>
                                    <td class="align-middle"><a href="/permintaan/{{$item->id}}">{{$item->nama}}</a></td>
                                    <td class="align-middle">{{Str::limit($item->alasan, 60)}}</td>
                                    <td class="align-middle">@switch($item->status)
                                        @case('ajukan')
                                            <span class="badge badge-warning p-2">Sedang Diajukan</span>
                                            @break
                                        @case('setuju')
                                            <span class="badge badge-success p-2">Disetujui</span>
                                            @break
                                        @case('tolak')
                                            <span class="badge badge-danger p-2">Ditolak</span>
                                            @break
                                        @default
                                            <span class="badge badge-secondary p-2">Diproses</span>
                                    @endswitch</td>
                                    <td class="align-middle">
                                        <form action="/permintaan/{{$item->id}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger delet_confirm">Delete</button>
                                            </form>
                                    </td>
                                </tr>
                                @php
                                    $no++;
                                @endphp
                            @endif
                                @empty
                                
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>        
    </div> 

    <div class="row">

        {{-- TOLAK --}}
        <div class="col">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List Permintaan Peminjaman Ditolak</h6>
                </div>
                <!-- Card Body -->
                
                <div class="card-body table-responsive">
                    <table id="tabelBarang" class="table table-striped align-middle">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alasan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($data->where('status', 'tolak') as $value=>$item)
                        <tr>
                            <th scope="row" class="align-middle">{{$noTolak}}</th>
                            <td class="align-middle">{{$item->nama}}</td>
                            <td class="align-middle">{{Str::limit($item->alasan, 30)}}</td>
                            <td class="align-middle">@switch($item->status)
                                @case('ajukan')
                                    <span class="badge badge-warning p-2">Sedang Diajukan</span>
                                    @break
                                @case('setuju')
                                    <span class="badge badge-success p-2">Disetujui</span>
                                    @break
                                @case('tolak')
                                    <span class="badge badge-danger p-2">Ditolak</span>
                                    @break
                                @default
                                    <span class="badge badge-secondary p-2">Diproses</span>
                            @endswitch</td>
                            <td class="align-middle">
                                <form action="/permintaan/{{$item->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger delet_confirm">Delete</button>
                                    </form>
                            </td>
                            </tr>
                                @php
                                    $noTolak++;
                                @endphp
                                @empty
                                <td colspan="5">No data available in table</td>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>    
        </div>        

        {{-- SETUJU --}}
        <div class="col">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div
                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">List Permintaan Peminjaman Disetujui</h6>
                </div>
                <!-- Card Body -->
                
                <div class="card-body table-responsive">
                    <table id="tabelBarang" class="table table-striped align-middle">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alasan</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($data->where('status', 'setuju') as $value=>$item)
                        <tr>
                            <th scope="row" class="align-middle">{{$noSetuju}}</th>
                            <td class="align-middle">{{$item->nama}}</td>
                            <td class="align-middle">{{Str::limit($item->alasan, 30)}}</td>
                            <td class="align-middle">@switch($item->status)
                                @case('ajukan')
                                    <span class="badge badge-warning p-2">Sedang Diajukan</span>
                                    @break
                                @case('setuju')
                                    <span class="badge badge-success p-2">Disetujui</span>
                                    @break
                                @case('tolak')
                                    <span class="badge badge-danger p-2">Ditolak</span>
                                    @break
                                @default
                                    <span class="badge badge-secondary p-2">Diproses</span>
                            @endswitch</td>
                            <td class="align-middle">
                                <form action="/permintaan/{{$item->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger delet_confirm">Delete</button>
                                    </form>
                            </td>
                            </tr>
                            @php
                                $noSetuju++;
                            @endphp
                                @empty
                                <td colspan="5">No data available in table</td>
                        @endforelse
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