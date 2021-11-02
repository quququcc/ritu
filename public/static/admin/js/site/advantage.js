define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.advantage/index',
        add_url: 'site.advantage/add',
        edit_url: 'site.advantage/edit',
        delete_url: 'site.advantage/delete',
        export_url: 'site.advantage/export',
        modify_url: 'site.advantage/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                toolbar: ['refresh'],
                page:false,
                cols: [[
                    {field: 'title', title: '标题'},
                    {field: 'text', title: '介绍'},
                    {field: 'logo', title: '小图标', templet: ea.table.image},
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