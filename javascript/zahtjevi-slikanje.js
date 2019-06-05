$(function () {
    var popisLokacija = $("#lokacija");
    var forma = $("#forma");
    var korIme = $("#korime").html();
    var oznaci = false;
    var marketing = false;

    $("input[name=marketing]").change(function () {
        if ($("input[name=marketing]").is(":checked")) {
            marketing = true;
        } else {
            marketing = false;
        }
    });

    $("input[name=oznacavanje]").change(function () {
        if ($("input[name=oznacavanje]").is(":checked")) {
            oznaci = true;
        } else {
            oznaci = false;
        }
    });

    $.ajax({
        url: "../ajax/dohvati-sve-lokacije.php",
        dataType: "xml",
        method: "get",
        success: function (xml) {
            var html = "";

            $(xml).find("lokacija").each(function () {
                var id = $(this).find("id").text();
                var naziv = $(this).find("naziv").text();

                html += "<option value='" + id + "'>" + naziv + "</option>";
            });

            $(popisLokacija).html(html);
        }
    });

    $(forma).on("submit", function (e) {
        e.preventDefault();
        console.log($("textarea[name=opis-slike]").val());
        console.log($(lokacija).children("option:selected").val());
        $.ajax({
            url: "../ajax/posalji-zahtjev-za-slikanje.php",
            method: "post",
            data: {
                'korime': korIme,
                'lokacija': $(lokacija).children("option:selected").val(),
                'opis-slike': $("textarea[name=opis-slike]").val(),
                'oznacavanje': oznaci,
                'marketing': marketing

            },

            success: function () {
                alert("Uspješno ste poslali zahtjev!");
            }

        });
    });

});