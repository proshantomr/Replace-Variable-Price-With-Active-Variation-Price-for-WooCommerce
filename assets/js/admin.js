jQuery(document).ready(function($) {
    $('form.variations_form').on('show_variation', function(event, variation) {
        // Get the price element on the page (for single variation price)
        var $priceElement = $('.summary .price');

        // If a variation is selected, update the price with variation price
        if (variation.price_html) {
            $priceElement.html(variation.price_html);
        }
    });

    // Event listener for when no variation is selected or cleared
    $('form.variations_form').on('hide_variation', function() {
        var $priceElement = $('.summary .price');

        // Reset the price to the default variable product price
        var defaultPrice = $priceElement.data('default-price');

        if (defaultPrice) {
            $priceElement.html(defaultPrice);
        }
    });

    // Remove the "Clear" button on variation selection forms
    $('.reset_variations').remove();

});
