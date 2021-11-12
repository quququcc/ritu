
const TrainObj = {
    cateId: 0,
    page: 1,
    getTrainList: function () {
        let _this = this;
        _this.cateId = common.getQueryString("cateId") || _this.cateId
        ajax_get(host + `/ajax/train/${_this.cateId}/${_this.page}`,
            true,
            {},
            (res) => {
                res = JSON.parse(res)
                console.log(res)
                if (res.list && res.list.length > 0) {
                    _this.renderHtml(res.list)
                    _this.page = res.page
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
            str += `<div class="train-box  wow fadeInUp d2">
            <div class="train-img">
                <a href="train_detail.html?id=${item.id}"> <img src="${item.image}" alt=""></a>
            </div>
            <div class="train-txt">
                <a href="train_detail.html?id=${item.id}">${item.title}</a>
            </div>
            <div class="train-desc">
                ${item.descript}
            </div>
            </div>`
        });
        $(".section_crumbs").after(str);
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


$(function () {
    common.init()
    common.getBanner("train")
    common.getNavList()
    common.getConfigInfo()
    common.getContactInfo()
    TrainObj.getTrainList()
})