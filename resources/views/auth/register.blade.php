<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <h2 class="text-lg font-bold">Registrierung als {{ ucfirst($role) }}</h2>
        </x-slot>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label>Name</label>
                <input type="text" name="name" required />
            </div>

            <div>
                <label>Email</label>
                <input type="email" name="email" required />
            </div>

            <div>
                <label>Passwort</label>
                <input type="password" name="password" required />
            </div>

            <div>
                <label>Passwort bestätigen</label>
                <input type="password" name="password_confirmation" required />
            </div>

            <button type="submit">Registrieren</button>
        </form>
    </x-auth-card>
</x-guest-layout>
