$(document).ready(function() {
	$('#dataTables-example').DataTable().fnDestroy();
    $('#dataTables-example').DataTable({
            responsive: true
	})
	
	$("#ventaNew").submit(function(e){
		e.preventDefault()
		cargar_base()
	})
})
$("#bproducto").on("change", "#bproducto", function(){
	console.log()
	alert ("hola")
	//$("#btnIng").removeAttr("disabled")
	//$("#btnIngredientes").attr("disabled", false)
})

$("#medioPago").on("change", function(){
	//$("#btnVenta").removeAttr("disabled")
	$("#btnVenta").attr("disabled", false)
})



$(document).ready(function() {
    $("form").keypress(function(e) {
        if (e.which == 13) {
            return false
        }
    });
});

function toGral(){
	var adeT=$('#total_aderezo').val();
    var pedT=$('#total_pedido').val();
	var refT=$('#total_refresco').val();

    var cadena1 = adeT;
    inicio1 = 2;
    fin1 = 7;
    adeT1 = cadena1.substring(inicio1, fin1);

   	var cadena2 = pedT;
    inicio2 = 2;
    fin2 = 7;
    pedT1 = cadena2.substring(inicio2, fin2);

    var cadena3 = refT;
    inicio3 = 2;
    fin3 = 7;
    refT1 = cadena3.substring(inicio3, fin3);   

    var r = parseInt(adeT1)+parseInt(pedT1)+parseInt(refT1);
    document.getElementById("totGral").value="$ "+r;
}

function click_aderezo(){
	  var filas = $("#body_aderezo").find("tr"); //devulve las filas del body de tu tabla segun el ejemplo que brindaste

	for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
		var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
		id = $($(celdas[0]).children("input")[0]).val();	
		aderezo = $($(celdas[1]).children("input")[0]).val();
		costo = $($(celdas[2]).children("input")[0]).val();
  		cantidad = $($(celdas[3]).children("input")[0]).val();
  		

  		if (cantidad >= 1){
	  		$.ajax({
				url: 'carga_aderezo.php',
				data: {id: id, ade: aderezo, cos: costo, can: cantidad},
				type: 'POST',
				success: function (data)
				{
					$("#resulAderezos").html(data);
				}
			})
		}

		$('#AderModal').modal('hide');
  	}
  	document.forms["agrega_aderezo"].reset();	
}

function click_refresco(){

	  var filas = $("#body_refresco").find("tr"); //devulve las filas del body de tu tabla segun el ejemplo que brindaste

	for(i=0; i<filas.length; i++){ //Recorre las filas 1 a 1
		var celdas = $(filas[i]).find("td"); //devolverá las celdas de una fila
		id = $($(celdas[0]).children("input")[0]).val();	
		refresco = $($(celdas[1]).children("input")[0]).val();
		costo = $($(celdas[2]).children("input")[0]).val();
  		cantidad = $($(celdas[3]).children("input")[0]).val();

  		if (cantidad >= 1){
	  		$.ajax({
				url: 'carga_refresco.php',
				data: {id: id, ref: refresco, cos: costo, can: cantidad},
				type: 'POST',
				success: function (data)
				{
					$("#resulRefrescos").html(data);
				}
			})
		}

		$('#RefModal').modal('hide');
  	}
  	document.forms["agrega_refresco"].reset();	
}



function agregar(id){
	var can =document.getElementById("cant").value;
	$.ajax({
    type: "POST",
    url: "../ajax/agregar_cotizador.php",
    data: 'id='+id+'&cant='+can,
	beforeSend: function(objeto){
		$("#resultados").html("Mensaje: Cargando...");
	  },
    success: function(datos){
		$("#resultados").html(datos);
	}
	});
}
	
function eliminar (id){
	$.ajax({
    type: "GET",
    url: "../ajax/agregar_cotizador.php",
    data: "id="+id,
	beforeSend: function(objeto){
		$("#resultados").html("Mensaje: Cargando...");
	  },
    success: function(datos){
		$("#resultados").html(datos);
	}
	});
}

// Buscar Producto
function load(page){
	var q= $("#q").val();
	$("#loader").fadeIn('slow');
	$.ajax({
		url:'bus_producto.php?action=ajax&page='+page+'&q='+q,
		 beforeSend: function(objeto){
		 $('#loader').html('<img src="./img/ajax-loader.gif"> Cargando...');
	  },
		success:function(data){
			$(".outer_div").html(data).fadeIn('slow');
			$('#loader').html('');
			
		}
	})
}


function actualizarValor(estaChequeado, valor, iden) {

  // Variables.
  var suma_actual = 0;

  var campo_resultado = document.getElementById("txtValor");
  valor = parseInt(valor);

  // Obtener la suma que pueda tener el campo 'txtValor'.
  try {
    if (campo_resultado != null) {

      if (isNaN(campo_resultado.value)) {
        campo_resultado.value = 0;
      }

      suma_actual = parseInt(campo_resultado.value);
    }
  } catch (ex) {
    alert('No existe el campo de la suma.');
  }

  // Determinar que: si el check está seleccionado "checked".
  // entonces, agregue el valor a la variable "suma_actual";
  // de lo contrario, le resta el valor del check a "suma_actual".

  if (estaChequeado == true) {
    suma_actual = suma_actual + valor;
   	txt = '#check'+iden;
   	r = $(txt).text();
   	t = $('#txtarea_ing').text();
   	texto = r+", "+t;

   	document.getElementById("txtarea_ing").innerHTML=texto;

  } else {
    suma_actual = suma_actual - valor;
  }

  // Colocar el resultado de las operaciones anteriores de vuelta
  // al campo "txtValor".
  campo_resultado.value = suma_actual;
}

function wait(nsegundos) {
objetivo = (new Date()).getTime() + 1000 * Math.abs(nsegundos);
while ( (new Date()).getTime() < objetivo );
}

function wait2(ms)
{
var d = new Date();
var d2 = null;
do { d2 = new Date(); }
while(d2-d < ms);
}

function act_ctl(){
	$("#ingre")[0].reset();
	$("#outer_div").html("");
	// document.ingre.conf_ing.disabled=false;
}

function coloca_total(){
	var total_ing = $('#txtValor').val()
//	var total_Gral = $('#totalGral').val()

	document.getElementById("tot_ing").value=total_ing

	var sub_t = $('#res_total').val()
	var cantidad = $('#cantidad').val()

	var total_general = parseInt(sub_t)*parseInt(cantidad)
	var r = parseInt(total_general)+parseInt(total_ing)

	document.getElementById("tot_gral").value=r
	$("#ingre")[0].reset()
//	alerta = "<div class='alert alert-success'>Ingredientes Extras Agregados</div>";
//	$("#outer_div").html(alerta);
//	$('#conf_ing').attr("disabled", true);
//	wait2(2000);
	$("#btnIngredientes").attr("disabled", true)
	$("#ingModal").modal('hide')//ocultamos el modal
	$('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
	$('.modal-backdrop').remove()//eliminamos el backdrop del modal
}


function agregarProd(){
	var bproducto=$("#bproducto").val();
	var cantidad=$("#cantidad").val();
	var observacion=$("#observacion").val();
	var res_total=$("#res_total").val();
	var tot_ing=$("#tot_ing").val();
	var txtarea_ing=$("#txtarea_ing").val();
	var tot_gral=$("#tot_gral").val();

	$.ajax({
		url: 'carga_detalle.php',
		data: {bproducto:bproducto, cantidad:cantidad, observacion:observacion, res_total:res_total, tot_ing:tot_ing, txtarea_ing:txtarea_ing, tot_gral:tot_gral},
		type: 'POST',
		success: function (data)
		{
			$("#resultados").html(data);
		}
	})
	
   	document.forms["addingProd"].reset();
   	$("#txtarea_ing").empty();
   //	document.getElementById("txtarea_ing").value="";
	document.getElementById("res_total").value=""
	//$("#btnVenta").removeAttr("disabled")
	$("#btnIngredientes").attr("disabled", false);

	$("#ventaModal").modal('hide');//ocultamos el modal
	$('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
	$('.modal-backdrop').remove();//eliminamos el backdrop del modal
	//msj_confirm();
}


function carga_subtotal(){
	var id_prod=$("#bproducto").val();

	$.ajax({
		url: 'carga_subtotal.php',
		data: {prod: id_prod},
		type: 'POST',
		success: function (data)
		{
			$("#subtotal").html(data);
		}
	})
}


function total1(){
	var subtotal=$("#res_total").val();
	var cantidad=$("#cantidad").val();
	var total1 = subtotal * cantidad;
	document.getElementById("tot_gral").value=total1;
}

function elimina_prod(id){
	var id_prod=id;

	$.ajax({
		url: 'elim_prod.php',
		data: {prod: id_prod},
		type: 'POST',
		success: function (data)
		{
			$("#resultados").html(data);
		}
	})
}

function verObsPro(id){
	var id_p = id;

	$('#ObsModal').modal('show');

	$.ajax({
		url: 'observa.php',
		data: {prod: id_p},
		type: 'POST',
		success: function (data)
		{	
			$("#obsResult").html(data);
		}
	})
}


function elimina_ade(id){
	var id_ade=id;

	$.ajax({
		url: 'elim_ader.php',
		data: {id_ade: id_ade},
		type: 'POST',
		success: function (data)
		{
			$("#resulAderezos").html(data);
		}
	})
}

function elimina_ref(id){
	var id_ref=id;

	$.ajax({
		url: 'elim_ref.php',
		data: {id_ref: id_ref},
		type: 'POST',
		success: function (data)
		{
			$("#resulRefrescos").html(data);
		}
	})
}

function cargar_base(){

	var nom = $("#nom_cliente").val();
	var obs = $("#obs_venta").val();
	var mpago = $("#medioPago").val();

	$.ajax({
		url: 'carga_base.php',
		data: {nom: nom, obs: obs, mpago: mpago},
		type: 'POST',
		success: function (data)
		{
			$("#resultados").html(data);
		}
	})
}

function resetearVenta(){
	$.ajax({
		url: 'delete_temp.php',
		success: function (resp){
			if (resp == "ok"){
				swal({
					icon: 'success',
					title: 'Nueva Venta',
					text: 'Realizará nueva Venta'
				}).then((result)=>{
					if (resul.value) {
						windows.location = "ventas.php"
					}
				})
			}

		}
	})
	document.forms["ventaNew"].reset();
	$("#msjDespacho").empty ();
	$("#resultados").empty ();
	$("#resulAderezos").empty ();
	$("#resulRefrescos").empty ();
	
	$("#btnVenta").attr("disabled", true);
}

function cerrarModalProducto(){
	document.forms["addingProd"].reset();
	$("#txtarea_ing").empty();

	document.getElementById("res_total").value="";

	$("#ventaModal").modal('hide');//ocultamos el modal
	$('body').removeClass('modal-open');//eliminamos la clase del body para poder hacer scroll
	$('.modal-backdrop').remove();//eliminamos el backdrop del modal

}