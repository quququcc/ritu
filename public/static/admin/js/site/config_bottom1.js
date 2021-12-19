define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.config_bottom1/index',
        add_url: 'site.config_bottom1/add',
        edit_url: 'site.config_bottom1/edit',
        delete_url: 'site.config_bottom1/delete',
        export_url: 'site.config_bottom1/export',
        modify_url: 'site.config_bottom1/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},                    {field: 'sign', title: '页面标识'},                    {field: 'title', title: '标题'},                    {field: 'title_s', title: '小标题'},                    {field: 'form_link', title: '表单参数'},                    {field: 'other1', title: '国家数据'},                    {field: 'other2', title: 'shuju'},                    {field: 'other3', title: 'other3'},                    {width: 250, title: '操作', templet: ea.table.tool},
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