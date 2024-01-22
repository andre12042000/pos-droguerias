<div>
    <div> @include('includes.alert')</div>
    @include('popper::assets')
    <div class="card card-info mt-2">
        <div class="card-header">
            <div class="row">
               <div class="col-sm-3 "> <h3>Productos</h3></div>


                <div class="col-sm-9">
                    <div class="input-group float-right">

                        <select wire:model="cantidad_registros" class="form-select col-sm-1 mr-2" aria-label="Default select example">
                            <option value="10"> 10 </option>
                            <option value="30">30</option>
                            <option value="50">50</option>
                            <option value="100">100</option>
                        </select>

                        <select wire:model="filter_estado" class="form-select col-sm-2 mr-2" aria-label="Default select example">
                            <option value=""> Filtrar estado </option>
                            <option value="ACTIVE">Activos</option>
                            <option value="DEACTIVATED">Inactivos</option>
                        </select>



                        <select wire:model="filter_category" class="form-select col-sm-4 mr-2" aria-label="Default select example">
                            <option value="10"> Filtrar por categoría </option>
                            @foreach ($categorias as $categoria)
                            <option value="{{ $categoria->id }}">{{ $categoria->name }}</option>
                            @endforeach
                        </select>
                        <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                        <input @popper(Buscador) type="text" class="form-control" placeholder="Buscar producto" aria-label="Username" aria-describedby="basic-addon1" wire:model="buscar">
                        @can('Acceso Inventraio Crear')
                        <button type="button" class="btn btn-outline-light float-right ml-2" data-toggle="modal" data-target="#productomodal">Nuevo producto <i class="las la-plus-circle"></i></button>

                        @endcan


                    </div>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table table-striped" id="tabProducts">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Producto</th>
                        <th>Cant. caja</th>
                        <th>Cant. blister</th>
                        <th>Cant. unidad</th>
                        <th>Precio caja</th>
                        <th>Precio blister</th>
                        <th>Precio unidad</th>

                        <th>Estado</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($productos as $product)
                    <tr>
                        <td>{{ $product->code }}</td>
                        <td><a href="{{ route('inventarios.product.show',  $product->id ) }}" target="_blank"> {{ $product->producto }} </a></td>
                        <td class="text-end">0</td>
                        <td class="text-end">0 </td>
                        <td class="text-end">0</td>

                        <td class="text-end">@money($product->precio_caja, 'COP', 0)</td>
                        <td class="text-end">@money($product->precio_blister, 'COP', 0)</td>
                        <td class="text-end">@money($product->precio_unidad, 'COP', 0)</td>




                        <td>@if($product->status == 'ACTIVE') <span class="badge badge-pill badge-success">Activo</span>
                            @else <span class="badge badge-pill bg-dark">Inactivo</span> @endif</td>
                        <td class="text-center">
                            @can('Acceso Inventario Editar')
                            <a @popper(Actualizar) class="btn btn-outline-primary btn-sm" role="button" data-toggle="modal" data-target="#productomodal" wire:click="sendData( {{ $product  }} )"><i class="bi bi-pencil-square"></i></a>
                            @endcan


                            @can('Acceso Inventario Corregir')
                            @if($product->status == 'ACTIVE') <a @popper(Quitar del inventario) class="btn btn-outline-dark btn-sm" data-toggle="modal" data-target="#descontarmodal" wire:click="sendData( {{ $product  }} )" role="button"><i class="bi bi-dash-lg"></i></a>
                            @else <a @popper(Deshabilitado) class="btn btn-outline-secondary btn-sm" role="button"><i class="bi bi-dash-lg" disabled></i></a>
                            @endif

                            @if($product->status == 'ACTIVE') <a @popper(Agregar a inventario) class="btn btn-outline-success btn-sm" data-toggle="modal" data-target="#añadirmodal" role="button" wire:click="sendData( {{ $product  }} )"><i class="bi bi-plus-lg"></i></a>@else <a @popper(Deshabilitado) class="btn btn-outline-secondary btn-sm" role="button" wire:click="sendData( {{ $product  }} )"><i class="bi bi-plus-lg"></i></a> @endif

                            @endcan

                            <button @popper(Eliminar) class="btn btn-outline-danger btn-sm" wire:click="destroy( {{ $product->id }} )"><i class="bi bi-trash3"></i></button>

                            @include('popper::assets')
                        </td>
                    </tr>

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
        <div class="card-footer ">
            <nav class="" aria-label="">
                <ul class="pagination">
                    {{ $productos->links() }}
                </ul>
            </nav>

        </div>
    </div>
</div>
