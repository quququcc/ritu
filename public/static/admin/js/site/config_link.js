define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.config_link/index',
        add_url: 'site.config_link/add',
        edit_url: 'site.config_link/edit',
        delete_url: 'site.config_link/delete',
        export_url: 'site.config_link/export',
        modify_url: 'site.config_link/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    // {field: 'id', title: 'id'},
                    {field: 'name', title: '名称'},
                    {field: 'link', title: '链接'},
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