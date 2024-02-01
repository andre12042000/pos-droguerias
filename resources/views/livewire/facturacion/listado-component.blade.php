<div>
    @section('title', 'Ubicaciones')

    @section('content_header')

        <div class="row float-right mr-1">
            <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='currentColor'/%3E%3C/svg%3E&#34;);"
                aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Facturación</li>

                    <li class="breadcrumb-item active" aria-current="page">Listado facturas</li>
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
                    <h3>Facturación</h3>
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
                        <input type="text" class="form-control" placeholder="Buscar factura" aria-label="Username"
                            aria-describedby="basic-addon1" wire:model="buscar">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Fecha</th>
                        <th>Hora</th>
                        <th>Nro factura</th>
                        <th>Metodo de pago</th>
                        <th>Total</th>
                        <th>Vendedor</th>
                        <th>Cliente</th>

                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                   @forelse ($sales as $sale)
                    <tr>
                       <td>{{ \Carbon\Carbon::parse($sale->created_at)->format('d-m-Y') }}</td>
                       <td>{{ \Carbon\Carbon::parse('2024-01-30 09:57:33')->format('H:i:s') }}</td>
                       <td>{{ $sale->full_nro }}</td>
                       <td>{{ $sale->metodopago->name }}</td>
                       <td class="text-end">$ {{ number_format($sale->total, 0) }}</td>
                       <td>{{ mb_strtoupper($sale->user->name) }}</td>
                       <td>{{ mb_strtoupper($sale->client->name) }}</td>
                       <td>@if ($sale->status == 'PAGADA')
                            APROBADA
                            @else
                                ANULADA
                            @endif
                      </td>
                      <td class="text-center">
                        @if (\Carbon\Carbon::parse($sale->created_at)->isToday())
                            <!-- Si la fecha es la actual, los iconos estarán habilitados -->
                            <a href="{{ route('facturacion.edit', $sale->id) }}" title="Editar factura" class="mr-2" style="text-decoration: none;">
                                <i class="fas fa-edit text-danger"></i>
                            </a>
                            <a href="{{ route('facturacion.anular', $sale->id) }}" title="Anular factura" class="mr-2" style="text-decoration: none;">
                                <i class="fas fa-ban text-danger"></i>
                            </a>
                        @else
                            <!-- Si la fecha no es la actual, los iconos estarán deshabilitados -->
                            <a href="{{ route('facturacion.edit', $sale->id) }}" title="No es posible editar facturas anteriores al día actual" class="mr-2" style="text-decoration: none; color: grey;">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('facturacion.anular', $sale->id) }}" title="No es posible anular facturas anteriores al día actual" class="mr-2" style="text-decoration: none; color: grey;">
                                <i class="fas fa-ban"></i>
                            </a>
                        @endif

                        <a href="{{ route('ventas.pos.details', $sale->id) }}" title="Editar factura" class="mr-2" style="text-decoration: none;">
                            <i class="fas fa-eye"></i>
                        </a>
                    </td>
                    </tr>

                    @empty
                    <tr>
                        <td colspan="2">
                            <p>No se encontraron registros...</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>


        <div class="card-footer ">
            <nav class="" aria-label="">
                <ul class="pagination">
                    {{ $sales->links() }}
                </ul>
            </nav>

        </div>
    </div>
</div>
{{-- @include('modals.ubicacion.create') --}}
<script>
      window.addEventListener('alert', () => {
            Swal.fire({
                icon: "success",
                title: "Factura anulada correctamente",
                showConfirmButton: true,
            });


        });
</script>