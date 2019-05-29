var spremnik = null;
var korID = "";
$(function () {
    var spremnik = $("#popis-zahtjeva");
    var korID = $(spremnik).attr("class");
    korID = parseInt(korID);

    function Dohvati() {
        $.ajax({
            dataType: "xml",
            url: "../ajax/neodgovoreni-zahtjevi.php?korid=" + korID,
            success: function (xml) {
                var html = "";
                $(xml).find("zahtjev").each(function () {
                    var ime = $(this).find("ime").text();
                    var prezime = $(this).find("prezime").text();
                    var korime = $(this).find("korime").text();
                    var opis = $(this).find("opis").text();
                    var lokacija = $(this).find("lokacija").text();
                    var oznacavanje = $(this).find("oznacavanje").text();
                    var marketing = $(this).find("marketing").text();
                    var email = $(this).find("email").text();
                    var id = $(this).find("id").text();
                    html += "<div class='element' id='" + id + "'>";
                    html += "<h2>" + ime + " " + prezime + " (" + korime + ") - " + lokacija + "</h2>";
                    html += "<ul>";
                    html += "<li>Opis zahtjeva: " + opis + "</li>";
                    html += "<li>Odobrava označavanje: " + oznacavanje + "</li>";
                    html += "<li>Odobrava marketing: " + marketing + "</li>";
                    html += "<li>Kontakt: " + email + "</li>";
                    html += "</ul>";
                    html += "<button onclick='OdobriZahtjev(" + id + ")' class='odobri'>Odobri</button>";
                    html += "<button onclick='OdbijZahtjev(" + id + ")' class='odbij'>Odbij</button>";
                    html += "</div>";
                });

                $(spremnik).html(html);
            }
        });
    }

    Dohvati();

    OdobriZahtjev = function (id) {
        $.ajax({
            method: "get",
            url: "../ajax/odobri_odbij.php?odgovor=odobri&id=" + id,
            success: function (rezultat) {
                var element = $("#" + id);
                $(element).css('background-color', "green");
                setTimeout(function () {
                    Dohvati();
                }, 250);
            }
        });
    }

    OdbijZahtjev = function (id) {
        $.ajax({
            method: "get",
            url: "../ajax/odobri_odbij.php?odgovor=odbij&id=" + id,
            success: function (rezultat) {
                var element = $("#" + id);
                $(element).css('background-color', "red");
                setTimeout(function () {
                    Dohvati();
                }, 250);
            }
        });
    }
});