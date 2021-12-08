define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.about_job_cate/index',
        add_url: 'site.about_job_cate/add',
        edit_url: 'site.about_job_cate/edit',
        delete_url: 'site.about_job_cate/delete',
        export_url: 'site.about_job_cate/export',
        modify_url: 'site.about_job_cate/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    // {field: 'id', title: 'id'},
                    {field: 'name', title: '岗位类型'},
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