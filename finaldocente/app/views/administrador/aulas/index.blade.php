<br>
<div class="row">
<div class="col-lg-2 well">

<ul class="nav nav-pills nav-stacked">
  <li id="principal">
    <a href="administrador/turnoaulas" id="1" class="turno">
     Turno Matutino
    </a>
  </li>
 <li>
    <a href="administrador/turnoaulas" id="2" class="turno">
     Turno Vespertino
    </a>
  </li>
</ul>

</div>
<div class="col-lg-6">
  <button class="btn btn-primary btn-sm turnoid" id="boton-modal-agregar" data-turno="">Agregar</button>
<!--Inicia modal agragar aula-->
<div class="modal fade" id="modalAgregarAula" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar Aula</h4>
</div>
<div class="modal-body">
{{Form::open(array('url'=>'administrador/aulascreate','class'=>'form-horizontal','role'=>'form','id'=>'formaula','autocomplete'=>'off'))}}
 {{Form::hidden('turno','',array('id'=>'iddelturno'))}}
<div class="form-group">
<label for="inputgrado" class="col-lg-5 control-label">Grado</label>
<div class="col-lg-7">
           {{Form::select('grado',array('primero'=>'primero','segundo'=>'segundo','tercero'=>'tercero'),'',array('class'=>'form-control'))}}
           
          </div>
</div>

<div class="form-group">
<label for="inputgrupo" class="col-lg-5 control-label">Grupo</label>
<div class="col-lg-7">
           {{Form::select('grupo',array('A'=>'A','B'=>'B','C'=>'C'),'',array('class'=>'form-control'))}}
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
<!--termina modal agregar aula-->
  <hr>
<div id="aulastable">

</div>

</div>
<div class="col-lg-4" id="ver-clases"></div>
</div>
<script>
$(function(){
	base_url = "{{URL::to('/').'/'}}";

 $.ajax(base_url+'administrador/turnoaulas',{
type:'GET',
data:{"turnoid":"1"},
success:function(data){
  $("#aulastable").html(data).fadeIn();
  $("#principal").addClass('active');
  $(".turnoid").data('turno','1');

}
 });

////agregar//

$("#boton-modal-agregar").on('click',function(){
$("#modalAgregarAula").modal('show');
$("#iddelturno").val($(".turnoid").data('turno'));
});
$("#formaula").on('submit',function(e){
e.preventDefault();
$.ajax($(this).attr('action'),{
type:'POST',
data:$(this).serialize(),
success:function(data){
 if(data.success){
  alert(data.message);
  $("#modalAgregarAula").modal('hide');
  $.ajax(base_url+'administrador/turnoaulas',{
    type:'GET',
    data:{"turnoid":$(".turnoid").data('turno')},
    success:function(data){
      $("#aulastable").html(data);
    }
  });
 }
 else{
  for(mensaje in data.message){
    alert(data.message[mensaje]);
  }
 }
}

});
});


///

$(".turno").on('click',function(e){
  $("#ver-clases").html('');
	e.preventDefault();
$(".turno").parent().removeClass('active');	
$(this).parent().addClass('active');
$(".turnoid").data('turno',$(this).attr('id'));
var url = base_url+$(this).attr('href');
$.ajax(url,{
type:'GET',
data:{"turnoid":$(this).attr('id')},
success:function(data){
	$("#aulastable").hide().html(data).fadeIn();
}
});

});




});
</script>