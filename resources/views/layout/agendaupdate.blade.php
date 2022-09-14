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
                        {{ $message }}<button type="button" class="btn-close" data-bs-dismiss="alert"
                            aria-label="Close"></button>
                    </div>

                    @endif

                    <form action="{{ route('update-agenda',$agenda->id) }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        @method ('PUT')
                        <div class="form-grup">
                            <div class="row g-2 mb-3">
                                <div class="col-4">
                                    <label class="form-label">Nama Guru</label>
                                    <select name="namaguru_id" class="form-select"
                                        placeholder="Input Nama Guru In Here">

                                        <option selected disabled>{{ $agenda->teacher->namaguru }}</option>
                                        @foreach ($dataGuru as $item)
                                        <option value="{{ $item->id }}">{{ $item->namaguru }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-4">
                                    <label class="form-label">Mapel</label>
                                    <select name="mapel_id" class="form-select" placeholder="Input Mapel In Here">

                                        <option selected disabled>{{ $agenda->teacher->mapel }}</option>
                                        @foreach ($dataGuru as $item)
                                        <option value="{{ $item->id }}">{{ $item->mapel }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="col-4">
                                    <label class="form-label">Materi</label>
                                    <input type="text" name="materi" class="form-control"
                                        placeholder="Input Materi In Here" value="{{ $agenda->materi }}">
                                    @error('materi')
                                    <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- end Col 1 --}}

                            {{-- Col 2 --}}
                            <div class="row g-2 mb-3">
                                <div class="col-4">
                                    <label class="form-label">Jenis Pelajaran</label>
                                    <select name="jenispelajaran" class="form-select"
                                        placeholder="Input Jenis pelajaran In Here">

                                        <option selected>{{ $agenda->jenispelajaran }}</option>
                                        <option value="Online">Online</option>
                                        <option value="Ofline">Ofline</option>
                                    </select>
                                    @error('jenispelajaran')
                                    <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-4">
                                    <label for="url">Link Pembelajaran</label>
                                    <input type="url" pattern="https://.*" name="linkpembelajaran" id="url"
                                        class="form-control" placeholder="Input Link Pembelajaran In Here"
                                        value="{{ $agenda->linkpembelajaran }}">
                                    @error('linkpembelajaran')
                                    <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-4">
                                    <label class="form-label">Documentasi</label>
                                    <input type="file" name="documentasi" class="form-control"
                                        placeholder="Choose documentasi In Here">
                                    <img src="{{ asset('documentasi/'.$agenda->documentasi) }}" alt="" width="100px">
                                    @error('documentasi')
                                    <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- end Col 2 --}}

                            {{-- Col 3 --}}
                            <div class="row g-2 mb-3">
                                <div class="col-4">
                                    <label class="form-label">Kelas</label>
                                        <select name="namakelas_id" class="form-select" placeholder="Input Kelas In Here">
                                            
                                        <option selected disabled>{{ $agenda->kelas->kelas }}</option>
                                        @foreach ($dataKelas as $item)
                                        <option value="{{ $item->id }}">{{ $item->namakelas }}</option>
                                        @endforeach
                                        </select>
                                </div>

                                <div class="col-4">
                                    <label class="form-label">Keterangan</label>
                                    <input type="text" name="keterangan" class="form-control"
                                        placeholder="Input Keterangan In Here"
                                        value="{{ $agenda->keterangan }}">
                                    @error('keterangan')
                                    <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-4">
                                    <label class="form-label">Jam Pembelajaran</label>
                                    <input type="time" name="jampembelajaran" class="form-control"
                                        placeholder="Input Jam Pembelajaran In Here"
                                        value="{{ $agenda->jampembelajaran }}">
                                    @error('jampembelajaran')
                                    <div class="text-warning">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        {{-- end Col 3 --}}

                        <div class="row g-2">
                            <div class="col">
                                <label class="form-label">Absensi Siswa</label>
                                <textarea type="text" class="form-control" placeholder="Input Absensi Siswa In Here"
                                    style="height: 100px" name="absensisiswa">{{ $agenda->absensisiswa }}</textarea>
                                @error('absensisiswa')
                                <div class="text-warning">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success mt-3 mb-3">Update</button>
                    </form>

                    {{-- end createnya --}}


                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
