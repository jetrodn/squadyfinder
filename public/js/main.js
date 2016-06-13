/*============================================
 Author: Vladimir Rodin
 Twitter: @heyhihellbro
 ============================================*/

/*============================================
 Animated number counter on Home Page Slider
 ============================================*/
$('.count').each(function () {
    $(this).prop('Counter', 0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});

/*============================================
 Disable selection on the page
 ============================================*/
(function ($) {
    $.fn.disableSelection = function () {
        return this
            .attr('unselectable', 'on')
            .css('user-select', 'none')
            .on('selectstart', false);
    };
})(jQuery);

var isSelectionDisabled = false;
/* Set false for debugging mode */
if (isSelectionDisabled === true) {
    $('body').disableSelection();
}

$(document).ready(function () {

    var docHeight = $(window).height();
    var footerHeight = $('#footer').height();
    var footerTop = $('#footer').position().top + footerHeight;

    if (footerTop < docHeight) {
        $('#footer').css('margin-top', (docHeight - footerTop) + 'px');
    }
});


function countChar(val, max) {
    var len = val.value.length;
    $("#max").text("(" + max + ")");
    if (len >= max) {
        val.value = val.value.substring(0, max);
    } else {
        $('#charNum').text(max - len);
    }

    $("#characters").text("Символы: " + len);

}

jQuery(document).ready(function ($) {

    $('.cd-popup-trigger').on('click', function (event) {
        event.preventDefault();
        $('.cd-popup').addClass('is-visible');
    });

    $('.cd-popup-trigger-subscribe').on('click', function (event) {
        event.preventDefault();
        $('.cd-popup').addClass('is-visible');
    });

    //close popup
    $('.cd-popup').on('click', function (event) {
        if ($(event.target).is('.cd-popup-close') || $(event.target).is('.cd-popup')) {
            event.preventDefault();
            $(this).removeClass('is-visible');
        }
    });

    $('.cd-popup').on('click', function (event) {
        if ($(event.target).is('.popup-close') || $(event.target).is('.cd-popup')) {
            event.preventDefault();
            $(this).removeClass('is-visible');
        }
    });

    $('.cd-popup-trigger').trigger('click');

    //close popup when clicking the esc keyboard button
    $(document).keyup(function (event) {
        if (event.which == '27') {
            $('.cd-popup').removeClass('is-visible');
        }
    });
});


jQuery(document).ready(function ($) {
    $("#checkSpecialization input:checkbox").change(function () {
        if ($("#checkSpecialization input:checkbox:checked").length > 0) {
            $(".buttons ").html('<input type="submit" class="btn btn-success" value="Подтвердить"> <input type="reset" class="btn btn-danger" value="Сбросить">');
        } else if ($("#checkSpecialization input:checkbox:checked").length == 0) {
            $(".buttons ").html('');
        }
    });


    $("#checkSpecialization input:checkbox").change(function () {
        var len = $(".selected-specs").length;
        len += $("#checkSpecialization input:checkbox:checked").length;
        //не более 4ех специализаций
        if (len > 4) {
            $("#checkSpecialization input:checkbox:checked").prop('checked', false);
        }
    });
});


jQuery(document).ready(function ($) {
    var len = $(".selected-specs").length;

    for (var i = 0; i < len; i++) {
        // console.log($(".selected-specs")[i].innerHTML);

        if (($(".selected-specs")[i].innerHTML == "frontend")) {
            $("#checkSpecialization input:checkbox#frontend").attr("disabled", true);
            $("#checkSpecialization label[for='frontend']").css('color', 'gray');
        } else if (($(".selected-specs")[i].innerHTML == "backend")) {
            $("#checkSpecialization input:checkbox#backend").attr("disabled", true);
            $("#checkSpecialization label[for='backend']").css('color', 'gray');
        } else if (($(".selected-specs")[i].innerHTML == "designer")) {
            $("#checkSpecialization input:checkbox#designer").attr("disabled", true);
            $("#checkSpecialization label[for='designer']").css('color', 'gray');
        } else if (($(".selected-specs")[i].innerHTML == "teamlead")) {
            $("#checkSpecialization input:checkbox#teamlead").attr("disabled", true);
            $("#checkSpecialization label[for='teamlead']").css('color', 'gray');
        } else if (($(".selected-specs")[i].innerHTML == "database")) {
            $("#checkSpecialization input:checkbox#database").attr("disabled", true);
            $("#checkSpecialization label[for='database']").css('color', 'gray');
        } else if (($(".selected-specs")[i].innerHTML == "seo")) {
            $("#checkSpecialization input:checkbox#seo").attr("disabled", true);
            $("#checkSpecialization label[for='seo']").css('color', 'gray');
        } else if (($(".selected-specs")[i].innerHTML == "marketer")) {
            $("#checkSpecialization input:checkbox#marketer").attr("disabled", true);
            $("#checkSpecialization label[for='marketer']").css('color', 'gray');
        } else if (($(".selected-specs")[i].innerHTML == "tester")) {
            $("#checkSpecialization input:checkbox#tester").attr("disabled", true);
            $("#checkSpecialization label[for='tester']").css('color', 'gray');
        } else if (($(".selected-specs")[i].innerHTML == "contentmanager")) {
            $("#checkSpecialization input:checkbox#contentmanager").attr("disabled", true);
            $("#checkSpecialization label[for='contentmanager']").css('color', 'gray');
        }
    }

});


/*==========================================
 Плавная прокрутка по якорям с слайдера команды
 ============================================*/
$('a.anchor').click(function () {
    $('html, body').animate({
        scrollTop: $($(this).attr('href')).offset().top
    }, 1500);
    return false;
});


/*==========================================
 Подписка на имейл
 ============================================*/
$(document).ready(function () {

    // $.get('test-laravel-ajax', function () {
    //     console.log('response');
    // });

    $('a#subscribeAction').click(function () {
        emailSubscribe();
    });

    function emailSubscribe() {

        var requestUrl = "email-subscribe";
        var email = $('input[name="subscribe"]').val();
        var csrftoken = $('input[name="_token"]').val();

        $.ajax({
            type: "POST",
            url: requestUrl,
            cache: false,
            data: {
                'email': email,
                'X-CSRFToken': csrftoken
            },
            beforeSend: function (request) {
                return request.setRequestHeader('X-CSRF-Token', csrftoken)
            },
            success: function () {
                $(".cd-popup-container p").html('Вы успешно оформили подписку!');
                $("#subscribeAction").addClass("popup-close");
                $("#subscribeAction").html("Закрыть окно");
            }
        });
    }
});

/*==========================================
 Подсказки при вводе имени
 ============================================*/
function showNameHint(str) {
    var xhttp;
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    }
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (xhttp.readyState == 4 && xhttp.status == 200) {
            document.getElementById("txtHint").innerHTML = xhttp.responseText;
        }
    };
    xhttp.open("GET", "get-hint/" + str, true);
    xhttp.send();
}


/*==========================================
 Дополнительные настройки - Скрывать имейл
 ============================================*/
$(document).ready(function () {

    var requestUrl;
    var csrftoken = $('input[name="_token"]').val();


    function showEmailFunction(temp) {
        requestUrl = "show-email";
        if (temp) {
            $.ajax({
                type: "POST",
                url: requestUrl,
                cache: false,
                data: {
                    'show-value': true,
                    'X-CSRFToken': csrftoken
                },
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', csrftoken)
                },
                success: function () {

                }
            });
        } else {
            $.ajax({
                type: "POST",
                url: requestUrl,
                cache: false,
                data: {
                    'show-value': false,
                    'X-CSRFToken': csrftoken
                },
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', csrftoken)
                },
                success: function () {

                }
            });
        }
    }


    $('#show_email').click(function () {
        if ($("#show_email").is(":checked")) {
            showEmailFunction(true);
        } else {
            showEmailFunction(false);
        }
    });
});


/*==========================================
 Дополнительные настройки - Геолокационные
 результаты
 ============================================*/
$(document).ready(function () {

    var requestUrl;
    var csrftoken = $('input[name="_token"]').val();


    function geoResultsFunction(temp) {
        requestUrl = "geo-results";
        if (temp) {
            $.ajax({
                type: "POST",
                url: requestUrl,
                cache: false,
                data: {
                    'show-value': true,
                    'X-CSRFToken': csrftoken
                },
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', csrftoken)
                },
                success: function () {

                }
            });
        } else {
            $.ajax({
                type: "POST",
                url: requestUrl,
                cache: false,
                data: {
                    'show-value': false,
                    'X-CSRFToken': csrftoken
                },
                beforeSend: function (request) {
                    return request.setRequestHeader('X-CSRF-Token', csrftoken)
                },
                success: function () {

                }
            });
        }
    }


    $('#geo_results').click(function () {
        if ($("#geo_results").is(":checked")) {
            geoResultsFunction(true);
        } else {
            geoResultsFunction(false);
        }
    });
});


/*==========================================
 AJAX | Запрос на удаление нотификации
 ============================================*/
$(document).ready(function () {


    function deleteNotification() {
        var requestUrl = 'delete-notification';
        var notifId = $("#delete-notification-id").text();
        // console.log(requestUrl);
        // console.log(notifId);

    }


    $("#delete-notification").click(function () {
        deleteNotification();
    });


});

function checkRegisterPassLen() {
    var value = $('input#password-field').val();

    if (value.length < 6) {
        $("#password-check-len").addClass('ion-close-circled');
        $("#password-check-len").css('color', 'red');
    } else if (value.length >= 6) {
        $("#password-check-len").removeClass();
        $("#password-check-len").addClass('ion-checkmark-circled');
        $("#password-check-len").css('color', 'green');

    }
}

function checkRegisterPass() {
    var value = $('input#password-field').val();
    var conf_value = $('input#password-confirmation-field').val();

    if (value != conf_value) {
        $("#password-check-conf").addClass('ion-close-circled');
        $("#password-check-conf").css('color', 'red');
    } else if (value == conf_value) {
        $("#password-check-conf").removeClass();
        $("#password-check-conf").addClass('ion-checkmark-circled');
        $("#password-check-conf").css('color', 'green');
    }
}

function checkFullName() {
    var value = $('input#name-field').val();
    if (value.length < 5) {
        $("#name-check-len").addClass('ion-close-circled');
        $("#name-check-len").css('color', 'red');
    } else if (value.length >= 5) {
        $("#name-check-len").removeClass();
        $("#name-check-len").addClass('ion-checkmark-circled');
        $("#name-check-len").css('color', 'green');

    }
}

function checkEmailRegister(str) {
    var value = $('input#email-field').val();
    // console.log(value == "");
    validateEmail(value);

}

function validateEmail(email) {
    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if (!emailReg.test(email) || email == "") {
        $("#email-check-len").addClass('ion-close-circled');
        $("#email-check-len").css('color', 'red');
    } else {
        $("#email-check-len").removeClass();
        $("#email-check-len").addClass('ion-checkmark-circled');
        $("#email-check-len").css('color', 'green');
    }
}

/*==========================================
 Разные глобальные объявления и функции
 ============================================*/
$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();


});


/*==========================================
 Функция, позволяющая показывать пароли при
 его изменении
 ============================================*/
$(document).ready(function () {

    $('#showPassword').mouseover(function () {
        $('input#password-field-check').get(0).type = "text";
    }).mouseout(function () {
        $('#password-field-check').get(0).type = "password";
    });

    $('#showPasswordNew').mouseover(function () {
        $('input#password-field-new').get(0).type = "text";
    }).mouseout(function () {
        $('#password-field-new').get(0).type = "password";
    });

    $('#showPasswordOld').mouseover(function () {
        $('input#password-field-old').get(0).type = "text";
    }).mouseout(function () {
        $('#password-field-old').get(0).type = "password";
    })


});


/*==========================================
 Доступ к Cookie
 ============================================*/
(function (factory) {
    if (typeof define === 'function' && define.amd) {
        define(['jquery'], factory);
    } else if (typeof exports === 'object') {
        module.exports = factory(require('jquery'));
    } else {
        factory(jQuery);
    }
}(function ($) {

    var pluses = /\+/g;

    function encode(s) {
        return config.raw ? s : encodeURIComponent(s);
    }

    function decode(s) {
        return config.raw ? s : decodeURIComponent(s);
    }

    function stringifyCookieValue(value) {
        return encode(config.json ? JSON.stringify(value) : String(value));
    }

    function parseCookieValue(s) {
        if (s.indexOf('"') === 0) {
            // This is a quoted cookie as according to RFC2068, unescape...
            s = s.slice(1, -1).replace(/\\"/g, '"').replace(/\\\\/g, '\\');
        }

        try {
            // Replace server-side written pluses with spaces.
            // If we can't decode the cookie, ignore it, it's unusable.
            // If we can't parse the cookie, ignore it, it's unusable.
            s = decodeURIComponent(s.replace(pluses, ' '));
            return config.json ? JSON.parse(s) : s;
        } catch (e) {
        }
    }

    function read(s, converter) {
        var value = config.raw ? s : parseCookieValue(s);
        return $.isFunction(converter) ? converter(value) : value;
    }

    var config = $.cookie = function (key, value, options) {

        // Write

        if (arguments.length > 1 && !$.isFunction(value)) {
            options = $.extend({}, config.defaults, options);

            if (typeof options.expires === 'number') {
                var days = options.expires, t = options.expires = new Date();
                t.setMilliseconds(t.getMilliseconds() + days * 864e+5);
            }

            return (document.cookie = [
                encode(key), '=', stringifyCookieValue(value),
                options.expires ? '; expires=' + options.expires.toUTCString() : '', // use expires attribute, max-age is not supported by IE
                options.path ? '; path=' + options.path : '',
                options.domain ? '; domain=' + options.domain : '',
                options.secure ? '; secure' : ''
            ].join(''));
        }

        // Read

        var result = key ? undefined : {},
        // To prevent the for loop in the first place assign an empty array
        // in case there are no cookies at all. Also prevents odd result when
        // calling $.cookie().
            cookies = document.cookie ? document.cookie.split('; ') : [],
            i = 0,
            l = cookies.length;

        for (; i < l; i++) {
            var parts = cookies[i].split('='),
                name = decode(parts.shift()),
                cookie = parts.join('=');

            if (key === name) {
                // If second argument (value) is a function it's a converter...
                result = read(cookie, value);
                break;
            }

            // Prevent storing a cookie that we couldn't decode.
            if (!key && (cookie = read(cookie)) !== undefined) {
                result[name] = cookie;
            }
        }

        return result;
    };

    config.defaults = {};

    $.removeCookie = function (key, options) {
        // Must not alter options, thus extending a fresh object...
        $.cookie(key, '', $.extend({}, options, {expires: -1}));
        return !$.cookie(key);
    };

}));


/*==========================================
 Видео слайдер
 ============================================*/
$(document).ready(function () {

    scaleVideoContainer();

    initBannerVideoSize('.video-container .poster img');
    initBannerVideoSize('.video-container .filter');
    initBannerVideoSize('.video-container video');

    $(window).on('resize', function () {
        scaleVideoContainer();
        scaleBannerVideoSize('.video-container .poster img');
        scaleBannerVideoSize('.video-container .filter');
        scaleBannerVideoSize('.video-container video');
    });

});


/*==========================================
 Вычисляем высоту слайдера под монитор клиента
 ============================================*/
function scaleVideoContainer() {

    var height = $(window).height() - $('.header-section').height();
    var unitHeight = parseInt(height) + 'px';
    $('.homepage-hero-module').css('height', unitHeight);

}

function initBannerVideoSize(element) {

    $(element).each(function () {
        $(this).data('height', $(this).height());
        $(this).data('width', $(this).width());
    });

    scaleBannerVideoSize(element);

}

function scaleBannerVideoSize(element) {

    var windowWidth = $(window).width(),
        windowHeight = $(window).height() + 5,
        videoWidth,
        videoHeight;

    // console.log(windowHeight);

    $(element).each(function () {
        var videoAspectRatio = $(this).data('height') / $(this).data('width');

        $(this).width(windowWidth);

        if (windowWidth < 1000) {
            videoHeight = windowHeight;
            videoWidth = videoHeight / videoAspectRatio;
            $(this).css({'margin-top': 0, 'margin-left': -(videoWidth - windowWidth) / 2 + 'px'});

            $(this).width(videoWidth).height(videoHeight);
        }

        $('.homepage-hero-module .video-container video').addClass('fadeIn animated');

    });
}

jQuery(document).ready(function ($) {
    if ($('.floating-labels').length > 0) floatLabels();

    function floatLabels() {
        var inputFields = $('.floating-labels .cd-label').next();
        inputFields.each(function () {
            var singleInput = $(this);
            //check if user is filling one of the form fields
            checkVal(singleInput);
            singleInput.on('change keyup', function () {
                checkVal(singleInput);
            });
        });
    }

    function checkVal(inputField) {
        ( inputField.val() == '' ) ? inputField.prev('.cd-label').removeClass('float') : inputField.prev('.cd-label').addClass('float');
    }

});


/*==========================================
 Masonry JQuery
 ============================================*/
var $container = jQuery('#team-content-all');
$container.masonry({
    itemSelector: '.grid-item',
});


/*==========================================
 Поиск по командам, открытие поиска
 ============================================*/
$(document).ready(function () {
    $('#search-team-button').click(function () {
        $('.search-options').addClass('animated fadeIn');
        $('.search-options').css('display', 'block');
        $('#search-team-button').css('display', 'none');
    });

    $('#search-team-button-close').click(function () {
        $('.search-options').css('display', 'none');
        $('#search-team-button').css('display', 'block');
    });

});

function triggerTeamSearch() {
    $('#search-team-button').click();
}