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
  
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarCaja">
          
          Agregar caja

        </button>

      </div>

      <div class="box-body">
        
       <table class="table table-bordered table-striped dt-responsive tablas">
         
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
          
          <tr>

            <td>1</td>

            <td>1</td>

            <td>MAÑANA</td>

            <td>CERRADA</td>

            <td></td>

            <td></td>

            <td></td>

            <td>

              <div class="btn-group">
                  
                <button class="btn btn-warning"><i class="fa fa-pencil"></i></button>

                <button class="btn btn-danger"><i class="fa fa-times"></i></button>

              </div>  

            </td>

          </tr>

          
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

          <h4 class="modal-title">Agregar caja</h4>

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

                <select class="form-control input-lg" name="nuevaCaja">
                  
                  <option value="">Selecionar caja</option>

                  <option value="1">1</option>

                  <option value="2">2</option>

                </select>

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

          <!-- ENTRADA PARA SELECCIONAR ESTADO-->

            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-th"></i></span> 

                <select class="form-control input-lg" name="nuevoEstado">
                  
                  <option value="">Selecionar turno</option>

                  <option value="ABIERTA">Abierta</option>

                  <option value="CERRADA">Cerrada</option>

                </select>

              </div>

            </div>

           <!-- ENTRADA PARA LA FECHA ABIERTA -->
            
            <div class="form-group">
              
              <div class="input-group">
              
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span> 

                <input type="text" class="form-control input-lg" name="nuevaFechaA" placeholder="Ingresar fecha abierta" data-inputmask="'alias': 'yyyy/mm/dd'" data-mask required>

              </div>

            </div>
          
          <!-- ENTRADA DEL USUARIO -->
            
                <div class="form-group">
                
                  <div class="input-group">
                    
                    <span class="input-group-addon"><i class="fa fa-user"></i></span> 

                    <input type="text" class="form-control" id="nuevoUsuario" name="nuevoUsuario" value="Administrador" readonly>

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

    </div>

  </div>

</div>


