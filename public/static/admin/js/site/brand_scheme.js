define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.brand_scheme/index',
        add_url: 'site.brand_scheme/add',
        edit_url: 'site.brand_scheme/edit',
        delete_url: 'site.brand_scheme/delete',
        export_url: 'site.brand_scheme/export',
        modify_url: 'site.brand_scheme/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    // {field: 'id', title: 'id'},
                    {field: 'title', title: '标题'},
                    {field: 'text', title: '内容项'},
                    {field: 'sort', title: '排序', edit: 'text'},
                    {width: 250, title: '操作', templet: ea.table.tool},
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