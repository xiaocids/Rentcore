<?php
$config = [
    'homeUrl'=>Yii::getAlias('@backendUrl'),
    'controllerNamespace' => 'backend\controllers',
    'defaultRoute'=>'timeline-event/index',
    'controllerMap'=>[
        'file-manager-elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['manager'],
            'disabledCommands' => ['netmount'],
            'roots' => [
                [
                    'baseUrl' => '@storageUrl',
                    'basePath' => '@storage',
                    'path'   => '/',
                    'access' => ['read' => 'manager', 'write' => 'manager']
                ]
            ]
        ]
    ],
    'components'=>[
    	'view' => [
    		'theme' => [
    			'pathMap' => [
                                '@backend/modules/admin/views/menu' => '@mdm/admin/views/menu',
                                '@backend/modules/admin/views/route' => '@mdm/admin/views/route',
    				'@backend/modules/admin/views/rule' => '@mdm/admin/views/rule',
    				'@backend/modules/admin/views/permission' => '@mdm/admin/views/permission',
    				'@backend/modules/admin/views/role' => '@mdm/admin/views/role',
    				'@backend/modules/admin/views/assignment' => '@mdm/admin/views/assignment',
                                '@backend/modules/admin/views/log' => '@backend/views/log',
    			],
    		],
    	],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'request' => [
            'cookieValidationKey' => getenv('BACKEND_COOKIE_VALIDATION_KEY')
        ],
        'user' => [
            'class'=>'yii\web\User',
            'identityClass' => 'common\models\User',
            'loginUrl'=>['sign-in/login'],
            'enableAutoLogin' => true,
            'as afterLogin' => 'common\behaviors\LoginTimestampBehavior'
        ],
    ],
    'modules'=>[
        'i18n' => [
            'class' => 'backend\modules\i18n\Module',
            'defaultRoute'=>'i18n-message/index'
        ],
		'admin' => [ 
			'class' => 'backend\modules\admin\Module',
			'defaultRoute'=>'system-information/index',
			'controllerMap' => [ 
				'assignment' => [ 
                                    'class' => 'mdm\admin\controllers\AssignmentController',
                                    'userClassName' => 'common\models\User', 
                                    'idField' => 'id',
					'usernameField' => 'username',
					'fullnameField' => 'userProfile.fullName',
					'extraColumns' => [ 
						[ 
							'attribute' => 'full_name',
							'label' => 'Full Name',
							'value' => function ($model, $key, $index, $column) {
								return $model->userProfile->fullName;
							} 
						],
// 						[ 
// 							'attribute' => 'dept_name',
// 							'label' => 'Department',
// 							'value' => function ($model, $key, $index, $column) {
// 								return $model->userProfile->dept->name;
// 							} 
// 						],
// 						[ 
// 							'attribute' => 'post_name',
// 							'label' => 'Post',
// 							'value' => function ($model, $key, $index, $column) {
// 								return $model->profile->post->name;
// 							} 
// 						] 
					],
					//'searchClass' => 'app\models\UserSearch' 
				],
                                'log' => 'backend\controllers\LogController',
                                'menu' => 'mdm\admin\controllers\MenuController',
                                'route' => 'mdm\admin\controllers\RouteController',
                                'rule' => 'mdm\admin\controllers\RuleController',
				'role' => 'mdm\admin\controllers\AssignmentController',
				'permission' =>'mdm\admin\controllers\PermissionController', // add another controller
				//'system-information' => 'backend\controllers\SystemInformationController'
			] 
		],
		'm1' => [
				'class' => 'app\modules\m1\Module',
		],
	],
    'as globalAccess'=>[
        'class'=>'\common\behaviors\GlobalAccessBehavior',
        'rules'=>[
            [
                'controllers'=>['sign-in'],
                'allow' => true,
                'roles' => ['?'],
                'actions'=>['login']
            ],
            [
                'controllers'=>['sign-in'],
                'allow' => true,
                'roles' => ['@'],
                'actions'=>['logout']
            ],
            [
                'controllers'=>['site'],
                'allow' => true,
                'roles' => ['?', '@'],
                'actions'=>['error']
            ],
            [
                'controllers'=>['debug/default'],
                'allow' => true,
                'roles' => ['?'],
            ],
            [
                'controllers'=>['user'],
                'allow' => true,
                'roles' => ['administrator'],
            ],
            [
                'controllers'=>['user'],
                'allow' => false,
            ],
            [
                'allow' => true,
                'roles' => ['manager'],
            ]
        ]
    ]
];

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'class'=>'yii\gii\Module',
        'generators' => [
            'crud' => [
                'class'=>'yii\gii\generators\crud\Generator',
                'templates'=>[
                    'yii2-starter-kit' => Yii::getAlias('@backend/views/_gii/templates')
                ],
                'template' => 'yii2-starter-kit',
                'messageCategory' => 'backend'
            ]
        ]
    ];
}

return $config;
