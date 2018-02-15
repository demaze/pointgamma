$(document).ready(function () {

    /* On réduit le menu si l'écran est trop petit */

    var largeur;
    var large = true;
    setInterval(
            function () {
                largeur = (document.body.clientWidth);
                if (largeur < 857 && large) {
                    large = false;
                    $("div.menu").css("clip", "rect(0px,10000px,80px,0px)");
                    $("div.menuItem").css("display", "block");
                    $("div.menuItem").hide();
                    $("#logo").show();
                    $("#logo").css("position", "absolute");
                    $("#toggler").show();

                }
                if (largeur >= 857 && !large) {
                    large = true;
                    $("div.menu").css("clip", "rect(0px,10000px,80px,0px)");
                    $("div.menuItem").css("display", "inline-block");
                    $("div.menuItem").show();
                    $("#logo").css("position", "static");
                    $("#toggler").hide();
                }
            }
    , 150);

    $("#toggler").click(function () {
        $("div.menuItem").toggle();
        if ($("div.menuItem").is(":visible")) {
            $("div.menu").css("clip", "rect(0px,10000px,320px,0px)");
        } else {
            $("div.menu").css("clip", "rect(0px,10000px,80px,0px)");
        }
        $("#logo").show();

    });

    $(".contentBar").hide();

    $(".titleBar").click(function () {
        if ($(this).next().is(":hidden")) {
            $(".contentBar").hide();
            $(this).next().show();
        } else {
            $(".contentBar").hide();
        }

    })




});