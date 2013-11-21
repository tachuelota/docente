<div class="modal fade" id="modalAgregarClase" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar Clase</h4>
</div>
<div class="modal-body">
{{Form::open(array('url'=>'administrador/createclases','class'=>'form-horizontal','role'=>'form','id'=>'formclase','autocomplete'=>'off'))}}
 {{Form::hidden('idaula',$aulaid,array('id'=>'iddelaula'))}}
<div class="form-group">
<label for="inputmaestro" class="col-lg-5 control-label">Maestro</label>
<div class="col-lg-7">
           {{Form::select('maestro',$maestros,'',array('class'=>'form-control'))}}
           
          </div>
</div>

<div class="form-group">
<label for="inputgrupo" class="col-lg-5 control-label">Materia</label>
<div class="col-lg-7">
           {{Form::select('materia',$materias,'',array('class'=>'form-control'))}}
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

<script>
$(function(){
	
$("#modalAgregarClase").modal('show');
$("#formclase").on('submit',function(e){
	e.preventDefault();
	$.ajax($(this).attr('action'),{
		type:'POST',
		data:$(this).serialize(),
		success:function(data){
		if(data.success){
			alert(data.message);
		}else{
			for(mensaje in data.message){
				alert(data.message[mensaje]);
			}
		}
		}
	});
});
});
</script>