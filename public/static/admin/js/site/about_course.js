define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.about_course/index',
        add_url: 'site.about_course/add',
        edit_url: 'site.about_course/edit',
        delete_url: 'site.about_course/delete',
        export_url: 'site.about_course/export',
        modify_url: 'site.about_course/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    // {field: 'id', title: 'id'},
                    {field: 'year', title: '年份',sort: true},
                    {field: 'text', title: '内容'},
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