define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.certificate/index',
        add_url: 'site.certificate/add',
        edit_url: 'site.certificate/edit',
        delete_url: 'site.certificate/delete',
        export_url: 'site.certificate/export',
        modify_url: 'site.certificate/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},                    {field: 'id', title: 'id'},                    {field: 'image', title: '资质图片', templet: ea.table.image},                    {field: 'sort', title: '排序', edit: 'text'},                    {width: 250, title: '操作', templet: ea.table.tool},
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