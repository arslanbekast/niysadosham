
export const highlightWord = (article, articleForSearch, patterns) => {
    article = article.replaceAll('э̄', 'Э')
    let wordsArr = [];
    patterns[0].forEach((word) => {
        const wordPos = articleForSearch.indexOf(word);
        const wordFromArticle = article.slice(wordPos, wordPos + word.length);
        wordsArr.push(wordFromArticle);
        
    });
    wordsArr.forEach(word => {
        article = article.replace(word, `<span class="selection-word">${word}</span>`)
    })

    patterns[1].forEach(p => {
        article = article.replaceAll('<span class="selection-word">'+p, p+'<span class="selection-word">')  
    })
    patterns[3].forEach(p => {
        article = article.replaceAll(p+'</span>', '</span>'+p) 
    })

    
    
    article = article.replaceAll('Э', 'э̄')

    return article;
} 