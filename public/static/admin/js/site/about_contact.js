define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.about_contact/index',
        add_url: 'site.about_contact/add',
        edit_url: 'site.about_contact/edit',
        delete_url: 'site.about_contact/delete',
        export_url: 'site.about_contact/export',
        modify_url: 'site.about_contact/modify',
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