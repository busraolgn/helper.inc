function popupOpenClose(popup) {
    
    /* Add div inside popup for layout if one doesn't exist */
    if ($(".wrapper").length == 0){
        $(popup).wrapInner("<div class='wrapper' ></div>");
        
    }
        //var id=$(popup).data("detail-id");
         //var deneme = document.getElementByID("deneme").value;
         //$(popup).wrapInner("<div class='wrapper' >"+ deneme +"</div>");
       //$(popup).wrapInner(id);
    //<?php $_SESSION["value"] =  ?>+val;
    /* Open popup */
    $(popup).show();
    
    /* Close popup if user clicks on background */
    $(popup).click(function(e) {
        if ( e.target == this ) {
            if ($(popup).is(':visible')) {
                $(popup).hide();
            }
        }
    });

    /* Close popup and remove errors if user clicks on cancel or close buttons */
    $(popup).find("button[name=close]").on("click", function() {
        if ($(".formElementError").is(':visible')) {
            $(".formElementError").remove();
        }
        $(popup).hide();
    });
}

$(document).ready(function () {
    $("[data-js=open]").on("click", function(this.id) { 
        /*var a =document.getElementByID("deneme").value; */
       /* "<?php $_SESSION['popup']= '<script>document.write(' + a + ')</script>' ?>" */
       //var id=$(this).data("detail-id");
        //<?php $_SESSION['popup']= ; ?>
        //$("[data-js=open]").id
        //var id="."+ "<?php echo 1; ?>";
        var div_url= "." + id
        popupOpenClose($(div_url));
    });
});
