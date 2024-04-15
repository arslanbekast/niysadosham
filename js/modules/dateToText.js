import {preloader} from './utils/preloader.js';
import {printErrors} from './utils/printErrors.js';

export const dateToText = (date) => {

    jQuery.ajax({
        type: "POST",
        url: "backend/get_text_for_date.php",
        data: {date},
        beforeSend: preloader,

        success: function(response) {
            response = JSON.parse(response);
            
            let result = "<div class='date-to-text-wrapper'>"
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