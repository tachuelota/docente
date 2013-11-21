
<table class="table table-hover tablamaestros">
<thead>
<tr>

<th>Nombre</th>
<th>Activar</th>
</tr>
</thead>
<tbody>

@foreach($maestrosinactivos as $maestroinactivo)
<tr class="danger">
<td>{{$maestroinactivo->nombre}}</td>
<td><button class="btn btn-success btn-sm activar-maestro" id="{{$maestroinactivo->id}}"><i class="fa fa-check-square-o"></i></button></td>
</tr>
@endforeach

</tbody>
</table>


