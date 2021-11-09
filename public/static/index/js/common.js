const common = {
    Width: $(window).width(),
    Height: $(window).height(),
    WowJsAnimation: null,
    init: function () {
        let _this = this;
        // _this.addEventLit()
        _this.WowJs()
    },
    //动画启动
    WowJs: function () {
        this.WowJsAnimation = new WOW({
            animateClass: 'animated',
            offset: 50
        });
        this.WowJsAnimation.init();
    },
    getBanner: function (sign) {
        let _this = this;
        ajax_get(host + `/ajax/banner/${sign}`,
            true,
            {},
            (res) => {
                res = JSON.parse(res)
                console.log("indexbanner",res)
                if (sign == 'index') {
                    if (res && res.length > 0) {
                        let str = "";
                        res.forEach(item => {
                            str += ` <div class="swiper-slide">
                              <img src="${item.background}" alt="${item.title}">
                              <div class="banner-txt">
                              <div class="banner-title  wow fadeInLeft2">${item.title}</div>
                              <div class="banner-slogan  wow fadeInLeft2">
                              ${item.title_s}
                              </div>
                              <a href="${item.to_url}" class="banner-btn  wow fadeInLeft2">
                                了解详情
                              </a>
                            </div>
                          </div>
                          `
                        })
                        $(".index-banner").html(str)
                        _this.indexSwiper()
                    }
                } else {
                    $("#banner img").attr("src", res.background)
                }
            },
            err => {
                console.log(err)
            }
        );
    },
    getConfigInfo: function () {
        ajax_get(host + `/ajax/config`,
            true,
            {},
            (res) => {
                res = JSON.parse(res)
                console.log(res)
                if (res && res.site_name) {
                    // $(".logo img").attr("src",res.logo_image)
                    // $(".f_l p:nth-child(2)").text()
                    $(".w1200>span").text(res.site_name + " " + res.site_beian + " ")
                    $(".w1200>a").text(res.site_copyright)

                }

            },
            err => {
                console.log(err)
            }
        );
    },

    indexSwiper: function () {
        let swiper = new Swiper('.swiper-container', {
            direction: 'horizontal',
            loop: true,
            spaceBetween: 0,
            loopAdditionalSlides: 100,
            observer: true,
            observeParents: false,
            // navigation: {
            //     nextEl: '.swiper-button-next',
            //     prevEl: '.swiper-button-prev',
            // },
            pagination: {
                el:'.swiper-pagination'
            }
        })
    },
    getQueryString: function (name) {
        let reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)", "i");
        let r = window.location.search.substr(1).match(reg);
        if (r != null) {
            return unescape(r[2]);
        };
        return null;
    },
    getNavList:function(){
        ajax_get(host + `/ajax/trainCate`,
        true,
        {},
        (res) => {
            res = JSON.parse(res)
            console.log(res)
            if(res && res.length >0) {
                let str = ''
                res.forEach(item => {
                    str += `
                    <li>
                        <a href="enterprise_train.html?cateId=${item.id}">${item.name}</a>
                    </li>
                    `
                })
                $(".train-nav").html(str)
            }

        },
        err => {
            console.log(err)
        }
    );
    },
    getContactInfo: function () {
        ajax_get(host + `/ajax/contact`,
            true,
            {},
            (res) => {
                res = JSON.parse(res)
                console.log(res)
                $(".f_l p:last-child").text(res.phone);
            },
            err => {
                console.log(err)
            })
    }
}