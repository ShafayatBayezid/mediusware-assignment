const test_p_save = (view) => {
    let jQuerypostData = ""
    if (jQuery(view).prop('checked')==true){
        jQuerypostData = "true"
    }else{
        jQuerypostData = "false"
    }
    let jQuerypost_data = {'action': 'test_p_save', 'data': jQuerypostData};

    jQuery.ajax({
        url: ajaxurl, type: "POST", data: jQuerypost_data,
        success: function (data) {
            console.log(data)
            var obj = JSON.parse(data);
            if (obj.status == 'true') {
                console.log("Save")
            } else {
                console.log("Try Again")
            }
        }
    });

  
}