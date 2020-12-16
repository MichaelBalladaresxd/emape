// let map, marker;
// let markers = [];
// function initMap() {
// 	const uluru = { lat: -12.0349478, lng: -77.0769142};
// 	map = new google.maps.Map(document.getElementById("map"), {
// 		zoom: 11,
// 		center: uluru,
// 	});
// }

let listVias = [];
let map, marker;
let markers = [];
let directionsService;
let directionsRenderer;
function initMap() {
	directionsRenderer = new google.maps.DirectionsRenderer();
	directionsService = new google.maps.DirectionsService();
	const center = { lat: -12.0349478, lng: -77.0769142};
	map = new google.maps.Map(document.getElementById("map"), {
		zoom: 11,
		center: center,
	});

	directionsRenderer.setMap(map);
	
}

function calculateAndDisplayRoute(directionsService, directionsRenderer) {
	// const selectedMode = document.getElementById("mode").value;
	// directionsService.route(
	// {
	// 	origin: { lat: -12.0061786381452, lng: -77.00597508095092 },
	// 	destination: { lat: -12.017974813793508, lng: -77.00216688647765 },
	// 	travelMode: google.maps.TravelMode['DRIVING'],
	// },
	// (response, status) => {
	// 	if (status == "OK") {
	// 		directionsRenderer.setDirections(response);
	// 	} else {
	// 		window.alert("Directions request failed due to " + status);
	// 	}
	// }
	// );
console.log(directionsService);
	directionsService.route(
	{
		origin: { lat: -12.0824361, lng: -76.9878948 },
		destination: { lat: -12.0924212, lng: -77.0352262 },
		travelMode: google.maps.TravelMode['DRIVING'],
	},
	(response, status) => {
		if (status == "OK") {
			directionsRenderer.setDirections(response);
		} else {
			window.alert("Directions request failed due to " + status);
		}
	}
	);
}


$.ajax({
	url: `${base_url}mapas/vias`,
	type: 'POST',
	dataType: 'json'
})
.done(function(response) {
	listVias = response
	let template =  document.getElementById('tmpListVias').innerHTML;
	$.each(listVias, function(index, val) {
		let rendered = Mustache.render(template, {
			distrito: val.DISTRITO,
			NOMBRE_VIA: val.NOMBRE_VIA,
			ID: index,
			NOMBRE: val.NOMBRE,
			cuadras: `${val.CDRA_INI} - ${val.CDRA_FINAL}`,
			lat: val.final_lat
		})
		$("#listVias").append(rendered);
	});
	initMap();
	$("#listVias a").click(function(e){
		e.preventDefault();
		ubicarVia(this);
	})
})
.fail(function() {
	console.log("error");
})
.always(function() {
	console.log("complete");
});


function ubicarVia(index){
	let idIndex = $(index).data('via');
	let full = listVias[idIndex];
	console.log(full);
	console.log(directionsService);
	directionsService.route(
	{
		origin: { lat: parseFloat(full.inicial_lat), lng: parseFloat(full.inicial_long) },
		destination: { lat: parseFloat(full.final_lat), lng: parseFloat(full.final_long) },
		travelMode: google.maps.TravelMode['WALKING'],
	},
	(response, status) => {
		console.log(response)
		console.log(status)
		if (status == "OK") {
			$("#listVias").find('li').removeClass('bg-primary').find('a').removeClass('text-white');
			$(index).closest('li').addClass('bg-primary').find('a').addClass('text-white');
			directionsRenderer.setDirections(response);
		} else {
			msj('ERROR', `Esta vía no cuenta con puntos de Inicio o Fin.`);
			// window.alert("Directions request failed due to " + status);
		}
	}
	);
}