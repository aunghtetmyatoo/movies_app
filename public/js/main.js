$(window)
    .resize(function () {
        var width = $(window).width();
        if (width < 960) {
            $(".mySwiper").removeClass("mySwiper").addClass("mySwiper-mobile");
        }
    })
    .resize();

var swiper = new Swiper(".mySwiper", {
    slidesPerView: 5,
    spaceBetween: 30,
    autoplay: {
        delay: 5500,
        disableOnInteraction: false,
    },
    loop: false,
    loopFillGroupWithBlank: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
var swiper = new Swiper(".mySwiper-mobile", {
    slidesPerView: 3,
    spaceBetween: 30,
    autoplay: {
        delay: 5500,
        disableOnInteraction: false,
    },
    loop: false,
    loopFillGroupWithBlank: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
var swiper = new Swiper(".mySwiper-cast", {
    slidesPerView: 4,
    spaceBetween: 15,
    autoplay: {
        delay: 5500,
        disableOnInteraction: false,
    },
    loop: false,
    loopFillGroupWithBlank: false,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
var swiper = new Swiper(".mySwiper-trailer", {
    slidesPerView: 1,
    spaceBetween: 15,
    loop: false,
    loopFillGroupWithBlank: false,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});

let stars = document.querySelector(".stars");
if (typeof stars != "undefined" && stars != null) {
    let stars_infScroll = new InfiniteScroll(stars, {
        // options
        path: "/stars/page/@{{#}}",
        append: ".col",
        history: true,
        status: ".page-load-status",
    });
}

let movies = document.querySelector(".movies");
if (typeof movies != "undefined" && movies != null) {
    let movies_infScroll = new InfiniteScroll(movies, {
        // options
        path: "/movies/page/@{{#}}",
        append: ".col",
        history: true,
        status: ".page-load-status",
    });
}

let tv_shows = document.querySelector(".tv_shows");
if (typeof tv_shows != "undefined" && tv_shows != null) {
    let tv_shows_infScroll = new InfiniteScroll(tv_shows, {
        // options
        path: "/tv_shows/page/@{{#}}",
        append: ".col",
        history: true,
        status: ".page-load-status",
    });
}

//Get the button
const mybutton = document.getElementById("btn-back-to-top");

if (typeof mybutton != "undefined" && mybutton != null) {
    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function () {
        scrollFunction();
    };

    function scrollFunction() {
        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    // When the user clicks on the button, scroll to the top of the document
    mybutton.addEventListener("click", backToTop);

    function backToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
}
