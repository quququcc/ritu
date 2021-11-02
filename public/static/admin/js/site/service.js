define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.service/index',
        add_url: 'site.service/add',
        edit_url: 'site.service/edit',
        delete_url: 'site.service/delete',
        export_url: 'site.service/export',
        modify_url: 'site.service/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                toolbar: ['refresh'],
                page:false,
                cols: [[
                    {field: 'title', title: '标题'},
                    {field: 'image', title: '展示图片', templet: ea.table.image},
                    {field: 'text', title: '服务简介'},
                    {field: 'sort', title: '排序', edit: 'text'},
                    {
                        width: 250,
                        title: '操作',
                        templet: ea.table.tool,
                        operat: [
                            [{
                                text: '编辑',
                                url: init.edit_url,
                                method: 'open',
                                auth: 'edit',
                                class: 'layui-btn layui-btn-xs layui-btn-success',
                                extend: 'data-full="true"',
                            }]
                        ]
                    }
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