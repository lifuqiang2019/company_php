# 需求分析

## 企业网站的构成

- 前台 -----> 给普通用户查看，不需要登录
- 后台 -----> 提供给管理员管理使用，需要登录

## 开发流程

先开发后台在开发前台

## 功能分析

### 后台功能分析

- 管理员登录模块
- 单页模块（企业简介、发展历程、企业文化）
- 新闻中心模块
- 产品中心模块
- 分类模块
- 友情链接模块
- 管理员模块
- 留言管理模块

### 前台功能分析

- 首页
- 新闻中心
- 产品中心
- 来宾留言
- 企业文化
- 联系我们

## 思路分析

### 后台

#### 管理员登录模块

* 1. 新建一个 HTML文件 login.html , 制作 FORM 表单，用于收集管理员提供的用户名和密码
  2. 将收集的登录名和密码提交给 PHP 文件（checklogin.php）去验证
  3. 在 checklogin.php 文件中接收传过来的登录名和密码，验证有效性。
  4. 构造查询数据库的 sql 语句，发往数据库执行，将执行的结果返回给一个变量（结果集）
  5. 将查询的结果进行判断，如果有数据库则表示提供的登录名和密码是正确的，跳转到后台首页。否则，没有数据时，表示提供的登录名和密码在数据库中不存在，验证不通过，跳转回登陆界面。
  6. 验证用户是否已登录或是登录时效性过期
     1. 在后台的公共文件中，判断用户登录的 session 数据是否存在,如果 session 数据不存在，提示用户重新登录跳转到登录界面（login.html）
  7. 退出登陆系统
     1. 新建一个文件 （loginout.php）,清除 session 数据实现推出，跳转会 login.html

  #### 单页模块（企业简介、发展历程、企业文化......）

  ​	A. 新增一个单页

     1. 在后台导航上添加一个链接“新增单页”， 文件名： page_new.php

     2. 新建一个文件 page_new.php ,制作 FORM 表单，表单元素，模块名（文本框）、内容（文本域） 

     3. 将表单的数据提交到 page_save.php  处理

     4. 新建 page_new_save.php 页面，接收表单传值

     5. 构造 SQL 语句将数据插入到数据库中，返回执行状态

     6. 判断执行状态，输出相应的结果

        

  ​	B. 显示一个单页列表

   1. 在后台导航上添加一个连接“单页管理”，文件名：page_list.php

   2. 新建文件 page_list.php , 用于显示所有的单页列表，可以提前做好显示列表的样式

   3. 构造SQL语句，从数据库中读取所有的单页数据，显示出来即可

      

  ​	C. 修改单页

   1. 在单页列表每一项后面添加一个操作栏目，加上“修改”链接，跳转到 page_edit.php ，同时传输一个单页标识（id）

   2. 新建文件 page_edit.php 制作FORM表单用于显示从数据库读取所有单页信息，提供给管理员修改

   3. 修改完成以后，将数据提交到 page_edit_save.php (POST)

   4. 新建文件 page_edit_save.php 用于保存修改后的数据，接收表单传值

   5. 构造SQL语句，将新的数据写入到数据库中即完成修改功能

   6. 判断执行的状态，输出相应的结果

      

  ​	D. 删除单页

  	1. 在单页列表的每一项后面添加一个“删除”链接，跳转到 page_delete.php ，同时传输一个单页标识（id）
   	2. 新建一个 page_delete.php ，用于删除单页数据，接收被删除的单页的标识
   	3. 构造删除数据的SQL语句，发往数据库执行，实现删除功能

## 数据库分析

创建新的数据库 company

```
create database company;
```

1. 管理员表 admin

   管理员（id，登录名，密码）

   ```
   create table admin(
   id int primary key auto_increment,
   username varchar(20),
   password char(32)
   );
   ```

2. 单页表 board

   单页表（id, 模块名, 内容）

   ```
   create table board(
   
   id int primary key auto_increment,
   
   boardname varchar(20),
   
   content text
   
   );
   ```

3. 新闻表 news

   新闻表（id, 新闻标题，新闻的分类，新闻的作者，新闻内容，新闻头图，发布时间，点击率）

   ```
   create table news(
   id int primary key auto_increment,
   title varchar(50),
   cate_id int default 0,
   author varchar(30),
   content text,
   img varchar(50),
   intime timestamp default current_timestamp,
   hits int default 0
   );
   ```

4. 产品表 product

   产品表（id，名称，编号，分类，详细说明，产品图，发布时间，点击率）

   ```
   create table product(
   id int primary key auto_increment,
   productname varchar(40),
   pro_no varchar(30),
   cate_id int default 0,
   content text,
   img varchar(50),
   intime timestamp default current_timestamp,
   hits int default 0
   );
   ```

5. 分类表 category

   分类表（id，分类名，排序号）

   ```
   create table category(
   id int primary key auto_increment,
   catename varchar(30),
   orderno tinyint unsigned default 5
   );
   ```

6. 友情链接表 flink

   友情链接（id，链接名，网址，说明，时间）

   ```
   create table flink(
   id int primary key auto_increment,
   title varchar(20),
   link_url varchar(50),
   content text,
   intime timestamp default current_timestamp
   );
   ```

7. 留言表 guestbook

   留言表（id，用户名，留言内容，留言时间）

   ```
   create table guestbook(
   id int primary key auto_increment,
   username varchar(30),
   content text,
   intime timestamp default current_timestamp
   );
   ```



