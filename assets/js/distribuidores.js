jQuery(document).ready(function ($) {
    
    // CrearListasConSelect2();

	// Distribuidores
	const url = theme_directory + '/assets/js/distribuidores.json';
	let dropdown_departamento = $('#departamento-dropdown');
	let dropdown_ciudad = $('#ciudad-dropdown');
	let list_distribuidores = $('#distribuidores');

	dropdown_departamento.empty(), dropdown_ciudad.empty();
	dropdown_departamento.append('<option selected="true" value="0" disabled> Selecciona tu departamento </option>');
	dropdown_ciudad.append('<option selected="true" value="0" disabled> Selecciona tu Ciudad </option>');
	dropdown_departamento.prop('selectedIndex', 0), dropdown_ciudad.prop('selectedIndex', 0);

	// departamento
	$.getJSON(url, function (departamentos) {
		CrearDistribuidores(departamentos);
	}); 

	dropdown_departamento.on('change', function() {
		let valor = jQuery(this).val();
		dropdown_ciudad.val('0');
		$('.selec-dep').html(valor).css('display', 'inline-block');
		$('.selec-ciud').html('').css('display', 'none');

		dropdown_ciudad.find('option').each(function() {
			if( jQuery(this).attr('data-departamento') != valor && valor != '0' ) {
				jQuery(this).css('display', 'none')
			} else {
				jQuery(this).css('display', 'block')
			}
		});

		list_distribuidores.find('.distribuidor').each(function() {
			if( jQuery(this).attr('data-departamento') != valor ) {
				jQuery(this).css('display', 'none')
			} else {
				jQuery(this).css('display', 'block')
			}
		});
		
		/*
		$('#ciudad-dropdown').select2({
            'placeholder': 'Selecciona tu ciudad'
        });
        */
	});

	dropdown_ciudad.on('change', function() {
		let valor = jQuery(this).val();
		$('.selec-ciud').html(valor).css('display', 'inline-block');

		list_distribuidores.find('.distribuidor').each(function() {
			if( jQuery(this).attr('data-ciudad') != valor ) {
				jQuery(this).css('display', 'none')
			} else {
				jQuery(this).css('display', 'block')
			}
		});
		
	});
	
	function CrearListasConSelect2() {
	    $('#departamento-dropdown').select2({
            'placeholder': 'Selecciona tu departamento'
        });
        
        /*
        $('#ciudad-dropdown').select2({
            'placeholder': 'Selecciona tu ciudad'
        });
        */
	}

	function CrearDistribuidores ( departamentos = [] ) {

		// Recorres la respuesta del archivo json
		for( let i = 0; i < departamentos.length; i++ ) {
			// Crear opcion con el nombre del departamento para su lista desplegable
			let option = `<option value="${departamentos[i].DEPARTAMENTO}">${departamentos[i].DEPARTAMENTO}</option>`;
			// Agregar opcion a la lista desplegable
			dropdown_departamento.append(option);

			let ciudades = departamentos[i].CIUDADES;
			for( let j = 0; j < ciudades.length; j++ ) {
				// Crear opcion con el nombre de la ciudad para su lista desplegable
				let option = `<option value="${ciudades[j].NOMBRE}" data-departamento="${departamentos[i].DEPARTAMENTO}">
								${ciudades[j].NOMBRE}
							</option>`;
				// Agregar opcion a la lista desplegable
				dropdown_ciudad.append(option);

				let distribuidores = ciudades[j].DISTRIBUIDORES; //acceder al arreglo de distribuidores de cada ciduad

				// Recorrres los distribuidores de la ciudad
				for( let k = 0; k < distribuidores.length; k++ ) {
					// Crear el resultado del distribuidor con un data atributo ciudad para ocultarlos en el cambio de ciudad
					let html = `<li class="distribuidor" data-departamento="${departamentos[i].DEPARTAMENTO}" data-ciudad="${ciudades[j].NOMBRE}"> ${distribuidores[k]} </li>`;
					// Agregar el resultado a su contenedor
					list_distribuidores.append(html);
				}
			}

		}
	}

});

