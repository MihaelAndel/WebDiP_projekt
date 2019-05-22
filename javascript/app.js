$(function () {
    var tip = $("#tip").html().toString();
    var navigacija = $("#navigacija");
    $.ajax({
        url: "/WebDiP/2018_projekti/WebDiP2018x003/ajax/navigacija.xml",
        dataType: "xml",
        success: function (xml) {
            $(xml).find("izbornik").each(function () {
                var html = "";
                html += '<li class="dropdown" >' +
                    $(this).attr("naziv") +
                    '<div class="dropdown-content">';
                $(this).find("izbor").each(function () {
                    html += '<a href="">' + $(this).attr("naziv") + '</a>';
                })
                html += "</div></li>";
                $(navigacija).append(html);
            });
        }
    })

});