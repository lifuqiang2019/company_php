<?php
include('../conn.php');
include('./header.php');

$id = $_GET['id'];

// 构造 SQL 语句，从数据库中读取老的新闻数据
$sql = "select * from news where id=$id";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)){
    $row = mysqli_fetch_assoc($result);
} else {
    echo "没有数据！";exit;
}
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
        <h4>修改新闻</h4>
        <!--
        上传文件的几大前提：
            1、必须要 FORM 的 POST 方式提交
            2、输入框必须是 type="file"
            3、FORM 必须设置为多格式数据上传
        -->
        <form action="./news_edit_save.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id;?>"/>
            <table class="news_form">
                <tr>
                    <td>新闻标题：</td>
                    <td><input type="text" name="title" class="inbox" value="<?php echo $row['title'];?>"/></td>
                </tr>
                <tr>
                    <td>新闻内容：</td>
                    <td><textarea id="kindeditor" name="content"  rows="20" cols="100"><?php echo $row['content'];?></textarea></td>
                </tr>
                <tr>
                    <td>新闻分类：</td>
                    <td>
                        <select name="cate_id" class="inbox">
                            <option value="0">请选择新闻分类</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>作&emsp;&emsp;者：</td>
                    <td><input type="text" name="author" class="inbox" value="<?php echo $row['author'];?>"/></td>
                </tr>
                <tr>
                    <td>上传图片：</td>
                    <td>
                        <img src="../files/<?php echo $row['img'];?>" width="200"/><br/>
                        <input type="file" name="img" class="inbox" />
                        <input type="hidden" name="old_img" value="<?php echo $row['img'];?>"/>
                    </td>
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