define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.res_course_lecturer/index',
        add_url: 'site.res_course_lecturer/add',
        edit_url: 'site.res_course_lecturer/edit',
        delete_url: 'site.res_course_lecturer/delete',
        export_url: 'site.res_course_lecturer/export',
        modify_url: 'site.res_course_lecturer/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    // {field: 'id', title: 'id'},
                    {field: 'name', title: '讲师名称'},
                    {field: 'introduce', title: '讲师介绍'},
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