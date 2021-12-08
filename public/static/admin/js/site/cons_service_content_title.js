define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.cons_service_content_title/index',
        add_url: 'site.cons_service_content_title/add',
        edit_url: 'site.cons_service_content_title/edit',
        delete_url: 'site.cons_service_content_title/delete',
        export_url: 'site.cons_service_content_title/export',
        modify_url: 'site.cons_service_content_title/modify',
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