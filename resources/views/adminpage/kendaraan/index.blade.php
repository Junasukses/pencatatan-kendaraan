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
                    <h6 class="m-0 font-weight-bold text-primary">Kendaraan Yang Ada</h6>
                </div>
                <!-- Card Body -->
                
                <div class="card-body table-responsive">
                    <table id="tabelBarang" class="table table-striped align-middle">
                        <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Plat Nomer</th>
                            <th scope="col">Kepemilikan Kendaraan</th>
                            <th scope="col">Jenis</th>
                            <th scope="col">Edit Action</th>
                            <th scope="col">Delete Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse ($data as $value=>$item)
                        <tr>
                            <th scope="row" class="align-middle">{{$value+1}}</th>
                            <td class="align-middle"><a href="/kendaraan/{{$item->id}}">{{$item->plat}}</a></td>
                            <td class="align-middle">{{$item->milik}}</td>
                            <td class="align-middle">{{$item->jenis->kategori}}</td>
                            <td class="align-middle">
                                <a href="/kendaraan/{{$item->id}}/edit" class="btn btn-warning">Edit</a>
                            </td>
                            <td class="align-middle">
                                <form action="/kendaraan/{{$item->id}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger delet_confirm">Delete</button>
                                    </form>
                            </td>
                            </tr>
                                @empty
                        @endforelse
                        </tbody>
                    </table>
                    <a href="/kendaraan/create" class="btn btn-primary">Tambah</a>
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