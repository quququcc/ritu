define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.train/index',
        add_url: 'site.train/add',
        edit_url: 'site.train/edit',
        delete_url: 'site.train/delete',
        export_url: 'site.train/export',
        modify_url: 'site.train/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    {field: 'id', title: 'id'},
                    {field: 'siteTrainCate.name', title: '培训类别'},
                    {field: 'title', title: '标题'},
                    {field: 'descript', title: '简介'},
                    {field: 'image', title: '展示图', templet: ea.table.image},
                    {field: 'sort', title: '排序', edit: 'text'},
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