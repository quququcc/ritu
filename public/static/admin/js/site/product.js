define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.product/index',
        add_url: 'site.product/add',
        edit_url: 'site.product/edit',
        delete_url: 'site.product/delete',
        export_url: 'site.product/export',
        modify_url: 'site.product/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},                    {field: 'id', title: 'id'},                    {field: 'title', title: '标题'},                    {field: 'image', title: '产品图片', templet: ea.table.image},                    {field: 'status', search: 'select', selectList: ["禁用","启用"], title: '产品状态', templet: ea.table.switch},                    {field: 'categories_id', title: '分类id'},                    {width: 250, title: '操作', templet: ea.table.tool},
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