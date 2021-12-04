define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.cons_service_content/index',
        add_url: 'site.cons_service_content/add',
        edit_url: 'site.cons_service_content/edit',
        delete_url: 'site.cons_service_content/delete',
        export_url: 'site.cons_service_content/export',
        modify_url: 'site.cons_service_content/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    {field: 'id', title: 'id'},
                    {field: 'siteConsServiceTitle.title', title: '所属分类'},
                    {field: 'title', title: '标题'},
                    {field: 'image', title: '图片', templet: ea.table.image},
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