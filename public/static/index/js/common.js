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
}