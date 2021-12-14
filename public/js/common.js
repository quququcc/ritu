const common = {
    WowJs: function () {
        this.WowJsAnimation = new WOW({
            animateClass: 'animated',
            offset: 50
        });
        this.WowJsAnimation.init();
    },
    closeTips: () => {
        let timer = null;
        clearTimeout(timer)
        timer = setTimeout(() => {
            $(".top-tips").remove()
        }, 5000)
    },
    addHover: () => {
        $(".dw-menu>ul>li.drop-down").hover(function () {
            $(this).find('ul').show()
        }, function () {
            $(this).find('ul').hide()
        })
        $(".lang-container").hover(function () {
            $(this).find('ul').show()
        }, function () {
            $(this).find('ul').hide()
        })

    },
    /*
    *窗口滚动到当前元素才显示动画效果
    *classname 当前元素的类名
    *effect     要添加的动效类名 参照网址：https://www.dowebok.com/demo/2014/98/*注：需事先引用好animate.min.css 下载地址：https://pan.baidu.com/s/1ntFjwAt
    */
   then_show:function (classname) {
        $(window).scroll(function(){
            var curr_element = $('.'+classname);
            var active_class = ' wow fadeInUp d2';
            var scroll_h = $(window).scrollTop()+$(window).height();
            var self_top = curr_element.offset().top;
            var self_h = curr_element.height();
            if( (scroll_h > self_top + self_h/2) &&  ( $(window).scrollTop() < self_top + self_h/2) ){
                // 显示动画效果
                curr_element.addClass(active_class);
            }else{
                // 退出动画效果（设置后当重新回到可视区可再次显示动效）
                // 
            
            }
        })
    }
}

