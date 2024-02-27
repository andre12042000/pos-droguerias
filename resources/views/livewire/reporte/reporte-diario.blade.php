<div>

    @include('popper::assets')
    <div class="card card-info">
        <div class="card-header">
            <div class="form-row">
                <div class="mt-2 col-lg-4">
                    <h3>Reportes diario</h3>
                </div>
                <div class="text-center col-lg-3">
                    <label class="col-lg-12">Fecha de consulta</label>
                    <span class="col-lg-12"> {{ \Carbon\Carbon::parse($hoy)->format('d M Y') }}</span>
                </div>

                <div class="text-center col-lg-3">
                    <label class="col-lg-12">Cantidad de registros</label>
                    <span class="col-lg-12">{{ $cantidad }}</span>
                </div>
                <div class="col-lg-2 float-right text-right">
                    <div class="dropdown mr-4 mt-3">
                        <a class="alert-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                          Generar Recibo
                        </a>

                        <ul class="dropdown-menu text-dark" aria-labelledby="dropdownMenuLink">
                          <li> <a class="dropdown-item text-dark"   href=""><i class="bi bi-download"></i> Descargar PDF </a></li>
                          <li> <a href="JavaScript:void(0);" class="dropdown-item text-dark" wire:click="imprimirInforme" > <i class="bi bi-printer"></i> Imprimir informe</a></li>

                        </ul>
                      </div>
                </div>

            </div>
        </div>
        <div class="card-body">


            <div class="row">
                <div class="col-4">

                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item-primary d-flex justify-content-between align-items-center">
                                <label class="form-control-label ml-2" for="nombre"><strong>TOTAL RECAUDO</strong></label>
                                <p class="mr-2 mt-2 text-bold">$ {{ number_format($totalVenta + $pagoCreditos, 0) }}</p>
                            </li>
                            <li class="list-group-item-info d-flex justify-content-between align-items-center">
                                <label class="form-control-label ml-2" for="nombre"><strong>ABONOS</strong></label>
                                  <p class="mr-2 mt-2 text-bold">$ {{ number_format($totalAbono, 0) }}</p>
                            </li>
                            <li class="list-group-item-info d-flex justify-content-between align-items-center">
                                <label class="form-control-label ml-2" for="nombre"><strong>PAGOS VENTA CRÉDITO</strong> <i class="bi bi-info-circle-fill" data-toggle="tooltip" data-placement="top" title="Si no se recibió el dinero en mostrador o caja, resta el valor al TOTAL RECAUDO."></i></label>
                                  <p class="mr-2 mt-2 text-bold">$ {{ number_format($pagoCreditos, 0) }}</p>
                            </li>
                            <li class="list-group-item-info d-flex justify-content-between align-items-center">
                                <label class="form-control-label ml-2" for="nombre"><strong>OTROS CONCEPTOS</strong></label>
                                  <p class="mr-2 mt-2 text-bold">$ {{ number_format($OtrosConceptos, 0) }}</p>
                            </li>

                            <!-- Mostrar información de métodos de pago -->
                             @foreach ($metodosDePagoGroup as $nombreMetodoPago => $total)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <label class="form-control-label"
                                        for="nombre"><strong>{{ $nombreMetodoPago }}</strong></label>
                                    <p>$ {{ number_format($total, 0) }}</p>
                                </li>
                            @endforeach
                            <!-- Fin de la información de métodos de pago -->

                        </ul>
                    </div>


                    <div class="card">
                         <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <label class="form-control-label " for="nombre"><strong>Venta Anulada</strong></label>
                                <p class="mr-2 mt-2 text-bold">$ {{ number_format($facturasAnuladas, 0) }}</p>
                            </li>
                         {{--    <li class="list-group-item d-flex justify-content-between align-items-center">
                                <label class="form-control-label " for="nombre"><strong>Venta Credito</strong></label>
                                <p class="mr-2 mt-2 text-bold">$ 0</p>
                            </li> --}}
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <label class="form-control-label" for="nombre"><strong>Consumo
                                        Interno</strong></label>
                                <p>$ 0</p>
                            </li>

                        </ul> -
                    </div>

                 {{--    @if ($cantidad > 0)
                        <div class="card">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <label class="form-control-label" for="nombre"><strong>Ventas
                                            Cajero</strong></label>
                                </li>
                                @foreach ($datausaurios as $resultado)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        <label class="form-control-label"
                                            for="nombre"><strong>{{ $resultado->user->name }}</strong></label>
                                        <p class="mr-2 mt-2 text-bold">$
                                            {{ number_format($resultado->total_quantity, 0) }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}



                </div>
                <div class="col-8">


                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title ml-3"><strong>Detalles</strong></h4>
                        </div>
                        <div class="table-responsive col-md-12">
                            <table class="table table-striped" id="tabProducts">
                                <thead>
                                    <tr>
                                        <th>Fecha</th>
                                        <th>Tipo</th>
                                        <th>Código</th>
                                        <th>Vendedor/a</th>
                                        <th>Cliente</th>
                                        <th>Metodo de pago</th>
                                        <th>Total</th>
                                        <th class="text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($ventas as $venta)
                                    <tr @if ($venta->quantity == '0') class="table-danger"  @endif>
                                            <td>{{ \Carbon\Carbon::parse($venta->created_at)->format('d-m-Y h:i A') }}
                                            </td>
                                            <td>
                                                @if ($venta->cashesable_type == 'App\Models\Sale')

                                                    @if ($venta->cashesable->tipo_operacion == 'VENTA')
                                                        <span class="badge badge-pill badge-primary">
                                                            Venta</span>
                                                    @else
                                                        <span class="badge badge-pill badge-warning">
                                                            Crédito</span>
                                                    @endif


                                                @elseif ($venta->cashesable_type == 'App\Models\PagoCreditos')

                                                    <span class="badge badge-pill badge-success">
                                                        Pago crédito</span>
                                                @else
                                                    <span class="badge badge-pill badge-info">
                                                        Abono</span>
                                                @endif
                                            </td>
                                            <td>{{ $venta->cashesable->full_nro }}</td>
                                            <td>{{ ucwords($venta->cashesable->user->name) }}</td>
                                            <td>{{ ucwords($venta->cashesable->client->name) }}</td>
                                            <td>{{ ucwords($venta->cashesable->metodopago->name) }}</td>
                                            <td class="text-end">$ {{ number_format($venta->quantity, 0) }}</td>
                                            <td class="text-center">
                                                {{-- Cuidado por que imprime segun el modelo ventas o abonos --}}

                                                @if ($venta->cashesable_type == 'App\Models\Sale')

                                                <a @popper(Ver comprobante) class="btn btn-outline-primary btn-sm" href="{{ route('ventas.pos.details', $venta->cashesable_id) }}">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>

                                                <a @popper(Imprimir comprobante) class="btn btn-outline-success btn-sm" href="{{ route('ventas.pos.imprimir.recibo', $venta->cashesable_id) }}">
                                                    <i class="bi bi-printer"></i>
                                                </a>

                                                @elseif ($venta->cashesable_type == 'App\Models\PagoCreditos')

                                                @else

                                                <a @popper(Ver comprobante) class="btn btn-outline-primary btn-sm" href="{{ route('orders.show', $venta->cashesable->abonable_id) }}">
                                                    <i class="bi bi-eye-fill"></i>
                                                </a>

                                                @endif


                                               {{--  <a @popper(Ver comprobante) class="btn btn-outline-primary btn-sm"
                                                    href="@if ($venta->cashesable_type == 'App\Models\Sale') {{ route('ventas.pos.details', $venta->cashesable_id) }}
                                                             @else
                                                   {{ route('orders.show', $venta->cashesable->abonable_id) }} @endif"
                                                    target="_blank" role="button"><i class="bi bi-eye-fill"></i>
                                                </a> --}}

                                            </td>
                                        <tr>
                                        @empty
                                        <tr>
                                            <td colspan="10">
                                                <p>No se encontraron registros...</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>


                        </div>
                    </div>
                    @if ($ventas->count() >= $cantidad_registros)
                        <div class="card-footer ">
                            <nav class="" aria-label="">
                                <ul class="pagination">
                                    {{ $ventas->links() }}
                                </ul>
                            </nav>

                        </div>
                    @endif



                </div>
            </div>

        </div>
    </div>
</div>
