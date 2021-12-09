define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.res_top/index',
        add_url: 'site.res_top/add',
        edit_url: 'site.res_top/edit',
        delete_url: 'site.res_top/delete',
        export_url: 'site.res_top/export',
        modify_url: 'site.res_top/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    // {field: 'id', title: 'id'},
                    {field: 'title', title: '标题'},
                    {field: 'image', title: '封面', templet: ea.table.image},
                    {field: 'path', title: '文件', templet: ea.table.url},
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