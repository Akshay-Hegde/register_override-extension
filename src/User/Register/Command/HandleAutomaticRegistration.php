<?php namespace  Markbratanov\RegisterOverrideExtension\User\Register\Command;

use Anomaly\Streams\Platform\Message\MessageBag;
use Anomaly\UsersModule\User\Contract\UserInterface;
use Markbratanov\RegisterOverrideExtension\User\Register\RegisterFormBuilder;
use Anomaly\UsersModule\User\UserActivator;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class HandleAutomaticRegistration
 *
 * @link          http://anomaly.is/streams-platform
 * @author        AnomalyLabs, Inc. <hello@anomaly.is>
 * @author        Ryan Thompson <ryan@anomaly.is>
 * @package       Anomaly\UsersModule\User\Register\Command
 */
class HandleAutomaticRegistration implements SelfHandling
{

    /**
     * The form builder.
     *
     * @var RegisterFormBuilder
     */
    protected $builder;

    /**
     * Create a new HandleAutomaticRegistration instance.
     *
     * @param RegisterFormBuilder $builder
     */
    public function __construct(RegisterFormBuilder $builder)
    {
        $this->builder = $builder;
    }

    /**
     * Handle the command.
     *
     * @param UserActivator $activator
     * @param MessageBag    $messages
     */
    public function handle(UserActivator $activator, MessageBag $messages)
    {
        /* @var UserInterface $user */
        $user = $this->builder->getFormEntry();

        $activator->force($user);

        if (!is_null($message = $this->builder->getFormOption('activated_message'))) {
            $messages->info($message);
        }
    }

}
