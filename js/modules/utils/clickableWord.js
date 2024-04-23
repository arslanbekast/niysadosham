
export const clickableWord = (article) => {

    const digitReg = /(\d)</;

    if (digitReg.test(article)) {
        const matchArr = article.match(/(\d)</);
        const digitReplacement = matchArr[0].replace(matchArr[1], `<sup>${matchArr[1]}</sup>`);
        article = article.replace(matchArr[0], digitReplacement);
        console.log(article);
    }
    
    const replacement = `<i>хь.</i>: <span class='content__main-word'>$1</span>`;

    // Создаем регулярное выражение, чтобы найти слово между тегами <b> и </b>
    const regex = /<i>хь\.<\/i>: <b>(.*?)<\/b>/gi;

    // Заменяем слово в строке
    const modifiedStr = article.replace(regex, replacement);

    return modifiedStr;
}

// console.log(clickableWord1('<span>[бухавитавала] (<i>хь.</i>: <b>дитадала4</b>)</span>')); 


