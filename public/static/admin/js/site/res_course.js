define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.res_course/index',
        add_url: 'site.res_course/add',
        edit_url: 'site.res_course/edit',
        delete_url: 'site.res_course/delete',
        export_url: 'site.res_course/export',
        modify_url: 'site.res_course/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    {field: 'siteResCourseCate.cate_name', title: '课程分类'},
                    {field: 'title', title: '课程标题'},
                    {field: 'image', title: '封面', templet: ea.table.image},
                    // {field: 'descript', title: '课程简介'},
                    {field: 'lecturers', title: '讲师'},
                    {field: 'courseware', title: '课件', templet: ea.table.url},
                    // {field: 'video', title: '视频', templet: ea.table.url},
                    {field: 'view_num', title: '浏览量'},
                    {field: 'publish_time', title: '发布时间'},
                    {field: 'sort', title: '排序', edit: 'text'},
                    // {field: 'siteResCourseLecturer.name', title: '讲师名称'},
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