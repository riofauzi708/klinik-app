<?php return array(
    'root' => array(
        'name' => '__root__',
        'pretty_version' => 'dev-main',
        'version' => 'dev-main',
        'reference' => 'e70ba123b91bb9fc5d5375f2318ae760d2ac9f83',
        'type' => 'library',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        '__root__' => array(
            'pretty_version' => 'dev-main',
            'version' => 'dev-main',
            'reference' => 'e70ba123b91bb9fc5d5375f2318ae760d2ac9f83',
            'type' => 'library',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'rbac/rbac-standard' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => '0f1a4a8ffe8db349a5e07e76d5a20266c38e0e82',
            'type' => 'library',
            'install_path' => __DIR__ . '/../rbac/rbac-standard',
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'dev_requirement' => false,
        ),
        'yiisoft/yii' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => 'b2c129b1cacd74aa8357398805efe7c0a2c00b57',
            'type' => 'library',
            'install_path' => __DIR__ . '/../yiisoft/yii',
            'aliases' => array(
                0 => '1.1.x-dev',
            ),
            'dev_requirement' => false,
        ),
    ),
);
