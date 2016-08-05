<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>分页</title>
	<link rel="stylesheet" type="text/css" href="./page.css">
</head>
<body>
		<div style="text-align:center;background-color: #FAFAFA;">
                <ul class="pagination">
                	<?php 
                		require_once('./page.php');
                        /*
                            $total = $count;    //从数据库中搜索出来的总条数
                            $currpage =  isset($_GET['currpage'])?intval($_GET['currpage']):1;  //当前页码数
                            $currpage = $currpage == 0?1:$currpage;
                            $pagesize = 20;     //每页大小 20条数据
                            $page = ($currpage - 1) * $pagesize;    //计算limit偏移
                            $page_list = html_page($_GET, $total, $currpage, $pagesize);    //将$_GET传入 是为了不将参数丢掉

                            $sql = "select * from demo where 1=1 limit {$page},{$pagesize}");  //在sql后面加上limit         
                        */
                        $total = 200;
                        $pagesize = 20;
                        $currpage =  isset($_GET['currpage'])?intval($_GET['currpage']):1;
                        $currpage = ($currpage == 0 || $currpage > ceil($total/$pagesize))?1:$currpage; //$currentpage 参数不合法则强制page为1
                		    echo html_page ($_GET, $total,$currpage, $pagesize);
                	?>
                </ul>
        </div>
</body>
</html>
