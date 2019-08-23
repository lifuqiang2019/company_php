<?php
include('./header.php');
include('../conn.php');
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
                        <th>模块名</th>
                        <th>内容</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // 构造读取数据列表的 SQL 语句
                    $sql = "select * from board order by id asc";
                    $result = mysqli_query($conn, $sql);

                    // 通过 mysqli_fetch_assoc 从结果集中读取一行数据形成关联数组，记录指针移动到下一行
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr>';
                        echo '<td>'.$row[id].'</td>';
                        echo '<td>'.$row[boardname].'</td>';
                        echo '<td>'.mb_substr(strip_tags($row[content]), 0, 80, 'utf-8').'...</td>'; // strip_tags 去除 html 标签直接显示文字效果
                        echo '<td><a href="./page_edit.php?id='.$row[id].'">修改</a><a href="./page_delete.php?id='.$row[id].'">删除</a></td>';
                        echo '</tr>';
                    }

                    mysqli_free_result($result);
                    ?>
                    
                </tbody>
            </table>
        </div>
    </div>
<?php
include('./footer.php');
?>