{{> header}}

<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $( function() {
        $( "#sortable" ).sortable();
        $( "#sortable" ).disableSelection();
    } );
</script>
<div class="page-content page-container" id="page-content">

    <div class="padding">

        <div class="row mb-4">

            {{#cargaExitosa}}
            <button class="btn btn-dark " data-toggle="modal" data-target="#exampleModal">Actualizar Base De Datos</button>

            <a href="/BDDJson" class="btn btn-dark ">Obtener base de datos (JSON)</a>
            <a href="/filtro" class="btn btn-dark ">Filtrar</a>
            {{/cargaExitosa}}

            {{^cargaExitosa}}
            <a href="/?cargarBaseDeDatos=true" class="btn btn-dark ">Cargar Base De Datos</a>
            {{/cargaExitosa}}

            <div class="modal fade " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Al apretar esta opcion se resetearan todos los campos de la base de datos. <br>
                            Estas seguro?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">no</button>
                            <a href="/?actualizarBaseDeDatos=true" class="btn btn-primary">si</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-sm-12">

                <div class="container-fluid d-flex justify-content-center">
                    <div class="list list-row card" id="sortable" data-sortable-id="0" aria-dropeffect="move">

                        {{#tablaDatos}}
                        <div class="list-item" data-id="13" data-item-sortable-id="0" draggable="true" role="option" aria-grabbed="false" style="">

                            <div><a href="#" data-abc="true"><span class="w-40 avatar gd-primary">{{id}}</span></a></div>

                            <div class="flex">
                                <a href="#" class="item-author text-color font-weight-bold" data-abc="true">{{title}}</a>
                                <div class="item-except text-muted text-sm h-1x">{{body}}</div>
                            </div>

                            <div class="no-wrap">
                                <div class="item-date text-muted text-sm d-none d-md-block">{{userId}}</div>
                            </div>
                        </div>
                        {{/tablaDatos}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="/docs/5.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
        integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"
        integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha"
        crossorigin="anonymous"></script>
<script src="dashboard.js"></script>
</body>
</html>


{{> footer}}