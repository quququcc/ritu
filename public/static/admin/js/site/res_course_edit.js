layui.use(['form'], function () {
    var $ = layui.$//Jquery
        , form = layui.form;//表单
    initValue();

    //监听复选框
    form.on('checkbox(lecturers)', function (data) {
        var lecturers = $('input[id="lecturers"]'), value = data.value, array = lecturers.val().split(",");
        if (data.elem.checked) {
            var val = lecturers.val() +","+ value;
            lecturers.val(val);
        } else {
            var newlecturers = "";
            for (var i = 0; i < array.length; i++) {
                var str = array[i];
                newlecturers += (str != value && str != "" && str != null) ?  "," + str : "";
            }
            lecturers.val(newlecturers);
        }
    });

    /**
     * input 框初始 赋值 到checkedbox上
     * @author lengff
     */
    function initValue() {
        var param=$("input[id='lecturers']").val(),checkBoxs = $("input[name='checklec']"), array = param.split(",");
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