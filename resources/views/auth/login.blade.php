<x-guest-layout>
  

    <main class="form-signin">

        
        <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <img class="mb-4" src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />
    
            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            
            <h1 class="h3 mb-3 fw-normal">Ingrese por favor</h1>

            <div class="form-floating">
            <input type="email" name="email" :value="old('email')" class="form-control" id="email" placeholder="name@example.com" required autofocus>
            <label for="email">Usuario</label>
            </div>
            <div class="form-floating">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required autocomplete="current-password">
            <label for="password">Contraseña</label>
            </div>

            <div class="block">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Recuérdame') }}</span>
                </label>
           
            <button class="w-100 btn btn-lg btn-primary" type="submit">Ingresar</button>
            <p class="mt-5 mb-3 text-muted">&copy; 2012–{{ now()->year }}</p>

        </form>
    
    </main>
</x-guest-layout>
