define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.news/index',
        add_url: 'site.news/add',
        edit_url: 'site.news/edit',
        delete_url: 'site.news/delete',
        export_url: 'site.news/export',
        modify_url: 'site.news/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},                    {field: 'id', title: 'id'},                    {field: 'title', title: '新闻标题'},                    {field: 'created_at', title: '创建时间'},                    {field: 'read_num', title: '浏览量'},                    {field: 'status', search: 'select', selectList: ["禁用","启用"], title: '状态', templet: ea.table.switch},                    {field: 'new_cate', search: 'select', selectList: {"1":"新闻中心","2":"公司新闻"}, title: '所属新闻分类'},                    {width: 250, title: '操作', templet: ea.table.tool},
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