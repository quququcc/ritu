const index = {
    indexSwiper: function () {
        let swiper = new Swiper('.swiper-container', {
            direction: 'horizontal',
            loop: true,
            autoplay : true,
            loopAdditionalSlides: 100,
            // navigation: {
            //     nextEl: '.swiper-button-next',
            //     prevEl: '.swiper-button-prev',
            // },
            pagination: {
                el:'.swiper-pagination'
            }
        })
    },
    industryTab: () =>{
        $(".industry-cate-ul li").click(function(){
            $(this).addClass("cur").siblings("li").removeClass("cur")
            $(".industry-content").eq($(this).index()).css("display","flex").siblings().hide()
        })
    }
    
}

$(function(){
    common.WowJs()
    common.closeTips()
    common.addHover()
    index.indexSwiper()
    index.industryTab()
})