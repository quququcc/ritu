define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.about_team/index',
        add_url: 'site.about_team/add',
        edit_url: 'site.about_team/edit',
        delete_url: 'site.about_team/delete',
        export_url: 'site.about_team/export',
        modify_url: 'site.about_team/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},                    {field: 'id', title: 'id'},                    {field: 'text', title: '服务团队'},                    {field: 'image1', title: '图片1', templet: ea.table.image},                    {field: 'image2', title: '图片2', templet: ea.table.image},                    {width: 250, title: '操作', templet: ea.table.tool},
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