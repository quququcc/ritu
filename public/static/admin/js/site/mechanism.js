define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.mechanism/index',
        add_url: 'site.mechanism/add',
        edit_url: 'site.mechanism/edit',
        delete_url: 'site.mechanism/delete',
        export_url: 'site.mechanism/export',
        modify_url: 'site.mechanism/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},                    {field: 'id', title: 'id'},                    {field: 'title', title: '机构名称'},                    {field: 'address', title: '地址'},                    {field: 'phone', title: '电话'},                    {field: 'fax', title: '传真'},                    {field: 'zip_code', title: '邮编'},                    {field: 'email', title: '邮箱'},                    {field: 'sort', title: '排序', edit: 'text'},                    {width: 250, title: '操作', templet: ea.table.tool},
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