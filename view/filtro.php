{{> header}}

<form action="/Filtro" method="get">
<div class="col-12 p-4">
    <label>Filtrar por ID</label>
    <select name="select">
        {{#todosLosId}}
        <option value="{{id}}">{{id}}</option>
        {{/todosLosId}}
    </select>
    <button type="submit">Filtrar</button>
</div>
</form>
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

        {{#tablaDatosJson}}
        <div class="list-item" data-id="13" data-item-sortable-id="0" draggable="true" role="option" aria-grabbed="false" style="">

            <div>
                <h4>En formato JSON:</h4>

                {{tablaDatosJson}}

            </div>
        </div>
        {{/tablaDatosJson}}
    </div>
</div>

{{> footer}}