<?php /*a:1:{s:26:"..\view\index\welcome.html";i:1651638060;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="系统开发中">
    <meta name="author" content="weiming">
    <meta name="keywords" content="系统开发中">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>系统开发中</title>
    <link rel="stylesheet" href="/static/common/css/welcome.css?v=<?php echo htmlentities($version); ?>">
</head>
<body>
<div id='app'>
</div>

    <!-- 底部-->
    <footer class="site-footer">
        <div class="container">
            <p class="protocol"><?php echo htmlentities((isset($data['description']) && ($data['description'] !== '')?$data['description']:'')); ?></p>
            <p class="beian-number"><?php echo htmlentities((isset($data['system_description']) && ($data['system_description'] !== '')?$data['system_description']:'')); ?></p>
            <p>Website development</p>
        </div>
    </footer>
</div>
</body>
</html>
