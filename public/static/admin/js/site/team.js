define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.team/index',
        add_url: 'site.team/add',
        edit_url: 'site.team/edit',
        delete_url: 'site.team/delete',
        export_url: 'site.team/export',
        modify_url: 'site.team/modify',
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