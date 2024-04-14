import {clearWord} from './clearWord.js';

export const clickableWord = (article) => {
    
    const replacement = `<i>хь.</i>: <span class='content__main-word'>$1</span>`;

    // Создаем регулярное выражение, чтобы найти слово между тегами <b> и </b>
    const regex = /<i>хь\.<\/i>: <b>(.*?)<\/b>/gi;

    // Заменяем слово в строке
    const modifiedStr = article.replace(regex, replacement);

    return modifiedStr;
}

// console.log(clickableWord('<span>[бухавитавала, бухайитайала, бухабитабала] (<i>хь.</i>: <b><span class="selection-word">дитадала</span></b>)</span>')); 


