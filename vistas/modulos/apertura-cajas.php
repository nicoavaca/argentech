<?php

if($_SESSION["perfil"] == "Especial"){

  echo '<script>

    window.location = "inicio";

  </script>';

  return;

}

?>

<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Apertura de cajas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Apertura de cajas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <!--
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCaja">
          
          Agregar caja

        </button>-->

      </div>

      <div class="box-body">
        

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>N° Caja</th>
           <th>Turno</th>
           <th>Estado</th>
           <th>Fecha Cerrada</th>
           <th>Usuario</th> 
           <th>Acciones</th>


         </tr> 

        </thead>

        <tbody>

        <?php


          $cajas = ControladorCajas::ctrMostrarAbiertas();

          foreach ($cajas as $key => $value) {

            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["num_caja"].'</td>

                    <td>'.$value["turno"].'</td>

                    <td>'.$value["estado"].'</td>

                    <td>'.$value["f_cerrada"].'</td>

                    <td>'.$value["usuario"].'</td>             

                    <td>
                        <div class="btn-group">
                      
                        ';
                  

                      if($_SESSION["perfil"] == "Administrador"){

                          echo '<button class="btn btn-warning btnEditarCaja" data-toggle="modal" data-target="#modalEditarCaja" idCaja="'.$value["id"].'"><i class="fa fa-pencil"></i></button>';

                      }

                      echo '
                        </div> 
                    </td> 
                  </tr>';
          
            }

        ?>
   
        </tbody>

       </table>

      </div>

    </div>

  </section>

</div>


<!--=====================================
MODAL EDITAR Caja
======================================-->

<div id="modalEditarCaja" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Apertura caja </h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA CAJA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-archive"></i></span> 

                <input type="number" class="form-control input-lg" name="editarCaja" id="editarCaja" required>
                <input type="hidden" id="idCaja" name="idCaja">
              </div>

            </div>


            <!-- ENTRADA PARA SELECCIONAR turno-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg"  name="editarTurno" required>
                  
                  <option value = 'editarTurno' id="editarTurno"></option>

                  <option value="MAÑANA">MAÑANA</option>

                  <option value="TARDE">TARDE</option>
                  
                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR estado -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg"  name="editarEstado"   required>
                  
                  <option id="editarEstado"></option>

                  <option  value="ABIERTA">ABIERTA</option>

                </select>

              </div>

            </div>


             <!-- ENTRADA PARA LA FECHA cerrada -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFechaC" id="editarFechaC"  data-inputmask="'alias': 'yyyy/mm/dd hh:tt:ss'" data-mask  required>

              </div>

            </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar cambios</button>

        </div>

      </form>

      <?php

        $editarCaja = new ControladorCajas();
        $editarCaja -> ctrAbrirCaja();

      ?>

    

    </div>

  </div>

</div>




