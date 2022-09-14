@extends('start')

@section('judul','Data Agenda Sekolah')
@section('isi')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card">
                <div class="card-header">Data Agenda</div>
                    <div class="card-body">

                        {{-- createnya --}}
                        @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ $message }}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        
                        @endif

                        <form action="{{ route('simpan-agenda') }}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                            <div class="form-grup">
                                <div class="row g-2 mb-3">
                                    <div class="col-4">
                                        <label class="form-label">Nama Guru</label>
                                        <select name="namaguru_id" class="form-select" placeholder="Input Nama Guru In Here">
                                            
                                        <option selected disabled>Open this select Nama Guru</option>
                                        @foreach ($dataGuru as $item)
                                        <option value="{{ $item->id }}">{{ $item->namaguru }}</option>
                                        @endforeach
                                        </select>
                                    </div>
                
                                <div class="col-4">
                                    <label class="form-label">Mapel</label>
                                        <select name="mapel_id" class="form-select" placeholder="Input Mapel In Here">
                                            
                                        <option selected disabled>Open this select Mapel</option>
                                        @foreach ($dataGuru as $item)
                                        <option value="{{ $item->id }}">{{ $item->mapel }}</option>
                                        @endforeach
                                        </select>
                                </div>
                
                                <div class="col-4">
                                    <label class="form-label">Materi</label>
                                    <input type="text" name="materi" class="form-control"
                                        placeholder="Input Materi In Here">
                                </div>
                            </div>
                            {{-- end Col 1 --}}
                
                             {{-- Col 2 --}}
                             <div class="row g-2 mb-3">
                                <div class="col-4">
                                    <label class="form-label">Jenis Pelajaran</label>
                                    <select name="jenispelajaran" class="form-select" placeholder="Input Jenis pelajaran In Here">
                                        
                                    <option selected disabled>Open this select Jenis Pelajaran</option>
                                    <option value="Online">Online</option>
                                    <option value="Ofline">Ofline</option>
                                    </select>
                                </div>
                
                                <div class="col-4">
                                    <label for="url">Link Pembelajaran</label>
                                    <input type="url" pattern="https://.*" name="linkpembelajaran" id="url" class="form-control" placeholder="Input Link Pembelajaran In Here">
                                </div>
                
                                <div class="col-4">
                                    <label class="form-label">Documentasi</label>
                                    <input type="file" name="documentasi" class="form-control" placeholder="Choose documentasi In Here">
                                </div>
                            </div>
                            {{-- end Col 2 --}}
                
                            {{-- Col 3 --}}
                            <div class="row g-2 mb-3">
                                <div class="col-4">
                                <label class="form-label">Kelas</label>
                                        <select name="namakelas_id" class="form-select" placeholder="Input Kelas In Here">
                                            
                                        <option selected disabled>Open this select Kelas</option>
                                        @foreach ($dataKelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->namakelas }}</option>
                                        @endforeach
                                        </select>

                                </div>
                
                                <div class="col-4">
                                    <label class="form-label"> Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control" placeholder="Input Keterangan In Here">
                                </div>
                
                                <div class="col-4">
                                    <label class="form-label">Jam Pembelajaran</label>
                                    <input type="time" name="jampembelajaran" class="form-control" placeholder="Input jampembelajaran In Here">
                                </div>
                            </div>
                            {{-- end Col 3 --}}
                
                            <div class="row g-2">
                                <div class="col">
                                    <label class="form-label">Absensi Siswa</label>
                                    <textarea type="text" class="form-control" placeholder="Input Absensi Siswa In Here" style="height: 100px" name="absensisiswa"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-sm btn-success mt-3 mb-3">Create</button>
                        </form>
                        
                        {{-- end createnya --}}

                        {{-- tablenya --}}
                        <div class="tablenya">
                            <div class="tablenya">

                            <table class="table table-sm table-hover table-bordered border-primary" style="font-size: 14.3px; margin-left:-.6rem">
                                <thead>
                                  <tr class="table-primary text-center">
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Guru</th>
                                    <th scope="col">Mapel</th>
                                    <th scope="col">Materi</th>
                                    <th scope="col">Jenis Pelajaran</th>
                                    <th scope="col">Link Pembelajaran</th>
                                    <th scope="col">Absensi Siswa</th>
                                    <th scope="col">Documentasi</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Jam Pembelajaran</th>
                                    <th scope="col">Option</th>
                                  </tr>
                                </thead>
                                <tbody>

                                    @foreach ( $dataagenda as $item )
                                 <tr class="text-center">
                                    <th scope="row">{{ $loop->iteration }}</th>                         
                                    <td>{{ $item->teacher->namaguru }}</td>
                                    <td>{{ $item->teacher->mapel }}</td>
                                    <td>{{ $item->materi }}</td>
                                    <td>{{ $item->jenispelajaran }}</td>
                                    <td><a href="url">{{ $item->linkpembelajaran }}</a></td>
                                    <td>{{ $item->absensisiswa }}</td>
                                    <td>
                                        <img src="{{ asset('documentasi/'.$item->documentasi) }}" alt="" width="100px">
                                    </td>
                                    <td>{{ $item->kelas->namakelas }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>{{ $item->jampembelajaran }}</td>
                                    <td style="display: flex">
                                        <a href="{{ url('edit-agenda',$item->id) }}" class="btn btn-outline-warning"><i class="fas fa-edit"></i></a>
                                        <a href="#" class="btn btn-outline-danger delete btn-sm ms-1" data-id="{{ $item->id }}" data-nama="{{ $item->namaguru }}"><i class="fas fa-trash"></i></a>
                                    </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                              </table>
                        </div>
                        {{-- end tablenya --}}
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
                    window.location = "/delete-agenda/" + namaguruid + ""
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
