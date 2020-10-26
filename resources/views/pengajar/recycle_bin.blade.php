@extends('main')
@section('title', 'Recycle Bin Pengajar . KhadijahDev')
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
                        <li><a href="{{ url('pengajar')}} ">Pengajar</a></li>
                        <li class="active">Recycle Bin</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
@endsection

@section('content')
    <div class="content mt-3">
        <div class="animated FadeIn">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status')}}
                </div>
            @endif
            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        Recycle Bin Pengajar
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('pengajar/delete_permanent')}} " class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete All</a>
                        <a href="{{ url('pengajar/restore')}} " class="btn btn-info btn-sm"><i class="fa fa-refresh"></i>  Restore All</a>
                        <a href="{{ url('pengajar')}} " class="btn btn-secondary btn-sm"><i class="fa fa-cheron-left"></i>  Back</a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Nama</td>
                                <td>Kompentensi</td>
                                <td>Umur</td>
                                <td>Alamat</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            @if ($pengajars->count() > 0)
                                @foreach ($pengajars as $key => $item)
                                <tr>
                                    <td>{{ $loop->iteration}} </td>
                                    <td>{{ $item->fname}} </td>
                                    <td>{{ $item->kompetensi}} </td>
                                    <td>{{ $item->age}} </td>
                                    <td>{{ $item->alamat}}</td>
                                    <td>
                                        <a href="{{ url('pengajar/delete_permanent/'.$item->id)}} " class="btn btn-danger btn-sm" onclick="return confirm('Yakin Hapus Permanent?')">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                        <a href="{{ url('pengajar/restore/'.$item->id)}} " class="btn btn-info btn-sm" onclick="return confirm('Yakin Restore?')">
                                            <i class="fa fa-refresh"></i>
                                        </a>
                                        
                                    </td>

                                </tr>
                                @endforeach 
                            @else
                                <tr>
                                    <td colspan='6' class="text-center">Data Tidak Ada</td>
                                </tr>
                                
                            @endif   
                            
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection