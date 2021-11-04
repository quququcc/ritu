define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.train_cate/index',
        add_url: 'site.train_cate/add',
        edit_url: 'site.train_cate/edit',
        delete_url: 'site.train_cate/delete',
        export_url: 'site.train_cate/export',
        modify_url: 'site.train_cate/modify',
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