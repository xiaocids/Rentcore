<?php
return [
    'id' => 'backend',
    'basePath' => dirname(__DIR__),
    'components' => [
        'urlManager' => require(__DIR__.'/_urlManager.php'),
        'frontendCache' => require(Yii::getAlias('@frontend/config/_cache.php'))
    ],
    'modules' => [
        'datecontrol' => require (__DIR__.'/_dateCOntrol.php'),
        'gridview' =>  [
            'class' => '\kartik\grid\Module'
        ]
    ],
];
