$(function () {
    var korID = $("main").attr("korID");
    var datumPocetak = $("#datum-pocetak");
    var datumKraj = $("#datum-kraj");
    var popisOpreme = $("#popis-opreme");
    var popisZahtjeva = $("#popis-zahtjeva");
    var gumb = $("#posalji");
    var poruka = $("#poruka");

    function DohvatiOpremu(datumPocetka = "", datumZavrsetka = "") {
        $.ajax({
            dataType: "xml",
            method: "get",
            url: "../ajax/dostupna-oprema.php?korid=" + korID + "&pocetak=" + datumPocetka + "&kraj=" + datumZavrsetka,
            success: function (xml) {
                var html = "";

                $(xml).find("Oprema").each(function () {
                    var naziv = $(this).find("naziv").text();
                    var id = $(this).find("id").text();

                    html += "<option value='" + id + "'>" + naziv + "</option>";
                });

                $(popisOpreme).html(html);
            }
        });
    }

    function DohvatiZahtjeve() {
        $.ajax({
            dataType: "xml",
            method: "get",
            url: "../ajax/popis-zahtjeva-za-najam.php?korid=" + korID,
            success: function (xml) {
                html = "";

                $(xml).find("zahtjev").each(function () {
                    var id = $(this).find("id").text();
                    var korime = $(this).find("korime").text();
                    var opis = $(this).find("opis").text();

                    html += "<option value='" + id + "'>" + korime + " - " + opis + "</option>";
                });

                $(popisZahtjeva).html(html);
            }
        });
    }

    datumPocetak.change(function () {
        if (datumKraj.val() !== "" && datumKraj.val() > datumPocetak.val()) {
            DohvatiOpremu(datumPocetak.val(), datumKraj.val());
        } else if (datumPocetak.val() > datumKraj.val()) {

        }
    });

    datumKraj.change(function () {
        if (datumPocetak.val() !== "" && datumKraj.val() > datumPocetak.val()) {
            DohvatiOpremu(datumPocetak.val(), datumKraj.val());
        } else if (datumPocetak.val() > datumKraj.val()) {

        }
    });

    $(gumb).click(function () {
        var odabranaOprema = [];
        $(popisOpreme).children("option:selected").each(function () {
            odabranaOprema.push(parseInt($(this).val()));
        });

        if (datumPocetak.val() !== "" && datumKraj.val() !== "" && odabranaOprema.length > 0) {
            // console.log("radi");
            var pocetakNajma = datumPocetak.val();
            var krajNajma = datumKraj.val();
            var zahtjevID = $("#popis-zahtjeva").children("option:selected").val();

            $.ajax({
                dataType: "xml",
                method: "POST",
                data: {
                    pocetak: pocetakNajma,
                    kraj: krajNajma,
                    korid: korID,
                    zid: zahtjevID,
                    oprema: odabranaOprema
                },
                url: '../ajax/posalji-zahtjev-za-najam.php',
                success: function () {
                    $(poruka).html("Uspješno ste poslali svoj zahtjev!");
                    Osvjezi();
                    DohvatiOpremu();
                    DohvatiZahtjeve();
                    setTimeout(() => {
                        $(poruka).html("");
                    }, 3000);
                },
                error: function () {
                    $(poruka).html("Nešto je pošlo po zlu!");
                    setTimeout(() => {
                        $(poruka).html("");
                    }, 3000);
                }
            });
        }
    });

    function Osvjezi() {
        datumPocetak.val("");
        datumKraj.val("");
    }

    DohvatiOpremu();
    DohvatiZahtjeve();
});