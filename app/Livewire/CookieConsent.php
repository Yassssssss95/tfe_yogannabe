<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Route;

class CookieConsent extends Component
{
    public $showBanner = true;
    public $necessary = true;
    public $analytics = false;
    public $marketing = false;
    public $isHomePage = false;

    public function mount()
    {
        // Vérifie si on est sur la page d'accueil
        $this->isHomePage = Route::currentRouteName() === 'home';

        if (isset($_COOKIE['cookie_consent'])) {
            $consent = json_decode($_COOKIE['cookie_consent'], true);
            $this->analytics = $consent['analytics'] ?? false;
            $this->marketing = $consent['marketing'] ?? false;
            $this->showBanner = false;
        } else {
            // Ne montre le bandeau que sur la page d'accueil
            $this->showBanner = $this->isHomePage;
        }
    }

    public function acceptAll()  // Cette méthode doit être publique !
    {
        $this->necessary = true;
        $this->analytics = true;
        $this->marketing = true;
        $this->saveConsent();
    }

    public function savePreferences()  // Cette méthode aussi !
    {
        $this->saveConsent();
    }

    private function saveConsent()
    {
        $consent = [
            'necessary' => true,
            'analytics' => $this->analytics,
            'marketing' => $this->marketing
        ];

        setcookie(
            'cookie_consent',
            json_encode($consent),
            [
                'expires' => time() + 365 * 24 * 60 * 60,
                'path' => '/',
                'secure' => true,
                'httponly' => true,
                'samesite' => 'Strict'
            ]
        );

        $this->showBanner = false;
    }

    public function render()
    {
        return view('livewire.cookie-consent');
    }
}