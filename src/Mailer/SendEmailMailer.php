<?php
namespace App\Mailer;

use Cake\Mailer\Mailer;

/**
 * SendEmail mailer.
 */
class SendEmailMailer extends Mailer
{

    /**
     * Mailer's name.
     *
     * @var string
     */
    static public $name = 'SendEmail';

    public function forgotPasswordEmail(array $data)
    {
        $this->to($data[0])
            ->profile('gevetik')
            ->emailFormat('html')
            ->subject(sprintf('restorez votre mot de passe'))
            ->template('gevetik_forgot_email_template')
            ->layout('send_email')
            ->viewVars(['link'=>$data[1]]);
//        debug($data);
//        die();
    }

    public function changePasswordEmail(array $data)
    {
        $this->to($data['email'])
            ->profile('gevetik')
            ->emailFormat('html')
            ->subject(sprintf('mot de passe bien restorer'))
            ->template('gevetik_reset_email_template')
            ->layout('send_email');
            //->viewVars(['link'=>$data[1]]);
//        debug($data);
//        die();
    }






}
