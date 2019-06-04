$(function () {
    var korIme = $("#korime").html();
    console.log(korIme);
    var slike = $("#popis-slika");
    $.ajax({
        url: "../ajax/korisnik-oznacen.php",
        method: "get",
        data: {
            korime: korIme
        },
        success: function (xml) {
            var html = "";
            $(xml).find("slika").each(function () {
                var putanja = "../fotografije/" + $(this).find("putanja").text();
                var opis = $(this).find("opis").text();
                html += "<div>";
                html += "<img src='" + putanja + "'>";
                html += "<p>" + opis + "</p>"
                html += "</div>";
            });

            $(slike).html(html);
        }
    });
});