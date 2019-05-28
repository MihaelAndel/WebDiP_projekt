$(function () {
    var tip = $("#tip").html().toString();
    tip = tip.trim();
    var index = "..";
    if ($("body").attr("id") === "index") {
        index = ".";
    }

    $.ajax({
        url: index + "/ajax/navigacija.xml",
        dataType: "xml",
        success: function (xml) {
            $(xml).find("izbornik").each(function () {
                var html = "";
                if ($(this).attr("uloge").indexOf(tip) !== -1) {

                    html += '<li class="dropdown">' + $(this).attr("naziv") +
                        '<div class="dropdown-content">';

                    $(this).find("izbor").each(function () {

                        if ($(this).attr("uloge").indexOf(tip) >= 0) {
                            html += '<a href="' + index + $(this).attr("href") + '">' +
                                $(this).attr("naziv") + '</a>';
                        }
                    })
                }
                html += "</div></li>";
                $(navigacija).append(html);
            });
        }
    })

});