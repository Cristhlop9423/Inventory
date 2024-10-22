<!-- Stored in resources/views/child.blade.php -->
 
@extends('layouts.app')
 
@section('title', 'Control de inventory')
 
@section('sidebar')
    @parent
@endsection
 
@section('content')
    <div class="row justify-content-md-center mt-2">
        <div class="col-md-12 col-sm-12 col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Identificador</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Ubicación</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Visualizar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($inventories as $inventory)
                        <tr>
                            <th scope="row">{{ $inventory->id }}</th>
                            <td>{{ $inventory->name }}</td>
                            <td>{{ $inventory->location }}</td>
                            <td>{{ $inventory->state ? 'Funcional' : 'Dañado' }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#deviceModalView" onclick="setInfo( {{ $inventory->id }} )">Ver detalles</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
  
    <!-- Modal -->
    <div class="modal fade" id="deviceModalView" tabindex="-1" role="dialog" aria-labelledby="deviceModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deviceModal"> Detalles </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-1 col-sm-1 col-2">
                            <input type="text" readonly class="form-control-plaintext" id="staticId">
                        </div>
                        <div class="col-md-3 col-sm-5 col-10">
                            <input type="text" readonly class="form-control-plaintext" id="staticName">
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <input type="text" readonly class="form-control-plaintext" id="staticLocation">
                        </div>
                        <div class="col-md-4 col-sm-6 col-12">
                            <input type="text" readonly class="form-control-plaintext" id="staticState">
                        </div>
                        <div class="col-md-6 col-sm-6 col-12">
                            <label for="staticDatetime">Fecha de ingreso:</label>
                            <input type="text" readonly class="form-control-plaintext" id="staticDatetime">
                        </div> 
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 col-sm-12 col-12" id="indexedImage">                            
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 col-sm-12 col-12">
                            <label for="indexedPqrs">PQRS</label>
                            <ul class="list-group" id="indexedPqrs"></ul>                        
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12 col-sm-12 col-12">
                            <label for="newPqrs">Añadir PQR</label>
                            <textarea class="form-control" id="newPqrs" style="max-width: 100%; max-height: 50px;"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" onclick="setPqr()">Guardar mensaje</button>
                </div>
            </div>
        </div>
    </div>    
@endsection

<script>
    function setInfo(id) {
        //console.log(id);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/inventario/' + id,
            data: {
                '_token': $('input[name=_token]').val(),  
            },
            type: 'GET',
            success: function(response) {
                console.log(response);
                //console.log(response.inventory)

                var inventory = response.inventory
                var pqrs = response.pqrs

                $('#staticId').val(id)
                $('#staticName').val(inventory.name)
                $('#staticLocation').val(inventory.location)
                $('#staticState').val(inventory.state ? 'Funcional' : 'Dañado')
                $('#staticDatetime').val(inventory.created_at)

                $('#indexedImage').empty()
                $('#indexedImage').append(`<img src="images/photos/${id}.jpeg" class="img-thumbnail" alt="image not available">`)

                $('#indexedPqrs').empty()
                if(pqrs.length > 0){
                    console.log(pqrs)                                        
                    pqrs.forEach(element => {
                        $('#indexedPqrs').append(`<li class="list-group-item"><h6 style="display: inline;">${element.id}</h6> - ${element.description}</li>`)
                    });
                }
                else{
                    console.log('No hay PQRS')
                    $('#indexedPqrs').append(`<li class="list-group-item"><h6 style="display: inline;">No hay PQRS</h6></li>`)
                }
            }
        });
    }

    function setPqr(){
        var id = $('#staticId').val()
        var description = $('#newPqrs').val()

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/inventario/create/pqrs',
            data: {
                '_token': $('input[name=_token]').val(),
                'description': description,
                'inventory_id': id
            },
            type: 'POST',
            success: function(response) {
                console.log(response)
                $('#newPqrs').val('')
                setInfo(id)
            }
        });
    }
</script>