define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.index_content2_bottom/index',
        add_url: 'site.index_content2_bottom/add',
        edit_url: 'site.index_content2_bottom/edit',
        delete_url: 'site.index_content2_bottom/delete',
        export_url: 'site.index_content2_bottom/export',
        modify_url: 'site.index_content2_bottom/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    // {field: 'id', title: 'id'},
                    {field: 'title', title: '文本'},
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