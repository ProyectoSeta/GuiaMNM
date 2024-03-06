@extends('adminlte::page')

@section('title', 'Solicitud de Guías')

@section('content_header')
    <h1>Solicitud de Guías</h1>
    <script src="{{ asset('jss/bundle.js') }}" defer></script>
    <link href="{{asset('css/datatable.min.css') }}" rel="stylesheet">
    <script src="{{asset('vendor/sweetalert.js') }}"></script>
    <script src="{{ asset('jss/jquery-3.5.1.js') }}" ></script>
    <!-- <script type="text/javascript" src="{{ asset('jss/functions.js') }}" ></script> -->
@stop

@section('content')
    

<div class="mb-3">
        <button type="button" class="btn btn-primary  btn-sm" data-bs-toggle="modal" data-bs-target="#modal_new_cantera"><i class='bx bx-plus'></i>Registro de Cantera</button>
    </div>

    <div class="table-responsive">
        <table class="table" style="font-size:14px">
            <tr>
                <th>Cod. Cantera</th>
                <th>Nombre</th>
                <th>Direccion</th>
                <th>Producción</th>
                <th>Estado</th>          
            </tr>
            <tbody id="list_canteras">
               
                @foreach ($canteras as $cantera)
                    <tr>
                        <td>{{ $cantera->id }}</td>
                        <td>{{ $cantera->nombre }}</td>
                        <td>{{ $cantera->direccion }}</td>
                        <td class="d-flex flex-column">
                            <!-- <span>Piedra 1</span>
                            <span>Piedra 2</span>
                            <span>Piedra ¾</span>
                            <span>Piedra 4</span>
                            <span>Arrocillo</span>
                            <span>Polvillo</span>
                            <span>Carbonato De Calcio Malla 20</span>
                            <span>Carbonato De Calcio Malla 200</span>  -->
                        </td>
                        <td>
                            <span class="badge text-bg-light p-2">Verificando cantera</span>
                            <span class="badge text-bg-success p-2">Cantera verificada</span> 
                        </td>
                        <td>
                            <span class="badge me-1" style="background-color: #ed0000;" role="button" id_cantera='{{ $cantera->id }}' data-bs-toggle="modal" data-bs-target="#modal_delete_guia">
                                <i class='bx bx-trash-alt fs-6'></i>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody> 
            
        </table>
    </div>
    

      

    
    
  <!--****************** MODALES **************************-->
    <!-- ********* NUEVA SOLICITUD ******** -->
    <div class="modal" id="modal_new_cantera" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #0072ff">
                    <!-- <i class='bx bxs-file-plus'></i> -->
                       Registro de Cantera
                    </h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" style="font-size:14px;">
                    <form action="POST" action="">
                    <!-- @csrf -->
                        <!-- nombre cantera -->
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col-3">
                                <label for="" class="col-form-label">Nombre <span style="color:red">*</span></label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="" class="form-control form-control-sm" name="nombre" >
                            </div>
                        </div>
                        <!-- direccion cantera -->
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col-3">
                                <label for="" class="col-form-label">Dirección <span style="color:red">*</span></label>
                            </div>
                            <div class="col-8">
                                <input type="text" id="" class="form-control form-control-sm" name="direccion" >
                            </div>
                        </div>
                        <!-- produccion cantera -->
                        <div class="row g-3 align-items-center mb-2">
                            <div class="col-3">
                                <label for="" class="col-form-label">Produccion <span style="color:red">*</span></label>
                            </div>
                            <div class="col-9">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="produccion[]" value="Mármol" id="">
                                            <label class="form-check-label" for="">
                                                Mármol
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="produccion[]" value="Pórfido" id="">
                                            <label class="form-check-label" for="">
                                                Pórfido
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="produccion[]" value="Caolín" id="">
                                            <label class="form-check-label" for="">
                                                Caolín
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="produccion[]" value="Magnesita" id="">
                                            <label class="form-check-label" for="">
                                                Magnesita
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="produccion[]" value="Arena lavada" id="">
                                            <label class="form-check-label" for="">
                                                Arena lavada
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="produccion[]" value="Pizarra" id="">
                                            <label class="form-check-label" for="">
                                                Pizarra
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="produccion[]" value="Arcilla" id="">
                                            <label class="form-check-label" for="">
                                                Arcilla
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="produccion[]" value="Caliza" id="">
                                            <label class="form-check-label" for="">
                                                Caliza
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="produccion[]" value="Yeso" id="">
                                            <label class="form-check-label" for="">
                                                Yeso
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="produccion[]" value="Turbas" id="">
                                            <label class="form-check-label" for="">
                                                Turbas
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-check">
                                            <label class="form-check-label" >
                                                Otro(s)
                                            </label>
                                        </div>
                                        <div class="d-flex align-items-center mb-2">
                                            <input class="form-control form-control-sm" type="number" name="produccion[]">
                                            <button type="button" class="btn" 
                                                    data-bs-toggle="tooltip" data-bs-placement="right" 
                                                    data-bs-title="Agregar mnm"
                                                    id="add_otro_mineral">
                                                    <i class='bx bx-plus fs-4' style='color:#038ae4'></i>
                                            </button>
                                        </div>

                                    </div>
                                </div> <!-- cierra .row  -->
                            </div> <!-- cierra .col-9 produccion -->
                       </div>  <!-- cierra .row produccion -->
                        

                        <div class="d-flex justify-content-center mt-3 mb-3" >
                            <button type="button" class="btn btn-secondary btn-sm me-3" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success btn-sm">Aceptar</button>
                        </div>
                    </form>
                    
                 </div>  <!-- cierra modal-body -->
            </div>  cierra modal-content 
        </div>  <!-- cierra modal-dialog -->
    </div>

    

<!--************************************************-->

  

@stop





@section('css')
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
@stop

@section('js')
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
        const myModal = document.getElementById('myModal');
        const myInput = document.getElementById('myInput');

        myModal.addEventListener('shown.bs.modal', () => {
            myInput.focus();
        });
    </script>
    <!-- <script src="{{ asset('jss/jquery-3.5.1.js') }}" ></script> -->
    <script src="{{ asset('jss/datatable.min.js') }}" defer ></script>
    <script src="{{ asset('jss/datatable.bootstrap.js') }}" ></script>
    <script src="{{ asset('jss/toastr.js') }}" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" ></script>
   
    <script type="text/javascript">
        $(document).ready(function () {
            $('#example').DataTable(
                {
                    "language": {
                        "lengthMenu": " Mostrar  _MENU_  Registros por página",
                        "zeroRecords": "No se encontraron registros",
                        "info": "Mostrando página _PAGE_ de _PAGES_",
                        "infoEmpty": "No se encuentran Registros",
                        "infoFiltered": "(filtered from _MAX_ total records)",
                        'search':"Buscar",
                        'paginate':{
                            'next':'Siguiente',
                            'previous':'Anterior'
                        }
                    }
                }
            );
        });
    </script>
    <script>
        // $(document).ready(function () {
        //     ShowCantera();
            
        // });

        // function ShowCantera(){
        //     $.get("{{ URL::to('cantera') }}", function(data){
        //         $('#list_canteras').empty().html(data);
        //     })
        // }
    </script>
  
@stop