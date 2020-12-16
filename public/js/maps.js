let objeto;
function llamarModalMapa($this, lat = false, long = false){
	let template = document.getElementById('tmpMaps').innerHTML;
	let rendered = Mustache.render(template, {
	});
	BootstrapDialog.show({
		title: 'Ubicación GPS',
		message: rendered,
		type: BootstrapDialog.TYPE_PRIMARY,
		cssClass: "modal-full",
		buttons: [{
			label: 'Cancelar',
			action: function(dialog) {
				deleteMarkers();
				marker= false;
				dialog.close();
			}
		}, {
			label: 'Guardar',
			action: function(dialog) {
				let mapaLat  	= $('#mapaLat').val();
				let mapaLong  	= $('#mapaLong').val();
				console.log($($this).closest('.form-group').find('input[data-gps="latitud"]').val(mapaLat));
				console.log($($this).closest('.form-group').find('input[data-gps="longitud"]').val(mapaLong));
				deleteMarkers();
				marker= false;
				dialog.close();
			}
		}],
		onshown: function(dialogRef, demo){
			console.log(dialogRef);
			initMap();
			$("#btnUbicar").click(function(){
				geolocalizar()	
			})
			medirMapa(dialogRef);
		}
	});
}

function medirMapa(dialogRef){

	console.log($(dialogRef.$modalBody[0]).height())
	console.log($(".div-formulario").height())
	let contenido = $(dialogRef.$modalBody[0]).height();
	let formH = $(".div-formulario").height();
	let alturaMap = contenido - formH;
	$(".divMap").css('height',alturaMap);
	$(".divMap").removeClass("d-none");
}

let map, marker;
let markers = [];
function initMap() {
	const uluru = { lat: -12.0349478, lng: -77.0769142};
	map = new google.maps.Map(document.getElementById("map"), {
		zoom: 11,
		center: uluru,
	});
}

function setMapOnAll(map) {
	for (let i = 0; i < markers.length; i++) {
		markers[i].setMap(map);
	}
}

function geolocalizar(){
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(
			(position) => {
				const pos = {
					lat: position.coords.latitude,
					lng: position.coords.longitude,
				};
				newMarker(pos);
			},
			() => {
				handleLocationError(true, infoWindow, map.getCenter());
			}
			);
	} else {
		handleLocationError(false, infoWindow, map.getCenter());
	}
}

function newMarker(pos){
	if(marker){
		marker.setPosition(pos);
	}else{
		marker = new google.maps.Marker({
			position: pos,
			map: map,
			draggable: true,
		});
		markers.push(marker);
	}
	infoMarker(marker);
	map.setCenter(pos);
	map.setZoom(16);
	// marker.addListener('drag', infoMarker);
	marker.addListener('dragend', infoMarker);
}

function infoMarker() {
	var markerLatLng = marker.getPosition();
	$('#mapaLat').val(markerLatLng.lat());
	$('#mapaLong').val(markerLatLng.lng());
}

function deleteMarkers(){
   // 1 dejar de mostrar los marcadores
   setMapOnAll(null);
   //2 eliminar toda referencia a los marcadores antiguos
   markers = [];

}