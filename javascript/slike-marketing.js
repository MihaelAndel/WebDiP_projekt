$(function () {
    var popisZahtjeva = $("#zahtjev");
    var popisOpreme = $("#oprema");
    var korime = $("#korime").html();
    var forma = $("#forma");
    var checkbox = $("#oznaci");
    var lokacije = [];

    $.ajax({
        url: "../ajax/dohvati-lokaciju.php?korime=" + korime,
        method: "get",
        dataType: "xml",
        success: function (xml) {
            $(xml).find("lokacija").each(function () {
                lokacije.push($(this).text());
            });
            lokacije = lokacije.join(',');
            DohvatiZahtjeve();
            DohvatiOpremu();
        }
    });

    function DohvatiZahtjeve() {
        $.ajax({
            url: "../ajax/dohvati-zahtjeve-marketing.php",
            data: {
                popisLokacija: lokacije
            },
            method: "get",
            dataType: "xml",
            success: function (xml) {
                var html = "";
                $(xml).find("zahtjev").each(function () {
                    var id = parseInt($(this).find("id").text());
                    var opis = $(this).find("opis").text();
                    var korime = $(this).find("korime").text();
                    var oznaci = parseInt($(this).find("oznacavanje").text());
                    html += "<option value=" + id + " oznaci=" + oznaci + ">" + korime + " - " + opis + "</option>";

                });
                $(popisZahtjeva).html(html);
            }
        });
    }

    function DohvatiOpremu() {
        $.ajax({
            url: "../ajax/dohvati-opremu-za-zahtjev.php",
            method: "get",
            dataType: "xml",
            success: function (xml) {
                html = "";
                $(xml).find("oprema").each(function () {
                    var id = $(this).find("id").text();
                    var naziv = $(this).find("naziv").text();
                    html += "<option value='" + id + "'>" + naziv + "</option>";
                });

                $(popisOpreme).html(html);
            }
        });
    }

    $(forma).on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: "../ajax/postavi-sliku.php",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            method: "post",
            success: function (podaci) {
                console.log(podaci);
                alert("Uspješno ste prenijeli sliku!");
                DohvatiOpremu();
                DohvatiZahtjeve();
            }
        });
    });

    $(popisZahtjeva).change(function () {
        var oznaci = $(popisZahtjeva).children("option:selected").attr("oznaci");
        if (oznaci === "1") {
            $(checkbox).removeAttr("disabled");
        } else {
            $(checkbox).attr("disabled", "disabled");
            $(checkbox).prop("checked", false);
        }
    })

});