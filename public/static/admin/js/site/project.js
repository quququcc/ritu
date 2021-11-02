define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.project/index',
        add_url: 'site.project/add',
        edit_url: 'site.project/edit',
        delete_url: 'site.project/delete',
        export_url: 'site.project/export',
        modify_url: 'site.project/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},                    {field: 'id', title: 'id'},                    {field: 'title', title: '标题'},                    {field: 'descript', title: '简介'},                    {field: 'image', title: '展示图', templet: ea.table.image},                    {field: 'publish_time', title: '发布时间'},                    {field: 'view_num', title: '浏览量'},                    {width: 250, title: '操作', templet: ea.table.tool},
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