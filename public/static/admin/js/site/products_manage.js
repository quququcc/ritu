define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.products_manage/index',
        add_url: 'site.products_manage/add',
        edit_url: 'site.products_manage/edit',
        delete_url: 'site.products_manage/delete',
        export_url: 'site.products_manage/export',
        modify_url: 'site.products_manage/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},                    {field: 'id', title: 'id'},                    {field: 'title', title: '产品标题'},                    {field: 'model', title: '产品型号'},                    {field: 'categories_id', title: '产品所属分类'},                    {field: 'series', title: '产品系列'},                    {field: 'status', search: 'select', selectList: ["关闭","开启"], title: '状态', templet: ea.table.switch},                    {width: 250, title: '操作', templet: ea.table.tool},
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