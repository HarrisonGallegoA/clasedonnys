@extends('layout')
@section('titulo', 'principal')
@section('contenido')
    <h1 class="text-center">{{$titulo}}</h1>

    <br>
   <!-- Botón Modal CREAR EMPLEADO-->
<div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <a class="btn btn-primary" data-toggle="modal" data-target="#crearEmpleadoModal"><i class="fas fa-user-plus"></i> Nuevo Registro</a>
        </div>
    </div>

    <!-- Modal CREAR EMPLEADO-->
    <div class="modal fade" id="crearEmpleadoModal" tabindex="-1" role="dialog" aria-labelledby="crearEmpleadoModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Crear Empleado</h5>
                    <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>                        
                </div>

                <form action="{{route('empleadoGuardar')}}" method="post">
                    <div class="modal-body">
                        @csrf

                        @if($errors->any())
                            @foreach($errors->all() as $error)
                                <p>{{$error}}</p>
                            @endforeach
                        @endif

                        <div class="form-group">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Ingrese el nombre" value="{{old('nombre')}}">
                            <small class="text-danger">{{$errors->first('nombre')}}</small>
                        </div>

                        <div class="form-group">
                            <label for="edad">Edad</label>
                            <input type="number" class="form-control" name="edad" id="edad"  placeholder="Ingrese su edad" value="{{old('edad')}}">
                            <small class="text-danger">{{$errors->first('edad')}}</small>
                        </div>
                        <div class="form-group">
                            <label for="direccion">Dirección</label>
                            <textarea class="form-control" name="direccion" id="direccion" rows="2">{{old('direccion')}}</textarea>
                            <small class="text-danger">{{$errors->first('direccion')}}</small>

                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="ingrese un email" value="{{old('email')}}">
                            <small class="text-danger">{{$errors->first('correo')}}</small>
                        </div>

                        <div class="form-group">
                            <label for="idCargo">Cargo</label>
                            <select class="form-control" name="idCargo" id="idCargo">
                                @forelse($cargos as $cargo)
                                    <option value="{{$cargo->id}}">{{$cargo->nombre}}</option>
                                @empty
                                    <option>No existen</option>
                                @endforelse
                            </select>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit"  class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- FIN Modal CREAR EMPLEADO-->
    </div>

    

    
    <br>
<!--@if (session('mensaje'))
    <div class="alert alert-success">
        {{ session('mensaje') }}
    </div>
@endif-->
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Email</th>
            <th scope="col">Cargo</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        @forelse ($empleados as $empleado)
            <tr>
                <th scope="row">{{$empleado->id}}</th>
                <td>{{$empleado->nombre}}</td>
                <td>{{$empleado->email}}</td>
                <td>{{$empleado->cargoEmpleado->nombre}}</td>
                <td>
                        <form action="{{route('empleadoEliminar', $empleado)}}" method="post" class="formulario-eliminar">
                        <a href="#mostrarEmpleado{{$empleado->id}}" data-toggle="modal" data-target="#mostrarEmpleado{{$empleado->id}}"><i class="fas fa-info-circle fa-lg text-success"></i></a>
                        <a href="#editarEmpleado{{$empleado->id}}" data-toggle="modal" data-target="#editarEmpleado{{$empleado->id}}" style="margin-left: 20px; margin-right: 20px;"><i class="fas fa-user-edit fa-lg"></i></a>


                        @csrf @method('DELETE')
                        <button type="submit " style="border: none"><i class="fas fa-trash-alt fa-lg text-danger"></i></button>
                    </form>
                </td>
            </tr>

            <!-- Modal MOSTRAR EMPLEADO-->

            <div class="modal fade" id="mostrarEmpleado{{$empleado->id}}" tabindex="-1" role="dialog" aria-labelledby="mostrarEmpleado" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Mostrar Empleado</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form>
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Ingrese el nombre" value="{{old('nombre', $empleado->nombre)}}">
                                    <small class="text-danger">{{$errors->first('nombre')}}</small>
                                </div>
                                <div class="form-group">
                                    <label for="edad">Edad</label>
                                    <input type="number" class="form-control" name="edad" id="edad"  placeholder="Ingrese su edad" value="{{old('edad', $empleado->edad)}}">
                                    <small class="text-danger">{{$errors->first('edad')}}</small>
                                </div>
                                <div class="form-group">
                                    <label for="direccion">Dirección</label>
                                    <textarea class="form-control" name="direccion" id="direccion" rows="2">{{old('direccion', $empleado->direccion)}}</textarea>
                                    <small class="text-danger">{{$errors->first('direccion')}}</small>

                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="ingrese un email" value="{{old('email', $empleado->email)}}">
                                    <small class="text-danger">{{$errors->first('correo')}}</small>
                                </div>

                                <div class="form-group">
                                    <label for="cargo">Cargo</label>
                                    <input type="text" class="form-control" id="cargo" name="cargo" placeholder="ingrese un email" value="{{old('email', $empleado->cargoEmpleado->nombre)}}">
                                    <small class="text-danger">{{$errors->first('correo')}}</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal Editar EMPLEADO-->

<div class="modal fade" id="editarEmpleado{{$empleado->id}}" tabindex="-1" role="dialog" aria-labelledby="editarEmpleado" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar Empleado</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{route('empleadoActualizar', $empleado)}}" method="post">
                <div class="modal-body">
                    @csrf @method('PUT')

                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <p>{{$error}}</p>
                        @endforeach
                    @endif


                    <div class="form-group">
                        <label for="nombre">Nombre</label>
                        <input type="text" class="form-control" name="nombre" id="nombre"  placeholder="Ingrese el nombre" value="{{old('nombre', $empleado->nombre)}}">
                        <small class="text-danger">{{$errors->first('nombre')}}</small>
                    </div>
                    <div class="form-group">
                        <label for="edad">Edad</label>
                        <input type="number" class="form-control" name="edad" id="edad"  placeholder="Ingrese su edad" value="{{old('edad', $empleado->edad)}}">
                        <small class="text-danger">{{$errors->first('edad')}}</small>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Dirección</label>
                        <textarea class="form-control" name="direccion" id="direccion" rows="2">{{old('direccion', $empleado->direccion)}}</textarea>
                        <small class="text-danger">{{$errors->first('direccion')}}</small>

                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="ingrese un email" value="{{old('email', $empleado->email)}}">
                        <small class="text-danger">{{$errors->first('correo')}}</small>
                    </div>

                    <div class="form-group">
                        <label for="idCargo">Cargo</label>
                        <select class="form-control" name="idCargo" id="idCargo">
                            @forelse($cargos as $cargo)
                                <option value="{{$cargo->id}}" {{$cargo->id==$empleado->idCargo? 'selected':''}}>{{$cargo->nombre}}</option>
                            @empty
                                <option>No existen</option>
                            @endforelse
                        </select>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit"  class="btn btn-primary">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- FIN Modal Editar EMPLEADO-->
            <!-- FIN Modal MOSTRAR EMPLEADO-->
           
        @empty
            No hay empleados
        @endforelse
        </tbody>
    </table>
</div>
    <div class="d-flex justify-content-center">
        {{ $empleados->links() }}
    </div>
@section('scripts')

<script>

        $('.formulario-eliminar').submit(function(e){
            e.preventDefault(); // previene que se haga el submit
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.submit();
                    
                }
            })
        });    
        
    </script>

@if (session('mensaje')=="Empleado eliminado")
        <script>
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        </script>
        
    @endif

@if (session('mensaje')=="Empleado eliminado")
        <script>
            Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
            )
        </script>
        
    @endif

@if (session('mensaje'))
        <script>
            Swal.fire(
                //'El empleado se guardó con éxito!',
                '{{ session('mensaje') }}',
                'Presione el boton ok para cerrar!',
                'success'
            )
        </script>
@endif
    @if($errors->any())
    <script>
        $(document).ready(function(){
            $('#crearEmpleadoModal').modal('show')
        })
    </script>
    @endif
@endsection
@endsection()