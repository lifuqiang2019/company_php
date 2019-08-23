<?php
include('./header.php');
?>
    <div class="mainbox">
        <h4>发表新闻</h4>
        <form action="" method="post">
            <table class="news_form">
                <tr>
                    <td>新闻标题：</td>
                    <td><input type="text" name="title" class="inbox"/></td>
                </tr>
                <tr>
                    <td>新闻分类：</td>
                    <td>
                        <section class="inbox">
                            <option>请选择分类</option>
                        </section>
                    </td>
                </tr>
                <tr>
                    <td>作  者：</td>
                    <td><input type="text" name="title" class="inbox"/></td>
                </tr>
                <tr>
                    <td>详细内容：</td>
                    <td><input type="text" name="title" class="inbox"/></td>
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