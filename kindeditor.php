<link rel="stylesheet" href="kindeditor/themes/default/default.css" />
<link rel="stylesheet" href="kindeditor/themes/simple/simple.css" />
<script charset="utf-8" src="kindeditor/kindeditor.js"></script>
<script charset="utf-8" src="kindeditor/lang/zh-CN.js"></script>
<script>
        var editor;
        KindEditor.ready(function(K) {
                editor = K.create('#mail', {
                        themeType : 'simple',
                        resizeType:1
                });
                editor.sync();
        });
</script>