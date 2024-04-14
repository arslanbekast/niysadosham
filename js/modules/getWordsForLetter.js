import {getWordWithIndex} from './utils/getWordWithIndex.js';
import {clearWord} from './utils/clearWord.js';
import {preloader} from './utils/preloader.js';
import {printErrors} from './utils/printErrors.js';

export const getWordsForLetter = (letter) => {

    if (letter === '') {
        return
	}

    jQuery.ajax({
        type: "POST",
        url: "backend/get_words_for_letter.php",
        data: {letter},
        beforeSend: preloader,

        success: function(response) {
            response = JSON.parse(response);
            if (!response.errors.length) {
                const wordsWrapper = document.createElement('div');
                wordsWrapper.className = 'content__words-wrapper';
                jQuery(".content").html(wordsWrapper);
                response.words.forEach(item => {
                    const word = getWordWithIndex(item.word);
                    const clearedWord = clearWord(item.word);
                    jQuery('.content__words-wrapper').append(`<span class="content__word content__word_link" data-clearedWord="${clearedWord}">${word}</span>`);
                });
                jQuery(".content").html(wordsWrapper);
            } else {
                printErrors(response.errors)
            }
            
        }
    });

}