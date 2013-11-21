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
          <h4 class="modal-title">Editar Maestro</h4>
</div>
<div class="modal-body">
{{Form::open(array('url'=>'administrador/maestrosedit','class'=>'form-horizontal','role'=>'form','id'=>'formeditamaestro','autocomplete'=>'off'))}}

<div class="form-group">
<label for="inputeditamaestro" class="col-lg-5 control-label">Nombre del Maestro</label>
<div class="col-lg-7">
            {{Form::text('maestroedit','',array('class'=>'form-control','id'=>'textEditaMaestro','placeholder'=>'Nombre Maestro','required','maxlength'=>'100'))}}
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

 <!-- Modal Agregar -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar Maestro</h4>
        </div>
        <div class="modal-body">

        	{{Form::open(array('url'=>'administrador/maestrosenviar','class'=>'form-horizontal','role'=>'form','id'=>'formmaestro','autocomplete'=>'off'))}}
        	<div class="form-group">
        		<label for="inputmaestro" class="col-lg-5 control-label">Nombre del Maestro</label>
        		<div class="col-lg-7">
        		{{Form::text('maestro','',array('class'=>'form-control','placeholder'=>'Nombre Maestro','required','maxlength'=>'100'))}}
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
<!-- termina modal agregar maestro -->


<div id="showmaestros">
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
</div>
</div>

</div>
<div class="col-lg-4">
<blockquote>
<p class="text-danger">Maestros Inactivos</p>
</blockquote>
<div id="showmaestrosinactivos">
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
</div>
</div>
<script>
$(function(){

base_url = '{{URL::to('/').'/'}}';

if($("#formmaestro").length > 0){
  $("#formmaestro").validate({
    submitHandler:function(form){
     
    $.ajax($(form).attr('action'),{
      type:'POST',
      data:$(form).serialize(),
      success : function(data){
     if(data.success=='true'){
      alert(data.message);
      $("#myModal").modal('hide');
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


//activar maestro inactivas

$(".activar-maestro").on('click',function(){
$.ajax(base_url+"administrador/activarmaestro",{
type:'GET',
data:{"idactivar":$(this).attr('id')},
success:function(data){
  alert(data);
  $("#showmaestros").load(base_url+'administrador/maestrosshow');
  $("#showmaestrosinactivos").load(base_url+'administrador/showmaestrosinactivos');
}
});
});

});
</script>