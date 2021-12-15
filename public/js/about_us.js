
const about_us = {
    scrollTop:null,
    maoTop:false,
     //锚点距离
     maoNumber: 0,
    //锚点特效
    maoAnimate: function () {
        let that = this;
        that.maoTop = true;
        that.aboutNav();
        //锚点滑动
        $('.about-mao').click(function () {
            let $target = $(this.hash);
            $target = $target.length && $target || $('[name=' + this.hash.slice(1) + ']');
            if ($target.length) {
                let targetOffset = $target.offset().top;
                if($(".read-mbx-nav").hasClass("mbx-nav-fixed")) {
                    $('html,body').animate({
                        scrollTop: targetOffset + that.maoNumber
                    },700);
                }else{
                    $('html,body').animate({
                        scrollTop: targetOffset + that.maoNumber - 75
                    },700);
                }
                return false;
            }
        });
    },
    //内导航吸顶
    aboutNav: function () {
        let that = this;
        let top = $(window).scrollTop();
        let aReadNav = $('.read-mbx-nav ul li');
        let aCurrent = $('.read-select');
        let aClass = 'mbx-hover';
        for (let i = 0; i < aCurrent.length - 1; i++) {
            if ((top + 1) >= aCurrent.eq(i).offset().top && top < aCurrent.eq(i + 1).offset().top) {
                aReadNav.eq(i).addClass(aClass).siblings().removeClass(aClass);
            }
        }
        if (top > aCurrent.eq(aCurrent.length - 1).offset().top) {
            aReadNav.eq(aCurrent.length - 1).addClass(aClass).siblings().removeClass(aClass);
        }

        $(window).scroll(function () {
            let top = $(window).scrollTop() + (Math.abs(that.maoNumber) + 1);
            let aCurrent = $('.read-select');
            for (let i = 0; i < aCurrent.length - 1; i++) {
                if ((top + 1) >= aCurrent.eq(i).offset().top && top < aCurrent.eq(i + 1).offset().top) {
                    aReadNav.eq(i).addClass(aClass).siblings().removeClass(aClass);
                }
            }
            if (top > aCurrent.eq(aCurrent.length - 1).offset().top) {
                aReadNav.eq(aCurrent.length - 1).addClass(aClass).siblings().removeClass(aClass);
            }
        })

    },
    //获取TOP
    NavScroll: function () {
        let that = this;
        that.scrollTop = $(window).scrollTop();
        that.NavScrollTop();
        $(window).scroll(function () {
            that.NavScrollTop();
        });
    },
     //判断top值
     NavScrollTop: function () {
        let that = this;
        that.scrollTop = $(window).scrollTop();
        // //大于导航的高度
        // if (that.scrollTop > 115) {
        //     $('.dw-header').addClass('dw-header2');
        //     // $(".header-nav ul li").removeClass("header-hover-nav")
        // } else {
        //     $('.dw-header').removeClass('dw-header2');
        // }
        // let ReadImgH = $('#banner').height() - 75;
        let ReadImgH = $('.dw-banner').height() - $(".dw-header").height();
        if (that.scrollTop > ReadImgH) {
            if (ReadImgH > 0) {
                $('.read-mbx-nav').addClass('mbx-nav-fixed');
            }
        } else {
            if (ReadImgH > 0) {
                $('.read-mbx-nav').removeClass('mbx-nav-fixed');
            }
        }

    },
    aboutSwiper: function () {
        let swiper = new Swiper('.swiper-container', {
            direction: 'horizontal',
            // loop: true,
            // loopAdditionalSlides: 100,
            // navigation: {
            //     nextEl: '.swiper-button-next',
            //     prevEl: '.swiper-button-prev',
            // },
            pagination: {
                el:'.swiper-pagination'
            }
        })
    },
    jobTab:function(){
        $(".job-list").click(function(){
            if($(this).hasClass("cur")){
                $(this).removeClass("cur");
                $(this).find(".job-core-desc").hide()
            } else {
                $(this).addClass("cur").siblings().removeClass("cur");
                $(this).find(".job-core-desc").show()
            }
        })
    },
    addressTab:function(){
        $(".address-cate-li").click(function(){
            $(this).addClass("cur").siblings().removeClass("cur")
            $(".addrress-list").eq($(this).index()).css("display","flex").siblings().hide()
        })
    }

}
$(function(){
    common.WowJs()
    common.closeTips()
    common.addHover()
    about_us.maoAnimate()
    about_us.NavScroll()
    about_us.aboutSwiper()
    about_us.jobTab()
    about_us.addressTab()
})
