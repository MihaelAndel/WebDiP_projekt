$(function () {
    var moderatori = $("#popis-moderatora");
    var lokacije = $("#popis-lokacija");

    $.ajax({
        url: "../ajax/dohvati-moderatore.php",
        method: "get",
        dataType: "xml",
        success: function (xml) {
            var html = "";
            $(xml).find("moderator").each(function () {
                var id = parseInt($(this).find("id").text());
                var korime = $(this).find("korime").text();

                html += "<option value=" + id + ">" + korime + "</option>";
            });
            $(moderatori).html(html);
        }
    });

    $.ajax({
        url: "../ajax/dohvati-sve-lokacije.php",
        dataType: "xml",
        method: "get",
        success: function (xml) {
            var html = "";
            $(xml).find("lokacija").each(function () {
                var id = parseInt($(this).find("id").text());
                var korime = $(this).find("naziv").text();

                html += "<option value=" + id + ">" + korime + "</option>";
            });
            $(lokacije).html(html);
        }

    });

    $("#gumb").on("click", function (e) {
        e.preventDefault();
        var idMod = $(moderatori).children("option:selected").val();
        var idLok = $(lokacije).children("option:selected").val();
        $.ajax({
            url: "../ajax/dodijeli-moderatora.php",
            method: "post",
            data: {
                moderator: idMod,
                lokacija: idLok
            },
            success: function (podaci) {
                alert(podaci);
            }
        });
    })
});