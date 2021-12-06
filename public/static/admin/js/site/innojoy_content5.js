define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.innojoy_content5/index',
        add_url: 'site.innojoy_content5/add',
        edit_url: 'site.innojoy_content5/edit',
        delete_url: 'site.innojoy_content5/delete',
        export_url: 'site.innojoy_content5/export',
        modify_url: 'site.innojoy_content5/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    // {field: 'id', title: 'id'},
                    {field: 'name', title: '企业名称'},
                    {field: 'image', title: '企业图标', templet: ea.table.image},
                    {field: 'sort', title: '排序', edit: 'text'},
                    {width: 250, title: '操作', templet: ea.table.tool},
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