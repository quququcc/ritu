define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.products_manage/index',
        add_url: 'site.products_manage/add',
        edit_url: 'site.products_manage/edit',
        delete_url: 'site.products_manage/delete',
        export_url: 'site.products_manage/export',
        modify_url: 'site.products_manage/modify',
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