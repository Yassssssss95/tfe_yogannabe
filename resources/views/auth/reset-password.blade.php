<x-guest-layout>
    <div class="auth-container">
        <div class="auth-card">
            <div class="auth-header">
                <h2>Réinitialiser le mot de passe</h2>
                <p>Choisissez votre nouveau mot de passe</p>
            </div>

            <form method="POST" action="{{ route('password.update') }}">
                @csrf
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required />
                </div>

                <div class="form-group">
                    <label for="password">Nouveau mot de passe</label>
                    <input id="password" type="password" name="password" required />
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmez le mot de passe</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required />
                </div>

                <button type="submit">Réinitialiser le mot de passe</button>

                <div class="auth-footer">
                    <p><a href="{{ route('login') }}">Retour à la connexion</a></p>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>