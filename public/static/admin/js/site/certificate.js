define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.certificate/index',
        add_url: 'site.certificate/add',
        edit_url: 'site.certificate/edit',
        delete_url: 'site.certificate/delete',
        export_url: 'site.certificate/export',
        modify_url: 'site.certificate/modify',
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