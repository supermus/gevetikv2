<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * User mailer.
 */
class UserMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'User';

    public function welcome($user)
    {
        $this->to($user->email)
            ->profile('gevetik')
            ->emailFormat('html')
            ->template('gevetik_email_template')
            ->layout('user')
            ->viewVars(['name'=>$user->frame])
            ->subject(sprintf('Bonjour , %s', $user->frame));
    }
}
