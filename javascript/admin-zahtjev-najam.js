$(function () {
    var popisZahtjeva = $("#popis-zahtjeva");


    function DohvatiZahtjeve() {
        $.ajax({
            url: "../ajax/dohvati-zahtjeve-za-najam.php",
            method: "get",
            dataType: "xml",
            success: function (xml) {
                html = "";

                $(xml).find("zahtjev").each(function () {
                    var id = $(this).find("id").text();
                    var korime = $(this).find("korime").text();
                    var pocetak = $(this).find("pocetak").text();
                    var kraj = $(this).find("kraj").text();

                    html += "<div class='element'>";
                    html += "<h2>Zahtjev #" + id + "</h2>";
                    html += "<ul>";
                    html += "<li>Korisnik: " + korime + "</li>";
                    html += "<li>Početak:" + pocetak + "</li>";
                    html += "<li>Kraj:" + kraj + "</li>";
                    html += "<li>Oprema:";
                    html += "<ul>";
                    $(this).find("popis-opreme").find("naziv").each(function () {
                        html += "<li>" + $(this).text() + "</li>";
                    });

                    html += "</ul>";
                    html += "</li>";

                    html += "</ul>";
                    html += "<button onclick=OdobriZahtjev(" + id + ") class='prihvati'>Odobri</button>";
                    html += "<button onclick=OdbijZahtjev(" + id + ") class='odbij'>Odbij</button>";
                    html += "</div>";
                });

                $(popisZahtjeva).html(html);
            }
        });
    }

    OdbijZahtjev = function (id) {
        $.ajax({
            url: "../ajax/odbij-zahtjev-najam.php",
            method: "post",
            data: {
                zahtjev: id
            },
            success: function () {
                setTimeout(() => {
                    DohvatiZahtjeve();
                }, 1500);
            }

        });
    }

    OdobriZahtjev = function (id) {
        $.ajax({
            url: "../ajax/odobri-zahtjev-najam.php",
            method: "post",
            data: {
                zahtjev: id
            },
            success: function () {
                setTimeout(() => {
                    DohvatiZahtjeve();
                }, 1500);
            }
        });
    }


    DohvatiZahtjeve();
});