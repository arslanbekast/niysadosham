export const printErrors = (errors) => {
    const errorsDiv = document.createElement('div');
    errorsDiv.className = "errorsWrapper";
    errors.forEach(error => {
        errorsDiv.innerHTML += `<span class="error">${error}</span><br>`;
    });
    jQuery(".content").html(errorsDiv);
}