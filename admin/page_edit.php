<?php
include('./header.php');
include('../conn.php');

// 接收数据
$id = $_GET['id'];

// 验证数据有效性
if(!is_numeric($id)){
    alert('ID 值不是一个数字', './page_list.php');exit;
}

// 构造 SQL 语句，去数据库查旧的数据
$sql = "select * from board where id=$id";
$result = mysqli_query($conn, $sql);

// 数据判断，有则显示查询到的数据，无则终止
if(mysqli_num_rows($result)){
    $row = mysqli_fetch_assoc($result);
} else {
    echo "没有数据";exit;
}
mysqli_free_result($result);

?>
    <script charset="utf-8" src="./assets/kindeditor/kindeditor-all-min.js"></script>
    <script charset="utf-8" src="./assets/kindeditor/lang/zh-CN.js"></script>
    <script type="text/javascript">
        var editor;
        KindEditor.ready(function(K) {
        editor = K.create('textarea', {
        allowImageUpload : false,
        items : [
            'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic',
        'underline', 'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright',
        'insertorderedlist', 'insertunorderedlist', '|', 'emoticons', 'image', 'link']
        });
        });
    </script>

    <div class="mainbox">
        <h4>修改单页</h4>
        <form action="./page_new_save.php" method="post">
            <table class="news_form">
                <tr>
                    <td>单页模块名：</td>
                    <td><input type="text" name="boardname" class="inbox" value="<?php echo $row['boardname'];?>"/></td>
                </tr>
                <tr>
                    <td>详细内容：</td>
                    <td><textarea id="kindeditor" name="content"  rows="20" cols="100"><?php echo $row['boardname'];?></textarea></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" value="提交"/></td>
                </tr>
            </table>
        </form>
    </div>
<?php
include('./footer.php')
?>