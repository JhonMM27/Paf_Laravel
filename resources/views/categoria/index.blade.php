@extends('plantilla.app')
@section('contenido')
    
<div class="app-content mt-3">
    <!--begin::Container-->
    <div class="container-fluid">
        <!--begin::Row-->
        <div class="row">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Categorías Table</h3>
                    </div>
                    
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <div class="col-md-12">
                            <div class=" mb-1.5">
                                @if(Session::has('mensaje'))
                                <div class="alert alert-info alert-dismissible fade show" role="alert">
                                    {{Session::get('mensaje')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>                    
                                @endif
            
                                @if(Session::has('error'))
                                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                    {{Session::get('error')}}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>                    
                                @endif
                            </div>
                    
                    <form action="{{route('categorias.index')}}" method="GET" class="mb-3">
                        <div class="input-group">
                            <input type="text" name="texto" class="form-control" value="{{$texto}}" placeholder="Ingrese Texto a Buscar">
                            <div class="input-group-append">
                                <button class="btn btn-secondary" type="submit"><i class="fas fa-search"></i>Buscar</button>
                                <a class="btn btn-primary" href="{{route('categorias.create')}}" >Nuevo</a>
                            </div>
                        </div>
                    </form>


                        <table class="table table-bordered table-hover table-stripes">
                            <thead>
                                <tr>
                                    {{-- quito todo esto --}}
                                    {{-- <th style="width: 10px">#</th>
                                    <th>Task</th>
                                    <th>Progress</th>
                                    <th style="width: 40px">Label</th> --}}

                                    <th>Opciones</th>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($registros)<= 0)
                                    <tr>
                                        <td colspan="3">No hay Registros de lo Buscado</td>
                                    </tr>
                                @else
                                @foreach ($registros as $reg)                                    
                                
                                <tr class="align-middle">
                                    <td>
                                        <a href="{{route('categorias.edit',$reg->id)}}" class="btn btn-secondary btm-sm">&#9998;</a>
                                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#modal-eliminar-{{$reg->id}}">&#128465;</button>
                                    </td>
                                    <td>{{$reg->id}}</td>
                                    <td>
                                        {{$reg->nombre}}
                                        {{-- <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger"
                                                style="width: 55%"></div>
                                        </div> --}}
                                    </td>
                                    {{-- <td><span class="badge text-bg-danger">55%</span></td> --}}
                                    
                                </tr>

                                {{-- <tr class="align-middle">
                                    <td>2.</td>
                                    <td>Clean database</td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar text-bg-warning" style="width: 70%">
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge text-bg-warning">70%</span></td>
                                </tr>
                                <tr class="align-middle">
                                    <td>3.</td>
                                    <td>Cron job running</td>
                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar text-bg-primary" style="width: 30%">
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge text-bg-primary">30%</span></td>
                                </tr>
                                <tr class="align-middle">
                                    <td>4.</td>
                                    <td>Fix and squish bugs</td>
                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar text-bg-success" style="width: 90%">
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge text-bg-success">90%</span></td>
                                </tr> --}}
                                @include('categoria.delete')
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix table-responsive">
                        {{$registros->appends(["texto" => $texto])}}
                        {{-- <ul class="pagination pagination-sm m-0 float-end">
                            <li class="page-item"><a class="page-link" href="#">&laquo;</a></li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">&raquo;</a></li>
                        </ul> --}}
                    </div>
                </div>
                {{-- <!-- /.card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Condensed Full Width Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Task</th>
                                    <th>Progress</th>
                                    <th style="width: 40px">Label</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td>1.</td>
                                    <td>Update software</td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger"
                                                style="width: 55%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge text-bg-danger">55%</span></td>
                                </tr>
                                <tr class="align-middle">
                                    <td>2.</td>
                                    <td>Clean database</td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar text-bg-warning" style="width: 70%">
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge text-bg-warning">70%</span></td>
                                </tr>
                                <tr class="align-middle">
                                    <td>3.</td>
                                    <td>Cron job running</td>
                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar text-bg-primary" style="width: 30%">
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge text-bg-primary">30%</span></td>
                                </tr>
                                <tr class="align-middle">
                                    <td>4.</td>
                                    <td>Fix and squish bugs</td>
                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar text-bg-success" style="width: 90%">
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge text-bg-success">90%</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card --> --}}
            </div>
            {{-- <!-- /.col -->
            <div class="col-md-6">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Simple Full Width Table</h3>
                        <div class="card-tools">
                            <ul class="pagination pagination-sm float-end">
                                <li class="page-item"><a class="page-link" href="#">&laquo;</a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item"><a class="page-link" href="#">&raquo;</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Task</th>
                                    <th>Progress</th>
                                    <th style="width: 40px">Label</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td>1.</td>
                                    <td>Update software</td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger"
                                                style="width: 55%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge text-bg-danger">55%</span></td>
                                </tr>
                                <tr class="align-middle">
                                    <td>2.</td>
                                    <td>Clean database</td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar text-bg-warning" style="width: 70%">
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge text-bg-warning">70%</span></td>
                                </tr>
                                <tr class="align-middle">
                                    <td>3.</td>
                                    <td>Cron job running</td>
                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar text-bg-primary" style="width: 30%">
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge text-bg-primary">30%</span></td>
                                </tr>
                                <tr class="align-middle">
                                    <td>4.</td>
                                    <td>Fix and squish bugs</td>
                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar text-bg-success" style="width: 90%">
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge text-bg-success">90%</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Striped Full Width Table</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Task</th>
                                    <th>Progress</th>
                                    <th style="width: 40px">Label</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align-middle">
                                    <td>1.</td>
                                    <td>Update software</td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar progress-bar-danger"
                                                style="width: 55%"></div>
                                        </div>
                                    </td>
                                    <td><span class="badge text-bg-danger">55%</span></td>
                                </tr>
                                <tr class="align-middle">
                                    <td>2.</td>
                                    <td>Clean database</td>
                                    <td>
                                        <div class="progress progress-xs">
                                            <div class="progress-bar text-bg-warning" style="width: 70%">
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge text-bg-warning">70%</span></td>
                                </tr>
                                <tr class="align-middle">
                                    <td>3.</td>
                                    <td>Cron job running</td>
                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar text-bg-primary" style="width: 30%">
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge text-bg-primary">30%</span></td>
                                </tr>
                                <tr class="align-middle">
                                    <td>4.</td>
                                    <td>Fix and squish bugs</td>
                                    <td>
                                        <div class="progress progress-xs progress-striped active">
                                            <div class="progress-bar text-bg-success" style="width: 90%">
                                            </div>
                                        </div>
                                    </td>
                                    <td><span class="badge text-bg-success">90%</span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col --> --}}
        </div>
        <!--end::Row-->
    </div>
    <!--end::Container-->
</div>
@endsection
@push('scripts')
    <script>
        document.getElementById("liAlmacen").classList.add("menu-open");
        document.getElementById("aCategoria").classList.add("active");
    </script>
@endpush