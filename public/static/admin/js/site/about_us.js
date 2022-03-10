define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.about_us/index',
        add_url: 'site.about_us/add',
        edit_url: 'site.about_us/edit',
        delete_url: 'site.about_us/delete',
        export_url: 'site.about_us/export',
        modify_url: 'site.about_us/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    // {field: 'id', title: 'id'},
                    {field: 'text', title: '关于大为'},
                    {field: 'create_time', title: '成立时间'},
                    {field: 'service_num', title: '服务企业'},
                    {field: 'staff_num', title: '员工人数'},
                    {field: 'filiale_num', title: '分子公司'},
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