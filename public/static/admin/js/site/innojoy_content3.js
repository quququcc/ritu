define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.innojoy_content3/index',
        add_url: 'site.innojoy_content3/add',
        edit_url: 'site.innojoy_content3/edit',
        delete_url: 'site.innojoy_content3/delete',
        export_url: 'site.innojoy_content3/export',
        modify_url: 'site.innojoy_content3/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
                    // {field: 'id', title: 'id'},
                    {field: 'tag', search: 'select', selectList: {"1":"高质量数据","2":"多类型专利数据"}, title: '所属分类'},
                    {field: 'title', title: '标题'},
                    {field: 'text', title: '内容项'},
                    {field: 'image', title: '图标', templet: ea.table.image},
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