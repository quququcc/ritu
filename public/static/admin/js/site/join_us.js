define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.join_us/index',
        add_url: 'site.join_us/add',
        edit_url: 'site.join_us/edit',
        delete_url: 'site.join_us/delete',
        export_url: 'site.join_us/export',
        modify_url: 'site.join_us/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},                    {field: 'id', title: 'id'},                    {field: 'text', title: '加入我们'},                    {width: 250, title: '操作', templet: ea.table.tool},
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