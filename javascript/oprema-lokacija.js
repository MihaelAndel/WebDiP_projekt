$(function () {
    var lokacijaIzbor = $("#lokacija-izbor");
    var listaOpreme = $("#lista-opreme");

    $(lokacijaIzbor).change(function () {
        var izabranaLokacija = $(lokacijaIzbor).children("option:selected").val();
        $.ajax({
            method: "get",
            url: "../ajax/oprema-prema-lokaciji.php?lokacija=" + izabranaLokacija,
            success: function (sadrzaj) {
                $(listaOpreme).html(sadrzaj);
            }
        });
    });
});