
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            
            <!-- /.card -->

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
               <div>
               <label >ingrese un numero de cedula a abuscar </label>
               <input type="text" id="ingresoced" onkeyup="verificarnumCedula()">

               </div>
               <div>
                <label id="mostrarDatosPersonales"></label>
               </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Platform(s)</th>
                    <th>rol(s)</th>

                    <th>Acción</th>
                    <th>eliminar</th>

                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($resp as $usuario): ?>
                        <tr>
                            <td><?= esc($usuario->Nombre) ?></td>
                            <td><?= esc($usuario->Apellido) ?></td>
                            <td><?= esc($usuario->Cédula) ?></td>
                            <td><?= esc($usuario->correo) ?></td>
                            <td><?= esc($usuario->rol) ?></td>

                            <td><button type="button" data-toggle="modal" data-target="#exampleModal" onClick="saludo(<?= esc($usuario->USU_ID) ?>);" value="" class="btn btn-success">Success</button>
                            <td><button type="button"  onClick="eliminarU(<?= esc($usuario->USU_ID) ?>);"  class="btn btn-danger">Eliminar</button>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Platform(s)</th>

                    <th>Acción</th>
                    <th>eliminar</th>
                    <th>rol(s)</th>



                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>

            //

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                    <form method="POST" action="<?php echo base_url(); ?>registro">

                        <input type="text" id="urlBase" value="<?php echo base_url(); ?>" style= "display:none">

                        <div class="form-group">
                            <label for="exampleInputEmail1">Usuario:</label>
                            <input type="text" name="nombre"  oninput="verificarText(this)" placeholder="Nombre:" required>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Apellido</label>
                            <input type="text" name="apellido" oninput="verificarText(this)" placeholder="Apellido:" required>
                        </div>
                        <div class="form-group form-check">
                        <label for="exampleInputPassword1">Cédula:</label>
                            <input type="text" name="cedula" id="identificacion" oninput="verificarNum(this)" placeholder="Cédula:" required>
                        </div>
                        <div class="form-group form-check">
                        <label for="exampleInputEmail1">Correo:</label>
                            <input type="email" name="correo" placeholder="Correo:" required>
                        </div>

                        
                  <!-- -->
                          <div>
                          <select class="btn btn-primary" name="rolUsuario" aria-label="Default select example">   
                              <?php foreach ($rol as $rolUsu): ?>
             
                                                <option value="<?= esc($rolUsu->ROL_ID) ?>"><?= esc($rolUsu->ROL_NOMBRE) ?></option> 
                                                                                      
                                                <?php endforeach; ?>
                          </select>

                          </div>
                          <br>
                 
                  <!-- -->
                          
                        <input type="submit" class="btn btn-primary" value="GUARDAR" id="btnGuardar" disabled >






                    </form>
              </div>
              <!-- /.card-body -->
            </div>
            //
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>

      //


      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre:</label>
            <input type="text" class="form-control" id="nombreMod" required>
          </div>
          <div class="form-group">
            <label for="message-text" class="col-form-label">Apellido:</label>
            <input type="text" class="form-control" id="apellidoMod" required>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Identificación:</label>
            <input type="text" class="form-control" id="cedulaMod" disabled>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Correo:</label>
            <input type="mail" class="form-control" id="correoMod" required>
          </div>
          <div>
                          <select class="btn btn-primary" id="rolU" aria-label="Default select example">   
                              <?php foreach ($rol as $rolUsu): ?>
             
                                                <option value="<?= esc($rolUsu->ROL_ID) ?>"><?= esc($rolUsu->ROL_NOMBRE) ?></option> 
                                                                                      
                                                <?php endforeach; ?>
                          </select>

                          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button"  class="btn btn-primary" onclick="actualizarU()">Actualizar</button>
      </div>
    </div>
  </div>
</div>

      //
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->