$(function () {
    var korID = $("main").attr("korID");
    var datumPocetak = $("#datum-pocetak");
    var datumKraj = $("#datum-kraj");

    function DohvatiOpremu(datumPocetka = "", datumZavrsetka = "") {
        // console.log(datumPocetka + " - " + datumZavrsetka);
        $.ajax({
            dataType: "xml",
            method: "get",
            url: "../ajax/dostupna-oprema.php?korid=" + korID + "&pocetak=" + datumPocetka + "&kraj=" + datumZavrsetka,
            success: function (xml) {

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

    DohvatiOpremu();
});