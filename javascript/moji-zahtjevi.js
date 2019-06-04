$(function () {
    var korIme = $("#korime").html();
    var zahtjevi = $("#popis-zahtjeva");
    console.log(korIme);
    $.ajax({
        url: "../ajax/dohvati-moje-zahtjeve.php",
        data: {
            korime: korIme
        },
        dataType: "xml",
        method: "get",
        success: function (xml) {
            html = "";
            $(xml).find("zahtjev").each(function () {
                var id = parseInt($(this).find("id").text());
                var lokacija = $(this).find("lokacija").text();
                var opis = $(this).find("opis").text();
                var oznaci = $(this).find("oznacavanje").text();
                var marketing = $(this).find("oznacavanje").text();
                var klasa = $(this).find("klasa").text();
                var status = $(this).find("status").text();

                html += "<div class='element " + klasa + "'>";
                html += "<h2>Zahtjev #" + id + "</h2>";
                html += "<ul>";
                html += "<li>Lokacija: " + lokacija + "</li>";
                html += "<li>Opis zahtjeva: " + opis + "</li>";
                html += "<li>Dozvola označavanja: " + oznaci + "</li>";
                html += "<li>Dozvola marketinga: " + marketing + "</li>";
                html += "<li>Status: <span class='" + klasa + "'>" + status + "</span></li>";
                html += "</ul>";
                html += "</div>";
            });
            $(zahtjevi).html(html);
        }
    });
});