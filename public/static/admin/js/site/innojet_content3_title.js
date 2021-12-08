define(["jquery", "easy-admin"], function ($, ea) {

    var init = {
        table_elem: '#currentTable',
        table_render_id: 'currentTableRenderId',
        index_url: 'site.innojet_content3_title/index',
        add_url: 'site.innojet_content3_title/add',
        edit_url: 'site.innojet_content3_title/edit',
        delete_url: 'site.innojet_content3_title/delete',
        export_url: 'site.innojet_content3_title/export',
        modify_url: 'site.innojet_content3_title/modify',
    };

    var Controller = {

        index: function () {
            ea.table.render({
                init: init,
                cols: [[
                    {type: 'checkbox'},
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