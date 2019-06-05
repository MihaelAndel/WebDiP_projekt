$(function () {
    $("#kreiraj").on("click", function (e) {
        e.preventDefault();
        var Naziv = $("#naziv").val();
        var Regija = $("#regija").val();
        var Zupanija = $("#zupanija").val();
        $.ajax({
            url: "../ajax/kreiraj-lokaciju.php",
            method: "post",
            data: {
                naziv: Naziv,
                regija: Regija,
                zupanija: Zupanija
            },
            complete: function () {
                alert("Uspješno kreirana lokacija!");
            }
        });
    });
});