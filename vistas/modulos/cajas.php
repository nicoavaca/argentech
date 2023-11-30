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
      
      Administrar cajas
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href="inicio"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar cajas</li>
    
    </ol>

  </section>

  <section class="content">

    <div class="box">

      <div class="box-header with-border">
  
        <?php

        if($_SESSION["perfil"] == "Administrador"){
        echo'<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCaja">
          
          Abrir caja

        </button>';
      }
      ?>

      </div>

      <div class="box-body">
        

       <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
         
        <thead>
         
         <tr>
           
           <th style="width:10px">#</th>
           <th>N° Caja</th>
           <th>Turno</th>
           <th>Estado</th>
           <th>Fecha Abierta</th>
           <th>Fecha cerrada</th>
           <th>Usuario</th> 
           <th>Acciones</th>


         </tr> 

        </thead>

        <tbody>

        <?php

          $item = null;
          $valor = null;

          $cajas = ControladorCajas::ctrMostrarCajas($item, $valor);

          foreach ($cajas as $key => $value) {
            

            echo '<tr>

                    <td>'.($key+1).'</td>

                    <td>'.$value["num_caja"].'</td>

                    <td>'.$value["turno"].'</td>

                    <td>'.$value["estado"].'</td>

                    <td>'.$value["f_abierta"].'</td>

                    <td>'.$value["f_cerrada"].'</td>

                    <td>'.$value["usuario"].'</td>             

                    <td>
                        <div class="btn-group">
                      
                        ';
                  

                      if($_SESSION["perfil"] == "Administrador"){

                          /*echo '<button class="btn btn-warning btnEditarCaja" data-toggle="modal" data-target="#modalEditarCaja" idCaja="'.$value["id"].'"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btnEliminarCaja" idCaja="'.$value["id"].'"><i class="fa fa-times"></i></button>';*/
                          /*echo '<button class="btn btn-warning btnAbrirCaja" data-toggle="modal" data-target="#modalAbrirCaja" idCaja="'.$value["id"].'"><i class="fa fa-pencil"></i></button>*/
                          echo '<button class="btn btn-warning btnCerrarCaja" data-toggle="modal" data-target="#modalAgregarCajaC" idCaja="'.$value["id"].'"><i class="fa fa-times"></i></button>; 

                          
                           <button class="btn btn-danger btnEliminarCaja" idCaja="'.$value["id"].'"><i class="fa fa-trash"></i></button>';
                          

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
MODAL AGREGAR CAJA
======================================-->

<div id="modalAgregarCaja" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Abrir caja</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA SELECCIONAR CAJA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <!--<select class="form-control input-lg" id="nuevaCaja" name="nuevaCaja" required>-->
                 <input type="number" class="form-control input-lg" name="nuevaCaja" value="1" required readonly> 

              </div>

            </div>

            
            <!-- ENTRADA PARA SELECCIONAR TURNO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" name="nuevoTurno">
                  
                  <option value="">Selecionar turno</option>

                  <option value="MAÑANA">MAÑANA</option>

                  <option value="TARDE">TARDE</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR ESTADO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" value="ABIERTA" class="form-control input-lg" name="nuevoEstado" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA ABIERTA -->
            
            <!--<div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaFechaA" placeholder="Ingresar fecha abierta" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div> -->

            <!-- ENTRADA DEL USUARIO -->
            
                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control" id="nuevoUsuario" name="nuevoUsuario" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                  </div>

                </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar caja</button>

        </div>

      </form>

      <?php

        $crearCaja = new ControladorCajas();
        $crearCaja -> ctrCrearCaja();

      ?>

    </div>

  </div>

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

          <h4 class="modal-title">Editar caja </h4>

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

                <input type="number" class="form-control input-lg" name="editarCaja" id="editarCaja" readonly required>
                <input type="hidden" id="idCaja" name="idCaja">
              </div>

            </div>


            <!-- ENTRADA PARA SELECCIONAR turno-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg"  name="editarTurno"  required>
                  
                  <option  id="editarTurno"></option>

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

                  <option   value="CERRADA">CERRADA</option>

                </select>

              </div>

            </div>


             <!-- ENTRADA PARA LA FECHA abierta -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="editarFechaA" id="editarFechaA"  data-inputmask="'alias': 'yyyy/mm/dd hh:mi:ss'" data-mask  required>

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
        $editarCaja -> ctrEditarCaja();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL ABRIR CAJA
======================================-->

<div id="modalAbrirCaja" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Abrir caja</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">
        
            <!-- ENTRADA PARA CAJA -->
            
            <!--<div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-archive"></i></span> 

                <input type="number" class="form-control input-lg" name="abrirCaja" id="abrirCaja" readonly>
                <input type="hidden" id="idCaja" name="idCaja">
              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR TURNO -->

            <!--<div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                
                <select class="form-control input-lg" name="abrirTurno">
                  
                  <option id="abrirTurno"></option>

                  <option value="MAÑANA">MAÑANA</option>

                  <option value="TARDE">TARDE</option>

                </select>
                
              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA ABIERTA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="abrirFechaA" id="abrirFechaA" value="<?php date_default_timezone_set('America/Argentina/Salta');

            $fecha = date('Y-m-d');
            $hora = date('H:i:s');

            $fechaActual = $fecha.' '.$hora; echo $fechaActual; ?>"  data-inputmask="'alias': 'yyyy/mm/dd hh:mi:ss'" data-mask required>
                <input type="hidden" id="idCaja" name="idCaja">
              </div>

            </div> 

            <!-- ENTRADA DEL USUARIO -->
            
                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control" id="abrirUsuario" name="abrirUsuario" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                  </div>

                </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar caja</button>

        </div>

      </form>

      <?php

        $abrirCaja = new ControladorCajas();
        $abrirCaja -> ctrAbrirCaja();

      ?>

    </div>

  </div>

</div>

<!--=====================================
MODAL CERRAR CAJA
======================================-->

<div id="modalCerrarCaja" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Cerrar caja</h4>

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

                <input type="number" class="form-control input-lg" name="cerrarCaja" id="cerrarCaja" readonly>
                <input type="hidden" id="idCaja" name="idCaja">
              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR TURNO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 
                
                <select class="form-control input-lg" name="cerrarTurno">
                  
                  <option id="cerrarTurno"></option>

                  <option value="MAÑANA">MAÑANA</option>

                  <option value="TARDE">TARDE</option>

                </select>
                
              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA CIERRE -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="cerrarFechaC" id="cerrarFechaC" value="<?php date_default_timezone_set('America/Argentina/Salta');

            $fecha = date('Y-m-d');
            $hora = date('H:i:s');

            $fechaActual = $fecha.' '.$hora; echo $fechaActual; ?>"  data-inputmask="'alias': 'yyyy/mm/dd hh:mi:ss'" data-mask required>

              </div>

            </div> 

            <!-- ENTRADA DEL USUARIO -->
            
                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control" id="cerrarUsuario" name="cerrarUsuario" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                  </div>

                </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar caja</button>

        </div>

      </form>

      <?php

        $cerrarCaja = new ControladorCajas();
        $cerrarCaja -> ctrCerrarCaja();

      ?>

    </div>

  </div>

</div>

<?php

  $eliminarCaja = new ControladorCajas();
  $eliminarCaja -> ctrBorrarCaja();

?>

<!--=====================================
MODAL AGREGAR CAJA
======================================-->

<div id="modalAgregarCajaC" class="modal fade" role="dialog">
  
  <div class="modal-dialog">

    <div class="modal-content">

      <form role="form" method="post">

        <!--=====================================
        CABEZA DEL MODAL
        ======================================-->

        <div class="modal-header" style="background:#3c8dbc; color:white">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <h4 class="modal-title">Cerrar caja</h4>

        </div>

        <!--=====================================
        CUERPO DEL MODAL
        ======================================-->

        <div class="modal-body">

          <div class="box-body">

            <!-- ENTRADA PARA SELECCIONAR CAJA -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" id="nuevaCaja2" name="nuevaCaja2" required>
                  
                  <option value="">Selecionar caja</option>

                  <?php

                  $numcaja = ControladorCajas::ctrMostrarNumCajas();

                  foreach ($numcaja as $key => $value) {
                    
                    echo '<option value="'.$value["num_caja"].'">'.$value["num_caja"].'</option>';
                  }

                  ?>
  
                </select>

              </div>

            </div>

            
            <!-- ENTRADA PARA SELECCIONAR TURNO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" name="nuevoTurno2">
                  
                  <option value="">Selecionar turno</option>

                  <option value="MAÑANA">MAÑANA</option>

                  <option value="TARDE">TARDE</option>

                </select>

              </div>

            </div>

            <!-- ENTRADA PARA SELECCIONAR ESTADO -->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevoEstado2" value="CERRADA" readonly>

              </div>

            </div>

            <!-- ENTRADA PARA LA FECHA ABIERTA -->
            
            <!--<div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaFechaA" placeholder="Ingresar fecha abierta" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div> -->

            <!-- ENTRADA DEL USUARIO -->
            
                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control" id="nuevoUsuario" name="nuevoUsuario2" value="<?php echo $_SESSION["nombre"]; ?>" readonly>

                  </div>

                </div>
  
          </div>

        </div>

        <!--=====================================
        PIE DEL MODAL
        ======================================-->

        <div class="modal-footer">

          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Salir</button>

          <button type="submit" class="btn btn-primary">Guardar caja</button>

        </div>

      </form>

      <?php

        $crearCaja2 = new ControladorCajas();
        $crearCaja2 -> ctrCrearCaja2();

      ?>

    </div>

  </div>

</div>

