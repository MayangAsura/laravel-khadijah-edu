@extends('main')

@section('title', 'Program . KhadijahDev')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Programs</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Program</a></li>
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
            @if (session('status'))
                <div class="alert alert-success">
                    {{session('status')}}
                </div>
            @endif
            
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Edit Program</strong>    
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('program') }} " class="btn btn-secondary btn-sm">
                            <i class="fa fa-undo"></i> Back
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            <form action="{{ url('program/'.$program->id) }} " method="post">
                                @method('PUT')
                                @csrf
                                <div class="form-group">
                                    <label>Nama Program</label>
                                    <input type="text" name="nameIn" value="{{ old('nameIn', $program->name)}}" class="form-control @error('nameIn') is-invalid @enderror" autofocus>
                                    @error('nameIn')
                                        <div class="invalid-feedback">{{ $message}} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Jenjang</label>
                                    <select name="edulevel_id" class="form-control @error('edulevel_id') is-invalid @enderror">
                                        <option value="">--PILIH--</option>
                                        @foreach ($edulevels as $item)
                                        <option value="{{$item->id}} " {{ old('edulevel_id', $program->edulevely_id) == $item->id ? 'selected' : null }}>{{ $item->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('edulevel_id')
                                        <div class="invalid-feedback">{{ $message}} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Harga Member</label>
                                    <input type="number" name="priceIn" value="{{ old('priceIn', $program->student_price)}}" class="form-control @error('priceIn') is-invalid @enderror">
                                    @error('priceIn')
                                        <div class="invalid-feedback">{{ $message}} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Member Maksimal</label>
                                    <input type="number" name="maksIn" value="{{ old('maksIn', $program->student_max)}}" class="form-control @error('maksIn') is-invalid @enderror">
                                    @error('maksIn')
                                        <div class="invalid-feedback">{{ $message}} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Info</label>
                                    <textarea type="text" name="infoIn" class="form-control @error('infoIn') is-invalid @enderror" >{{old('infoIn', $program->info)}}</textarea>
                                    @error('infoIn')
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