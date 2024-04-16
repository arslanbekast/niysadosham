<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Cache-Control" content="no-cache">
    <link rel="apple-touch-icon" sizes="180x180" href="img/favicons/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/favicons/favicon-16x16.png">
    <link rel="manifest" href="img/favicons/site.webmanifest">
    <link rel="mask-icon" href="img/favicons/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="css/jquery.modal.min.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css?v=<?php echo filectime('css/style.css'); ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <title>НийсаДошам</title>
</head>
<body>
    <!-- Top -->
    <div class="top-container">
        <div class="top">
            <div class="top__logo"><img src="img/logo.svg" alt="Нохчийн Республикин дешаран а, Ӏилманан а министерство"></div>
            <div class="top__text">Нохчийн Республикин дешаран а, Ӏилманан а министерство</div>   
        </div>
    </div>
    
    <div class="container">

        <!-- Шапка -->
        <header class="header">
                <div class="header__logo">
                    <img src="img/logo.png" alt="Нохчийн меттан нийсайаздаран йоккха дошам." />
                </div>
                <div class="header__text">
                    <div class="header__name"><a href="#" class="header__name-link">НийсаДошам</a></div>
                    <div class="header__title-wrapper">
                        <h1 class="header__title">Нохчийн меттан нийсайаздаран онлайн дошам</h1>
                        <a href="#about-modal" class="nav__link" rel="modal:open">НийсаДошамах</a>
                    </div>
                </div>
        </header>

        <!-- Форма поиска -->
        <div class="search-form">
            <div class="search-form__input-wrapper">
                <input type="text" autofocus id="word" placeholder="Дош йа терахь дӀайазде (дд.мм.гггг, 1 сентября)" class="search-form__input">
                <button class="search-form__clear-btn" type="button" title="МогӀа дӀацӀанбе">
                    <!-- <svg viewBox="0 0 32 32" width="20" height="20" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M23.66 6.96 16 14.63 8.32 6.96 6.95 8.33 14.62 16l-7.67 7.67 1.37 1.37 7.67-7.68 7.67 7.68 1.37-1.37L17.36 16l7.67-7.67-1.37-1.37Z" fill="inherit"></path></svg> -->
                    <img src="img/icons/backspaceIcon.png" alt="Backspace"/>
                </button>
                <button class="search-form__keyboard-btn" title="Пилгу">
                    <svg viewBox="0 0 32 32" width="28" height="28" fill="currentColor" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" clip-rule="evenodd" d="M9 9h15a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H9a2 2 0 0 1-2-2V11a2 2 0 0 1 2-2zm-4 2a4 4 0 0 1 4-4h15a4 4 0 0 1 4 4v10a4 4 0 0 1-4 4H9a4 4 0 0 1-4-4V11zm5 4a1 1 0 1 0 0 2h1a1 1 0 1 0 0-2h-1zm3 1a1 1 0 0 1 1-1h1a1 1 0 1 1 0 2h-1a1 1 0 0 1-1-1zm5-1a1 1 0 1 0 0 2h1a1 1 0 1 0 0-2h-1zm3 1a1 1 0 0 1 1-1h1a1 1 0 1 1 0 2h-1a1 1 0 0 1-1-1zm1-5a1 1 0 1 0 0 2h1a1 1 0 1 0 0-2h-1zM9 12a1 1 0 0 1 1-1h1a1 1 0 1 1 0 2h-1a1 1 0 0 1-1-1zm5-1a1 1 0 1 0 0 2h1a1 1 0 1 0 0-2h-1zm3 1a1 1 0 0 1 1-1h1a1 1 0 1 1 0 2h-1a1 1 0 0 1-1-1zm-4 7a1 1 0 1 0 0 2h7a1 1 0 1 0 0-2h-7z" fill="inherit"></path></svg>
                </button>
                <a href="#help-modal" rel="modal:open" class="search-form__help-btn" title="ГӀо оьшу">?</a>
            </div>
            
            <button class="search-form__button">Лаха</button>
        </div>

        <!-- Алфавитный указатель -->
        <div class="alphabet-wrapper"><div class="alphabet"></div></div>
        

        <!-- Контент -->
        <div class="content"></div>

        <div class="about">
            
            <div class="about__instructions">
                <p class="about__instructions-title">Хьехар:</p>
                <ol>
                    <li>ХIокху могIан чу <span class="instructions__img"><img src="img/snapshots/search-form.png?v=<?php echo filectime('js/main.js'); ?>" /></span> масех элп йа цхьа дош йаздина 
                    <span class="instructions__img instructions__search-btn-img"><img src="img/snapshots/search-btn.png?v=<?php echo filectime('js/main.js'); ?>" /></span> тӀетаӀийча, лахахь схьаго карийна дешнаш. 
                        Царах кӀел сиз хьаькхначарна тӀетаӀийча дешнийн кепаш схьаго.</li>
                    <li>Цу могIан чу терахь йа рузман терахь  йаздича, иза текстан кепехь схьаго.</li>
                    <!-- <li>   
                        <img src="img/snapshots/keyboard.png" height="15"/> тӀетаӀича, гучадолу нохчийн маттахь йаздан аьтто бен пилгу:<br/>
                        <span class="instructions__img instructions__alphabet-img"><img src="img/snapshots/alphabet.png" /></span>
                    </li> -->
                </ol>
                <p class="about__instructions-title">Google Chrome чохь НийсаДошам веназ смартфонан экран тӀе муха хӀоттайо?</p>
                <ol>
                    <li>Лакхара аьтту агӀорара кхо тӀадам тӀетаӀабо.</li>
                    <li>«Добавить на гл. экран» тӀетаӀадо.</li>
                    <li>«Добавить» тӀетаӀадо.</li>
                </ol>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-wrapper">
            <div class="footer__text-wrapper">
                <div class="footer__text">&#169; Нохчийн Республикин дешаран а, Ӏилманан а министерство</div>
                <div class="footer__text">&#169; ООО "Дош"</div> 
            </div>
        </div>
    </footer>

    <!-- Модальное окно -->
    <div id="about-modal" class="modal">
        <h2>НийсаДошамах</h2>
        <div class="about__description">
            <p><span class="description__title">НийсаДошам</span> программин база хIокху белхан буха тIехь кечйина йу: Нохчийн меттан нийсайаздаран йокха дошам. / Овхадов М.Р., Халидов А.И., Вагапов Ӏ.Д., Умхаев Хь.С., Ирезиев С.-Хь.С.-Э., Солтаханов И.Э., Абдулкадыров А.Т., Бадаева Ӏ.С., Юнусов Хь.И., Дадаев С.-Хь.П., Султанов З.А. Соьлжа-ГIала. 2023. – 1024 агӀо. </p>
        </div>
        <h3>Программа кечйинарг: ООО «Дош»:</h3>
        <ul>
            <li>Умархаджиев С. М.</li>
            <li>Астемиров А. В.</li>
            <li>Бадаева А. С.</li>
            <li>Израилова Э. С.</li>
            <li>Султанов З. А.</li>
            <li>Хехаев М-С. Л.</li>
            <li>Ясаева М. Л.</li>
        </ul>
    </div>

    <div id="help-modal" class="modal">
        <p>ХӀокху могӀан чу дош йа терахь йаздо:</p>
        <ul>
            <li>дд.мм.гггг</li>
            <li>дд/мм/гггг</li>
            <li>дд-мм-гггг</li>
            <li>1 сентябрь</li>
            <li>1 сентября</li>
        </ul>
    </div>
    <script src="js/jquery-3.7.1.min.js"></script>
    <!-- jQuery Modal -->
    <script src="js/jquery.modal.min.js"></script>
    
    <script src="js/main.js?v=<?php echo filectime('js/main.js'); ?>" type="module"></script>
</body>
</html>