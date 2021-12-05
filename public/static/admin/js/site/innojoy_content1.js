define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.innojoy_content1/index',
        add_url: 'site.innojoy_content1/add',
        edit_url: 'site.innojoy_content1/edit',
        delete_url: 'site.innojoy_content1/delete',
        export_url: 'site.innojoy_content1/export',
        modify_url: 'site.innojoy_content1/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    // {field: 'id', title: 'id'},
                    {field: 'title', title: '文案'},
                    {field: 'image', title: '图标', templet: ea.table.image},
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