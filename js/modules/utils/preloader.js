export const preloader = () => {
    const preloader = "<div class='preloader'><img src='img/preloader.gif'></div>";
    jQuery(".content").html(preloader).fadeIn();
}