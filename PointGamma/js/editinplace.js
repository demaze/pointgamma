$(document).ready(function () {


    $("#submit").click(function () {
       
        
        $.post(
                'http://localhost/Eazy-J-master/PointGamma/utilities/requestAJAXDesc.php', // Un script PHP que l'on va créer juste après

                {
                    desc: $("#desc").val(), // Nous récupérons la valeur de nos inputs                
                    barID: $("#barID").html()

                },
                function (data) {
                    $("#success").html(data);
                },
                "text" // Nous souhaitons recevoir "Success" ou "Failed", donc on indique text !

                );
    });
});
