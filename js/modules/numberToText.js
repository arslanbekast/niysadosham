import {preloader} from './utils/preloader.js';
import {printErrors} from './utils/printErrors.js';

export const numberToText = (number) => {

    jQuery.ajax({
        type: "POST",
        url: "backend/get_text_for_number.php",
        data: {number},
        beforeSend: preloader,

        success: function(response) {
            response = JSON.parse(response);
            
            let result = "<div class='number-to-text-wrapper'>"
            if (!response.errors.length) {
                response.text.forEach(text => {
                    result += `<p>${text}</p>`;
                });
                result += "</div>"
                jQuery(".content").html(result);
            } else {
                printErrors(response.errors)
            }
            
        }
    });

}