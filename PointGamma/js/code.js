$(document).ready(function () {

    /* On réduit le menu si l'écran est trop petit */

    var largeur;
    var large = true;
    setInterval(
            function () {
                largeur = (document.body.clientWidth);
                if (largeur < 857 && large) {
                    large = false;
                    $("div.menuItem").css("display", "block");
                    $("div.menuItem").hide();
                    $("#logo").show();
                    $("#logo").css("position", "absolute");
                    $("#toggler").show();
                    $(".centerDroit").css("height", "300px");
                    $(".centerGauche").css("height", "300px");
                    $(".containerVideo").css("width", "100%");

                }
                if (largeur >= 857 && !large) {
                    large = true;
                    $("div.menuItem").css("display", "inline-block");
                    $("div.menuItem").show();
                    $("#logo").css("position", "static");
                    $("#toggler").hide();
                    $(".centerDroit").css("height", "500px");
                    $(".centerGauche").css("height", "500px");
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


    $(".menuItem").click(function () {
        if (!large) {
            $("div.menuItem").toggle();
            $("#logo").show();
        }
        $(".pageContainer").hide();
        $("#container" + $(this).attr('id')).show();
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