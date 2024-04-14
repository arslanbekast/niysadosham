import {getWordWithIndex} from './getWordWithIndex.js';
import {highlightWord} from './highlightWord.js';
import {clickableWord} from './clickableWord.js';

export const printResult = (wordsArray, articleOpen=false) => {
    let result = '';
    wordsArray.forEach(item => {
        const word = getWordWithIndex(item.word);
        let article = item.article;
        
        if (item.notMainWord) {
            const articleForSearch = item.article_for_search
            
            article = highlightWord(article, articleForSearch, item.pattern);
            article = clickableWord(article);
            result += `<p class="content__article content__word-p">
                        <span class="content__word">${word}</span> ${article && `<span>${article}</span>`} </p>`;
            
        } else {
            article = clickableWord(article);
            result += `<p class="content__word-p">
                        <span class="content__word ${article && 'content__word_link'}" data-open=${articleOpen ? "true" : "false"}>${word}</span> 
                        ${article && `<span class="content__article ${articleOpen ? "" : "content__article_hide"}">${article}</span>`}</p>`;
        }

    });
    return result;
}