
function test_update_variation(view, variation_value, type){

    jQuery(view).parent().find(".item").removeClass("active")
    jQuery(view).addClass("active")

    if(type === "color"){
        jQuery('#pa_color').val( variation_value).trigger("change")
    }else if(type === "size"){
        jQuery('#pa_size').val( variation_value).trigger("change")
    }


    jQuery('.variations_form').trigger('woocommerce_variation_has_changed');
}