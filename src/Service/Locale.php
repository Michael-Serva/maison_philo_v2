<?php

namespace App\Service;

use Symfony\Component\HttpFoundation\Session\SessionInterface;

class Locale
{
    protected $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }

    public function getLocale()
    {
        $value = $this->session->get('locale');
        if (!$value) {
            $locale = "fr";
        } else {
            $locale = $this->session->get('locale');
        }
        
        dd($locale);
        return $locale;
    }
}
