<!-- modal nuevo producto -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header producto-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Nuevo Producto</h4>
      </div>
      <div class="modal-body">
        <form id="producto" action="add_producto.php" method="POST">
            <div class="form-group form_producto">
                <input type="text" class="form-control" name="codigo" placeholder="código producto" required>
                <input type="text" class="form-control" name="nombre" placeholder="nombre producto" required>
				        <textarea class="form-control" rows="3" name="descripcion" placeholder="descripcion" required></textarea>
				
                <input type="number" class="form-control" name="precio" placeholder="$ precio unitario" required>

                <input type="number" class="form-control" name="descuento" placeholder="% descuento [oferta]">

				<hr>
				<div class="radio">
				  <label>
				    <input type="radio" name="publicado" id="optionsRadios1" value="1" checked>
				    Producto Publicado
				  </label>
				</div>
				<div class="radio">
				  <label>
				    <input type="radio" name="publicado" id="optionsRadios2" value="0">
				    Producto NO Publicado
				  </label>
				</div>
        <div class="radio">
          <label>
            <input type="radio" name="disponible" id="optionsRadios21" value="1" checked>
            Disponible
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="disponible" id="optionsRadios22" value="0">
            Sin Stock
          </label>
        </div> 

            </div>
      </div>
      <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cerrar">
                <input type="submit" class="btn btn-primary" value="Guardar">
      </div>
        </form>
    </div>
  </div>
</div>

<!-- fin modal nuevo producto -->


<!-- modal nuevo aderezo -->
<div class="modal fade" id="aderezoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header producto-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Nuevo Aderezo</h4>
      </div>
      <div class="modal-body">
        <form id="aderezo" action="add_aderezo.php" method="POST">
            <div class="form-group form_producto">
                <input type="text" class="form-control" name="codigo" placeholder="codigo aderezo" required>
                <input type="text" class="form-control" name="nombre" placeholder="nombre aderezo" required>        
                <input type="number" class="form-control" name="precio" placeholder="$ precio unitario" required>
        <hr>
        <div class="radio">
          <label>
            <input type="radio" name="publicado" id="optionsRadios1" value="1" checked>
            Producto Publicado
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="publicado" id="optionsRadios2" value="0">
            Producto NO Publicado
          </label>
        </div>
        <hr>
        <div class="radio">
          <label>
            <input type="radio" name="disponible" id="optionsRadios1" value="1" checked>
            Disponible
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="disponible" id="optionsRadios2" value="0">
            Sin Stock
          </label>
        </div>

            </div>
      </div>
      <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cerrar">
                <input type="submit" class="btn btn-primary" value="Guardar">
      </div>
        </form>
    </div>
  </div>
</div>

<!-- fin modal nuevo aderezo -->

<!-- modal nuevo ingredientes -->
<div class="modal fade" id="ingrModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header producto-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Nuevo Ingrediente</h4>
      </div>
      <div class="modal-body">
        <form id="ingrediente" action="add_ingrediente.php" method="POST">
            <div class="form-group form_producto">
                <input type="text" class="form-control" name="codigo" placeholder="codigo ingrediente" required>
                <input type="text" class="form-control" name="nombre" placeholder="nombre ingrediente" required>
        
                <input type="number" class="form-control" name="precio" placeholder="$ precio unitario" required>
        <hr>
        <div class="radio">
          <label>
            <input type="radio" name="publicado" id="optionsRadios1" value="1" checked>
            Producto Publicado
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="publicado" id="optionsRadios2" value="0">
            Producto NO Publicado
          </label>
        </div>
        <hr>
        <div class="radio">
          <label>
            <input type="radio" name="disponible" id="optionsRadios1" value="1" checked>
            Disponible
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="disponible" id="optionsRadios2" value="0">
            Sin Stock
          </label>
        </div>

            </div>
      </div>
      <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cerrar">
                <input type="submit" class="btn btn-primary" value="Guardar">
      </div>
        </form>
    </div>
  </div>
</div>

<!-- fin modal nuevo ingredientes -->

<!-- modal nuevo refresco -->
<div class="modal fade" id="refModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header producto-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Nuevo Refresco</h4>
      </div>
      <div class="modal-body">
        <form id="refresco" action="add_refresco.php" method="POST" enctype="multipart/form-data">
            <div class="form-group form_producto">
                <input type="text" class="form-control" name="codigo" placeholder="codigo refresco" required>
                <input type="text" class="form-control" name="nombre" placeholder="nombre refresco" required>
        
                <input type="number" class="form-control" name="precio" placeholder="$ precio unitario" required>
        <hr>
        <div class="radio">
          <label>
            <input type="radio" name="publicado" id="optionsRadios1" value="1" checked>
            Producto Publicado
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="publicado" id="optionsRadios2" value="0">
            Producto NO Publicado
          </label>
        </div>
        <hr>
        <div class="radio">
          <label>
            <input type="radio" name="disponible" id="optionsRadios1" value="1" checked>
            Disponible
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="disponible" id="optionsRadios2" value="0">
            Sin Stock
          </label>
        </div>

            </div>
      </div>
      <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cerrar">
                <input type="submit" class="btn btn-primary" value="Guardar">
      </div>
        </form>
    </div>
  </div>
</div>

<!-- fin modal nuevo refresco -->


<!-- modal nuevo usuarios -->
<div class="modal fade" id="usrModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header producto-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Nuevo Usuario</h4>
      </div>
      <div class="modal-body">
        <form id="usuarios" action="add_usuario.php" method="POST" enctype="multipart/form-data">
            <div class="form-group form_producto">
                <input type="text" class="form-control" name="usr" placeholder="usuario@correo.cl" required>
                <input type="password" class="form-control" name="pass" placeholder="Password" required>
                <input type="text" class="form-control" name="nom" placeholder="Nombre" required>
                <input type="text" class="form-control" name="ape" placeholder="Apellido" required>
                <select name="rol" class="form-control" required>
                  <option value="" selecte>Seleccione un perfil</option>
                  <option value="0">Administrador</option>
                  <option value="1">Usuario Basico</option>
                </select> 
           </div>
      </div>
      <div class="modal-footer">
                <input type="button" class="btn btn-default" data-dismiss="modal" value="Cerrar">
                <input type="submit" class="btn btn-primary" value="Guardar">
      </div>
        </form>
    </div>
  </div>
</div>

<!-- fin modal nuevo usuario -->

<!-- modal venta -->

<!-- Modal Busqueda de Productos para Despacho-->
<div class="modal fade bs-example-modal-lg" id="#" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
  <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Buscar Productos</h4>
    </div>
    <div class="modal-body">
    <form class="form-horizontal">
      <div class="form-group">
      <div class="col-sm-6">
        <input type="text" class="form-control" id="q" placeholder="Buscar productos" onkeyup="load(1)">
      </div>
      <button type="button" class="btn btn-default" onclick="load(1)"><span class='fa fa-search'></span> Buscar</button>
      </div>
    </form>
    <div id="loader" style="position: absolute; text-align: center; top: 55px;  width: 100%;display:none;"></div><!-- Carga gif animado -->
    <div class="outer_div" ></div><!-- Datos ajax Final -->
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    
    </div>
  </div>
  </div>
</div>
<!-- fin modal venta -->

<!-- Modal Busqueda de Productos  -->
<div class="modal fade bs-example-modal-md" id="ventaModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-md" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Buscar Productos</h4>
    </div>
    <div class="modal-body modal-bodyVenta">

    <form method="POST" class="form-prodAdd" name="addingProd" id="addingProd">
      <div class="form-group">
        <label for="bproducto">Seleccione Producto</label><br>
          <?php  
            echo "<select class='form-control select-producto' name='bproducto' id='bproducto' onChange='carga_subtotal()'>";
              echo "<option value=''>Seleccione un Producto</option>";
              while ($fila = mysqli_fetch_array($resultado_prod)) {
                echo "<option value='".$fila[0]."'>".$fila[1]." ".strtoupper($fila[2])."</option>";
              }
            echo '</select>';
          ?>
      </div>
      <div class="form-group">
        <label for="cantidad">Cantidad</label>

        <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad" onChange="total1()" required>
      </div>

      <div class="form-group">
        <button type="button" onClick="act_ctl()" class="btn btn-info btn-lg btn-block" id="btnIngredientes" data-toggle='modal' data-target='#ingModal'>
          <i class="fa fa-edit"> Agregar Ingredientes</i></button>
      </div>

    <div class="form-group">
      <label for="observacion">Observacion</label>
      <textarea class="form-control" name="observacion" id="observacion" rows="1"></textarea>
    </div>
    <div class="form-group">
      <label for="subtotal">Unitario</label>
      <div class="form-group" id="subtotal" name="subtotal" > </div>
      <label for="tot_ing">Ingredientes Adicionales</label>
      <div class="form-group" id="ing_total"> 
        <input type="number" name="tot_ing" id="tot_ing" readonly> <br><br>
        <textarea class="form-control" name="txtarea_ing" id="txtarea_ing" readonly></textarea>
      </div>
      <label for="tot_ing">Total</label>
      <div class="form-group" id="total_gral"> 
        <input type="number" name="tot_gral" id="tot_gral" readonly>
      </div>  
    </div>
    <button type="button" class="btn btn-success" onClick="agregarProd()" id="btn_agregar">Agregar Pedido </button>
    <!-- <button type="button" class="btn btn-info" onCLick="reset_prod()">Nuevo Producto</button> -->
    </form>

    <div id="loader" style="position: absolute; text-align: center; top: 55px;  width: 100%;display:none;"></div><!-- Carga gif animado -->
      <div class="outer" id="outer"></div><!-- Datos ajax Final -->
    </div>

    <div class="modal-footer">
      <button type="button" class="btn btn-default" onClick="cerrarModalProducto()">Cerrar</button>
   </div>
  </div>
 </div>
</div>
<!-- fin modal venta -->

<!-- Modal Busqueda de Ingredientes  -->
<div class="modal fade bs-example-modal-sm" id="ingModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="myModalLabel">Ingredientes</h4>
    </div>
    <div class="modal-body ingVenta">

    <form method="GET" action="temp.php" id="ingre" name="ingre">
      <div class="form-group">
        <label for="producto">Seleccione Ingredientes</label>
          <?php
 
              while ($row = mysqli_fetch_array($resultado_ing)) {
                echo "<div class='form-check'>";
                echo "<input class='form-check-input' type='checkbox' id='".$row[0]."' value='".$row[3]."' onclick='actualizarValor(this.checked, this.value, this.id);'/>"." ";
                echo "<label name='check' id='check".$row[0]."' class='form-check-label' for='".$row[0]."'>".strtoupper($row[2])."</label>";
                echo "</div>";
              }
          ?>
      </div>
      <label for="txtValor">Adicional al pedido</label>
      <input type="text" id="txtValor" value="0" />
      <button type="button" onClick='coloca_total(this.id)' class="btn btn-success" id="conf_ing"><i class="fa fa-plus"></i> Confirmar</button>
    </form>

    <div id="loader" style="position: absolute; text-align: center; top: 55px;  width: 100%;display:none;"></div><!-- Carga gif animado -->
    <br>
      <div class="outer_div" id="outer_div" nombre="outer_div"><br>
        
      </div><!-- Datos ajax Final -->
    </div>

    <div class="modal-footer">
    
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
   </div>
  </div>
 </div>
</div>


<!-- Modal Refrescos -->
<div class="modal fade" id="RefModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Refrescos</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body add_adicionaes">
        <?php carga_refrescos(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" onClick="click_refresco()">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal Refrescos -->

<!-- Modal Aderezos -->
<div class="modal fade" id="AderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">AGREGAR ADEREZOS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body add_adicionaes">
        <?php carga_aderezos(); ?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" id="cargar_aderezo" onClick="click_aderezo()">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal Aderezo -->

<!-- Modal Aderezos -->
<div class="modal fade" id="ObsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Observaciones</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="obsResult" id="obsResult"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>
<!-- Fin Modal Aderezo -->