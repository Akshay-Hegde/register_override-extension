<?php namespace  Markbratanov\RegisterOverrideExtension\User\Register;

use Anomaly\Streams\Platform\Ui\Form\FormBuilder;
use Markbratanov\RegisterOverrideExtension\User\Register\Command\AssociateActivationRoles;
use Markbratanov\RegisterOverrideExtension\User\Register\Command\SetOptions;

/**
 * Class RegisterFormBuilder
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Register
 */
class RegisterFormBuilder extends FormBuilder
{

    /**
     * The form roles.
     *
     * @var array
     */
    protected $roles = [
        'user'
    ];

    /**
     * The form model.
     *
     * @var string
     */
    protected $model = 'Anomaly\UsersModule\User\UserModel';

    /**
     * The form fields.
     *
     * @var array
     */
    protected $fields = [
        'first_name',
        'last_name',
        'username',
        'email',
        'password'
    ];

    /**
     * The form actions.
     *
     * @var array
     */
    protected $actions = [
        'blue' => [
            'text' => 'anomaly.module.users::button.register'
        ]
    ];

    /**
     * The form options.
     *
     * @var array
     */
    protected $options = [
        'redirect'            => '/',
        'panel_class'         => '',
        'panel_body_class'    => '',
        'panel_title_class'   => '',
        'panel_heading_class' => '',
        'success_message'     => 'anomaly.module.users::success.user_registered',
        'pending_message'     => 'anomaly.module.users::message.pending_admin_activation',
        'confirm_message'     => 'anomaly.module.users::message.pending_email_activation',
        'activated_message'   => 'anomaly.module.users::message.account_activated'
    ];

    /**
     * Fired after the form is saved.
     */
    public function onSaved()
    {
        $this->dispatch(new AssociateActivationRoles($this));
    }

    /**
     * Get the roles.
     *
     * @return array
     */
    public function getRoles()
    {
        return $this->roles;
    }

    /**
     * Set roles.
     *
     * @param $roles
     * @return $this
     */
    public function setRoles($roles)
    {
        $this->roles = $roles;

        return $this;
    }
}
