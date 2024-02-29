<div>
    @section('title', 'Gastos')

    @section('content_header')

        <div class="row float-right mr-1">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Movimientos</li>

                    <li class="breadcrumb-item active" aria-current="page">Gastos</li>
                </ol>
            </nav>
        </div>

        <br>
        @stop
    <div> @include('includes.alert')</div>
    @include('popper::assets')
    <div class="card card-info  mt-2">
        <div class="card-header">

            <div class="row">
                <div class="col-sm-6">
                    <h3>Gastos</h3>
                </div>


                <div class="col-sm-6">
                    <div class="input-group float-right">
                        <select wire:model="cantidad_registros" class="form-select col-sm-2 mr-2"
                            aria-label="Default select example">
                            <option value="10"> 10 </option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                        <input type="text" class="form-control" placeholder="Buscar gasto" aria-label="Username"
                            aria-describedby="basic-addon1" wire:model="buscar">

                        <button type="button" class="btn btn-outline-light float-right ml-2" data-toggle="modal"
                            data-target="#GastosModal">Registrar Gasto <i class="las la-plus-circle"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Descripcion</th>
                        <th>Categoria</th>
                        <th>Total</th>
                        <th>Metodo de pago</th>
                        <th>Usuario</th>
                        <th>Comprobante</th>
                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($gastos as $gasto)
                    <tr>
                        <td>{{ ucwords($gasto->fecha) }}</td>
                        <td>{{ ucwords($gasto->descripcion) }}</td>
                        <td>{{ ucwords($gasto->categoria->name) }}</td>
                        <td>$ {{ number_format($gasto->total) }}</td>
                        <td>{{ ucwords($gasto->metodopago->name) }}</td>
                        <td>{{ ucwords($gasto->user->name) }}</td>
                        <td>{{ ucwords($gasto->comrobante) }}</td>
                        <td>{{ ucwords($gasto->status) }}</td>
                        <td class="text-center">

                            <a @popper(Actualizar) class="btn btn-outline-success btn-sm" href="#" role="button"
                                data-toggle="modal" data-target="#GastosModal"
                                wire:click="sendData( {{ $gasto }} )"><i class="bi bi-pencil-square"></i></a>


                        </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="9 " class="text-center">
                            <p>No se encontraron registros...</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            <nav aria-label="...">
                <ul class="pagination">
                    {{ $gastos->links() }}
                </ul>
            </nav>

        </div>
    </div>
</div>
@include('modals.gastos.create')
<script>
      window.addEventListener('alert', () => {
            Swal.fire({
                icon: "success",
                title: "Registro actualizado correctamente",
                showConfirmButton: false,
                timer: 1500
            });
        });
</script>
