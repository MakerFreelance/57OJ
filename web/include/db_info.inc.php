<?php @session_start();
ini_set("display_errors","Off");
// 数据库配置信息
static 	$DB_HOST="localhost";
static 	$DB_NAME="jol";
static 	$DB_USER="root";
static 	$DB_PASS="mysql666";
// 首页信息配置
static  $NOTICE="<p>本系统以在线编写(在线IDE)的形式上传源代码,现作为郑州市第五十七中学内网题库，测评环境为Linux,无法调用WindowsAPI以及其他SDK，推荐根据个人习惯选择合适的编辑器或IDE测试代码无误再复制提交，推荐：Dev-C++、MinGWStudio、VS Code。如有问题请加QQ交流群:<a target='_blank' href='//shang.qq.com/wpa/qunwpa?idkey=49f8cbfbc51ff7745d236f76cb9c1aadf308d43fb3461becf5986a2a92d4dcad'>878668254</a>进行反馈。</p>";
static  $NOTICE_1_image="1.jpg";
static  $NOTICE_2_image="2.jpg";
static  $NOTICE_3_image="3.jpg";
static 	$OJ_NAME="57OJ-信息学竞赛在线题库";
static  $view_title="郑州市第五十七中学代码测评系统";
//搜索引擎相关配置
static  $OJ_keywords="57OJ,OJ,信息学竞赛,NOIP,ACM,NOI,OI,五十七中,郑州市第五十七中学";	//搜索引擎关键字
static 	$OJ_description="57OJ现作为郑州市第五十七中学内网评测系统,57OJ使用HUSTOJ的判题内核强力驱动,给学生更好的交互体验,官方QQ交流群:878668254";		//搜索引擎描述
// 57OJ高级设置
static 	$OJ_HOME="./";
static 	$OJ_ADMIN="root@localhost";
static 	$OJ_DATA="/home/www/data";
static 	$OJ_BBS="57bbs";
static  $OJ_ONLINE=false;
static  $OJ_LANG="cn";
static  $OJ_SIM=false; 
static  $OJ_DICT=false;
static  $OJ_LANGMASK=0; //1mC 2mCPP 4mPascal 8mJava 16mRuby 32mBash 1008 for security reason to mask all other language
static  $OJ_EDITE_AREA=true;//true: syntax highlighting is active
static  $OJ_ACE_EDITOR=true;
static  $OJ_AUTO_SHARE=false;//true: One can view all AC submit if he/she has ACed it onece.
static  $OJ_CSS="white.css";
static  $OJ_SAE=false; //using sina application engine
static  $OJ_VCODE=false;
static  $OJ_APPENDCODE=false;
static  $OJ_CE_PENALTY=false;
static  $OJ_PRINTER=false;
static  $OJ_MAIL=true;
static  $OJ_MEMCACHE=false;
static  $OJ_MEMSERVER="127.0.0.1";
static  $OJ_MEMPORT=11211;
static  $OJ_REDIS=false;
static  $OJ_REDISSERVER="127.0.0.1";
static  $OJ_REDISPORT=6379;
static  $OJ_REDISQNAME="57oj";
static  $SAE_STORAGE_ROOT="http://hustoj-web.stor.sinaapp.com/";
if(isset($_GET['tp'])) $OJ_TEMPLATE=$_GET['tp'];
static  $OJ_LOGIN_MOD="57oj";
static  $OJ_REGISTER=true; //允许注册新用户
static  $OJ_REG_NEED_CONFIRM=false; //新注册用户需要审核
static  $OJ_NEED_LOGIN=false; //需要登录才能访问
static  $OJ_RANK_LOCK_PERCENT=0; //比赛封榜时间比例
static  $OJ_SHOW_DIFF=true; //是否显示WA的对比说明
static  $OJ_TEST_RUN=true; //提交界面是否允许测试运行
static  $OJ_BLOCKLY=false; //是否启用Blockly界面
static  $OJ_ENCODE_SUBMIT=false; //是否启用base64编码提交的功能，用来回避WAF防火墙误拦截。

//static  $OJ_EXAM_CONTEST_ID=1000; // 启用考试状态，填写考试比赛ID
//static  $OJ_ON_SITE_CONTEST_ID=1000; //启用现场赛状态，填写现场赛比赛ID

static $OJ_OPENID_PWD = '8a367fe87b1e406ea8e94d7d508dcf01';

if( isset($_SERVER['HTTP_ACCEPT_LANGUAGE']) && strstr($_SERVER['HTTP_ACCEPT_LANGUAGE'],"zh-CN")) {
        $OJ_LANG="cn";
}
if (isset($_SESSION[$OJ_NAME.'_'.'OJ_LANG'])) $OJ_LANG=$_SESSION[$OJ_NAME.'_'.'OJ_LANG'];


require_once(dirname(__FILE__)."/pdo.php");	
		
	if(isset($OJ_CSRF)&&$OJ_CSRF&&$OJ_TEMPLATE=="bs3"&&basename($_SERVER['PHP_SELF'])!="problem_judge")
		 require_once('csrf_check.php');

?>
