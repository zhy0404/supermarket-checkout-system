<?php
session_start();
header('Content-type:text/html; charset=utf8');
//接受ajax数据
$aa=json_encode(@$_POST);//将接受的数据转为标准php的json
$bb=json_decode($aa);//将json转化为php标准类
    //处理数据	
    //打开数据库
    $conn=new mysqli('localhost','root','Zhy0626@','zhouhangyong');
    if($conn->connect_error)
    {
        die($conn->connect_error);
    }
    $conn->query('SET NEMES gdb4');
    $str='select * from yuangong where 员工编号="'.$bb->number.'"';
    $rs=$conn->query($str);
    $tag=0;
    if($rs->num_rows>0)
    {
        $tag=1;
    }
    $conn->close();
    //返回ajax数据
    $cc=array('jg'=>$tag);//组织php数据
    $dd=json_encode($cc);//转化为json格式
    echo $dd;//发送json

?>