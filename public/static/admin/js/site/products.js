define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.products/index',
        add_url: 'site.products/add',
        edit_url: 'site.products/edit',
        delete_url: 'site.products/delete',
        export_url: 'site.products/export',
        modify_url: 'site.products/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    {field: 'id', title: 'id'},
                    {field: 'siteProductsCate.name', title: '产品分类'},
                    {field: 'title', title: '产品名称'},
                    {field: 'model', title: '产品型号'},
                    {field: 'descript', title: '产品简介'},
                    {field: 'image', title: '产品主图', templet: ea.table.image},
                    {field: 'sort', title: '排序', edit: 'text'},
                    {field: 'siteProductsCate.id', title: ''},
                    {field: 'siteProductsCate.name', title: '分类名称'},
                    {field: 'siteProductsCate.sort', title: '排序', edit: 'text'},
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