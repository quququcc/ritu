
const indexObj = {
    getIndexInfo: function () {
        ajax_get(host + `/ajax/banner/index`,
            true,
            {},
            (res) => {
                res = JSON.parse(res)
                console.log(res)
            },
            err => {
                console.log(err)
            })
    },
    getPersonList: function () {
        let _this = this;
        ajax_get(host + `/ajax/drill/1`,
            true,
            {},
            (res) => {
                res = JSON.parse(res)
                console.log(res)
                if (res.list && res.list.length > 0) {
                    let str = ''
                    res.list.forEach(item => {
                        str += `
                        <div class="course-box  wow fadeInUp d2">
                        <div class="course-img">
                        <a hef="personnel_details.html?id=${item.id}">
                            <img src="${item.image}" alt="">
                        </a>
                        </div>
                        <div class="course-title">
                            <a href="personnel_details.html?id=${item.id}"> ${item.title}</a>
                        </div>
                    </div>`
                    })
                    $(".section3-content").html(str);
                }

            },
            err => {
                console.log(err)
            })
    },
    getTeamList: function () {
        let _this = this;
        ajax_get(host + `/ajax/team`,
            true,
            {},
            (res) => {
                res = JSON.parse(res)
                console.log(res)
                if (res && res.length > 0) {
                    let str = ''
                    res.forEach((item, index) => {
                        if (index < 4) {
                            str += `<div class="team-box  wow fadeInUp d2">
                        <div class="team-img">
                          <img src="${item.photo}" alt="">
                        </div>
                        <div class="team-title">
                          ${item.name}
                        </div>
                        <div class="team-desc">`
                            if (index == 0) {
                                str += `<span>${item.identity}：${item.name}</span>`
                            } else {
                                str += `<span>${item.name}</span>`
                            }
                            str += `<p>
                            ${item.introduce}
                          </p>
                        </div>
                      </div>`
                        }
                    })
                    $(".section4-content").html(str)
                }
            },
            err => {
                console.log(err)
            })
    },
    getcaseList: function () {
        ajax_get(host + `/ajax/case/1`,
            true,
            {},
            (res) => {
                res = JSON.parse(res)
                console.log(res)
                if (res.list && res.list.length > 0) {
                    let str = '';
                    res.list.forEach(item => {
                        str += `<div class="case-box  wow fadeInUp d2">
                    <img src="${item.image}" alt="">
                  </div>`
                    })
                    $(".section5-content").html(str)
                }
            },
            err => {
                console.log(err)
            })
    },
    getNewsList: function () {
        ajax_get(host + `/ajax/news/1`,
            true,
            {},
            (res) => {
                res = JSON.parse(res)
                console.log(res)
                if (res.list && res.list.length > 0) {
                    let str = '';
                    let str2 = '';
                    res.list.forEach((item, index) => {
                        if (index < 4) {
                            if (index == 0) {
                                str = `<a href="news_details.html?id=${item.id}">
                        <div class="news-img wow fadeInUp d2">
                          <img src="${item.image}" alt="">
                        </div>
                        <div class="news-content wow fadeInUp d2">
                          <div class="news-title">
                            ${item.title}
                          </div>
                          <div class="news-desc">
                          ${item.descript}
                          </div>
                        </div>
                        <div class="news-more wow fadeInUp d2">
                          查看更多
                        </div>
                      </a>`
                            } else {
                                str2 += ` <div class="news-list wow fadeInUp d2">
                        <a href="news_details.html?id=${item.id}">
                          <div class="news-content">
                            <div class="news-list-title">
                              ${item.title}
                            </div>
                            <div class="news-list-desc">
                            ${item.descript}
                            </div>
                          </div>
                          <div class="news-list-date">
                        </a>
                      </div>`
                            }
                        }
                    })
                    $(".news-index-left").html(str);
                    $(".news-index-right>span").after(str2);
                }
            },
            err => {
                console.log(err)
            })
    },
}

$(function () {
    common.init()
    common.getBanner("index")
    common.getConfigInfo()
    common.getNavList()
    indexObj.getIndexInfo()
    indexObj.getPersonList()
    indexObj.getTeamList()
    indexObj.getcaseList()
    indexObj.getNewsList()
    common.getContactInfo()
    // common.indexSwiper()
})