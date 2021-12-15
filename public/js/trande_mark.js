

const trade_mark = {
    manageTab: function(){
       $(".manage-cate-box").click(function(){
           $(this).addClass("cur").siblings().removeClass('cur')
           $(".manage-main-box").eq($(this).index()).css("display","flex").siblings().hide()
       }) 
    },
    
    initSwiper: () => {
        let swiper = new Swiper('.right-img', {
            direction: 'horizontal',
            loop: true,
            loopAdditionalSlides: 100,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
                renderBullet: function (index, className) {
                    // var str = '';
                    // switch (index) {
                    //     case 0:
                    //         str = `
                    //             <div class="page-img">
                    //                 <img src="../imgs/st.png" alt="st">
                    //             </div>`
                    //         break;
                    //     case 1:
                    //         str = `
                    //             <div class="page-img">
                    //                 <img src="../imgs/st.png" alt="st">
                    //             </div>`
                    //         break;
                    //     case 2:
                    //         str = `
                    //         <div class="page-img">
                    //             <img src="../imgs/st.png" alt="st">
                    //         </div>`
                    //         break;
                    //     case 3:
                    //         str = `
                    //         <div class="page-img">
                    //             <img src="../imgs/st.png" alt="st">
                    //         </div>`
                    //         break;
                    //     case 4:
                    //         str = '*****';
                    //         break;
                    //     case 5:
                    //         str = '*****';
                    //         break;
                    //     case 6:
                    //         str = '*****';
                    //         break;
                    // }
                    let str = `<div class="page-img">
                                    <img src="../imgs/st.png" alt="st">
                                </div>`
                    return '<li class="' + className + '">' + str + '</li>'
                }
            },
        })

        let swiper2 = new Swiper('.manage-img-fee', {
            loop: true, //循环
            observer: true,//修改swiper自己或子元素时，自动初始化swiper
            observeParents: true,//修改swiper的父元素时，自动初始化swiper
            autoplay: {
              disableOnInteraction: false,  //触碰后自动轮播也不会停止
              delay: 2500,
            },
            pagination: {
                el: '.pagination-fee',
            }
        })
        let swiper3 = new Swiper('.manage-img-file', {
            loop: true, //循环
            observer: true,//修改swiper自己或子元素时，自动初始化swiper
            observeParents: true,//修改swiper的父元素时，自动初始化swiper
            autoplay: {
              disableOnInteraction: false,  //触碰后自动轮播也不会停止
              delay: 2500,
            },
            pagination: {
                el: '.pagination-file',
            }
        })
    }
}

$(function(){
    common.WowJs()
    common.addHover()
    common.closeTips()
    trade_mark.manageTab()
    trade_mark.initSwiper()
})