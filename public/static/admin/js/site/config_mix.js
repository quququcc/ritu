define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.config_mix/index',
        add_url: 'site.config_mix/add',
        edit_url: 'site.config_mix/edit',
        delete_url: 'site.config_mix/delete',
        export_url: 'site.config_mix/export',
        modify_url: 'site.config_mix/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},                    {field: 'sign', title: '配置标识'},                    {field: 'value', title: '值'},                    {width: 250, title: '操作', templet: ea.table.tool},
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