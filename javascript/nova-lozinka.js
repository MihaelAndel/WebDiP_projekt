$(function () {
    var lozinka = $("#lozinka");
    var lozinkaP = $("#lozinkaP");
    var lblLozinka = $("#lblLozinka");

    $(lozinka).change(function () {
        if ($(this).val().length !== 0) {
            if ($(this).val().length < 6) {
                $(lblLozinka).css({
                    "display": "inline-block"
                });
                $(lblLozinka).html("Lozinka mora imati barem šest znakova!");
                $(this).addClass("krivi-unos");
                $(gumb).attr("disabled", "disabled");
            } else {
                $(lblLozinka).css({
                    "display": "none"
                });
                $(this).removeClass("krivi-unos");
                if ($(lozinkaP).val().length !== 0) {
                    if ($(this).val() !== $(lozinkaP).val()) {
                        $(this).addClass("krivi-unos");
                        $(lozinkaP).addClass("krivi-unos");
                        $(lblLozinka).css({
                            "display": "inline-block"
                        });
                        $(lblLozinka).html("Lozinke nisu jednake!");
                    } else {
                        $(lblLozinka).css({
                            "display": "none"
                        });
                        $(lozinkaP).removeClass("krivi-unos");
                        $(this).removeClass("krivi-unos");
                    }
                }
            }
        }
    });

    $(lozinkaP).change(function () {
        if ($(this).val().length !== 0) {
            if ($(this).val().length >= 6 && $(lozinka).val().length >= 6) {

                if ($(this).val() !== $(lozinka).val()) {
                    $(this).addClass("krivi-unos");
                    $(lozinka).addClass("krivi-unos");
                    $(lblLozinka).css({
                        "display": "inline-block"
                    });
                    $(lblLozinka).html("Lozinke nisu jednake!");
                } else {
                    $(lblLozinka).css({
                        "display": "none"
                    });
                    $(lozinka).removeClass("krivi-unos");
                    $(this).removeClass("krivi-unos");
                }
            } else {
                $(lblLozinka).css({
                    "display": "inline-block"
                });
                $(lblLozinka).html("Lozinka mora imati barem šest znakova!");
                $(this).addClass("krivi-unos");
                $(gumb).attr("disabled", "disabled");
            }
        }
    });
});