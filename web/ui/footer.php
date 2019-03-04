</div>
<div class="col-xs-12 col-md-12 oj57-footer">
    <div class="container">
        <div class="col-xs-9 col-md-9 pull-left container-left">
            <div style='color:#fff;font-size:15px;text-align:center' >@2018-<span id='utime'>9999</span> - 郑州市第五十七中学代码评测系统，作者:<a href='https://Yaolou.Wang/'>Yaolou</a>，57OJ使用HUSTOJ的判题内核强力驱动，遵循GPLv2协议<a href='https://github.com/Yaolou/57OJ'>Github</a>。服务器时间:<span id=nowdate></span></div>
            <h4 style='color:#fff;'>管理团队:</h4>
            <div style='color:#fff;font-size:15px'>郑州市第五十七中学信息组：cc6666、</div>
        </div>
        <div class="col-xs-3 col-md-3 pull-rigth container-rigth">
            <h4 style='color:#fff;'>友情链接:</h4>
            <ul>
                <li><a href="http://www.zz57z.com">郑州市第五十七中学官网</a></li>
                <li><a href="https://Yaolou.Wang">开发者的博客</a></li>
            </ul>
        </div>
    </div>
</div>
<script language="javascript" type="text/javascript" src="include/jquery.flot.js"></script>
<script language="javascript" type="text/javascript">
document.getElementById("utime").innerHTML=(new Date()).getFullYear();
</script>
<script>
var diff=new Date("<?php echo date("Y/m/d H:i:s")?>").getTime()-new Date().getTime();
//alert(diff);
function clock()
{
var x,h,m,s,n,xingqi,y,mon,d;
var x = new Date(new Date().getTime()+diff);
y = x.getYear()+1900;
if (y>3000) y-=1900;
mon = x.getMonth()+1;
d = x.getDate();
xingqi = x.getDay();
h=x.getHours();
m=x.getMinutes();
s=x.getSeconds();
n=y+"-"+mon+"-"+d+" "+(h>=10?h:"0"+h)+":"+(m>=10?m:"0"+m)+":"+(s>=10?s:"0"+s);
//alert(n);
document.getElementById('nowdate').innerHTML=n;
setTimeout("clock()",1000);
}
clock();
</script>
</div>
</body>
</html>