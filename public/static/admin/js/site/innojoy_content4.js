define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.innojoy_content4/index',
        add_url: 'site.innojoy_content4/add',
        edit_url: 'site.innojoy_content4/edit',
        delete_url: 'site.innojoy_content4/delete',
        export_url: 'site.innojoy_content4/export',
        modify_url: 'site.innojoy_content4/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},                    {field: 'id', title: 'id'},                    {field: 'title', title: '标题'},                    {field: 'text', title: '文本'},                    {field: 'button1', title: 'button1'},                    {field: 'button1_link', title: 'button1_link'},                    {field: 'button2', title: 'button2'},                    {field: 'button2_link', title: 'button2_link'},                    {width: 250, title: '操作', templet: ea.table.tool},
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