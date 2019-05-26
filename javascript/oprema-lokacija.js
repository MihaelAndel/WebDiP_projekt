$(function () {
    var lokacijaIzbor = $("#lokacija-izbor");
    var listaOpreme = $("#lista-opreme");

    $(lokacijaIzbor).change(function () {
        var izabranaLokacija = $(lokacijaIzbor).children("option:selected").val();
        $.ajax({
            method: "get",
            dataType: "xml",
            url: "../ajax/oprema-prema-lokaciji.php?lokacija=" + izabranaLokacija,
            success: function (xml) {
                html = "";
                $(xml).find("oprema").each(function () {
                    var poveznica = $(this).find("naziv").attr("poveznica");
                    var nazivOpreme = $(this).find("naziv").text();
                    var tipOpreme = $(this).find("tip").text();
                    var nabavnaCijena = $(this).find("nabava").text();
                    var najamnaCijena = $(this).find("najam").text();
                    var poveznicaLokacije = $(this).find("lokacija").attr("poveznica");
                    var nazivLokacije = $(this).find("lokacija").text();

                    html += "<div class='element'>";
                    html += "<a href='" + poveznica + "'>";
                    html += "<h2>" + nazivOpreme + " - " + tipOpreme + "</h2></a>";
                    html += "<ul>";
                    html += "<li>Nabavna cijena: " + nabavnaCijena + "</li>";
                    html += "<li>Najamna cijena: " + najamnaCijena + "</li>";
                    html += "<li>Lokacija: <a href='" + poveznicaLokacije + "'>";
                    html += "<b>" + nazivLokacije + "</b>"
                    html += "</a></li>"
                    html += "</ul></div>";
                });
                $(listaOpreme).html(html);
            }
        });
    });
});