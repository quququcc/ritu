define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.about_honor/index',
        add_url: 'site.about_honor/add',
        edit_url: 'site.about_honor/edit',
        delete_url: 'site.about_honor/delete',
        export_url: 'site.about_honor/export',
        modify_url: 'site.about_honor/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},                    {field: 'id', title: 'id'},                    {field: 'text1', title: '安全保障'},                    {field: 'text2', title: '行业领军'},                    {field: 'image', title: '荣誉图片', templet: ea.table.image},                    {width: 250, title: '操作', templet: ea.table.tool},
                ]],
            });

            ea.listen();
        },
        add: function () {
            ea.listen();
        },
        edit: function () {
            ea.listen();
        },
    };
    return Controller;
});