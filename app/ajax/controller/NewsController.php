<?php


namespace app\ajax\controller;


use app\admin\model\SiteNews;
use app\Request;

class NewsController
{
    protected $newCate = [
        1 => '新闻中心',
        2 => '公司新闻'
    ];
    protected $siteNews;

    public function __construct()
    {
        $this->siteNews = new SiteNews();
    }

    /**
     * @Notes: 新闻综合
     * @Author: Dylan
     * @Date: 2022/5/3
     * @param Request $request
     * @return false|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function newsSynthesis(Request $request)
    {
        $new_categories = $request->param('new_categories', key($this->newCate));
        $page = $request->param('page', 1);
        $siteNews = $this->siteNews->where('status', 1)->where('new_cate', $new_categories)->limit(($page-1)*5, 5)->select()->toArray();
        return json_encode($siteNews);
    }

    /**
     * @Notes: 新闻详情
     * @Author: Dylan
     * @Date: 2022/5/3
     * @param Request $request
     * @return false|string
     * @throws \think\db\exception\DataNotFoundException
     * @throws \think\db\exception\DbException
     * @throws \think\db\exception\ModelNotFoundException
     */
    public function newsDetail(Request $request)
    {
        $id = $request->param('id', 0);

        if (empty($id)) {
            return "参数错误";
        }

        $result = $this->siteNews->where('status', 1)->where('id', $id)->select()->toArray();
        return json_encode($result);
    }
}