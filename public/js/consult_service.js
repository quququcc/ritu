

const consult_service = {
    manageTab: function(){
        $(".manage-cate-box").click(function(){
            $(this).addClass("cur").siblings().removeClass('cur')
            $(".manage-main-box").eq($(this).index()).css("display","flex").siblings().hide()
        }) 
     },
     initSwiper: () => {
        let swiper = new Swiper('.swiper-container', {
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
    }
}

$(function(){
    common.WowJs()
    common.closeTips()
    common.addHover()
    consult_service.manageTab()
    consult_service.initSwiper()
})