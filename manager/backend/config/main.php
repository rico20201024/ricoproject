<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [

	// 'defaultRoute'=>'article-manager/admin',
	'name'=>'RICO·管理系统',			//自定义属性在全局可以使用
    'language'=>'zh-CN',
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
            'admin' => [
                'class' => 'mdm\admin\Module',
                'layout' => 'left-menu',//yii2-admin的导航菜单
				// 'mainLayout' => '@app/views/layouts/main_sys.php', //自己的layout
        ]
    ],
    'components' => [
	    'assetManager' => [
			'bundles' => [
				'dmstr\web\AdminLteAsset' => [
					// 'skin' => 'skin-red',
				],
			],
		],
        'i18n' => [
            'translations' => [
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@app/messages', // if advanced application, set @frontend/messages
                    'sourceLanguage' => 'en',
                    'fileMap' => [
                        'main' => 'main.php',
                    ],
                ],
            ],
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // 使用数据库管理配置文件
            'itemTable'=> 'auth_item',
            'itemChildTable'=> 'auth_item_child',
            'assignmentTable'=> 'auth_assignment',
            'ruleTable'=> 'auth_rule',
        ],

        'request' => [
            'csrfParam' => '_csrf-backend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-backend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'advanced-backend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
           'admin/*',
		   'test/*',
           'article-manager/*',
		   'product/*',
		   'customer/*',
		   'orders/*',
		   'order/*',
		   'productneed/*',
            //'some-controller/some-action',        
            //此处的action列表，允许任何人（包括游客）访问
            //所以如果是正式环境（线上环境），不应该在这里配置任何东西，为空即可
           //但是为了在开发环境更简单的使用，可以在此处配置你所需要的任何权限
           //在开发完成之后，需要清空这里的配置，转而在系统里面通过RBAC配置权限
        ]
    ],

    'params' => $params,
];
