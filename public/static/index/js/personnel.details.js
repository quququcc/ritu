

const PersonDetail = {
    getDetail:function(){
        let _this = this;
        let id = common.getQueryString("id")
        ajax_get(host + `/ajax/drillDetail/${id}`,
        true,
        {},
        (res) => {
            res = JSON.parse(res)
            console.log(res)
            const { detail, next, prev } = res
            let arrEntities = {
                'lt': '<',
                'gt': '>',
                'nbsp': ' ',
                'amp': '&',
                'quot': '"'
            };
            detail.content = detail.content.replace(/&(lt|gt|nbsp|amp|quot);/ig, function (all, t) {
                return arrEntities[t]
            })
            $(".details_title h2").text(detail.title)
            $(".data_time span").text(detail.created)
            $(".details_con").html(detail.content)
            $(".pre_item a").attr("href", `news_details.html?id=${prev.id}`)
            $(".pre_item .prevnext_title").text(prev.title)
            $(".next_item a").attr("href", `news_details.html?id=${next.id}`)
            $(".next_item .prevnext_title").text(next.title)
            $(".crumbs span:last-child a").attr("href","personnel.details.html?id=" + detail.id)
            $(".crumbs span:last-child a").text(detail.title)
        },
        err => {
            console.log(err)
        })
    }
}


$(function(){
    common.init()
    common.getContactInfo()
    PersonDetail.getDetail()
})