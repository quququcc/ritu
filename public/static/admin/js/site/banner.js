define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.banner/index',
        add_url: 'site.banner/add',
        edit_url: 'site.banner/edit',
        delete_url: 'site.banner/delete',
        export_url: 'site.banner/export',
        modify_url: 'site.banner/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                toolbar: ['refresh'],
                page:false,
                cols: [[
                    {field: 'sign_name', title: 'Banner位置'},
                    {field: 'to_title', title: '按钮文案'},
                    {field: 'to_url', title: '跳转链接'},
                    {field: 'background', title: 'Banner图', templet: ea.table.image},
                    {field: 'background_m', title: '移动端', templet: ea.table.image},
                    {field: 'is_show', search: 'select', selectList: {"1":"显示","0":"隐藏"}, title: '是否显示'},
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