@extends('main')

@section('title', 'Program . KhadijahDev')

@section('breadcrumbs')
    <div class="breadcrumbs">
        <div class="col-sm-4">
            <div class="page-header float-left">
                <div class="page-title">
                    <h1>Program</h1>
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="page-header float-right">
                <div class="page-title">
                    <ol class="breadcrumb text-right">
                        <li><a href="#">Program</a></li>
                        <li class="active">Data</li>
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
                {{ session('status') }}
            </div>
            @endif

            <div class="card">
                <div class="card-header">
                    <div class="pull-left">
                        <strong>Data Program</strong>    
                    </div>
                    <div class="pull-right">
                        <a href="{{ url('program/trash') }} " class="btn btn-danger btn-sm">
                            <i class="fa fa-trash"></i> Trash
                        </a>
                        <a href="{{ url('program/create') }} " class="btn btn-info btn-sm">
                            <i class="fa fa-plus"></i> Add
                        </a>
                    </div>
                </div>
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama Program</th>
                                <th>Edulevel</th>
                                <th>Price</th>
                                <th>Capasitas</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($program_data as $key => $item)
                            <tr>
                                {{-- $loop->iteration UNTUK PENOMORAN (1...X), $loop->index UNTUK PENOMORAN (0...X) --}}
                                <td>{{ $program_data->firstItem()+ $key}} </td> 
                                <td>{{ $item->name}} </td>
                                <td>{{ $item->edulevel->name}} </td>
                                <td>{{ $item->student_price}} </td>
                                <td>{{ $item->student_max}} </td>
                                <td class="text-center">
                                    <a href="{{ url('program/'.$item->id) }} " class="btn btn-warning btn-sm">
                                        <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="{{ url('program/'.$item->id.'/edit') }} " class="btn btn-info btn-sm">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <form action="{{ url('program/'.$item->id)}} " method="post" onsubmit="return confirm('Yakin Ingin Hapus Data?')" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>

                                    </form>
                                </td>
                            </tr>
                            @endforeach  
                        
                        </tbody>
                    </table>
                    <div class="pull-left">
                        Showing
                        {{ $program_data->firstItem()}}
                        to 
                        {{ $program_data->lastItem()}}
                        of
                        {{ $program_data->total()}}
                    </div>
                    <div class="pull-right">
                        {{ $program_data->links()}}
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    
@endsection