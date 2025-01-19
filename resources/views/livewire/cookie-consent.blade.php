<div>
    @if($showBanner)
    <div class="cookie-consent fixed bottom-0 left-0 right-0">
        <div class="max-w-7xl">
            <div>
                <h3>🍪 Paramètres des cookies</h3>
                <p>
                    Nous utilisons des cookies pour améliorer votre expérience sur notre site. 
                    Vous pouvez personnaliser vos préférences ci-dessous.
                </p>
            </div>

            <div class="cookie-options">
                <div class="option">
                    <div class="option-text">
                        <h4>Cookies nécessaires</h4>
                        <p>Requis pour le fonctionnement du site</p>
                    </div>
                    <label class="toggle">
                        <input type="checkbox" checked disabled>
                        <span class="slider"></span>
                    </label>
                </div>

                <div class="option">
                    <div class="option-text">
                        <h4>Cookies analytiques</h4>
                        <p>Nous aident à comprendre comment vous utilisez le site</p>
                    </div>
                    <label class="toggle">
                        <input type="checkbox" wire:model="analytics">
                        <span class="slider"></span>
                    </label>
                </div>

                <div class="option">
                    <div class="option-text">
                        <h4>Cookies marketing</h4>
                        <p>Utilisés pour la personnalisation marketing</p>
                    </div>
                    <label class="toggle">
                        <input type="checkbox" wire:model="marketing">
                        <span class="slider"></span>
                    </label>
                </div>
            </div>

            <div class="cookie-actions">
                <button wire:click="savePreferences" class="save-preferences">
                    Enregistrer les préférences
                </button>
                <button wire:click="acceptAll" class="accept-all">
                    Tout accepter
                </button>
            </div>
        </div>
    </div>
    @endif
</div>