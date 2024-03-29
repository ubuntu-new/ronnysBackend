<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-backend',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'backend\controllers',
    'bootstrap' => ['log'],
    'modules' => [
        'yii2images' => [
            'class' => 'rico\yii2images\Module',
            //be sure, that permissions ok
            //if you cant avoid permission errors you have to create "images" folder in web root manually and set 777 permissions
            'imagesStorePath' => 'images/store', //path to origin images
            'imagesCachePath' => 'images/cache', //path to resized copies
            'graphicsLibrary' => 'GD', //but really its better to use 'Imagick'
            'placeHolderPath' => '@webroot/images/placeHolder.png', // if you want to get placeholder when image not exists, string will be processed by Yii::getAlias
            //'imageCompressionQuality' => 100, // Optional. Default value is 85.
        ],
    ],
    'components' => [
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
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
    ],
    'controllerMap' => [
        'elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['@'], //глобальный доступ к фаил менеджеру @ - для авторизорованных , ? - для гостей , чтоб открыть всем ['@', '?']
            'disabledCommands' => ['netmount'], //отключение ненужных команд https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#commands
            'roots' => [
                [
                    'baseUrl'=>'@web',
                    'basePath'=>'@webroot',
                    'path' => 'images/global',
                    'name' => 'Global'
                ],
//                    [
//                        'class' => 'mihaildev\elfinder\volume\UserPath',
//                        'path'  => 'files/user_{id}',
//                        'name'  => 'My Documents'
//                    ],
//                    [
//                        'path' => 'files/some',
//                        'name' => ['category' => 'my','message' => 'Some Name'] //перевод Yii::t($category, $message)
//                    ],
//                    [
//                        'path'   => 'files/some',
//                        'name'   => ['category' => 'my','message' => 'Some Name'], // Yii::t($category, $message)
//                        'access' => ['read' => '*', 'write' => 'UserFilesAccess'] // * - для всех, иначе проверка доступа в даааном примере все могут видет а редактировать могут пользователи только с правами UserFilesAccess
//                    ]
            ],
//                'watermark' => [
//                    'source'         => __DIR__.'/logo.png', // Path to Water mark image
//                    'marginRight'    => 5,          // Margin right pixel
//                    'marginBottom'   => 5,          // Margin bottom pixel
//                    'quality'        => 95,         // JPEG image save quality
//                    'transparency'   => 70,         // Water mark image transparency ( other than PNG )
//                    'targetType'     => IMG_GIF|IMG_JPG|IMG_PNG|IMG_WBMP, // Target image formats ( bit-field )
//                    'targetMinPixel' => 200         // Target image minimum pixel size
//                ]
        ]
    ],
    'params' => $params,
];
