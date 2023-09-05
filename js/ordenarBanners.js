
    $(document).ready(function(){
           $.ajax({ //metodo ajax
      type: "GET", //aqui puede ser get o post
      url: "ajax/ajaxcarrusel.php", //la url adonde se va a mandar la cadena a buscar
      data: "",
      cache: false,
      success: function(data)//funcion que se activa al recibir un dato
      {
       // console.log(data);

$("#pendientes").append(data);
        //var datas= JSON.parse(data);

    }
});
        //Aplicar la función sortable a la lista con id visitadas
        // y conectarla con la lista de id pendientes
        $( "#visitadas" ).sortable({
            connectWith : '#pendientes',    cancel: ".cancelitem"
        });

        //Aplicar la función sortable a la lista con id pendientes
        // y conectarla con la lista de id visitadas
        $( "#pendientes" ).sortable({
            connectWith : '#visitadas',cancel: ".cancelitem"
        });
        $("#btnRecorrer").click(function() {
          var total = $("#tablero").find("td:eq(0)").text();
          $(this).parents("tr").find("td").eq(1).text();
          alert(total);
          const value = $("#tablero").html();
          //console.log(value);
          var valores="";
          $("#tablero").parents("tr").find("td").each(function(){
            valores+=$("#tablero").html()+"\n";
           // console.log(valores);
        });

          alert(valores);
      });

        $("#envia").click(function () {
           var cadena =[];
            $("#tablero tbody tr").each(function (index) {
               var campo1, campo2;

               $(this).children("td").each(function (index2) {

                if($(this).text()!="INICIO"){
                switch (index2) {
                   case 0:{
                   if($(this).text()!="INICIO")
                   campo0 = $(this).text();
                   break;
               }
                   case 1:{
                    if($(this).text()!="INICIO.JPG")
                   campo1 = $(this).text();
                   break;
               }
                case 2:{
                    if($(this).text()!="INICIO.JPG")
                   campo2 = $(this).text();
                   break;
               }
                  case 3:{
                    if($(this).text()!="INICIO.JPG")
                   campo3 = $(this).text();
                   break;
               }
                case 4:{
                    if($(this).text()!="INICIO.JPG")
                   campo4 = $(this).text();
                   break;
               }

               }
           }
             //  $(this).css("background-color", "#ECF8E0");
           })
             //  console.log(campo1);
               if(campo1!=undefined){
                cadena.push({"Cve":campo0,"nombre":campo1,"ruta":campo2,"rutajpg":campo3,"Enlace":campo4});
           }
           });
            console.log(cadena);
            //console.log("orden="+JSON.stringify(cadena));
        //*ajax iria aqui
    $.ajax({ //metodo ajax
      type: "POST", //aqui puede ser get o post
      url: "ajax/ajaxGuardaorden.php", //la url adonde se va a mandar la cadena a buscar
      data: {orden:JSON.stringify(cadena)},
      cache: false,
      success: function(data)//funcion que se activa al recibir un dato
      {   //  console.log(data);
        
           alert('Se ha llevado acabo la actualización');
        

       // console.log("respuesta:"+data);

//$("#pendientes").append(data);
        //var datas= JSON.parse(data);

    }
});

      //  console.log(cadena);

        });
        $("#enviae").click(function () {
          //  console.log("d");
            var trs=$("#tablero tr").length;
            if(trs>1)
            {
                // Eliminamos la ultima columna
                $("#tablero tr:last").remove();
            }
        });
        $("#tablero").on("click", ".del", function(){
            $(this).parents("tr").remove();



        });
        $("#tablero01").on("click", ".del", function(){
            console.log('Entra tablero01');
         $(this).parents("tr").remove();
         var valor= $(this).parents("tr").find('td').eq(0).text();
            console.log(valor);
            var dataString = 'Img='+ valor; 
                $.ajax({ //metodo ajax
                  type: "GET", //aqui puede ser get o post
                  url: "ajax/ajaxCambiaEstatusImagen.php", //la url adonde se va a mandar la cadena a buscar
                  data: dataString,
                  cache: false,
                  success: function(data)//funcion que se activa al recibir un dato
                  {     
                        console.log(data);       
                            if('Se ha llevado acabo la actualización'==data)
                                {
                                    alert('Se ha llevado acabo la actualización');
                                }
                  }
});



        });

        $("#tablero").on("click", ".del", function(){
            console.log('Entra tablero');
         $(this).parents("tr").remove();
         var valor= $(this).parents("tr").find('td').eq(0).text();
            console.log(valor);
            var dataString = 'Img='+ valor;
                $.ajax({ //metodo ajax
                  type: "GET", //aqui puede ser get o post
                  url: "ajax/ajaxCambiaEstatusImagen.php", //la url adonde se va a mandar la cadena a buscar
                  data: dataString,
                  cache: false,
                  success: function(data)//funcion que se activa al recibir un dato
                  {     
                        console.log(data);       
                            if('Se ha llevado acabo la actualización'==data)
                                {
                                    alert('Se ha llevado acabo la actualización');
                                }
                  }
});

        });

    });

/* #Code for disabling the picked row from the database */
