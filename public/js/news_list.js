

const News_list = {
    page:1,
    getList:function(){
        let _this = this;
        ajax_get(host + `/ajax/news/${_this.page}`,
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
            str += `   <li class=" wow fadeInUp d2">
            <div class="news_img">
              <img src="${item.image}" alt="1">
            </div>
            <div class="news_con">
              <div class="news_title">
                <a href="news_details.html?id=${item.id}">${item.title}</a>
              </div>
              <div class="news_intro">
                <p>${item.descript}</p>
              </div>
              <div class="datatime">
                <span>${item.created}</span>
              </div>
            </div>
          </li>`
        });
        $(".news_ul").html(str);
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
    common.getBanner("news")
    common.getContactInfo()
    common.getConfigInfo()
    common.getNavList()
    News_list.getList()
})