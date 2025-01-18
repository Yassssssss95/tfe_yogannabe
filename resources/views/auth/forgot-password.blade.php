<x-guest-layout>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2>Mot de passe oublié</h2>
                <p>Entrez votre email pour recevoir un lien de réinitialisation</p>
            </div>

            <form method="POST" action="{{ route('password.email') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus />
                </div>

                <button type="submit">Envoyer le lien</button>

                <div class="auth-footer">
                    <p><a href="{{ route('login') }}">Retour à la connexion</a></p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>