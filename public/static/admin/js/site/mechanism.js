define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.mechanism/index',
        add_url: 'site.mechanism/add',
        edit_url: 'site.mechanism/edit',
        delete_url: 'site.mechanism/delete',
        export_url: 'site.mechanism/export',
        modify_url: 'site.mechanism/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
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