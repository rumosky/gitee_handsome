<?php
/*
 * @Email: rumosky@163.com
 * @Author: rumosky
 * @Github: https://github.com/rumosky
 * @Date: 2020-01-15 17:54:27
 * @Description: handsome主题gitee独立页面5.0版本
 */
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

?>

<?php $this->need('component/header.php'); ?>

	<!-- aside -->
	<?php $this->need('component/aside.php'); ?>
	<!-- / aside -->

<!-- <div id="content" class="app-content"> -->
   <a class="off-screen-toggle hide"></a>
   <main class="app-content-body <?php echo Content::returnPageAnimateClass($this); ?>">
    <div class="hbox hbox-auto-xs hbox-auto-sm">
    <!--文章-->
     <div class="col center-part">
    <!--标题下的一排功能信息图标：作者/时间/浏览次数/评论数/分类-->
         <?php echo Content::exportPostPageHeader($this,$this->user->hasLogin()); ?>
      <div class="wrapper-md" id="post-panel">
       <?php Content::BreadcrumbNavigation($this, $this->options->rootUrl); ?>
       <!--博客文章样式 begin with .blog-post-->
       <div id="postpage" class="blog-post">
        <article class="panel">
        <!--文章页面的头图-->
            <?php echo Content::exportHeaderImg($this); ?>
         <!--文章内容-->
         <div id="post-content" class="wrapper-lg">
          <div class="entry-content l-h-2x">
              <small class="text-muted letterspacing gitee_tips"></small>
              <!--gitee--->
              <div class="repo-list">
                  <div class="blankslate"><h3><?php _me("载入中...") ?></h3></div>
              </div>
          </div>
         </div>
        </article>
       </div>
       <!--评论-->
        <?php $this->need('component/comments.php') ?>
      </div>
     </div>
     <!--文章右侧边栏开始-->
    <?php $this->need('component/sidebar.php'); ?>
     <!--文章右侧边栏结束-->
    </div>

       <!--gitee项模版-->
       <script type="text/template" id="list-template">
           <li class="collection-card">
               <a href="{%=html_url%}.git" class="card text-center" target="_blank">
                   <div class="thumbnail" style="margin-bottom:0px">
                       <div class="card-image geopattern" data-pattern-id="{%=name%}">
                           <div class="card-image-cell">
                               <h3 class="card-title">
                                   {%=name%}
                               </h3>

                           </div>
                       </div>
                       <div class="caption">
                           <div class="card-description">
                               <p class="card-text">{%=description%}</p>
                           </div>
                           <div class="card-text">
                    <span class="meta-info tooltipped tooltipped-n" aria-label="{%=stargazers_count%} stars">
                    <i class="iconfont icon-star"></i> {%=stargazers_count%}</span> <span class="meta-info tooltipped tooltipped-n" aria-label="{%=forks_count%} forks">
                    <i class="iconfont icon-fork"></i> {%=forks_count%}</span> <span class="meta-info tooltipped tooltipped-n" aria-label="最后更新时间：{%=updated_at%}">
                    <span class="octicon octicon-clock"></span>
                      <time datetime="{%=updated_at%}">{%=updated_at%}</time>
                    </span>
                           </div>
                       </div>
                   </div>
               </a>
           </li>

       </script>
       <!--获取失败模版-->
       <script type="text/template" id="error-template">
           <div class="blankslate"><h3>加载失败</h3><p>请刷新或稍后再试...</p>></div>
       </script>

       <?php

       $giteeUser = $this->fields->gitee;

       if ($giteeUser == "" || $giteeUser == null){
           echo '<script>$(".gitee_tips").text("请填写正确的gitee用户名，主题检查gitee用户为空或者错误，已经切换rumosky用户仓库项目。");</script>';
           $giteeUser = 'rumosky_admin';
       }

       ?>
       <script src="<?php echo STATIC_PATH;?>js/function/geopattern.min.js" type="text/javascript"></script>
       <script type="text/javascript">
           (function(window){var baidu=typeof module==="undefined"?(window.baidu=window.baidu||{}):module.exports;baidu.template=function(str,data){var fn=(function(){if(!window.document){return bt._compile(str)}var element=document.getElementById(str);if(element){if(bt.cache[str]){return bt.cache[str]}var html=/^(textarea|input)$/i.test(element.nodeName)?element.value:element.innerHTML;return bt._compile(html)}else{return bt._compile(str)}})();var result=bt._isObject(data)?fn(data):fn;fn=null;return result};var bt=baidu.template;bt.versions=bt.versions||[];bt.versions.push("1.0.6");bt.cache={};bt.LEFT_DELIMITER=bt.LEFT_DELIMITER||"{%";bt.RIGHT_DELIMITER=bt.RIGHT_DELIMITER||"%}";bt.ESCAPE=true;bt._encodeHTML=function(source){return String(source).replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/\\/g,"&#92;").replace(/"/g,"&quot;").replace(/'/g,"&#39;")};bt._encodeReg=function(source){return String(source).replace(/([.*+?^=!:${}()|[\]/\\])/g,"\\$1")};bt._encodeEventHTML=function(source){return String(source).replace(/&/g,"&amp;").replace(/</g,"&lt;").replace(/>/g,"&gt;").replace(/"/g,"&quot;").replace(/'/g,"&#39;").replace(/\\\\/g,"\\").replace(/\\\//g,"/").replace(/\\n/g,"\n").replace(/\\r/g,"\r")};bt._compile=function(str){var funBody="var _template_fun_array=[];\nvar fn=(function(__data__){\nvar _template_varName='';\nfor(name in __data__){\n_template_varName+=('var '+name+'=__data__[\"'+name+'\"];');\n};\neval(_template_varName);\n_template_fun_array.push('"+bt._analysisStr(str)+"');\n_template_varName=null;\n})(_template_object);\nfn = null;\nreturn _template_fun_array.join('');\n";return new Function("_template_object",funBody)};bt._isObject=function(source){return"function"===typeof source||!!(source&&"object"===typeof source)};bt._analysisStr=function(str){var _left_=bt.LEFT_DELIMITER;var _right_=bt.RIGHT_DELIMITER;var _left=bt._encodeReg(_left_);var _right=bt._encodeReg(_right_);str=String(str).replace(new RegExp("("+_left+"[^"+_right+"]*)//.*\n","g"),"$1").replace(new RegExp("<!--.*?-->","g"),"").replace(new RegExp(_left+"\\*.*?\\*"+_right,"g"),"").replace(new RegExp("[\\r\\t\\n]","g"),"").replace(new RegExp(_left+"(?:(?!"+_right+")[\\s\\S])*"+_right+"|((?:(?!"+_left+")[\\s\\S])+)","g"),function(item,$1){var str="";if($1){str=$1.replace(/\\/g,"&#92;").replace(/'/g,"&#39;");while(/<[^<]*?&#39;[^<]*?>/g.test(str)){str=str.replace(/(<[^<]*?)&#39;([^<]*?>)/g,"$1\r$2")}}else{str=item}return str});str=str.replace(new RegExp("("+_left+"[\\s]*?var[\\s]*?.*?[\\s]*?[^;])[\\s]*?"+_right,"g"),"$1;"+_right_).replace(new RegExp("("+_left+":?[hvu]?[\\s]*?=[\\s]*?[^;|"+_right+"]*?);[\\s]*?"+_right,"g"),"$1"+_right_).split(_left_).join("\t");if(bt.ESCAPE){str=str.replace(new RegExp("\\t=(.*?)"+_right,"g"),"',typeof($1) === 'undefined'?'':baidu.template._encodeHTML($1),'")}else{str=str.replace(new RegExp("\\t=(.*?)"+_right,"g"),"',typeof($1) === 'undefined'?'':$1,'")}str=str.replace(new RegExp("\\t:h=(.*?)"+_right,"g"),"',typeof($1) === 'undefined'?'':baidu.template._encodeHTML($1),'").replace(new RegExp("\\t(?::=|-)(.*?)"+_right,"g"),"',typeof($1)==='undefined'?'':$1,'").replace(new RegExp("\\t:u=(.*?)"+_right,"g"),"',typeof($1)==='undefined'?'':encodeURIComponent($1),'").replace(new RegExp("\\t:v=(.*?)"+_right,"g"),"',typeof($1)==='undefined'?'':baidu.template._encodeEventHTML($1),'").split("\t").join("');").split(_right_).join("_template_fun_array.push('").split("\r").join("\\'");return str}})(window);
       </script>
       <script type="text/javascript">

           var open = function(){

               var baiduTpl = new Object();

               var handleTpl = function(){
                   baiduTpl.list = baidu.template("list-template");
                   baiduTpl.error = baidu.template("error-template");
               };

               var handlegitee = function(){
                   var repoContainer = $('.repo-list');
                   var errorContainer = repoContainer.find(".blankslate")
                   var countContainer = $(".gitee_tips");

                   $.get("https://gitee.com/api/v5/users/<?php echo $giteeUser; ?>/repos",function(result){
                       if(result){
                           //alert("ok1");
                           errorContainer.remove();
                           //countContainer.text(result.length); //设置项目个数
                           var ul = $("<ul class='collection-listing clearfix'></ul>");
                           for(var i in result){
                               var repo = result[i];
                               repo.updated_at = repo.updated_at.substring(0,repo.updated_at.lastIndexOf("T"));
                               var html = baiduTpl.list(repo);
                               ul.append(html);
                           }
                           repoContainer.append(ul);
                           $(".geopattern").each(function(){
                               $(this).geopattern($(this).data('pattern-id'));
                           });
                       }else{
                           //alert("ok2");
                           errorContainer.remove();
                           countContainer.append(baiduTpl.error());
                       }
                   });
               };

               return {
                   init : function(){
                       handleTpl();
                       handlegitee();
                   }
               }
           };

           $(open().init);

       </script>
   </main>


    <!-- footer -->
	<?php $this->need('component/footer.php'); ?>
  	<!-- / footer -->

