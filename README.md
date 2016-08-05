1、在html中引入css样式
<link rel="stylesheet" type="text/css" href="./page.css">

2、在php中引入page.php
require_once('./page.php');

3、使用 html_page函数
   <?php 
    $total = 200;
    $pagesize = 20;
    $currpage =  isset($_GET['currpage'])?intval($_GET['currpage']):1;
    $currpage = ($currpage == 0 || $currpage > ceil($total/$pagesize))?1:$currpage; //$currentpage 参数不合法则强制page为1
    echo html_page ($_GET, $total,$currpage, $pagesize);
    ?>
    
4、将html_page生成的html放在<ul class="pagination"></ul>中
