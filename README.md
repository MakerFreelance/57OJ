项目正在开发中！
---
* 57OJ是一个信息学竞赛题库，在这里可以上传竞赛题，组织比赛，和统计分析。请关注开发者的博客<https://maker-freelance.com>获取更新动态。
* 推荐运行环境为Ubuntu，Centos、Deepin等Linux发行版，开发环境为PHP7.2，支持PHP5.5+,需启动mbstring模块。

开始部署
---

1. 构建数据库结构
* 在sae目录下有db.sql文件，他是57oj的数据库结构，将他载入你的数据库，这里数据库名称设置为jol。
2. 克隆57OJ到本地，有两个配置文件，一个在web/include/db_info.inc.php，这个是PHP后台的配置，另一个在etc/,是评测机的配置文件。