<?php

namespace Modules\User\Traits;

use Illuminate\Support\Str;

trait HasWebsiteUser
{
    public function getWebsiteUserAttribute()
    {
        if (!class_exists('Corcel\Laravel\Auth\AuthUserProvider')) {
            return null;
        }

        $userProvider = new \Corcel\Laravel\Auth\AuthUserProvider;
        return $userProvider->retrieveByCredentials(['email' => $this->email]);
    }

    public function getWebsiteUserMeta($key = null)
    {
        if (!$this->website_user) {
            return '';
        }

        if (!$key) {
            return $this->website_user->meta;
        }

        $userMeta = $this->website_user->meta->where('meta_key', $key)->first() ?: null;
        if ($userMeta) {
            return $userMeta->meta_value;
        }
        return '';
    }

    public function getWebsiteUserRole()
    {
        $roles = unserialize($this->getWebsiteUserMeta('cc_capabilities'));
        if ($roles) {
            return Str::title(head(array_keys($roles)));
        }
    }

    public function getWebsiteUserRoleAttribute()
    {
        $role = $this->getWebsiteUserMeta('cc_capabilities');
        if (!$role) {
            return '';
        }
        $roles = unserialize($role);
        if ($roles) {
            return 'CCWeb- ' . Str::title(head(array_keys($roles)));
        }
    }
}
