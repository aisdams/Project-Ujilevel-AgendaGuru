@extends('start')

@section('judul','Data Kelas')
@section('isi')

    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">Data Kelas</div>
                    <div class="card-body">
                        {{-- updatenya --}}
                        <form action="{{ route('update',$kelas->id) }}" method="post">
                            {{ csrf_field() }}
                            @method ('PUT')
                            <div class="form-grup">
                                <div class="row g-2">
                                    <div class="col-md">
                                        <label class="form-label">Nama Kelas</label>
                        
                                        <select class="form-select form-select-sm" placeholder="Input Nama kelas In Here" name="namakelas">
                                            <option selected>{{ $kelas->namakelas }}</option>
                                            <option value="X RPL 1">X RPL 1</option>
                                            <option value="X RPL 2">X RPL 2</option>
                                            <option value="3">X TEI </option>
                                          </select>
                                          @error('namakelas')
                                        <div class="text-warning">{{ $message }}</div>
                                         @enderror
                                    </div>
                    
                                    <div class="col-md">
                                            <label class="form-label">Wali Kelas</label>
                                            <input type="text" class="form-control" name="walikelas" placeholder="Input namaguru In Here" value="{{ $kelas->walikelas }}">
                                            @error('walikelas')
                                            <div class="text-warning">{{ $message }}</div>
                                            @enderror
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-sm btn-success mt-3 mb-3">Update</button>
                            </div>
                        </form>
                        {{-- end update --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
