<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;

class RelationshipManager extends Authenticatable
{
    use Notifiable;

    protected $guard = 'admin';

    /**
     * The table associated with the model.
     *
     * @var string
     */
        protected $table = 'relationship_managers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'rm_code', 'username', 'password', 'status'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Sends the password reset notification.
     *
     * @param  string $token
     *
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new RMCustomPassword($token));
    }
}

class RMCustomPassword extends ResetPassword
{
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reset Password Request')
            ->line('We are sending this email because we recieved a forgot password request.')
            ->action('Reset Password', url(config('app.url').'/admin' . route('password.reset', $this->token, false)))
            ->line('If you did not request a password reset, no further action is required. Please contact us if you did not submit this request.');
    }
}
