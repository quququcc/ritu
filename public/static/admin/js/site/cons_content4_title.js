define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.cons_content4_title/index',
        add_url: 'site.cons_content4_title/add',
        edit_url: 'site.cons_content4_title/edit',
        delete_url: 'site.cons_content4_title/delete',
        export_url: 'site.cons_content4_title/export',
        modify_url: 'site.cons_content4_title/modify',
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