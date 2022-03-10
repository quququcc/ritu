define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.seo/index',
        add_url: 'site.seo/add',
        edit_url: 'site.seo/edit',
        delete_url: 'site.seo/delete',
        export_url: 'site.seo/export',
        modify_url: 'site.seo/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},                    {field: 'id', title: 'id'},                    {field: 'sign', title: '页面标识'},                    {field: 'title', title: '标题'},                    {field: 'keywords', title: '关键词'},                    {field: 'description', title: '描述'},                    {width: 250, title: '操作', templet: ea.table.tool},
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