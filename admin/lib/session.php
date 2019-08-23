<?php
header('Content-type: text/html;charset=utf-8');

// 弹出提示框然后跳转到指定的URL
function alert($str, $url){
    echo '<script>window.alert("'.$str.'");location.href="'.$url.'"</script>';
}
?>