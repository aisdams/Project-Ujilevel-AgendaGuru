@extends('start')

@section('judul','Data Kelas')
@section('isi')
@push('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
@endpush
    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">
                <div class="card-header">Data Kelas</div>
                    <div class="card-body">
                        
                        <table class="table table-hover table-bordered border-warning">
                            @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        
                    @endif

                        <div class="createnya">
                            <form action="{{ route('simpan') }}" method="post">
                                {{ csrf_field() }}
                                <div class="form-grup">
                                    <div class="row g-2">
                                        <div class="col-md">
                                                <label class="form-label">Nama Kelas</label>
                        
                                                <select class="form-select form-select-sm" placeholder="Input Nama kelas In Here" name="namakelas">
                                                    <option selected disabled>Open this select menu</option>
                                                    <option value="X RPL 1">X RPL 1</option>
                                                    <option value="X RPL 2">X RPL 2</option>
                                                    <option value="X TEI">X TEI </option>
                                                  </select>
                                                  @error('namakelas')
                                                <div class="text-warning">{{ $message }}</div>
                                                 @enderror
                                        </div>
                        
                                        <div class="col-md">
                                            <label class="form-label">Nama Walikelas</label>
                                            <select name="namaguru_id" class="form-select" placeholder="Input Nama Guru In Here">
                                                
                                            <option selected disabled>Open this select Nama Guru</option>
                                            @foreach ($dataGuru as $item)
                                            <option value="{{ $item->id }}">{{ $item->namaguru }}</option>
                                            @endforeach
                                            </select>
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
                                    <th scope="col">Nama Kelas</th>
                                    <th scope="col">Wali Kelas</th>
                                    <th scope="col">Option</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    
                        
                                    @foreach ( $dataKelas as $item )
                                    <tr>
                                      <th scope="row">{{ $loop->iteration }}</th>                         
                                      <td>{{ $item->namakelas }}</td>
                                      <td>{{ $item->teacher->namaguru}}</td>
                                      <td style="display: flex">
                                          <a href="{{ url('edit-kelas',$item->id) }}" class="btn btn-outline-warning btn-sm"><i class="fas fa-edit"></i></a>
                                          <a href="#" class="btn btn-danger delete btn-sm ms-1" data-id="{{ $item->id }}"
                                            data-nama="{{ $item->namakelas }}"><i class="fas fa-trash"></i></a>
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
            var namakelasid = $(this).attr('data-id');
            var namakelas = $(this).attr('data-nama');
        swal({
            title: "Yakin ?",
            text: "Kamu akan menghapus data Kelas dengan nama " + namakelas + " ",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    window.location = "/delete-kelas/" + namakelasid + ""
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
