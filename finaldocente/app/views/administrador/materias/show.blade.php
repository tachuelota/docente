<table class="table table-hover tablamaterias table-bordered table-striped">
<thead>
<tr>

<th>Nombre Materia</th>
<th>Creada el</th>
<th>Modificada el</th>
<th>Modificar</th>
<th>Eliminar</th>
</tr>
</thead>
<tbody>

@foreach($materias as $materia)
<tr>

<td class="{{$materia->id}}">{{$materia->materia}}</td>
<td>{{$materia->created_at}}</td>
<td>{{$materia->updated_at}}</td>
<td><button class="btn btn-warning btn-sm editar-materia" id="{{$materia->id}}"><i class="fa fa-pencil"></i></button></td>
<td><button class="btn btn-danger btn-sm eliminar-materia" id="{{$materia->id}}"><i class="fa fa-trash-o"></i></button></td>
</tr>
@endforeach

</tbody>
</table>

<script >
$(function(){

$(".editar-materia").on('click',function(){

$("#textEditaMateria").val($("."+$(this).attr('id')).text());
$("#ideditar").val($(this).attr('id'));
$("#modalEditar").modal('show');
if($("#formeditamateria").length > 0){
  $("#formeditamateria").validate({
    submitHandler:function(form){
   
    $.ajax($(form).attr('action'),{
      type:'POST',
      data:$(form).serialize(),
      success : function(data){
     if(data.success=="true"){
      alert(data.message);
      $("#modalEditar").modal('hide');
      $("#showmaterias").load(base_url+'administrador/materiasshow');
     }else if(data.success=="false"){
      for(mensaje in data.message){
        alert(data.message[mensaje]);
      }
     }
      }

    });
    }
  });
}



});

$(".eliminar-materia").on('click',function(){

var confirmation = confirm('Seguro que quieres borrar esta materia');

if(confirmation){
$.ajax(base_url+'administrador/materiasdelete',{
type:'GET',
data: {'ideliminar':$(this).attr('id')},
success:function(data){
 if(data.success){
alert(data.message);
$("#showmaterias").load(base_url+'administrador/materiasshow');
  $("#showmateriasinactivas").load(base_url+'administrador/showmateriasinactivs');
 }else{
alert(data.message);
 }
}
});
}


});
});
</script>