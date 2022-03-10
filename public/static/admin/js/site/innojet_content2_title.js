define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.innojet_content2_title/index',
        add_url: 'site.innojet_content2_title/add',
        edit_url: 'site.innojet_content2_title/edit',
        delete_url: 'site.innojet_content2_title/delete',
        export_url: 'site.innojet_content2_title/export',
        modify_url: 'site.innojet_content2_title/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},                    {field: 'id', title: 'id'},                    {field: 'title', title: '模块名称'},                    {field: 'title_s', title: '小标题'},                    {field: 'image', title: '展示图', templet: ea.table.image},                    {width: 250, title: '操作', templet: ea.table.tool},
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