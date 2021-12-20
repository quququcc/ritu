define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.config_bottom1/index',
        add_url: 'site.config_bottom1/add',
        edit_url: 'site.config_bottom1/edit',
        delete_url: 'site.config_bottom1/delete',
        export_url: 'site.config_bottom1/export',
        modify_url: 'site.config_bottom1/modify',
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