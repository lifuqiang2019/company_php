<?php
include('./header.php');
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
        <h4>发布新闻</h4>
        <!--
        上传文件的几大前提：
            1、必须要 FORM 的 POST 方式提交
            2、输入框必须是 type="file"
            3、FORM 必须设置为多格式数据上传
        -->
        <form action="./news_new_save.php" method="post" enctype="multipart/form-data">
            <table class="news_form">
                <tr>
                    <td>新闻标题：</td>
                    <td><input type="text" name="title" class="inbox"/></td>
                </tr>
                <tr>
                    <td>新闻内容：</td>
                    <td><textarea id="kindeditor" name="content"  rows="20" cols="100"></textarea></td>
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
                    <td><input type="text" name="author" class="inbox"/></td>
                </tr>
                <tr>
                    <td>上传图片：</td>
                    <td><input type="file" name="img" class="inbox"/></td>
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