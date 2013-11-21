
<div class="row">

<div class="col-lg-8">
<div> <a data-toggle="modal" href="#myModal" class="btn btn-primary btn-sm">Agregar</a>
  <br><hr>

<!--Modal Editar-->

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Editar Materia</h4>
</div>
<div class="modal-body">
{{Form::open(array('url'=>'administrador/materiasedit','class'=>'form-horizontal','role'=>'form','id'=>'formeditamateria','autocomplete'=>'off'))}}

<div class="form-group">
<label for="inputeditamateria" class="col-lg-5 control-label">Nombre de la Materia</label>
<div class="col-lg-7">
            {{Form::text('materiaedit','',array('class'=>'form-control','id'=>'textEditaMateria','placeholder'=>'Nombre Materia','required','maxlength'=>'60'))}}
            {{Form::hidden('ideditar','',array('id'=>'ideditar'))}}
          </div>
</div>

</div>
<div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          {{Form::submit('Enviar',array('class'=>'btn btn-primary'))}}
         {{Form::close()}}
        </div>
</div>
</div>
</div>

<!--Termina modal editar-->

 <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar Materia</h4>
        </div>
        <div class="modal-body">

        	{{Form::open(array('url'=>'administrador/materiasenviar','class'=>'form-horizontal','role'=>'form','id'=>'formmateria','autocomplete'=>'off'))}}
        	<div class="form-group">
        		<label for="inputmateria" class="col-lg-5 control-label">Nombre de la Materia</label>
        		<div class="col-lg-7">
        		{{Form::text('materia','',array('class'=>'form-control','placeholder'=>'Nombre Materia','required','maxlength'=>'60'))}}
        	</div>
        	</div>
        	
        	
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
          {{Form::submit('Enviar',array('class'=>'btn btn-primary'))}}
         {{Form::close()}}
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
</div>
<div id="showmaterias">
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
</div>

</div>
 <div class="col-lg-4">

<blockquote>
<p class="text-danger">Materias Inactivas</p>
</blockquote>

<div id="showmateriasinactivas">
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
</div>

</div>
</div>
<script>
$(function(){

base_url = '{{URL::to('/').'/'}}';

if($("#formmateria").length > 0){
  $("#formmateria").validate({
    submitHandler:function(form){
     
    $.ajax($(form).attr('action'),{
      type:'POST',
      data:$(form).serialize(),
      success : function(data){
     if(data.success=='true'){
      alert(data.message);
      $("#myModal").modal('hide');
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
}else{

}


});


//activar materias inactivas

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