define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.config_qr_code/index',
        add_url: 'site.config_qr_code/add',
        edit_url: 'site.config_qr_code/edit',
        delete_url: 'site.config_qr_code/delete',
        export_url: 'site.config_qr_code/export',
        modify_url: 'site.config_qr_code/modify',
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