class loadPage {
    constructor(val1, val2, val3, val4) {
        let container = val1;
        let content = val2;
        let add_before = val3;
        let add_after = val4;

        this.request = function () {
            $.ajax({
                url: content,
                success: function (contentPage) {
                    $(container).empty().append(add_before + contentPage + add_after);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    $("#content").empty().append("Error " + XMLHttpRequest.status);
                }
            });
        };

    }
}
