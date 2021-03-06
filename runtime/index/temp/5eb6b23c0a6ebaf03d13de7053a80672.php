<?php /*a:1:{s:66:"D:\phpstudy_pro\WWW\shang-ming-bei\app\index\view\index\index.html";i:1638250327;}*/ ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=1200">
    <title>劳模工作室-首页</title>
    <meta name="keywords" content="劳模工作室-首页">
    <meta name="description" content="劳模工作室-首页">
    <link rel="stylesheet" href="../css/common.css">
    <link rel="stylesheet" href="../css/swiper.min.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/index.css">
</head>

<body>
<!-- 头部区 -->
<div class="xg_header">
    <div class="section w1200">
        <div class="logo">
            <h1><a href="/"><img src="../imgs/logo.png" alt="尚明怀"></a></h1>
        </div>
        <div class="nav">
            <ul class="nav1">
                <li class="cur">
                    <a href="index.html">首页</a>
                </li>
                <li>
                    <a href="teamExpert.html">专家团队</a>
                </li>
                <li class="drop-down">
                    <a href="management_consulation.html">管理咨询</a>
                    <ul class="nav2">

                    </ul>
                </li>
                <li class="drop-down">
                    <a href="enterprise_train.html">企业培训</a>
                    <ul class="nav2 train-nav">

                    </ul>
                </li>
                <li>
                    <a href="personnel.html">咨询师训练</a>
                </li>
                <li>
                    <a href="case_list.html">服务案例</a>
                </li>
                <li>
                    <a href="news_list.html">新闻中心</a>
                </li>
                <li>
                    <a href="ThinkTank.html">管理智库</a>
                </li>
                <li>
                    <a href="contact.html">联系我们</a>
                </li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div id="banner">
    <div class="banner-img swiper-container ">
        <div class="swiper-wrapper index-banner">
            <?php foreach($data['banner'] as $k=>$v): ?>
            <div class="swiper-slide">
                <img src="<?php echo htmlentities($v['background']); ?>" alt="">
            </div>
            <?php endforeach; ?>
        </div>
        <div class="swiper-pagination"></div>
        <!-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> -->
    </div>

</div>
<div id="section">
    <div class="section1">
        <div class="section-box">
            <div class="section-header wow fadeInUp d2">
                <div class="section-header-img">
                    <img src="../imgs/section-header.png" alt="">
                </div>
                <div class="section-title-en">PRODUCT & LANDING PLAN</div>
                <div class="section-title-cn">咨询产品与落地方案</div>
            </div>
            <div class="section-mid  wow fadeInUp d2">
                <span>STEP微咨询</span>
                <a href="management_consulation.html">了解详情</a>
            </div>
            <div class="section-content section1-content">
                <div class="solution-core  wow fadeInUp d2">
                    <img src="../imgs/solution1.png" alt="">
                    <img src="../imgs/solution11.png" alt="">
                    <span>国企混改</span>
                    <a class="solution-core-more" href="#">了解详情</a>
                </div>
                <div class="solution-core  wow fadeInUp d2">
                    <img src="../imgs/solution2.png" alt="">
                    <img src="../imgs/solution22.png" alt="">
                    <span>组织变革</span>
                    <a class="solution-core-more" href="#">了解详情</a>
                </div>
                <div class="solution-core  wow fadeInUp d2">
                    <img src="../imgs/solution3.png" alt="">
                    <img src="../imgs/solution33.png" alt="">
                    <span>国企混改</span>
                    <a class="solution-core-more" href="#">了解详情</a>
                </div>
                <div class="solution-core  wow fadeInUp d2">
                    <img src="../imgs/solution4.png" alt="">
                    <img src="../imgs/solution44.png" alt="">
                    <span>冗员优化</span>
                    <a class="solution-core-more" href="#">了解详情</a>
                </div>
                <div class="solution-core  wow fadeInUp d2">
                    <img src="../imgs/solution5.png" alt="">
                    <img src="../imgs/solution55.png" alt="">
                    <span>顾问式培训</span>
                    <a class="solution-core-more" href="#">了解详情</a>
                </div>

                <div class="solution-core  wow fadeInUp d2">
                    <img src="../imgs/solution6.png" alt="">
                    <img src="../imgs/solution66.png" alt="">
                    <span>企业大学构建</span>
                    <a class="solution-core-more" href="#">了解详情</a>
                </div>
                <div class="solution-core  wow fadeInUp d2">
                    <img src="../imgs/solution7.png" alt="">
                    <img src="../imgs/solution77.png" alt="">
                    <span>流程优化工作坊</span>
                    <a class="solution-core-more" href="#">了解详情</a>
                </div>
                <div class="solution-core  wow fadeInUp d2">
                    <img src="../imgs/solution8.png" alt="">
                    <img src="../imgs/solution88.png" alt="">
                    <span>流程绩效管理</span>
                    <a class="solution-core-more" href="#">了解详情</a>
                </div>
                <div class="solution-core  wow fadeInUp d2">
                    <img src="../imgs/solution9.png" alt="">
                    <img src="../imgs/solution99.png" alt="">
                    <span>打破部门墙</span>
                    <a class="solution-core-more" href="#">了解详情</a>
                </div>
                <div class="solution-core  wow fadeInUp d2">
                    <img src="../imgs/solution10.png" alt="">
                    <img src="../imgs/solution1010.png" alt="">
                    <span>OA流程建设与优化</span>
                    <a class="solution-core-more" href="#">了解详情</a>
                </div>
            </div>
        </div>
    </div>
    <div class="section2">
        <div class="section-box">
            <div class="section-header  wow fadeInUp d2">
                <div class="section-header-img">
                    <img src="../imgs/section-header.png" alt="">
                </div>
                <div class="section-title-en">SERVICE ADVANTAGES</div>
                <div class="section-title-cn">项目服务优势</div>
            </div>
            <div class="section-content section2-content">
                <div class="project-advantage  wow fadeInUp d2">
                    <img src="../imgs/ad1.png" alt="">
                    <span>自有项目研发团队<br/>迎合局势创新研发</span>
                </div>
                <div class="project-advantage  wow fadeInUp d2">
                    <img src="../imgs/ad2.png" alt="">
                    <span>专业项目咨询队伍<br/>顾问辅导引导思考</span>
                </div>
                <div class="project-advantage  wow fadeInUp d2">
                    <img src="../imgs/ad-core.png" alt="">
                    <!-- <span>拥有完整的人力资源<br/>从业者供应链体系</span> -->
                </div>
                <div class="project-advantage  wow fadeInUp d2">
                    <img src="../imgs/ad3.png" alt="">
                    <span>拥有完整的人力资源<br/>从业者供应链体系</span>
                </div>
                <div class="project-advantage  wow fadeInUp d2">
                    <img src="../imgs/ad4.png" alt="">
                    <span>课程完善模拟教学<br/>方案执行落地生根</span>
                </div>
            </div>
        </div>
    </div>
    <div class="section3">
        <div class="section-box">
            <div class="section-header  wow fadeInUp d2">
                <div class="section-header-img">
                    <img src="../imgs/section-header.png" alt="">
                </div>
                <div class="section-title-en">COURSE LANDING STYLE</div>
                <div class="section-title-cn">课程落地风采</div>
            </div>
            <div class="section-content section3-content">
                <?php foreach($data['style'] as $k=>$v): ?>
                <div class="course-box  wow fadeInUp d2">
                    <div class="course-img">
                        <a hef="personnel_details.html?id=${item.id}">
                            <img src="<?php echo htmlentities($v['image']); ?>" alt="">
                        </a>
                    </div>
                    <div class="course-title">
                        <a href="personnel_details.html?id=<?php echo htmlentities($v['id']); ?>"> <?php echo htmlentities($v['title']); ?></a>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="section4">
        <div class="section-box">
            <div class="section-header  wow fadeInUp d2">
                <div class="section-header-img">
                    <img src="../imgs/section-header.png" alt="">
                </div>
                <div class="section-title-en">EXPERT TEAM</div>
                <div class="section-title-cn">专家团队介绍</div>
            </div>
            <div class="section-content section4-content">
                <?php foreach($data['team'] as $k=>$v): ?>
                <div class="team-box  wow fadeInUp d2">
                    <div class="team-img">
                        <img src="<?php echo htmlentities($v['photo']); ?>" alt="">
                    </div>
                    <div class="team-title">
                        <?php echo htmlentities($v['name']); ?>
                    </div>
                    <div class="team-desc">`
                        <?php if($k==0): ?>
                        <span><?php echo htmlentities($v['identity']); ?>：<?php echo htmlentities($v['name']); ?></span>
                        <?php else: ?>
                        <span><?php echo htmlentities($v['name']); ?></span>
                        <?php endif; ?>
                        <p><?php echo htmlentities($v['introduce']); ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="section5">
        <div class="section-box">
            <div class="section-header  wow fadeInUp d2">
                <div class="section-header-img">
                    <img src="../imgs/section-header.png" alt="">
                </div>
                <div class="section-title-en">SERVICE CASE</div>
                <div class="section-title-cn">服务案例展示</div>
            </div>
            <div class="section-content section5-content">
                <?php foreach($data['case'] as $k=>$v): ?>
                <div class="case-box  wow fadeInUp d2">
                    <img src="<?php echo htmlentities($v['image']); ?>" alt="">
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="section6">
        <div class="section-box">
            <div class="section-header wow fadeInUp d2">
                <div class="section-header-img">
                    <img src="../imgs/section-header.png" alt="">
                </div>
                <div class="section-title-en">NEWS AND INFOMATAION</div>
                <div class="section-title-cn">新闻资讯</div>
            </div>
            <div class="section-content section6-content">
                <div class="news-index-left">
                    <?php foreach($data['news'] as $k=>$v): if($k==0): ?>
                    <a href="news_details.html?id=${item.id}">
                        <div class="news-img wow fadeInUp d2">
                            <img src="<?php echo htmlentities($v['image']); ?>" alt="">
                        </div>
                        <div class="news-content wow fadeInUp d2">
                            <div class="news-title">
                                <?php echo htmlentities($v['title']); ?>
                            </div>
                            <div class="news-desc">
                                <?php echo htmlentities($v['descript']); ?>
                            </div>
                        </div>
                        <div class="news-more wow fadeInUp d2">
                            查看更多
                        </div>
                    </a>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="news-index-right">
                    <span class="wow fadeInUp d2">推荐阅读</span>
                    <?php foreach($data['news'] as $k=>$v): if($k>0): ?>
                    <div class="news-list wow fadeInUp d2">
                        <a href="news_details.html?id=${item.id}">
                            <div class="news-content">
                                <div class="news-list-title">
                                    <?php echo htmlentities($v['title']); ?>
                                </div>
                                <div class="news-list-desc">
                                    <?php echo htmlentities($v['descript']); ?>
                                </div>
                            </div>
                            <div class="news-list-date"><?php echo htmlentities($v['created']); ?></div>
                        </a>
                    </div>
                    <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- 底部区 -->
<div class="xg_footer">
    <div class="footer_top">
        <div class="w1200">
            <div class="f_l wow fadeInUp d2">
                <div class="font_logo">
                    <a href="/"><img src="../imgs/footer_logo.png" alt=""></a>
                </div>
                <p>24h咨询热线</p>
                <p>400-900-5678</p>
            </div>
            <div class="f_r">
                <ul>
                    <li class="wow fadeInUp d2">
                        <a href="javascript:;">管理咨询</a>
                        <ul>
                            <li>
                                <a href="javascript:;">国企混改</a>
                            </li>
                            <li>
                                <a href="javascript:;">组织变革</a>
                            </li>
                            <li>
                                <a href="javascript:;">流程再造</a>
                            </li>
                            <li>
                                <a href="javascript:;">step微咨询</a>
                            </li>
                        </ul>
                    </li>
                    <li class="wow fadeInUp d2">
                        <a href="javascript:;">咨询顾问培训</a>
                        <ul>
                            <li>
                                <a href="javascript:;">顾问式培训</a>
                            </li>
                            <li>
                                <a href="javascript:;">咨询顾问基本能力训练</a>
                            </li>
                        </ul>
                    </li>
                    <li class="wow fadeInUp d2">
                        <a href="javascript:;">企业大学构建与培训师培养</a>
                        <ul>
                            <li>
                                <a href="javascript:;">企业大学构建</a>
                            </li>
                            <li>
                                <a href="javascript:;">战略咨询顾问师能力训练</a>
                                <a href="javascript:;">企业培训</a>
                            </li>
                        </ul>
                    </li>
                    <li class="wow fadeInUp d2">
                        <a href="javascript:;">关于我们</a>
                        <ul>
                            <li>
                                <a href="javascript:;">发展历程</a>
                            </li>
                            <li>
                                <a href="javascript:;">课程风采</a>

                            </li>
                            <li>
                                <a href="javascript:;">企业培训</a>
                            </li>
                        </ul>
                    </li>
                    <li class="wow fadeInUp d2">
                        <a href="javascript:;">管理智库</a>
                        <ul>
                            <li>
                                <a href="javascript:;">OA流程建设与优化</a>
                            </li>
                            <li>
                                <a href="javascript:;">非人力资源经理的人力资源管理</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="footer_btm">
        <div class="w1200">
            <span>Copyright © 2019 - 2021 尚明怀 All Rights Reserved</span>
            <a href="https://beian.miit.gov.cn/">粤ICP备2021121751号</a>
        </div>
    </div>
</div>
</body>
<script src="../js/utils/jquery.min.js"></script>
<script src="../js/utils/swiper.min.js"></script>
<script src="../js/utils/wow.min.js"></script>
<script src="../js/utils/http.js"></script>
<script src="../js/common.js"></script>
<script src="../js/index.js"></script>

</html>