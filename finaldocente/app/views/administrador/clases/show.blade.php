
<h1>Materias</h1>

<ul class="list-group">
@foreach($materias as $materia)
<li class="list-group-item " style="cursor:pointer">{{$materia->materia}}<div class="pull-right">
 <span class="badge pull-right elimina-clase materia"><i class="fa fa-minus-circle"></i></span>
</div></li>
@endforeach
</ul>
@if(empty($materia))
<div class="alert alert-danger">Esta aula no tiene materias asignadas</div>

@endif



<script>
$(function(){
	var options={
		title : 'Eliminar Materia'
	}
$(".materia").tooltip(options);

$(".elimina-clase").on('click',function(){
var borrar = confirm('Seguro quieres borrar esta materia');
if(borrar){
alert('{{$aula}}');
}else{

}
});

});
</script>