define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.banner_inside/index',
        add_url: 'site.banner_inside/add',
        edit_url: 'site.banner_inside/edit',
        delete_url: 'site.banner_inside/delete',
        export_url: 'site.banner_inside/export',
        modify_url: 'site.banner_inside/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                toolbar: ['refresh'],
                page:false,
                cols: [[
                    {field: 'sign_name', title: 'Banner位置'},
                    {field: 'background', title: 'Banner图', templet: ea.table.image},
                    {field: 'background_m', title: '移动端'},
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