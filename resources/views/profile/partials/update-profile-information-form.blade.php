<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informazioni Profilo') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Modifica le tue informazioni personali e l'email") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6">
        @csrf
        @method('patch')

        <div>
            <label for="">Nome</label>
            <x-text-input id="name" name="name" type="text" class="mt-1 mb-3 p-1 border border-dark-subtle rounded-pill" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2 text-danger" :messages="$errors->get('name')" />
        </div>
        <div>
            <label for="">Email</label>
            <x-text-input id="email" name="email" type="email" class="mt-1 mb-3 p-1 border border-dark-subtle rounded-pill" :value="old('email', $user->email)" required autocomplete="email" />
            <x-input-error class="mt-2 text-danger" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        @if (Auth::user()->hasRole('dataMenager'))
            <div>
                <label for="">Data di nascita</label>
                <x-text-input 
                id="data_nascita" 
                name="data_nascita" 
                type="date" 
                class="mt-1 mb-3 p-1 border border-dark-subtle rounded-pill" 
                :value="!$user->hero?->data_nascita ? '' : old('data_nascita', $user->hero->data_nascita)"
                required 
                autofocus 
                autocomplete="name" 
            />
                <x-input-error class="mt-2 text-danger" :messages="$errors->get('data_nascita')" />
            </div>
            <div>
                <label for="">Codice fiscale</label>
                <x-text-input 
                id="codice_fiscale" 
                name="codice_fiscale" 
                type="text" 
                class="mt-1 mb-3 p-1 border border-dark-subtle rounded-pill"
                style="text-transform: uppercase;" 
                :value="!$user->hero?->codice_fiscale ? '' : old('codice_fiscale', $user->hero->codice_fiscale)"
                required 
                autofocus 
                autocomplete="name" 
            />
                <x-input-error class="mt-2 text-danger" :messages="$errors->get('codice_fiscale')" />
            </div>
            <div>
                <label for="">Indirizzo di residenza</label>
                <x-text-input 
                id="indirizzo" 
                name="indirizzo" 
                type="text" 
                class="mt-1 mb-3 p-1 border border-dark-subtle rounded-pill" 
                :value="!$user->hero?->indirizzo ? '' : old('indirizzo', $user->hero->indirizzo)"
                required 
                autofocus 
                autocomplete="name" 
            />
                <x-input-error class="mt-2 text-danger" :messages="$errors->get('indirizzo')" />
            </div>
        @endif

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Salva') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 mt-2 fw-bold"
                >{{ __('Modifica salvata') }}</p>
            @endif
        </div>
    </form>
</section>
