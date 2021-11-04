define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.think/index',
        add_url: 'site.think/add',
        edit_url: 'site.think/edit',
        delete_url: 'site.think/delete',
        export_url: 'site.think/export',
        modify_url: 'site.think/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},                    {field: 'id', title: 'id'},                    {field: 'title', title: '标题'},                    {field: 'descript', title: '简介'},                    {field: 'created', title: '发布时间'},                    {width: 250, title: '操作', templet: ea.table.tool},
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