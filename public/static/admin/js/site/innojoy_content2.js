define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.innojoy_content2/index',
        add_url: 'site.innojoy_content2/add',
        edit_url: 'site.innojoy_content2/edit',
        delete_url: 'site.innojoy_content2/delete',
        export_url: 'site.innojoy_content2/export',
        modify_url: 'site.innojoy_content2/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},                    {field: 'id', title: 'id'},                    {field: 'title', title: '标题'},                    {field: 'text', title: '内容项'},                    {field: 'content', title: '补充内容'},                    {field: 'image', title: '图片', templet: ea.table.image},                    {width: 250, title: '操作', templet: ea.table.tool},
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