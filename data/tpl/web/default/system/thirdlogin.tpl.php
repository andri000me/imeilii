<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header', TEMPLATE_INCLUDEPATH)) : (include template('common/header', TEMPLATE_INCLUDEPATH));?>
<div class="we7-page-title">
	第三方登录配置
</div>
<ul class="we7-page-tab">
	<!--<li <?php  if($type == 'system') { ?>class="active"<?php  } ?>><a href="<?php  echo url('system/thirdlogin', array('type' => 'system'))?>">系统登录</a></li>-->
	<li <?php  if($type == 'qq') { ?>class="active"<?php  } ?>><a href="<?php  echo url('system/thirdlogin', array('type' => 'qq'))?>">QQ互联</a></li>
	<li <?php  if($type == 'wechat') { ?>class="active"<?php  } ?>><a href="<?php  echo url('system/thirdlogin', array('type' => 'wechat'))?>">微信登录</a></li>
</ul>
<div id="js-system-thirdparty-login" ng-controller="SystemThirdpartyLogin" ng-cloak>
<?php  if($type == 'system') { ?>
	<table class="table we7-table table-hover table-form we7-form">
		<col width="220px " />
		<col />
		<col width="230px" />
		<tr>
			<th class="text-left" colspan="2">网站平台登录配置</th>
			<th class="we7-padding-right"></th>
		</tr>
		<tr>
			<td class="table-label" colspan="2">是否启用站点登录</td>
			<td>
				<label>
					<div class="switch" ng-class="{'switchOn' : thirdlogin.system.authstate}" ng-click="httpChange('authstate')"></div>
				</label>
			</td>
		</tr>
	</table>
<?php  } ?>
<?php  if($type == 'qq') { ?>
	<table class="table we7-table table-hover table-form we7-form">
		<col width="220px " />
		<col />
		<col width="230px" />
		<tr>
			<th class="text-left" colspan="2">QQ互联管理中心开发信息</th>
			<th class="we7-padding-right"></th>
		</tr>
		<tr>
			<td class="table-label" colspan="2">是否启用qq登录授权</td>
			<td>
				<label>
					<div class="switch" ng-class="{'switchOn' : thirdlogin.qq.authstate}" ng-click="httpChange('authstate')"></div>
				</label>
			</td>
		</tr>
		<tr>
			<td class="table-label">AppID</td>
			<td>
				<input type="text"  name="appid" ng-model="thirdlogin.qq.appid" readonly class="form-control">
				<div class="help-block">在QQ互联平台注册创建应用后可以获取到AppId</div>
			</td>
			<td>
				<div class="link-group">
					<a href="javascript:;" data-toggle="modal" data-target="#AppID">修改</a>
				</div>
			</td>
		</tr>
		<tr>
			<td class="table-label">AppSecret</td>
			<td>
				<input type="text" name="appsecret" ng-model="thirdlogin.qq.appsecret" readonly class="form-control">
				<div class="help-block">在QQ互联平台注册创建应用后可以获取到AppSecret</div>
			</td>
			<td>
				<div class="link-group"><a href="javascript:;" data-toggle="modal" data-target="#AppSecret">修改</a></div>
			</td>
		</tr>
	</table>
	<div class="modal fade" id="AppID" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">修改AppID</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" ng-model="newappid" class="form-control" placeholder="请填写新的AppID" />
						<span class="help-block">在QQ互联平台注册创建应用后可以获取到AppId</span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="httpChange('appid')">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="AppSecret" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">修改AppSecret</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" ng-model="newappsecret" class="form-control" placeholder="请填写新的AppSecret" />
						<span class="help-block">在QQ互联平台注册创建应用后可以获取到AppSecret</span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="httpChange('appsecret')">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
	<table class="table we7-table table-hover table-form  we7-form">
		<col width="220px " />
		<col />
		<col width="230px"/>
		<tr>
			<th class="text-left" colspan="3">QQ互联接入配置项</th>
		</tr>
		<tr>
			<td class="table-label">网站地址:</td>
			<td>
				<span><?php  echo $url['host'];?></span>
			</td>
			<td>
				<div class="link-group"><a href="javascript:;" id="copy-0" clipboard supported="supported" text="url.host" on-copied="success('0')">点击复制</a></div>
			</td>
		</tr>
		<tr>
			<td class="table-label">网站回调域:</td>
			<td>
				<span><?php  echo $_W['siteroot'];?>web/index.php</span>
			</td>
			<td><div class="link-group"><a href="javascript:;" id="copy-1" clipboard supported="supported" text="siteroot+'web/callback.php'" on-copied="success('1')">点击复制</a></div></td>
		</tr>
	</table>
<?php  } ?>
<?php  if($type == 'wechat') { ?>
	<table class="table we7-table table-hover table-form we7-form">
		<col width="220px " />
		<col />
		<col width="230px" />
		<tr>
			<th class="text-left" colspan="2">微信登录配置信息</th>
			<th class="we7-padding-right"></th>
		</tr>
		<tr>
			<td class="table-label" colspan="2">是否启用微信登录</td>
			<td>
				<label>
					<div class="switch" ng-class="{'switchOn' : thirdlogin.wechat.authstate}" ng-click="httpChange('authstate')"></div>
				</label>
			</td>
		</tr>
		<tr>
			<td class="table-label">AppID</td>
			<td>
				<input type="text"  name="appid" ng-model="thirdlogin.wechat.appid" readonly class="form-control">
				<div class="help-block">在微信开放平台注册创建网站应用后可以获取到AppId</div>
			</td>
			<td>
				<div class="link-group">
					<a href="javascript:;" data-toggle="modal" data-target="#AppID">修改</a>
				</div>
			</td>
		</tr>
		<tr>
			<td class="table-label">AppSecret</td>
			<td>
				<input type="text" name="appsecret" ng-model="thirdlogin.wechat.appsecret" readonly class="form-control">
				<div class="help-block">在微信开放平台注册创建网站应用后可以获取到AppSecret</div>
			</td>
			<td>
				<div class="link-group"><a href="javascript:;" data-toggle="modal" data-target="#AppSecret">修改</a></div>
			</td>
		</tr>
	</table>
	<div class="modal fade" id="AppID" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">修改AppID</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" ng-model="newappid" class="form-control" placeholder="请填写新的AppID" />
						<span class="help-block">在微信开放平台注册创建网站应用后可以获取到AppId</span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="httpChange('appid')">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
	<div class="modal fade" id="AppSecret" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="we7-modal-dialog modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
					<div class="modal-title">修改AppSecret</div>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<input type="text" ng-model="newappsecret" class="form-control" placeholder="请填写新的AppSecret" />
						<span class="help-block">在微信开放平台注册创建网站应用后可以获取到AppSecret</span>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" ng-click="httpChange('appsecret')">确定</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
				</div>
			</div>
		</div>
	</div>
<?php  } ?>
</div>
<script type="text/javascript">
	angular.module('systemApp').value('config', {
		'type' : "<?php echo !empty($type) ? $type: 'System'?>",
		'thirdlogin' : <?php echo !empty($_W['setting']['thirdlogin']) ? json_encode($_W['setting']['thirdlogin']) : 'null'?>,
		'siteroot': "<?php  echo $_W['siteroot']?>",
		'links': {
			'save_setting': "<?php  echo url('system/thirdlogin/save_setting')?>",
		},
	});
	angular.bootstrap($('#js-system-thirdparty-login'), ['systemApp']);
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer', TEMPLATE_INCLUDEPATH)) : (include template('common/footer', TEMPLATE_INCLUDEPATH));?>