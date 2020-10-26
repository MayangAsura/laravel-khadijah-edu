@extends('main')
@section('title', 'Data Pengajar . KhadijahDev')
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
                        <li class="active">Data</li>
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
                        Data Pengajar
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('pengajar/trash')}} " class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Trash</a>
                        <a href="{{ url('pengajar/create')}} " class="btn btn-info btn-sm"><i class="fa fa-plus"></i>  Add</a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <td>No.</td>
                                <td>Nama</td>
                                <td>Kompentensi</td>
                                <td>Program</td>
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
                                    <td>{{ $item->get_program['name']}} </td>
                                    <td>{{ $item->age}} </td>
                                    <td>{{ $item->alamat}}</td>
                                    <td>
                                        <a href="{{ url('pengajar/'.$item->id.'/edit')}} " class="btn btn-info">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ url('pengajar/'.$item->id) }}" method="post" onsubmit="return confirm('Yakin ingin menghapus data?')" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>

                                </tr>
                                @endforeach 
                            @else
                                <tr>
                                    <td colspan='7' class="text-center">Data Tidak Ada</td>
                                </tr>
                                
                            @endif   
                            
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
    
@endsection