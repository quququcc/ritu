layui.use(['form'], function () {
    var $ = layui.$//Jquery
        , form = layui.form;//表单
    initProducts();
    initCates();

    //监听复选框
    form.on('checkbox(products)', function (data) {
        var products = $('input[id="products"]'), value = data.value, array = products.val().split(",");
        if (data.elem.checked) {
            var val = products.val() +","+ value;
            products.val(val);
        } else {
            var newproducts = "";
            for (var i = 0; i < array.length; i++) {
                var str = array[i];
                newproducts += (str != value && str != "" && str != null) ?  "," + str : "";
            }
            products.val(newproducts);
        }
    });

    /**
     * input 框初始 赋值 到checkedbox上
     * @author lengff
     */
    function initProducts() {
        var param=$("input[id='products']").val(),checkBoxs = $("input[name='checkpro']"), array = param.split(",");
        for (var i = 0; i < array.length; i++) {
            for (var j = 0; j < checkBoxs.length; j++) {
                var checkbox = $(checkBoxs[j]);
                if (checkbox.val() == array[i]) {
                    checkbox.attr('checked','checked');
                    break;
                }
            }
        }
        form.render('checkbox');
    }

    //监听复选框
    form.on('checkbox(cates)', function (data) {
        var cates = $('input[id="cates"]'), value = data.value, array = cates.val().split(",");
        if (data.elem.checked) {
            var val = cates.val() +","+ value;
            cates.val(val);
        } else {
            var newcates = "";
            for (var i = 0; i < array.length; i++) {
                var str = array[i];
                newcates += (str != value && str != "" && str != null) ?  "," + str : "";
            }
            cates.val(newcates);
        }
    });

    /**
     * input 框初始 赋值 到checkedbox上
     * @author lengff
     */
    function initCates() {
        var param=$("input[id='cates']").val(),checkBoxs = $("input[name='checkcat']"), array = param.split(",");
        for (var i = 0; i < array.length; i++) {
            for (var j = 0; j < checkBoxs.length; j++) {
                var checkbox = $(checkBoxs[j]);
                if (checkbox.val() == array[i]) {
                    checkbox.attr('checked','checked');
                    break;
                }
            }
        }
        form.render('checkbox');
    }
});