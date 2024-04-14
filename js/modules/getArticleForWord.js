import {getWordWithIndex} from './utils/getWordWithIndex.js';
import {clearWord} from './utils/clearWord.js';
import {highlightWord} from './utils/highlightWord.js';
import {preloader} from './utils/preloader.js';
import {printErrors} from './utils/printErrors.js';
import {printResult} from './utils/printResult.js';

export const getArticleForWord = (word) => {

    jQuery.ajax({
        type: "POST",
        url: "backend/get_article.php",
        data: {word},
        beforeSend: preloader,

        success: function(response) {
            response = JSON.parse(response);
            if (!response.errors.length) {
                let result = ""
                
                // Вывод слов как есть
                if (response.words && response.words.length) {
                    result += printResult(response.words);
                }
                
                // Вывод похожих слов
                if (response.suggestedWords && response.suggestedWords.length) {
                    const wordsCount = response.suggestedWords.length;
                    let suggestedWordsTitle = `<strong>"${word}"</strong> дош дошам тӀехь дац, амма цунах тера ${wordsCount>1?'дешнаш':'дош'} ду`;
                    
                    if (response.words.length) {
                        suggestedWordsTitle = wordsCount>1 ? 'Тера дешнаш' : 'Тера дош';
                    }
                    
                    result += `<p class="suggested-words-title">${suggestedWordsTitle}:</p>`;

                    result += printResult(response.suggestedWords); 
                }

                // Вывод слов, начинающихся с введенных символов
                if (response.startingWords && response.startingWords.length) {
                    const wordsCount = response.startingWords.length;
                    let startingWordsTitle = `<strong>"${word}"</strong> тӀера дуьйлало ${wordsCount>1 ? 'дешнаш' : 'дош'}`;
                    
                    result += `<p class="suggested-words-title">${startingWordsTitle}:</p>`;

                    result += printResult(response.startingWords); 
                }

                jQuery(".content").html(result);
            } else {
                printErrors(response.errors)
            }

        
            jQuery(".alphabet__letter").removeClass('alphabet__letter_active');
            
        }
    });
}