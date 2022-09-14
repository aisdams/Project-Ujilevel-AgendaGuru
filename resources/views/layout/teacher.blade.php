@extends('start')

@section('judul','Data guru')
@section('isi')
@push('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@endpush
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">
                <div class="card-header">Data guru</div>
                    <div class="card-body">
                        
                        <table class="table table-hover table-bordered border-warning">
                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        
                    @endif

                        <div class="createnya">
                            <form action="{{ route('simpan-guru') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-grup">
                                    <div class="row g-2">
                                        <div class="col-md">
                                            <label class="form-label">Nama Guru</label>
                                            <input type="text" name="namaguru" class="form-control" id="" placeholder="Input Nama Guru In Here" autocomplete="off">
                                            @error('namaguru')
                                            <div class="text-warning">{{ $message }}</div>
                                            @enderror
                                        </div>
                        
                                        <div class="col-md">
                                                <label class="form-label">mapel</label>
                                                <input type="text" name="mapel" class="form-control" id="" placeholder="Input mapel In Here" autocomplete="off">
                                                @error('mapel')
                                                <div class="text-warning">{{ $message }}</div>
                                                @enderror
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-success mb-3 mt-4">Create</button>
                                </div>
                            </form>
                        </div>
                        {{-- end create --}}

                        {{-- tablenya --}}
                        <div class="tablenya">

                                <thead>
                                  <tr class="table-warning">
                                    <th scope="col">#</th>
                                    <th scope="col">Nama guru</th>
                                    <th scope="col">Mapel</th>
                                    <th scope="col">Option</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    
                        
                                    @foreach ( $dataguru as $item )
                                    <tr>
                                      <th scope="row">{{ $loop->iteration }}</th>                         
                                      <td>{{ $item->namaguru }}</td>
                                      <td>{{ $item->mapel }}</td>
                                      <td style="display: flex">
                                          <a href="{{ url('edit-guru',$item->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i></a>
                                          <a href="#" class="btn btn-outline-danger delete btn-sm ms-1" data-id="{{ $item->id }}" data-nama="{{ $item->namaguru }}"><i class="fas fa-trash"></i></a>
                                    </td>
                                  </tr>
                                  @endforeach
                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script>
            $('.delete').click(function () {
            var namaguruid = $(this).attr('data-id');
            var namaguru = $(this).attr('data-nama');
        swal({
            title: "Yakin ?",
            text: "Kamu akan menghapus data guru dengan nama " + namaguru + " ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/delete-guru/" + namaguruid + ""
                    swal("Data berhasil di hapus", {
                        icon: "success",
                    });
                } else {
                    swal("Data tidak jadi dihapus");
                }
            });
    });
    </script>
    
@endpush
