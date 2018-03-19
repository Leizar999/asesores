$(document).ready(function () {

myClass.listeners();
myClass.wordGeneration();

});

var myClass = {

	cif: "",
	nombre: "",
	importe: 0,
	iva: 0,
	importeIva: 0,
	total: 0,
	fecha: "",


	listeners: function() {
		// Listeners for the buttons in the main page
		$("#insertarCliente").on("click", function() {
		    window.open("/asesores/view/recogerCliente.php", "_self");
		});

		$("#verClientes").on("click", function() {
		    window.open("/asesores/view/cliente.php", "_self");
		});

		$("#insertarFactura").on("click", function() {
		    window.open("/asesores/view/recogerFactura.php", "_self");
		});

		$("#importe").on("blur", function() {
			myClass.calculateTotal();
			myClass.generateDate();
		});

		$("#iva").on("blur", function() {
			myClass.calculateTotal();
		});

		$('button[name*="erase"]').on("click", function() {
			console.log($(this).attr("id"));

			var id = $(this).attr("id");
			var tipo = $(this).attr("tipo");
		
			$.ajax({ // Taking the parameters from the DB
		    	type: 'post',
		    	data: {"id": id, "tipo": tipo},
		    	dataType : 'json',
		    	url: "/asesores/controller/delete.php", success: function(result){
		   			console.log(result);
		   			location.reload();
				},
				error: function (request, status, error) {
				    console.log(request.responseText);
				}
			});
		});
	},

	calculateTotal: function() {
		var total = 0;

		myClass.importe = parseFloat($("#importe").val());
		myClass.iva = parseFloat($("#iva").val());
		myClass.importeIva = (myClass.importe * myClass.iva) / 100;
		total = myClass.importe + myClass.importeIva;

		$("#total").attr("value",total.toFixed(2));
	},

	generateDate: function() {
		var fullDate = new Date()
		//Thu May 19 2011 17:25:38 GMT+1000 {}
		 
		//convert month to 2 digits
		var twoDigitMonth = ((fullDate.getMonth().length+1) === 1)? (fullDate.getMonth()+1) : '0' + (fullDate.getMonth()+1);
		 
		myClass.fecha = fullDate.getDate() + "/" + twoDigitMonth + "/" + fullDate.getFullYear();
		$("#fecha").attr("value", myClass.fecha);
		//19/05/2011
	},

	wordGeneration: function() {
	    $('button[name*="generate"]').on("click", function(){

	    	var id = $(this).attr("id");
	    	var tipo = $(this).attr("tipo");

			$.ajax({ // Taking the parameters from the DB
		    	type: 'post',
		    	data: {"id": id, "tipo": tipo},
		    	dataType : 'json',
		    	url: "/asesores/controller/ajaxFactura.php", success: function(result){

	    			function loadFile(url,callback){ // Use the information from the result to generate the bill
	    		        JSZipUtils.getBinaryContent(url, callback);
	    			}
	    			loadFile("/asesores/lib/export/4.docx",function(error,content){
	    			    if (error) { throw error };
	    			    var zip = new JSZip(content);
	    			    var doc = new Docxtemplater().loadZip(zip)
	    			    doc.setData({
	    			        nombre: 	result.nombre,
	    			        direccion: 	result.direccion,
	    			        cif: 		result.cif,
	    			        factura: 	result.id,
	    			        importe: 	result.importe,
	    			        iva: 		result.iva,
	    			        total: 		result.total,
	    			        cobro: 		result.cobro,
	    			    });

	    			    try {
	    			        // render the document (replace all occurences of {first_name} by John, {last_name} by Doe, ...)
	    			        doc.render()
	    			    }
	    			    catch (error) {
	    			        var e = {
	    			            message: error.message,
	    			            name: error.name,
	    			            stack: error.stack,
	    			            properties: error.properties,
	    			        }
	    			        console.log(JSON.stringify({error: e}));
	    			        // The error thrown here contains additional information when logged with JSON.stringify (it contains a property object).
	    			        throw error;
	    			    }

	    			    var out = doc.getZip().generate({
	    			        type:"blob",
	    			        mimeType: "application/vnd.openxmlformats-officedocument.wordprocessingml.document",
	    			    }) //Output the document using Data-URI
	    			    myClass.generateDate();
	    			    saveAs(out, tipo + ": " + result.nombre + myClass.fecha + " " + ".docx");
	    			});	    		
				},
				error: function (request, status, error) {
				    console.log(request.responseText);
				}
			});
	    });
	},
}

