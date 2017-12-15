$(document).ready(function () {

    /* On réduit le menu si l'écran est trop petit */


    var largeur;
    var large = true;


    setInterval(
            function () {
                largeur = (document.body.clientWidth);
                if (largeur < 621 && large) {
                    large = false;
                    $("div.menuItem").css("display", "block");
                    $("div.menuItem").hide();
                    $("#logo").show();
                    $("#logo").css("position", "absolute");
                    $("#toggler").show();

                }
                if (largeur >= 621 && !large) {
                    large = true;
                    $("div.menuItem").css("display", "inline-block");
                    $("div.menuItem").show();
                    $("#logo").css("position", "static");
                    $("#toggler").hide();
                }
            }
    , 150);

    $("#toggler").click(function () {
        $("div.menuItem").toggle();
        $("#logo").show();

    });

});