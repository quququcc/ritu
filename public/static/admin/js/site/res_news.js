define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.res_news/index',
        add_url: 'site.res_news/add',
        edit_url: 'site.res_news/edit',
        delete_url: 'site.res_news/delete',
        export_url: 'site.res_news/export',
        modify_url: 'site.res_news/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    // {field: 'id', title: 'id'},
                    {field: 'title', title: '标题'},
                    {field: 'descript', title: '摘要'},
                    {field: 'view_num', title: '浏览量',sort: true},
                    {field: 'publish_time', title: '发布时间',sort:true},
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