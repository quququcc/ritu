define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.company_profile/index',
        add_url: 'site.company_profile/add',
        edit_url: 'site.company_profile/edit',
        delete_url: 'site.company_profile/delete',
        export_url: 'site.company_profile/export',
        modify_url: 'site.company_profile/modify',
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