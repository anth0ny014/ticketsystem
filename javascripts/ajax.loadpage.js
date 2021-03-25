function loadPage(val1, val2, val3, val4){
    let container   = val1; 
    let content     = val2; 
    let add_before  = val3;
    let add_after   = val4; 

    this.request = function(){
        $.ajax({
            url: content,
            success:function(contentPage){
                $(container).empty().append(add_before + contentPage + add_after);
            },
            error:function(XMLHttpRequest, textStatus, errorThrown){
                $("#content_header").empty().append("Error " + XMLHttpRequest.status);
                $("#content_page").empty().append("<table class=\"container\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\"><tr align=\"center\" valign=\"middle\" height=\"100px\"><td>"+errorThrown+"<br /><div class='reload' onclick='location.reload()'>Reload</div></td></tr></table>");
            }
        });
    }

}