<div id="modalClase">
</div>
<table class="table table-hover table-bordered table-striped">
<thead>
<tr>
<th>Grado</th>
<th>Grupo</th>
<th>Eliminar</th>
<th>Ver Clases</th>
<th>Agregar Clases</th>
</tr>
</thead>
<tbody>
@foreach($aulas as $aula)
<tr>
<td>{{$aula->grado}}</td>
<td>{{$aula->grupo}}</td>
<td><button class="btn btn-danger btn-sm eliminar-aula" id="{{$aula->id}}"><i class="fa fa-trash-o"></button></td>
<td><button class="btn btn-success btn-sm verclases" id="{{$aula->id}}"><i class="fa fa-eye"></i></button></td>
<td><button class="btn btn-primary btn-sm agregarclases" id="{{$aula->id}}"><i class="fa fa-plus-circle"></i></button></td>
</tr>
@endforeach
</tbody>
</table>


<script>
$(function(){
base_url = "{{URL::to('/').'/'}}";
//eliminar aula
$(".eliminar-aula").on('click',function(){
	var confirma = confirm('esta seguro de querer eliminar esta aula');
	if(confirma){
$.ajax(base_url+'administrador/eliminaraula',{
type:'GET',
data:{"ideliminar":$(this).attr('id')},
success:function(data){
	if(data.success){
		alert(data.message);
		$.ajax(base_url+'administrador/turnoaulas',{
			type:'GET',
			data:{"turnoid":$(".turnoid").data('turno')},
			success:function(data){
			$("#aulastable").hide().html(data).fadeIn();
			}
		});
	}else{
		alert(data.message);
	}
}
});
}else{

}
});
//

$(".verclases").on('click',function(){
$(".verclases").children().removeClass('fa-arrow-right').addClass('fa-eye');
$(this).children().removeClass('fa-eye').addClass('fa-arrow-right');
$.ajax(base_url+'administrador/showclases',{
type : 'GET',
data : {"idaula" : $(this).attr('id')},
success: function(data){
$("#ver-clases").hide().html(data).fadeIn('fast');
}
});
});


$(".agregarclases").on('click',function(){

$.ajax(base_url+"administrador/createclases",{
type:'GET',
data:{'id-aula': $(this).attr('id')},
success:function(data){
	$("#modalClase").html(data);
}
});
});



});
</script>