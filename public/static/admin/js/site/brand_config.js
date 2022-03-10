define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.brand_config/index',
        add_url: 'site.brand_config/add',
        edit_url: 'site.brand_config/edit',
        delete_url: 'site.brand_config/delete',
        export_url: 'site.brand_config/export',
        modify_url: 'site.brand_config/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    // {field: 'id', title: 'id'},
                    {field: 'image', title: '图片', templet: ea.table.image},
                    {field: 'text', title: '内容'},
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