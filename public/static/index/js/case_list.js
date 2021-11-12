


const Cate_list = {
    page:1,
    getList:function(){
        let _this = this;
        ajax_get(host + `/ajax/case/${_this.page}`,
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
        data.forEach(item => {
            str += `<div class="case_list wow fadeInUp d2">
            <div class="case_img">
              <img src="${item.image}" alt="">
            </div>
            <div class="case_text">${item.name}</div>
          </div>`
        });
        $(".case_box").html(str);
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
    common.getConfigInfo()
    common.getNavList()
    common.getBanner("case")
    common.getContactInfo()
    Cate_list.getList()
})