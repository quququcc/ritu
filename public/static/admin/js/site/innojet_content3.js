define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.innojet_content3/index',
        add_url: 'site.innojet_content3/add',
        edit_url: 'site.innojet_content3/edit',
        delete_url: 'site.innojet_content3/delete',
        export_url: 'site.innojet_content3/export',
        modify_url: 'site.innojet_content3/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    // {field: 'id', title: 'id'},
                    {field: 'title', title: '标题'},
                    {field: 'text', title: '内容项'},
                    {field: 'image_def', title: '未选中状态图标', templet: ea.table.image},
                    {field: 'image_act', title: '选中状态的图标', templet: ea.table.image},
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