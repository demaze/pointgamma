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
                    $("div.sousMenu").show();
                    $("div.menuItem").hide();
                    $("#logo").show();
                    $("#logo").css("position", "absolute");
                    $("#toggler").show();
                    $("div.sousMenu").css("box-shadow","none");

                }
                if (largeur >= 621 && !large) {
                    large = true;
                    $("div.menuItem").css("display", "inline-block");
                    $("div.sousMenu").hide();
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



    /* Le sous-menu des bars s'affiche
     si on passe la souris dessus */


    $("#bars").mouseenter(function () {
        if (large) {
            $(this).nextAll(".sousMenu").show();
        }
    });

    $("#menubars").mouseleave(function () {
        if (large) {
            $(this).children(".sousMenu").hide();
        }
    });



});