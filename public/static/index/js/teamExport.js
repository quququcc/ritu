
const team = {
    getTeamList:function(){
        let _this = this;
        ajax_get(host + `/ajax/team`,
        true,
        {},
        (res) => {
            res = JSON.parse(res)
            console.log(res)
            if (res && res.length > 0) {
                _this.renderHtml(res)
            }
        },
        err => {
            console.log(err)
        })
    },
    renderHtml(data) {
        let str = "";
        data.forEach(item => {
            str += ` <div class="team-box wow fadeInUp d2">
            <div class="team-box-img">
              <img src="${item.photo}" alt="">
            </div>
            <div class="team-box-desc">
              <span>${item.identity}: ${item.name}</span>
              <p>
                ${item.introduce}
              </p>
            </div>
          </div>`
        });
        $(".team-container").html(str);
    }
}


$(function(){
    common.init()
    common.getBanner("team")
    common.getNavList()
    common.getContactInfo()
    common.getConfigInfo()
    team.getTeamList()
})