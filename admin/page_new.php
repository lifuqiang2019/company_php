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
        <h4>新增单页</h4>
        <form action="./page_new_save.php" method="post">
            <table class="news_form">
                <tr>
                    <td>单页模块名：</td>
                    <td><input type="text" name="boardname" class="inbox"/></td>
                </tr>
                <tr>
                    <td>详细内容：</td>
                    <td><textarea id="kindeditor" name="content"  rows="20" cols="100"></textarea></td>
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