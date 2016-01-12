<?php if (!defined('THINK_PATH')) exit();?><div class="person-info clearfix login-status-box">
  <dl class="person-info-t clearfix">
    <dt><a href="<?php echo ($userInfo["space_url"]); ?>"><img src="<?php echo ($userInfo["avatar_big"]); ?>" /></a><a href="<?php echo U('public/Account/avatar');?>" class="face">换头像</a></dt>
    <dd>
      <div class="name"> <a href="<?php echo ($userInfo["space_url"]); ?>"><?php echo ($userInfo["uname"]); ?></a> 
      </div>
      <div class="user-grade clearfix">
        <span class="grade">等级: <?php echo intval($userInfo['credit_info']['level']['level']);?></span><?php if(is_array($userCredit["credit"])): ?><?php $i = 0;?><?php $__LIST__ = $userCredit["credit"]?><?php if( count($__LIST__)==0 ) : echo "" ; ?><?php else: ?><?php foreach($__LIST__ as $key=>$vo): ?><?php ++$i;?><?php $mod = ($i % 2 )?><span class="grade"><?php echo ($vo["alias"]); ?>: <?php echo intval($vo['value']);?></span><?php endforeach; ?><?php endif; ?><?php else: echo "" ;?><?php endif; ?>
      </div>
    </dd>
  </dl>
  <ul class="person-info-b clearfix">
    <li><a href="<?php echo U('public/Profile/index',array('uid'=>$userInfo[uid]));?>">分享: <h6><?php echo (($userData["weibo_count"])?($userData["weibo_count"]):0); ?></h6></a></li>
    <li><a href="<?php echo U('public/Profile/collection', array('tab'=>'collect','uid'=>$userInfo[uid]));?>">收藏: <h6><?php echo (($userData["favorite_count"])?($userData["favorite_count"]):0); ?></h6></a></li>
    <li><a href="<?php echo U('public/Profile/following', array('tab'=>'following','uid'=>$userInfo[uid]));?>">关注: <h6><?php echo (($userData["following_count"])?($userData["following_count"]):0); ?></h6></a></li>
    <li><a href="<?php echo U('public/Profile/follower', array('tab'=>'follow','uid'=>$userInfo[uid]));?>">粉丝: <h6><?php echo (($userData["follower_count"])?($userData["follower_count"]):0); ?><span class="new_folower_count"></span></h6></a></li>
  </ul>
  <?php echo W('MedalList');?> </div>
<script type="text/javascript">
// 事件监听
M.addEventFns({
	ico_level_right: {
		load: function() {
			var offset = $(this).offset();
			var top = offset.top + 23;
			var left = offset.left -10;
			var html = '<div id="layer_level_right" class="layer-open experience" style="display:none;position:absolute;z-index:9;top:'+top+'px;left:'+left+'px;">\
						<dl>\
						<dd><?php echo L('PUBLIC_USER_LEVEL');?>：<?php echo ($userCredit["level"]["name"]); ?></dd>\
						<dd><?php echo L('PUBLIC_USER_POINTS_CALCULATION',array('num'=>$userCredit['credit']['experience']['value'],'experience'=>$userCredit['creditType'][$userCredit['level']['level_type']]));?></dd>\
						<dd class="textb"><?php echo L('PUBLI_USER_UPGRADE_TIPS',array('num'=>$userCredit['level']['nextNeed'],'experience'=>$userCredit['creditType'][$userCredit['level']['level_type']]));?></dd>\
						</dl>\
						</div>';
			$("body").append(html);

			this._model = document.getElementById("layer_level_right");
		},
		mouseenter: function() {
			var offset = $(this).offset();
			var width = $(window).width();
			if ($(window).width() > $(this._model).width() + offset.left) {
				$(this._model).css('left', offset.left);
			} else {
				$(this._model).css('left', offset.left - $(this._model).width() + $(this).width());
			}
			$(this._model).css('display', 'block');
		},
		mouseleave: function() {
			$(this._model).css('display', 'none');
		}
	},
	ico_wallet_right: {
		load: function() {
			var offset = $(this).offset();
			var top = offset.top + 23;
			var left = offset.left - 20;
			var html = '<div id="layer_wallet_right" class="layer-open scale" style="display:none;position:absolute;top:'+top+'px;left:'+left+'px;">\
						<dl>\
						<dt></dt>\
						<dd><?php echo L('PUBLIC_USER_POINTS_CALCULATION',array('num'=>intval($userCredit['credit']['score']['value']),'experience'=>$userCredit['creditType']['score']));?></dd>\
						</dl>\
						</div>';
			$("body").append(html);
			this._model = document.getElementById("layer_wallet_right");
		},
		mouseenter: function() {
			$(this._model).css('display', 'block');
		},
		mouseleave: function() {
			$(this._model).css('display', 'none');
		}
	},
	show_medal:{
		click:function (){
			var status = $(this).children().attr('class');
			if ( status == 'arrow-next-page'){
				$(this).children().attr('class','arrow-previous-page');
				$("li[status='hide']").show();
			} else {
				$(this).children().attr('class','arrow-next-page');
				$("li[status='hide']").hide();
			}
		}
	}
}); 
</script>