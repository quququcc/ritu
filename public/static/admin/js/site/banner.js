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
                cols: [[
                    {field: 'title', title: '标题'},
                    {field: 'title_s', title: '副标题'},
                    {field: 'to_url', title: '跳转链接'},
                    {field: 'background', title: 'Banner图', templet: ea.table.image},
                    {field: 'is_show', search: 'select', selectList: {"1":"显示","0":"隐藏"}, title: '是否显示'},
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