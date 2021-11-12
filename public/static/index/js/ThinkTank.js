

const ThinkTak = {
    page:1,
    getList:function(){
        let _this = this;
        ajax_get(host + `/ajax/think/${_this.page}`,
        true,
        {},
        (res) => {
            res = JSON.parse(res)
            console.log(res)
            if(res.list && res.list.length >0){
                _this.renderHtml(res.list)
                _this.page = res.page;
                _this.renderPageHtml(res)
            }
        },
        err => {
            console.log(err)
        })
    },
    renderHtml(data) {
        let str = "";
        data.forEach((item,index) => {
            str += `<li class=" wow fadeInUp d2">
            <div class="number">${index+1}</div>
            <div class="datatime"><span>${item.created}</span></div>
            <div class="name">
              <a href="thinkTank_detail.html?id=${item.id}">${item.title}</a>
            </div>
            <div class="intro">
              <p>${item.descript}</p>
            </div>
          </li>`
        });
        $(".thinkTank_ul").html(str);
    },
    renderPageHtml: function (res) {
        let _this = this;
        $('.page-lable-wrap').pagination({
            pageCount: res.page_num,
            current: _this.page,
            coping: false,
            jump: false,
            coping: true,
            homePage: '首页',
            endPage: '末页',
            prevContent: '上页',
            nextContent: '下页',
            callback: function (api) {
                console.log(api)
                _this.page = api.getCurrent()
                _this.getList(_this.page)
            }
        });

    }
}


$(function(){
    common.init()
    common.getContactInfo()
    common.getNavList()
    common.getConfigInfo()
    common.getBanner("think")
    ThinkTak.getList()
})