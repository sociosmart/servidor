$("#editProductModal").on("show.bs.modal", function (event) {
  var button = $(event.relatedTarget); // Button that triggered the modal
  $("#edit_Cve_Api").val(button.data("cve"));
  $("#edit_Fk_Cve_PuntoDeVenta").val(button.data("estacion"));
  $("#edit_Bomba").val(button.data("bomba"));
  $("#edit_vpn").val(button.data("vpn"));
  $("#edit_Estatus").val(button.data("estatus"));

  $("#edit_SaRegular").val(button.data("saregular"));
  $("#edit_SaPremier").val(button.data("sapremier"));
  $("#edit_SaDiesel").val(button.data("sadiesel"));

  $("#edit_enlace").val(button.data("enlace"));

  console.log(button.data('statusdescuento'));

  if(button.data('statusdescuento')==1){
	  document.getElementById("edit_statusdescuento").checked = true;
  }else{
  document.getElementById("edit_statusdescuento").checked = false;
  }

});

var ElId;
var ElId1;

var modalConfirm = function (callback) {
  $("#mi-modal").on("show.bs.modal", function (event) {
    $("#modal-btn-si").on("click", function () {
      var button = $(event.relatedTarget);
      ElId = button.data("cvee");
      callback(true);
    });

    $("#modal-btn-no").on("click", function () {
      callback(false);
    });
  });
};

modalConfirm(function (confirm) {
  if (confirm) {
    var ruta = "ABCKeysapp.php";
    var redirrecion = ruta.concat(ElId);
    window.location.replace(redirrecion);
  } else {
  }
});

  // Captura el clic del botón
  document.getElementById('actualizarDispensarios').addEventListener('click', function() {
     document.getElementById("actualizarDispensarios").style="display:none";


    // Realiza la llamada AJAX sin afectar la página actual
    fetch('https://sociosmart.ddns.net/postgresql.php', {
      method: 'POST',
	  mode: 'no-cors'
    })
    .then(response => response.text()) // Transforma la respuesta en texto
      .then(data => {
        // Muestra la alerta con el contenido de la respuesta del servidor
  alert(data);
 document.getElementById("actualizarDispensarios").style="display:block";
      });
    // Muestra la alerta de que ya se mandó llamar el PHP
   
  });

