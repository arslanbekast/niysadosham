export const clearWord = (word) => {
    word = word.replace(/\d$/gm, '');
    const lettersWithTilda = {'ā':'а', 'ē':'е', 'ō':'о', 'ȳ':'у', 'э̄':'э'}
    const matchesArray = word.match(/[āēōȳ]|э̄/gm);
    if (matchesArray) {
        matchesArray.forEach(match => {
            word = word.replace(match, lettersWithTilda[match])
        });
    }
    return word;
}