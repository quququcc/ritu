
const contactObj = {
    getContactInfo: function () {
        ajax_get(host + `/ajax/contact`,
            true,
            {},
            (res) => {
                res = JSON.parse(res)
                console.log(res)
                $(".phone p").eq(1).text(res.call);
                $(".mailbox p").eq(1).text(res.email);
                $(".qq p").eq(1).text(res.qq);
                $(".name p").eq(1).text(res.contacts);
                $(".phone2 p").eq(1).text(res.phone);
                $(".adress p").eq(1).text(res.address);
            },
            err => {
                console.log(err)
            })
    },
    markerArr: [
        { title: "公司地址", content: "公司地址", point: "114.074846|22.665664", isOpen: 0, icon: { w: 21, h: 21, l: 0, t: 0, x: 6, lb: 5 } }
    ],
    //创建和初始化地图函数：
    initMap: function () {
        let _this = this;
        _this.createMap();//创建地图
        _this.setMapEvent();//设置地图事件
        _this.addMapControl();//向地图添加控件
        _this.addMarker();//向地图中添加marker
    },

    //创建地图函数：
    createMap: function () {
        let map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
        let point = new BMap.Point(114.074846, 22.665664);//定义一个中心点坐标
        map.centerAndZoom(point, 12);//设定地图的中心点和坐标并将地图显示在地图容器中
        window.map = map;//将map变量存储在全局
    },

    //地图事件设置函数：
    setMapEvent: function () {
        map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
        map.enableScrollWheelZoom();//启用地图滚轮放大缩小
        map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
        map.enableKeyboard();//启用键盘上下左右键移动地图
    },

    //地图控件添加函数：
    addMapControl: function () {
        //向地图中添加缩放控件
        let ctrl_nav = new BMap.NavigationControl({ anchor: BMAP_ANCHOR_TOP_LEFT, type: BMAP_NAVIGATION_CONTROL_LARGE });
        map.addControl(ctrl_nav);
        //向地图中添加缩略图控件
        let ctrl_ove = new BMap.OverviewMapControl({ anchor: BMAP_ANCHOR_BOTTOM_RIGHT, isOpen: 1 });
        map.addControl(ctrl_ove);
        //向地图中添加比例尺控件
        let ctrl_sca = new BMap.ScaleControl({ anchor: BMAP_ANCHOR_BOTTOM_LEFT });
        map.addControl(ctrl_sca);
    },
    //创建marker
    addMarker: function () {
        let _this = this;
        for (let i = 0; i < _this.markerArr.length; i++) {
            let json = _this.markerArr[i];
            let p0 = json.point.split("|")[0];
            let p1 = json.point.split("|")[1];
            let point = new BMap.Point(p0, p1);
            let iconImg = _this.createIcon(json.icon);
            let marker = new BMap.Marker(point, { icon: iconImg });
            let iw = _this.createInfoWindow(i);
            let label = new BMap.Label(json.title, { "offset": new BMap.Size(json.icon.lb - json.icon.x + 10, -20) });
            marker.setLabel(label);
            map.addOverlay(marker);
            label.setStyle({
                borderColor: "#808080",
                color: "#333",
                cursor: "pointer"
            });

            (function () {
                let index = i;
                let _iw = _this.createInfoWindow(i);
                let _marker = marker;
                _marker.addEventListener("click", function () {
                    this.openInfoWindow(_iw);
                });
                _iw.addEventListener("open", function () {
                    _marker.getLabel().hide();
                })
                _iw.addEventListener("close", function () {
                    _marker.getLabel().show();
                })
                label.addEventListener("click", function () {
                    _marker.openInfoWindow(_iw);
                })
                if (!!json.isOpen) {
                    label.hide();
                    _marker.openInfoWindow(_iw);
                }
            })()
        }
    },
    //创建InfoWindow
    createInfoWindow: function (i) {
        let _this = this;
        let json = _this.markerArr[i];
        let iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>" + json.content + "</div>");
        return iw;
    },
    //创建一个Icon
    createIcon: function (json) {
        let icon = new BMap.Icon("http://app.baidu.com/map/images/us_mk_icon.png", new BMap.Size(json.w, json.h), { imageOffset: new BMap.Size(-json.l, -json.t), infoWindowOffset: new BMap.Size(json.lb + 5, 1), offset: new BMap.Size(json.x, json.h) })
        return icon;
    },
}

$(function () {
    common.init()
    common.getBanner("contact")
    common.getContactInfo()
    common.getConfigInfo()
    common.getNavList()
    contactObj.getContactInfo()
    contactObj.initMap()
})