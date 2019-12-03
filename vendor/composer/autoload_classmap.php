<?php

// autoload_classmap.php @generated by Composer

$vendorDir = dirname(dirname(__FILE__));
$baseDir = dirname($vendorDir);

return array(
    'ComposerAutoloaderInit4a3d3731011d0ef0f6f621105cb8b6b5' => $vendorDir . '/composer/autoload_real.php',
    'Composer\\Autoload\\ClassLoader' => $vendorDir . '/composer/ClassLoader.php',
    'Composer\\Autoload\\ComposerStaticInit4a3d3731011d0ef0f6f621105cb8b6b5' => $vendorDir . '/composer/autoload_static.php',
    'Database' => $baseDir . '/application/database.class.php',
    'Dispatcher' => $baseDir . '/application/dispatcher.class.php',
    'Index' => $baseDir . '/views/index/index.class.php',
    'IndexView' => $baseDir . '/views/indexView.class.php',
    'Login' => $baseDir . '/views/user/login/login.class.php',
    'Logout' => $baseDir . '/views/user/logout/logout.class.php',
    'Transaction' => $baseDir . '/models/transaction.class.php',
    'TransactionController' => $baseDir . '/controllers/transaction_controller.class.php',
    'TransactionError' => $baseDir . '/views/transaction/error/transaction_error.class.php',
    'TransactionIndex' => $baseDir . '/views/transaction/transaction_index.class.php',
    'TransactionIndexView' => $baseDir . '/views/transaction/transaction_index_view.class.php',
    'TransactionModel' => $baseDir . '/models/transaction_model.class.php',
    'UserController' => $baseDir . '/controllers/user_controller.class.php',
    'UserModel' => $baseDir . '/models/user_model.class.php',
    'users_class' => $baseDir . '/models/users.class.php',
);