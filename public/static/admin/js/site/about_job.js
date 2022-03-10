define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.about_job/index',
        add_url: 'site.about_job/add',
        edit_url: 'site.about_job/edit',
        delete_url: 'site.about_job/delete',
        export_url: 'site.about_job/export',
        modify_url: 'site.about_job/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    // {field: 'id', title: 'id'},
                    {field: 'publish_time', title: '发布时间',sort:true},
                    {field: 'siteAboutJobCate.name', title: '岗位类型'},
                    {field: 'job_name', title: '职位名称'},
                    {field: 'job_addr', title: '地点'},
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