<?php
/**
 * 分页
 * $query_data 查询字符串数组 为了换页时不将原先的查询条件删除
 * $total 总记录数
 * $page 当前页码数
 * $pagesize 每页显示多少
 */
function html_page ($query_data, $total, $page, $pagesize)
{
    $query_where = '';
    if ($query_data) {
        foreach ($query_data as $k => $v) {
            if ($k != "currpage") {
                $query_where .= $k . '=' . $v . "&";
            }
        }
    }
    
    $query_where = '?' . $query_where;
    
    $numPages = ceil($total / $pagesize); // 总页数
    if ($numPages <= 0) {
        $numPages = 1;
    }
    
    $showpages = 10;
    $start = 0;
    $end = 0;
    if ($showpages >= $numPages) {
        $start = 1;
        $end = $numPages;
    } else {
        if (($page + $showpages) <= $numPages) {
            $start = $page;
            $end = $start + 10 - 1;
        } else {
            $start = $numPages - 9;
            $end = $numPages;
        }
    }
    $retval = '';
    if ($page > 1) {
        $retval .= "<li><a href='" . $query_where . "currpage=1'>首页</a></li>";
        $retval .= "<li><a href='" . $query_where . "currpage=" . ($page - 1) .
                 "' >上一页</a></li>";
    }
    for ($i = $start; $i <= $end; $i ++) {
        if ($page == $i) {
            $retval .= "<li class=\"active disabled\"><a href='#'>$i</a></li>";
        } else {
            $retval .= "<li><a href='" . $query_where . "currpage=" . $i . "' >" .
                     $i . "</a></li>";
        }
    }
    $nextpage = $page + 1;
    if ($page < $numPages) {
        $retval .= "<li><a href='" . $query_where . "currpage=" . $nextpage ."' >下一页</a></li>";
        $retval .= "<li><a href='" . $query_where . "currpage=$numPages'>尾页</a></li>";

    }
    $retval .= "<li><a>共{$numPages}页</a></li>";
    return $retval;
}
?>