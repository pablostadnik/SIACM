function realizaProceso(){

       
        $("#verz").hide();

        $.ajax({

            

                url:   'consulta5.php',

                type:  'post',

                beforeSend: function () {

                        $("#resultado").html("Procesando, espere por favor...");

                },

                success:  function (response) {

                        $("#resultado").html(response);

                }

        });

}

function realizaProceso2(){

       
        $("#verz").hide();

        $.ajax({

            

                url:   'consulta7.php',

                type:  'post',

                beforeSend: function () {

                        $("#resultado").html("Procesando, espere por favor...");

                },

                success:  function (response) {

                        $("#resultado").html(response);

                }

        });

}
