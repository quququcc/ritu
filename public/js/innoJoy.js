

const innoJoy = {
    countUp_num1:null,
    countUp_num2:null,
    countUp_num3:null,
    num:0,
    initNumber:function(){
        countUp_num1 = new CountUp("num1", 0, 105, 0, 3, {
            useEasing: true,
            useGrouping: true,
            separator: ',',
            decimal: '.',
            prefix: '',
            suffix: '+'
        });
        countUp_num2 = new CountUp("num2", 0, 145490099, 0, 3, {
            useEasing: true,
            useGrouping: true,
            separator: ',',
            decimal: '.',
            prefix: '',
            suffix: ''
        });
        countUp_num3 = new CountUp("num3", 0, 203726, 0, 3, {
            useEasing: true,
            useGrouping: true,
            separator: ',',
            decimal: '.',
            prefix: '',
            suffix: ''
        });
        countUp_num1.start();
        countUp_num2.start();
        countUp_num3.start();
    },
    stopNumber:function(){
        countUp_num1.pauseResume();
        countUp_num2.pauseResume();
        countUp_num3.pauseResume();
    },
    /*
    *窗口滚动到当前元素才显示动画效果
    *classname 当前元素的类名
    *effect     要添加的动效类名 参照网址：https://www.dowebok.com/demo/2014/98/*注：需事先引用好animate.min.css 下载地址：https://pan.baidu.com/s/1ntFjwAt
    */
   then_show:function (classname) {
       let _this = this;
        $(window).scroll(function(){
            var curr_element = $('.'+classname);
            var active_class = ' wow fadeInUp d2';
            var scroll_h = $(window).scrollTop()+$(window).height();
            var self_top = curr_element.offset().top;
            var self_h = curr_element.height();
            if( (scroll_h > self_top + self_h/2) &&  ( $(window).scrollTop() < self_top + self_h/2) ){
                // 显示动画效果
                curr_element.addClass(active_class);
                _this.num++
            }else{
                // 退出动画效果（设置后当重新回到可视区可再次显示动效）
            }
            //执行一次数字自增动画就行
            if(_this.num == 1) {
                _this.initNumber()
            }
        })
    },
    initCateTab:function() {
        $(".cate-li").hover(function(){
            $(this).addClass("cur").siblings().removeClass("cur");
            $('.info-content').eq($(this).index()).css("display","flex").siblings().hide()
        })
    }
}

$(function(){
    common.WowJs()
    common.addHover()
    common.closeTips()
    innoJoy.then_show('world-number')
    innoJoy.then_show('world-ads')
    innoJoy.initCateTab()
})