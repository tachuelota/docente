
@if(count($alumnos) == 0)
<div class="alert alert-danger">No hay alumnos para esta aula</div>
@endif

@foreach($alumnos as $alumno)
<div class="row user-row">
            <div class="col-md-1">
                <img class="img-circle"
                     src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=50"
                     alt="User Pic">
            </div>
            <div class="col-md-10">
                <strong>{{$alumno->nombre}}</strong><br>
                <span class="text-muted">CURP: {{$alumno->curp}}</span>
            </div>
            <div class="col-md-1 dropdown-user" data-for=".{{$alumno->id}}">
                <i class="fa fa-chevron-down text-muted"></i>
            </div>
        </div>
        <div class="row user-infos {{$alumno->id}}">
            <div class="col-sm-10 col-md-10 col-md-offset-1">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">INFORMACION DEL ALUMNO</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-3">
                                <img class="img-circle"
                                     src="https://lh5.googleusercontent.com/-b0-k99FZlyE/AAAAAAAAAAI/AAAAAAAAAAA/eu7opA4byxI/photo.jpg?sz=100"
                                     alt="User Pic">
                            </div>
                            <div class="col-md-6">
                                <strong>{{$alumno->nombre}}</strong><br>
                                <table class="table table-condensed table-responsive table-user-information">
                                    <tbody>
                                    <tr>
                                        <td>CURP</td>
                                        <td>{{$alumno->curp}}</td>
                                    </tr>
                                    <tr>
                                        <td>EMAIL</td>
                                        <td>{{$alumno->email}}</td>
                                    </tr>
                                    <tr>
                                        <td>TELEFONO</td>
                                        <td>{{$alumno->telefono}}</td>
                                    </tr>
                                    <tr>
                                        <td>FECHA REGISTRO</td>
                                        <td>{{$alumno->created_at}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <button class="btn btn-sm btn-default" type="button"
                                data-toggle="tooltip"
                                data-original-title="Send message to user"><i class="glyphicon glyphicon-envelope"></i></button>
                        <span class="pull-right">
                            <button class="btn btn-sm btn-danger eliminar-alumno" type="button"
                                    data-toggle="tooltip"
                                    data-original-title="Eliminar este Alumno" id="{{$alumno->id}}"><i class="fa fa-trash-o"></i></button>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
       
        <script>
        $(function(){


            $(".eliminar-alumno").on('click',function(){
              var confirmaborraralumno = confirm('Esta seguro de borrar. si borra este alumno se borraran las evaluaciones realizadas por este y sus datos permanentemente');
              if(confirmaborraralumno){
                $.ajax('administrador/deletealumnos',{
                    type:'GET',
                    data : {"idalumno":$(this).attr('id')},
                    success:function(data){
                        alert(data);
                    }
                });
              }
            });
            ///////////////////////panels alumnos


var panels = $('.user-infos');
    var panelsButton = $('.dropdown-user');
    panels.hide();

    //Click dropdown
    panelsButton.click(function() {
        //get data-for attribute
        var dataFor = $(this).attr('data-for');
        var idFor = $(dataFor);

        //current button
        var currentButton = $(this);
        idFor.slideToggle(400, function() {
            //Completed slidetoggle
            if(idFor.is(':visible'))
            {
                currentButton.html('<i class="fa fa-chevron-up text-muted"></i>');
            }
            else
            {
                currentButton.html('<i class="fa fa-chevron-down text-muted"></i>');
            }
        })
    });

        });

        </script>