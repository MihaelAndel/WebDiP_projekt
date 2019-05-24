$(function () {
    var ime = $("#ime");
    var prezime = $("#prezime");
    var lblIme = $("#lblIme");
    var korime = $("#korisnicko-ime");
    var lozinka = $("#lozinka");
    var lozinkaP = $("#ponovljena-lozinka");
    var lblLozinka = $("#lblLozinka");
    var lblKorime = $("#lblKorime");
    var email = $("#email");
    var gumb = $("#submit");
    var regexEmail = new RegExp(/^(\w|(\w\.\w)|\w\.)+@(?=\w*\.)(\w|(\.\w\w)|(\w\.\w\w))+$/);
    var regexIme = new RegExp(/^[A-Z]+\w*/);

    $(ime).change(function () {
        if ($(this).val().length !== 0) {

            if (regexIme.test($(this).val())) {
                lblIme.css({
                    "display": "none"
                });
                $(this).removeClass("krivi-unos");
            } else {
                lblIme.css({
                    "display": "inline-block"
                });
                lblIme.html("Krivi format imena/prezimena!");
                $(this).addClass("krivi-unos");
            }
        }
    });

    $(prezime).change(function () {
        if ($(this).val().length !== 0) {
            if (regexIme.test($(this).val())) {
                lblIme.css({
                    "display": "none"
                });
                $(this).removeClass("krivi-unos");
            } else {
                lblIme.css({
                    "display": "inline-block"
                });
                lblIme.html("Krivi format imena/prezimena!");
                $(this).addClass("krivi-unos");
            }
        }
    });

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
        }
    });

    $(email).change(function () {
        if ($(this).val().length !== 0) {

            if (regexEmail.test($(this).val())) {
                $(gumb).removeAttr("disabled");
                $(this).removeClass("krivi-unos");
            } else {
                $(gumb).attr("disabled", "disabled");
                $(this).addClass("krivi-unos");
                alert("Email adresa nije dobrog formata!");
            }
        }
    });

    $(korime).change(function () {
        if ($(this).val().length !== 0) {
            if ($(this).val().length < 4) {
                $(gumb).attr("disabled", "disabled");
                $(this).addClass("krivi-unos");
                $(lblKorime).css({
                    "display": "inline-block"
                });
                $(lblKorime).html("Koriničko ime mora imati barem šest znakova!");
            } else {
                $(lblKorime).css({
                    "display": "none"
                });
                $.ajax({
                    url: "../php/provjera-korime.php?korime=" + korime.val(),
                    success: function (podaci) {
                        if (podaci === "1") {
                            $(lblKorime).css({
                                "display": "inline-block"
                            });
                            $(lblKorime).html("Korisnik s ovim korisničkim imenom već postoji!");
                            $(korime).addClass("krivi-unos");
                            $(gumb).attr("disabled", "disabled");
                        } else {
                            $(lblKorime).css({
                                "display": "none"
                            });
                            $(gumb).removeAttr("disabled");
                            $(korime).removeClass("krivi-unos");
                        }
                    }
                });
            }
        }
    });
});