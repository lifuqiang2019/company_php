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
                        <th>标题</th>
                        <th>摘要</th>
                        <th>日期</th>
                        <th>点击率</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "select * from news";
                    $result = mysqli_query($conn, $sql);

                    $pagesize = 3;
                    $page = isset($_GET['page'])? $_GET['page'] : 1;
                    $records = mysqli_num_rows($result); // 获取结果集中的总行数
                    // 构造读取分页数据列表的 SQL 语句
                    $start = ($page - 1) * $pagesize;
                    $sql = "select * from news order by intime desc limit $start,$pagesize";
                    $result = mysqli_query($conn, $sql);

                    // 通过 mysqli_fetch_assoc 从结果集中读取一行数据形成关联数组，记录指针移动到下一行
                    while($row = mysqli_fetch_assoc($result)){
                        echo '<tr>';
                        echo '<td>'.$row['id'].'</td>';
                        echo '<td>'.$row['title'].'</td>';
                        echo '<td>'.mb_substr(strip_tags($row['content']), 0, 80, 'utf-8').'...</td>'; // strip_tags 去除 html 标签直接显示文字效果
                        echo '<td>'.$row['intime'].'</td>';
                        echo '<td>'.$row['hits'].'</td>';
                        echo '<td><a href="./news_edit.php?id='.$row[id].'">修改</a><a href="./news_delete.php?id='.$row['id'].'" onclick="return confirm(\'您确定要删除这条数据吗？\')">删除</a></td>';
                        echo '</tr>';
                    }

                    mysqli_free_result($result);
                    ?>
                    
                </tbody>
            </table>
            <?php 
            // 打印页码表
            $pagecount = ceil($records/$pagesize);
            for($i=1 ; $i <= $pagecount; $i++) {
                if($page == $i){
                    echo "<a href='./news_list.php?page=$i' class='on'>$i</a>";
                } else {
                    echo "<a href='./news_list.php?page=$i'>$i</a>";
                }
                
            }
            ?>
        </div>
    </div>
<?php
include('./footer.php');
?>