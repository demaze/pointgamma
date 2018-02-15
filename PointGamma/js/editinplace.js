//script js gerant la modification de la description du bar, et utilisant AJAX
$(document).ready(function () {

    //passe de l'affichage de la description à sa modification dans une textbox
    $("#descBarModifier").click(function () {
        $("#divDescBar").hide(); 
        $("#divDescBarMod").show();
    });

    //enregistre la nouvelle description et l'affiche 
    $("#descBarEnregistrer").click(function () {

        //envoi de la nouvelle description au serveur, qui effectue la requete SQL et renvoie 
        $.post( 
                //ADRESSE A CHANGER
                'utilities/requestAJAXDesc.php', // Un script PHP que l'on va créer juste après

                {
                    desc: $("#descBarMod").val(), // Nous récupérons la valeur de nos inputs                
                    barID: $("#barID").html()

                },
                function (data) { //verifie que tout s'est bien passé (success), et le cas échéant change l'affichage
                    if(data==='Success'){
                        $("#descBar").html($("#descBarMod").val());
                    }
                    $("#divDescBar").show();
                    $("#divDescBarMod").hide();

                },
                "text" // Nous souhaitons recevoir "Success" ou "Failed", donc on indique text

                );
    });
});