define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.about_contact/index',
        add_url: 'site.about_contact/add',
        edit_url: 'site.about_contact/edit',
        delete_url: 'site.about_contact/delete',
        export_url: 'site.about_contact/export',
        modify_url: 'site.about_contact/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},                    {field: 'id', title: 'id'},                    {field: 'addr_choose', title: '公司位置'},                    {field: 'address', title: '地址'},                    {field: 'web', title: 'Web'},                    {field: 'tel', title: 'TEL'},                    {field: 'pc', title: 'P.C'},                    {field: 'fax', title: 'FAX'},                    {field: 'emaiL', title: 'Email'},                    {field: 'sort', title: '排序', edit: 'text'},                    {width: 250, title: '操作', templet: ea.table.tool},
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