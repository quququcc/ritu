define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.case_detail/index',
        add_url: 'site.case_detail/add',
        edit_url: 'site.case_detail/edit',
        delete_url: 'site.case_detail/delete',
        export_url: 'site.case_detail/export',
        modify_url: 'site.case_detail/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    {field: 'company_name', title: '公司全称'},
                    {field: 'company_image', title: '公司LOGO', templet: ea.table.image},
                    {field: 'title', title: '案例标题'},
                    {field: 'sort', title: '排序',edit: 'text'},
                    {field: 'publish_time', title: '发布时间'},
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