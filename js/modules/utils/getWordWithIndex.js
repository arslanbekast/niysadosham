export const getWordWithIndex = (word) => {
    if (isFinite(Number(word[word.length-1]))) {
        const wordEndChar = word[word.length-1];
        word = word.slice(0, word.length-1) + `<sup>${wordEndChar}</sup>`;
    }
    return word;
}