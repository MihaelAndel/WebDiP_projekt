$(function () {
    var tipovi = $("#popis-tipova");
    var lokacije = $("#popis-lokacija");
    $.ajax({
        url: "../ajax/dohvati-tipove-opreme.php",
        method: "get",
        dataType: "xml",
        success: function (xml) {
            var html = "";
            $(xml).find("tip").each(function () {
                var id = $(this).find("id").text();
                var naziv = $(this).find("naziv").text();
                html += "<option value='" + id + "'>" + naziv + "</option>";
            });
            $(tipovi).html(html);
        }
    });

    $.ajax({
        url: "../ajax/dohvati-sve-lokacije.php",
        method: "get",
        dataType: "xml",
        success: function (xml) {
            var html = "";
            $(xml).find("lokacija").each(function () {
                var id = $(this).find("id").text();
                var naziv = $(this).find("naziv").text();
                html += "<option value='" + id + "'>" + naziv + "</option>";
            });
            $(lokacije).html(html);
        }
    });

    $("#kreiraj").on("click", function (e) {
        e.preventDefault();
        var Naziv = $("#naziv").val();
        var Nabava = $("#nabavna-cijena").val();
        var Najam = $("#najamna-cijena").val();
        var Tip = $("#popis-tipova").children("option:selected").val();
        var Lokacija = $("#popis-lokacija").children("option:selected").val();
        $.ajax({
            url: "../ajax/kreiraj-opremu.php",
            method: "post",
            data: {
                naziv: Naziv,
                nabava: Nabava,
                najam: Najam,
                tip: Tip,
                lokacija: Lokacija
            },
            success: function (podaci) {
                console.log(podaci);
            },
            complete: function () {
                alert("Uspješno kreirana oprema!");
                console.log(Naziv);
                console.log(Nabava);
                console.log(Najam);
                console.log(Tip);
                console.log(Lokacija);
            }
        });
    });
});