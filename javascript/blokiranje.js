$(function () {
    var popisKorisnika = $("#popis-korisnika");

    function DohvatiKorisnike() {
        $.ajax({
            url: "../ajax/dohvati-korisnike.php",
            method: "get",
            dataType: "xml",
            success: function (xml) {
                html = "";
                $(xml).find("korisnik").each(function () {
                    var id = $(this).find("id").text();
                    var ime = $(this).find("ime").text();
                    var prezime = $(this).find("prezime").text();
                    var korime = $(this).find("korime").text();
                    var blokiran = $(this).find("blokiran").text();
                    var akcija = "zaključaj";
                    var klasa = "zakljucaj";
                    if (blokiran === "da") {
                        klasa = "otkljucaj";
                        akcija = "otključaj"
                    }

                    html += "<tr>";
                    html += "<td>" + id + "</td>";
                    html += "<td>" + ime + "</td>";
                    html += "<td>" + prezime + "</td>";
                    html += "<td>" + korime + "</td>";
                    html += "<td>" + blokiran + "</td>";
                    html += "<td><button class='" + klasa + "' id='" + id + "'>" + akcija + "</button></td>";
                    html += "</tr>";
                });

                $(popisKorisnika).html(html);
            }
        });
    }

    DohvatiKorisnike();

    $(document).on('click', '.zakljucaj', function (e) {
        var Id = $(this).attr("id");
        console.log(Id);
        $.ajax({
            url: "../ajax/zakljucaj-korisnika.php",
            method: "post",
            data: {
                id: Id
            },
            success: function () {
                alert("Zaključali ste korisnički račun!");
            },
            complete: function () {
                DohvatiKorisnike();
            }
        });
    });

    $(document).on('click', '.otkljucaj', function (e) {
        var Id = $(this).attr("id");
        console.log(Id);
        $.ajax({
            url: "../ajax/otkljucaj-korisnika.php",
            method: "post",
            data: {
                id: Id
            },
            success: function () {
                alert("Otključali ste korisnički račun!");
            },
            complete: function () {
                DohvatiKorisnike();
            }
        });
    });
});