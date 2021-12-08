define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.innojet_content4/index',
        add_url: 'site.innojet_content4/add',
        edit_url: 'site.innojet_content4/edit',
        delete_url: 'site.innojet_content4/delete',
        export_url: 'site.innojet_content4/export',
        modify_url: 'site.innojet_content4/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    // {field: 'id', title: 'id'},
                    {field: 'image', title: '图片', templet: ea.table.image},
                    {field: 'text', title: '内容'},
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