

const Person = {
    page:1,
    getList:function(){
        let _this = this;
        ajax_get(host + `/ajax/drill/${_this.page}`,
        true,
        {},
        (res) => {
            res = JSON.parse(res)
            console.log(res)
           _this.renderHtml(res.list)
           _this.page = res.page
           _this.renderPageHtml(res)
        },
        err => {
            console.log(err)
        })
    },
    renderHtml(data){
        let str = ''
        data.forEach(item => {
            str += `<div class="personal-box wow fadeInUp d2">
            <div class="personal-img">
              <a href="personnel_details.html?id=${item.id}">
                <img src="${item.image}" alt="">
              </a>
            </div>
            <div class="personal-txt">
              <div class="personal-title">
                <a href="personnel_details.html?id=${item.id}">
                  ${item.title}</a>
              </div>
              <div class="personal-date">
                ${item.created}
              </div>
              <div class="personal-desc">
                ${item.descript}
              </div>
            </div>
          </div>`
        });
        $(".section_crumbs").after(str)
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
                _this.getTrainList(_this.page)
            }
        });

    }
}


$(function(){
    common.init()
    common.getContactInfo()
    Person.getList()
})