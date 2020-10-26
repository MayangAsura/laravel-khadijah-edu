@extends('main')
@section('title', 'Tambah . KhadijahDev')
@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Pengajar</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-rigth">
                        <li><a href="#">Pengajar</a></li>
                        <li class="active">Tambah</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Tambah Pengajar</strong>
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('pengajar')}} " class="btn btn-secondary btn-sm">
                            <i class="fa fa-chevron-left"> Back</i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-sm-6">
                            <form action="{{ url('pengajar')}} " method="post">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Depan</label>
                                            <input type="text" name="fname" value="{{ old('fname')}} " class="form-control @error('fname') is-invalid @enderror" autofocus>
                                            @error('fname')
                                                <div class="invalid-feedback">{{ $message}} </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Nama Belakang</label>
                                            <input type="text" name="lname" value="{{ old('lname')}}" class="form-control @error('lname') is-invalid @enderror">
                                            @error('lname')
                                                <div class="invalid-feedback">{{ $message}} </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Kompetensi</label>
                                    <input type="text" name="kompetensi" value="{{ old('kompetensi')}}" class="form-control @error('lname') is-invalid @enderror">
                                    @error('kompetensi')
                                        <div class="invalid-feedback">{{ $message}} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Program</label>
                                    <select name="program_id" class="form-control">
                                        <option value="">===Pilih Program===</option>
                                        @foreach ($program as $item)
                                        <option value="{{ $item->id}}" {{ old('program_id') == $item->id ? 'selected' : null}}>{{ $item->name}} </option>
                                        @endforeach    
                                    </select>
                                    @error('program_id')
                                        <div class="invalid-feedback">{{ $message}} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Umur</label>
                                    <input type="number" name="age" value="{{ old('age')}}" class="form-control @error('lname') is-invalid @enderror">
                                    @error('kompetensi')
                                        <div class="invalid-feedback">{{ $message}} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control">{{ old('alamat')}}</textarea>
                                </div>
                                <button type="submit" class="btn btn-info">Simpan</button>
                            </form>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
@endsection