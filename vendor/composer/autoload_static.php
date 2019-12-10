<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit4a3d3731011d0ef0f6f621105cb8b6b5
{
    public static $classMap = array (
        'AddTransaction' => __DIR__ . '/../..' . '/views/transaction/add/add_transaction.class.php',
        'ComposerAutoloaderInit4a3d3731011d0ef0f6f621105cb8b6b5' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInit4a3d3731011d0ef0f6f621105cb8b6b5' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'ConfrimAdd' => __DIR__ . '/../..' . '/views/transaction/add/confirm_add.class.php',
        'DataLength' => __DIR__ . '/../..' . '/exceptions/data_length.class.php',
        'DataMissing' => __DIR__ . '/../..' . '/exceptions/data_missing.class.php',
        'Database' => __DIR__ . '/../..' . '/application/database.class.php',
        'DatabaseException' => __DIR__ . '/../..' . '/exceptions/database_exception.class.php',
        'Dispatcher' => __DIR__ . '/../..' . '/application/dispatcher.class.php',
        'EmailFormat' => __DIR__ . '/../..' . '/exceptions/email_format.class.php',
        'Index' => __DIR__ . '/../..' . '/views/index/index.class.php',
        'IndexView' => __DIR__ . '/../..' . '/views/indexView.class.php',
        'Login' => __DIR__ . '/../..' . '/views/user/login/login.class.php',
        'Logout' => __DIR__ . '/../..' . '/views/user/logout/logout.class.php',
        'Register' => __DIR__ . '/../..' . '/views/user/login/register.class.php',
        'Reset' => __DIR__ . '/../..' . '/views/user/reset/reset.class.php',
        'ResetConfirmed' => __DIR__ . '/../..' . '/views/user/reset/reset_confirmed.class.php',
        'Transaction' => __DIR__ . '/../..' . '/models/transaction.class.php',
        'TransactionController' => __DIR__ . '/../..' . '/controllers/transaction_controller.class.php',
        'TransactionError' => __DIR__ . '/../..' . '/views/transaction/error/transaction_error.class.php',
        'TransactionIndex' => __DIR__ . '/../..' . '/views/transaction/transaction_index.class.php',
        'TransactionIndexView' => __DIR__ . '/../..' . '/views/transaction/transaction_index_view.class.php',
        'TransactionModel' => __DIR__ . '/../..' . '/models/transaction_model.class.php',
        'TransactionSearch' => __DIR__ . '/../..' . '/views/transaction/transaction_search.class.php',
        'UserController' => __DIR__ . '/../..' . '/controllers/user_controller.class.php',
        'UserError' => __DIR__ . '/../..' . '/views/user/error/user_error.class.php',
        'UserModel' => __DIR__ . '/../..' . '/models/user_model.class.php',
        'Utilities' => __DIR__ . '/../..' . '/application/utilities.class.php',
        'VerifyUser' => __DIR__ . '/../..' . '/views/user/login/verify_user.class.php',
        'users_class' => __DIR__ . '/../..' . '/models/users.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit4a3d3731011d0ef0f6f621105cb8b6b5::$classMap;

        }, null, ClassLoader::class);
    }
}
