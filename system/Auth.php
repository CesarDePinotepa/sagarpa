<?php


class Auth
{
    protected $session;
    protected $table = 'usuario';
    protected $user = null;

    /**
     * Auth constructor.
     */
    public function __construct()
    {
        $this->session = app()->session;
    }

    public function login($user, $pass)
    {
        $record = app()->db->where('email', $user)->get($this->table)->row();

        if ($record->password == md5($pass)) {
            $this->session->set('auth.login', true);
            $this->session->set('auth.user', $record->id);
            return true;
        }
        return false;

    }

    public function logout()
    {
        $this->session->set('auth.login', false);

    }

    public function isLogged()
    {
        return $this->session->get('auth.login') == true;

    }

    public function forgot($id)
    {
        $key = md5(uniqid());
        $data = array(
            'passwordrecovery' => $key
        );
        app()->db->where('id', $id)->update($this->table, $data);
        return $key;
    }

    public function user()
    {
        if ($this->user == null) {
            $id = $this->session->get('auth.user');
            $this->user = app()->db->where('id', $id)->get($this->table)->row();
        }
        return $this->user;
    }

}