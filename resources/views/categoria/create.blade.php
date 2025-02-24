@extends('plantilla.app')
@section('contenido')
    <div class="app-content mt-3">
        <!--begin::Container-->
        <div class="container-fluid">
            <!--begin::Row-->
            <div class="row">
                <div class="card mb-4">
                    <div class="card-header">
                        <h3 class="card-title">Nueva Categoría</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body table-responsive">

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix table-responsive">
                        <form action="{{ route('categorias.store') }}" method="post">
                            @csrf


                            <div class="card-body table-responsive">
                                <div class="form-group">
                                    <label for="exampleInputEmail1" class="fw-bold">Nombre</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                        placeholder="Ingrese Categoría" name="nombre" required>
                                    @error('nombre')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer table-responsive">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                    <button type="reset" class="btn btn-secondary">Cancelar</button>
                                    <a class="btn btn-secondary" href="{{ route('categorias.index') }}">Regresar</a>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>

            </div>

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
