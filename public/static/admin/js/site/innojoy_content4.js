define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.innojoy_content4/index',
        add_url: 'site.innojoy_content4/add',
        edit_url: 'site.innojoy_content4/edit',
        delete_url: 'site.innojoy_content4/delete',
        export_url: 'site.innojoy_content4/export',
        modify_url: 'site.innojoy_content4/modify',
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