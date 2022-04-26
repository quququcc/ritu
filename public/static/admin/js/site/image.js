define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.image/index',
        add_url: 'site.image/add',
        edit_url: 'site.image/edit',
        delete_url: 'site.image/delete',
        export_url: 'site.image/export',
        modify_url: 'site.image/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},                    {field: 'id', title: 'id'},                    {field: 'image', title: 'image', templet: ea.table.image},                    {field: 'file', title: 'file', templet: ea.table.url},                    {width: 250, title: '操作', templet: ea.table.tool},
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