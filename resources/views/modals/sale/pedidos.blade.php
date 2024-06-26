<div class="modal fade" id="numeroMesaModalPedidos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">

                <div class="container">
                    <div class="row">
                      <div class="col">
                        <h5 class="modal-title" id="solicitantePedido"></h5>
                      </div>
                      <div class="col-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="etiqueta" placeholder="name@example.com" autocomplete="off">
                            <span id="mensajeError" class="text-danger"></span>
                            <label for="etiqueta">Etiqueta mesa</label>
                          </div>
                      </div>
                      <div class="col text-end">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="botonCerrar2"></button>
                      </div>
                    </div>
                </div>
            </div>
            <div class="modal-body">

                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="order-list">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Producto</th>
                                            <th>Forma</th>
                                            <th>Cantidad</th>
                                            <th>Precio</th>
                                            <th>Total</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Aquí se pintará el contenido del carrito -->
                                    </tbody>
                                </table>
                                <p id="no-products-msg" style="display: none;">No hay productos en el carrito.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            @livewire('sale.search-product-component')
                        </div>
                    </div>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal" id="botonCerrar1">Cancelar</button>
                <button type="button" class="btn btn-outline-success" onclick="saveOrder()">Guardar Pedido</button>
            </div>
        </div>
    </div>
</div>
