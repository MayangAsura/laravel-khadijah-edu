@extends('main')

@section('title', 'EduLevel . KhadijahDev')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Edulevels</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        {{-- NAVIGASI KANAN --}}
                        <li><a href="#">EduLevel</a></li>
                        <li class="active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div> 
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated fadeIn">
            
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Edit Jenjang</strong>    
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('edulevels') }} " class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 offset-md-4">
                            <form action="{{ url('edulevels/'.$edulevels->id) }} " method="post">
                                {{-- METHOD SESUAIKAN DENGAN ROUTE (PATCH / PUT) --}}
                                @method('patch') 
                                {{-- UNTUK TOKEN AGAR DATA TERKIRIM --}}
                                @csrf
                                <div class="form-group">
                                    <label>Nama Jenjang</label>
                                    <input type="text" name="nameIn" value="{{ old('nameIn', $edulevels->name) }} " class="form-control  @error('descIn') is-invalid @enderror" autofocus>
                                    @error('nameIn')
                                        <div class="invalid-feedback">{{ $message}} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea type="text" name="descIn" class="form-control  @error('descIn') is-invalid @enderror">{{ old('descIn', $edulevels->desc) }}</textarea>
                                    @error('descIn')
                                    <div class="invalid-feedback">{{ $message}} </div>
                                    @enderror
                                </div>
                                <button type="submit" class="btn btn-success">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection