define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.innojoy_content2/index',
        add_url: 'site.innojoy_content2/add',
        edit_url: 'site.innojoy_content2/edit',
        delete_url: 'site.innojoy_content2/delete',
        export_url: 'site.innojoy_content2/export',
        modify_url: 'site.innojoy_content2/modify',
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