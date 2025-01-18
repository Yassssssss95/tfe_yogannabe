<x-guest-layout>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2>Inscription</h2>
                <p>Créez votre compte pour réserver vos retraites</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Nom complet</label>
                    <input id="name" type="text" name="name" value="{{ old('name') }}" required autofocus />
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required />
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input id="password" type="password" name="password" required />
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmez le mot de passe</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required />
                </div>

                <button type="submit">S'inscrire</button>

                <div class="auth-footer">
                    <p>Déjà inscrit ? <a href="{{ route('login') }}">Se connecter</a></p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>