import {getWordWithIndex} from './utils/getWordWithIndex.js';
import {preloader} from './utils/preloader.js';
import {printErrors} from './utils/printErrors.js';
import {printResult} from './utils/printResult.js';

export const getArticleForClearedWord = (clearedWord) => {

    if (clearedWord === '') {
        return
	}

    jQuery.ajax({
        type: "POST",
        url: "backend/get_article_for_cleared_word.php",
        data: {clearedWord},
        beforeSend: preloader,
        success: function(response) {
            response = JSON.parse(response);
            if (!response.errors.length) {
                let result = ""
                
                if (response.words && response.words.length) {
                    result += printResult(response.words, true);
                }
                jQuery(".content").html(result);
            } else {
                printErrors(response.errors)
            }

        
            jQuery(".alphabet__letter").removeClass('alphabet__letter_active');
            
        }
    });

}