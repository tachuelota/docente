<table class="table table-hover table-bordered table-striped">
<thead>
<tr>
<th>#</th>
<th>Nombre</th>
<th>Creado el</th>
<th>Modificado el</th>
<th>Modificar</th>
<th>Eliminar</th>
</tr>
</thead>
<tbody>

@foreach($maestros as $maestro)
<tr>
<td>{{$maestro->id}}</td>
<td class="{{$maestro->id}}">{{$maestro->nombre}}</td>
<td>{{$maestro->created_at}}</td>
<td>{{$maestro->updated_at}}</td>
<td><button class="btn btn-warning btn-sm editar-maestro" id="{{$maestro->id}}"><i class="fa fa-pencil"></i></button></td>
<td><button class="btn btn-danger btn-sm eliminar-maestro" id="{{$maestro->id}}"><i class="fa fa-trash-o"></i></button></td>
</tr>
@endforeach

</tbody>
</table>

<script>
$(function(){

$(".editar-maestro").on('click',function(){

$("#textEditaMaestro").val($("."+$(this).attr('id')).text());
$("#ideditar").val($(this).attr('id'));
$("#modalEditar").modal('show');
if($("#formeditamaestro").length > 0){
  $("#formeditamaestro").validate({
    submitHandler:function(form){
   
    $.ajax($(form).attr('action'),{
      type:'POST',
      data:$(form).serialize(),
      success : function(data){
     if(data.success=="true"){
      alert(data.message);
      $("#modalEditar").modal('hide');
      $("#showmaestros").load(base_url+'administrador/maestrosshow');
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

$(".eliminar-maestro").on('click',function(){

var confirmation = confirm('Seguro que quieres borrar este maestro');

if(confirmation){
$.ajax(base_url+'administrador/maestrosdelete',{
type:'GET',
data: {'ideliminar':$(this).attr('id')},
success:function(data){
 if(data.success){
alert(data.message);
$("#showmaestros").load(base_url+'administrador/maestrosshow');
 }else{
alert(data.message);
 }
}
});
}else{

}


});
});

</script>