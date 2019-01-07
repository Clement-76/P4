$(function () {    
    $(".arrow.bottom").on("click", function () {
        if (window.innerWidth > 768) {
            let blogOffsetTop = $("#blog").offset().top;
            let newBlogOffsetTop = blogOffsetTop;
            let scroll = 0; 
            
            while (scroll - newBlogOffsetTop <= 0) {
                scroll++;
                if (scroll < 500) {
                    newBlogOffsetTop = blogOffsetTop - (scroll - scroll % 2) / 2;
                }
            }

            $("html, body").animate({
                scrollTop: scroll
            }, 1000);
        } else {
            let blogOffsetTop = $("#blog").offset().top;
            
            $("html, body").animate({
                scrollTop: blogOffsetTop
            }, 1000);
        }
    });

    $(window).on("scroll", function (e) {
        containerTranslate();
        hamburger_color();
    });
    
    hamburger_color();
    containerTranslate();
    
    /**
     * translate the container of the blog and footer according to the scroll value
     */
    function containerTranslate() {
        if (window.innerWidth > 768) {
            if (window.scrollY < 500) {
                let value = (window.scrollY - window.scrollY % 2) / 2;
                $('.container').css("transform", `translateY(-${value}px)`);
            } else {
                $('.container').css("transform", `translateY(-250px)`);
            }
        } else {
            $('.container').css("transform", "none");
        }
    }
    
    /**
     * change the color of the hamburger menu according to the scroll value
     */
    function hamburger_color () {
        if (window.innerWidth <= 768) {
            // the value of scroll where the color change
            let value = $("#home").height() - parseFloat($(".hamburger_menu").css("top")) - parseFloat($(".hamburger_menu").css("padding-top"));

            if (window.scrollY > value) {
                $(".hamburger_menu div").css("background-color", "#1e364e");
            } else {
                $(".hamburger_menu div").css("background-color", "#fff")
            }
        } else {
            $(".hamburger_menu div").css("background-color", "#fff");
        }
    }
});
