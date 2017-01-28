<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',

    'components' => [
		'db' => require (dirname(__DIR__)."/config/db.php"),
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'UserComponent' => [
            'class' => 'common\components\UserComponent',
        ],
		'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'view-advert/<id:\d+>' => 'main/view-advert',
                'view-post/<id:\d+>' => 'blog/view-post',

            ],
        ],
    ],

    'modules' => [
      
        'comments' => [
            'class' => 'rmrevin\yii\module\Comments\Module',
            'userIdentityClass' => 'common\models\User',
            'useRbac' => false,
        ]
    ],
];
