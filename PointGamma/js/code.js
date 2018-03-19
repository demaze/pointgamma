$(document).ready(function () {

    /* On réduit le menu si l'écran est trop petit */

    var largeur;
    var large = 2;
    setInterval(
            function () {
                console.log(largeur);
                console.log(large);
                largeur = (document.body.clientWidth);
                if (largeur < 857 && large !== 0) {
                    large = 0;
                    $("div.menuItem").css("display", "block");
                    $("div.menuItem").hide();
                    $("#logo").show();
                    $("#logo").css("position", "absolute");
                    $("#toggler").show();

                    $(".centerDroit").css("height", "300px");
                    $(".centerGauche").css("height", "300px");
                    $(".logoTitre").css("height", "180px");
                    $(".barreDroite").css("left", "110px");
                    $(".barreDroite").css("top", "-550px");
                    $(".barreGauche").css("right", "40px");
                    $(".barreGauche").css("top", "-610px");
                    $(".barreGauchePetite").css("right", "54px");
                    $(".barreGauchePetite").css("top", "-510px");

                } else if (largeur >= 857 && largeur < 1170 && large !== 1) {
                    large = 1;
                    $("div.menuItem").css("display", "inline-block");
                    $("div.menuItem").show();
                    $("#logo").css("position", "static");
                    $("#toggler").hide();
                    $(".imgInActif").css("width", "170px");
                    $(".imgActif").css("width", "170px");

                    $(".centerDroit").css("height", "400px");
                    $(".centerGauche").css("height", "400px");
                    $(".logoTitre").css("height", "240px");
                    $(".barreDroite").css("left", "150px");
                    $(".barreDroite").css("top", "-590px");
                    $(".barreGauche").css("right", "70px");
                    $(".barreGauche").css("top", "-630px");
                    $(".barreGauchePetite").css("right", "70px");
                    $(".barreGauchePetite").css("top", "-590px");

                    $(".containerVideo").css("width", "65%");

                }
                else if (largeur >= 1170 && large !== 2) {
                    large = 2;
                    $("div.menuItem").css("display", "inline-block");
                    $("div.menuItem").show();
                    $("#logo").css("position", "static");
                    $("#toggler").hide();
                    $(".imgInActif").css("width", "250px");
                    $(".imgActif").css("width", "250px");

                    $(".centerDroit").css("height", "500px");
                    $(".centerGauche").css("height", "500px");
                    $(".logoTitre").css("height", "300px");
                    $(".barreDroite").css("left", "190px");
                    $(".barreDroite").css("top", "-630px");
                    $(".barreGauche").css("right", "110px");
                    $(".barreGauche").css("top", "-670px");
                    $(".barreGauchePetite").css("right", "90px");
                    $(".barreGauchePetite").css("top", "-680px");

                    $(".containerVideo").css("width", "65%");
                }


            }
    , 150);

    $("#toggler").click(function () {
        $("div.menuItem").toggle();
        if ($("div.menuItem").is(":visible")) {
            $(".pageContainer").hide();
        } else {
            $("#containerhome").show();
        }
        $("#logo").show();

    });


    $(".pageContainer").hide();
    $("#containerhome").show();
    $(".imgActif").hide();


    $(".menuItem").click(function () {
        if (!large) {
            $("div.menuItem").toggle();
            $("#logo").show();
        }
        $(".pageContainer").hide();
        $("#container" + $(this).attr('id')).show();
        $(".imgActif").hide();
        $(".imgInActif").show();
        $("#" + $(this).attr('id') + "inactif").hide();
        $("#" + $(this).attr('id') + "actif").show();
        if ($(this).attr('id') === 'bars') {
            $(".descriptionBar").hide();
            $("#presentationBars").show();
        }

    });



    $(".titleBar").click(function () {
        $(".descriptionBar").hide();
        $(".titleBar").css("color", "#000099");
        $(".titleBar").css("border-color", "#000099");

        $(this).css("color", "black");
        $(this).css("border-color", "black");
        idDesc = $(this).attr('id') + "desc";
        $("[id='" + idDesc + "']").show();
    });






});