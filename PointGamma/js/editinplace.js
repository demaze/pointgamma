$(document).ready(function () {

    $("#descBarModifier").click(function () {
        $("#divDescBar").hide();
        $("#divDescBarMod").show();
    });

    $("#descBarEnregistrer").click(function () {

        $.post(
                //ADRESSE A CHANGER
                'http://localhost/PointGamma/utilities/requestAJAXDesc.php', // Un script PHP que l'on va créer juste après

                {
                    desc: $("#descBarMod").val(), // Nous récupérons la valeur de nos inputs                
                    barID: $("#barID").html()

                },
                function (data) {
                    if(data=='Success'){
                        $("#descBar").html($("#descBarMod").val());
                    }
                    $("#divDescBar").show();
                    $("#divDescBarMod").hide();

                },
                "text" // Nous souhaitons recevoir "Success" ou "Failed", donc on indique text !

                );
    });
});
