<?php namespace Markbratanov\RegisterOverrideExtension;

use Anomaly\Streams\Platform\Addon\AddonServiceProvider;

class RegisterOverrideExtensionServiceProvider extends AddonServiceProvider
{

    protected $plugins = [];

    protected $routes = [];

    protected $middleware = [];

    protected $listeners = [];

    protected $aliases = [];

    protected $bindings = [
        'sennit_login'                                              => 'Markbratanov\RegisterOverrideExtension\User\Login\LoginFormBuilder',
        'sennit_register'                                           => 'Markbratanov\RegisterOverrideExtension\User\Register\RegisterFormBuilder',
        'App\Http\Middleware\Authenticate'                          => 'Anomaly\UsersModule\Http\Middleware\Authenticate',
        'Anomaly\Streams\Platform\Model\Users\UsersUsersEntryModel' => 'Anomaly\UsersModule\User\UserModel',
        'Anomaly\Streams\Platform\Model\Users\UsersRolesEntryModel' => 'Anomaly\UsersModule\Role\RoleModel'
    ];

    protected $providers = [];

    protected $singletons = [];

    protected $overrides = [];

    protected $mobile = [];

    public function register()
    {
    }

    public function map()
    {
    }

}
