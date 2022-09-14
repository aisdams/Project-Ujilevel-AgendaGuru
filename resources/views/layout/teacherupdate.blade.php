@extends('start')

@section('judul','Data Guru')
@section('isi')

    
<div class="container">
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header">Data Guru</div>
                    <div class="card-body">
                        {{-- updatenya --}}
                        <form action="{{ route('update-guru',$guru->id) }}" method="post">
                            {{ csrf_field() }}
                            @method ('PUT')
                            <div class="form-grup">
                                <div class="row g-2">
                                    <div class="col-md">
                                        <label class="form-label">Nama Guru</label>
                                            <input type="text" class="form-control" name="namaguru" placeholder="Input Nama Guru In Here" value="{{ $guru->namaguru }}">
                                            @error('namaguru')
                                            <div class="text-warning">{{ $message }}</div>
                                            @enderror
                                    </div>
                    
                                    <div class="col-md">
                                            <label class="form-label">Mapel</label>
                                            <input type="text" class="form-control" name="mapel" placeholder="Input Mapel In Here" value="{{ $guru->mapel }}">
                                            @error('mapel')
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
