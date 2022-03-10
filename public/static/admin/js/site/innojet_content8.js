define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.innojet_content8/index',
        add_url: 'site.innojet_content8/add',
        edit_url: 'site.innojet_content8/edit',
        delete_url: 'site.innojet_content8/delete',
        export_url: 'site.innojet_content8/export',
        modify_url: 'site.innojet_content8/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    // {field: 'id', title: 'id'},
                    {field: 'title', title: '标题'},
                    {field: 'text', title: '文本内容'},
                    {field: 'icon', title: '切换小图标', templet: ea.table.image},
                    {field: 'image', title: '展示图片', templet: ea.table.image},
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