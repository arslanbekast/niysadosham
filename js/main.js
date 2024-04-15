import { getArticleForWord } from "./modules/getArticleForWord.js";
import { getArticleForClearedWord } from "./modules/getArticleForClearedWord.js";
import { getWordsForLetter } from "./modules/getWordsForLetter.js";
import { numberToText } from "./modules/numberToText.js";
import { dateToText } from "./modules/dateToText.js";
import {clearWord} from './modules/utils/clearWord.js';
import {isNumber} from './modules/utils/isNumber.js';
import {isDate} from './modules/utils/isDate.js';

jQuery(document).ready(main);

function main() {

	const alphabet = ['а', 'аь', 'б', 'в', 'г', 'гӀ', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'кх', 'къ', 'кӀ', 'л', 'м', 'н',
                      'о', 'оь', 'п', 'пӀ', 'р', 'с', 'т', 'тӀ', 'у', 'уь', 'ф', 'х', 'хь', 'хӀ', 'ц', 'цӀ', 'ч', 'чӀ', 'ш', 'щ',
                      'ъ','ы','ь', 'э', 'ю', 'юь', 'я', 'яь', 'Ӏ']


	const onInputValue = () => {

		let word = jQuery("#word").val();
		if (!word.includes('Ӏ')) word = word.toLowerCase()
		word = word.trim();
		if (word === '') {
			jQuery("#word").focus();
			return
		}

		if (isDate(word)) {
			dateToText(word);
		} else if (isNumber(word)) {
			numberToText(word)
		} else if (alphabet.includes(word)) {
			getWordsForLetter(word);
		} else {
			word = clearWord(word);
			getArticleForWord(word);
		}
		jQuery(".alphabet-wrapper").slideUp();
		jQuery(".top-container, .about, .footer").hide();

	}

	jQuery(".header__name-link, .header__logo").click((e) => {
		e.preventDefault();
		jQuery("#word").val('');
		jQuery(".search-form__clear-btn").removeClass('show');
		jQuery("#word").removeClass('clear-shown');
		jQuery(".alphabet-wrapper").show();
		jQuery(".content").html("").hide();
		jQuery(".top-container, .about, .footer").show();
	})

	// let timerId;
    jQuery(".search-form__button").click(() => {
		// clearTimeout(timerId);
		onInputValue();
	});

	
	jQuery("#word").keyup((e) => {

		if (e.currentTarget.value.length > 0) {
			jQuery(".search-form__clear-btn").addClass('show');
			jQuery("#word").addClass('clear-shown');
		} else {
			jQuery(".search-form__clear-btn").removeClass('show');
			jQuery("#word").removeClass('clear-shown');
		}
		

		// clearTimeout(timerId);
		if (e.keyCode===13) {
			onInputValue();
			return
		}
		
		// if (e.currentTarget.value.length >= 2) {
		// 	timerId = setTimeout(getArticleForWord, 1000);
		// }

		if (e.currentTarget.value.length === 0) {
			jQuery('.content').html('').fadeOut();
		}

		// if (e.currentTarget.value.length > 0) {
		// 	if (jQuery(window).width() <= 475) {
		// 		jQuery(".alphabet").fadeOut();
		// 	}
		// } else {
		// 	if (jQuery(window).width() <= 475) {
		// 		jQuery(".alphabet").fadeIn();
		// 	}
		// }

	});

	jQuery(document).on('click', ".search-form__clear-btn", function() {
		const doubleLetters = ['аь', 'гӀ', 'кх', 'къ', 'кӀ', 'оь', 'пӀ', 'тӀ', 'уь', 'хь', 'хӀ', 'цӀ', 'чӀ', 'юь', 'яь',]
		const word = jQuery('#word').val();
		
		if (word.length > 0) {
			if (word.length > 1) {
				if (doubleLetters.includes(word.slice(-2))) {
					jQuery('#word').val(word.slice(0, -2));
				} else {
					jQuery('#word').val(word.slice(0, -1));
				}
				
			} else {
				jQuery('#word').val(word.slice(0, -1));
			}
			
		}
		
		if (jQuery('#word').val().length === 0) {
			jQuery(this).removeClass('show');
			jQuery("#word").removeClass('clear-shown');
			jQuery('.content').html('').fadeOut();
		}
		
	});

	jQuery(document).on('click', ".search-form__keyboard-btn", function() {
		jQuery(".alphabet-wrapper").slideToggle();
	});

	jQuery(document).on('click', ".content__word_link", function() {

		jQuery(this).next(".content__article").fadeToggle();
		// const isOpen = jQuery(this).attr('data-open')
		
		// if (isOpen === "true") {
		// 	jQuery(this).attr('data-open', false).next(".content__article").fadeOut();
		// } else {
		// 	jQuery(this).attr('data-open', true).next(".content__article").fadeIn();
		// }
		
	});


	
	alphabet.forEach(item => {
		const html = `<span class="alphabet__letter" data-letter=${item}>${item}</span>`;
		jQuery(".alphabet").append(html);
	})

	jQuery(".alphabet__letter").click(function () {
		const letter = jQuery(this).attr('data-letter');
		// getWordsForLetter(letter);
		const val = jQuery('#word').val();
		jQuery('#word').val(val + letter);
		
		if (jQuery('#word').length > 0) {
			jQuery(".search-form__clear-btn").addClass('show');
			jQuery("#word").addClass('clear-shown');
		} else {
			jQuery(".search-form__clear-btn").removeClass('show');
			jQuery("#word").removeClass('clear-shown');
		}

		// jQuery(".alphabet__letter").removeClass('alphabet__letter_active');
		// jQuery(this).addClass('alphabet__letter_active');
	});

	jQuery(document).on('click', ".content__words-wrapper .content__word", function() {
		const clearedWord = jQuery(this).attr('data-clearedWord');
		jQuery('#word').val(clearedWord);
		getArticleForClearedWord(clearedWord);
		
		jQuery(".alphabet__letter").removeClass('alphabet__letter_active');
	});

	jQuery(document).on('click', ".content__main-word", function() {
		let mainWord = jQuery(this).text();
		mainWord = clearWord(mainWord);
		jQuery('#word').val(mainWord);
		getArticleForClearedWord(mainWord);
		
		jQuery(".alphabet__letter").removeClass('alphabet__letter_active');
	});
}



