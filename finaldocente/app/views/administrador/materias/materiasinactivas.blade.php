
<table class="table table-hover tablamaterias">
<thead>
<tr>

<th>Nombre Materia</th>
<th>Activar</th>
</tr>
</thead>
<tbody>

@foreach($materiasinactivas as $materiainactiva)
<tr class="danger">
<td>{{$materiainactiva->materia}}</td>
<td><button class="btn btn-success btn-sm activar-materia" id="{{$materiainactiva->id}}"><i class="fa fa-check-square-o"></i></button></td>
</tr>
@endforeach

</tbody>
</table>




<script>
	$(function(){
$(".activar-materia").on('click',function(){
$.ajax(base_url+"administrador/activarmateria",{
type:'GET',
data:{"idactivar":$(this).attr('id')},
success:function(data){
  alert(data);
  $("#showmaterias").load(base_url+'administrador/materiasshow');
  $("#showmateriasinactivas").load(base_url+'administrador/showmateriasinactivs');
}
});
});
	});
</script>