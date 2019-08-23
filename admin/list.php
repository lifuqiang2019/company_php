<?php
include('./header.php');
?>
    <div class="mainbox">
        <div class="note">
            <h4>新闻列表</h4>
            <form action="" method="post" class="search_form">
                <input type="text" name="keywords" placeholder="请输入是搜索关键字" />
                <input type="submit" value="搜索" />
            </form>
            <table class="news_list">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>标题</th>
                        <th>摘要</th>
                        <th>日期</th>
                        <th>点击率</th>
                        <th>操作</th>
                    </tr>
                </thead>
            </table>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>今天我发现一个大事</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </div>
    </div>
<?php
include('./footer.php');
?>