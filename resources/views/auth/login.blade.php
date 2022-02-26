<x-app-layout>
    <div class="container" style="margin: auto;margin-top: 10%;margin-bottom: 30%;width: 25rem;">
        <form method="POST" action="{{ route('login') }}" class="text-center border rounded" style="background: var(--bs-gray-500);">
            @csrf
            <h1>Přihlášení</h1>
            @if ($errors->any())
                <div>
                    @foreach ($errors->all() as $error)
                        {{$error}}
                    @endforeach
                </div>
            @endif
            <input class="border rounded-pill border-secondary form-control" type="text" data-bs-toggle="tooltip" data-bss-tooltip="" id="email" name="email" value="{{old('email')}}" placeholder="Email" required="" minlength="3" maxlength="254" title="Sem zadej svůj email" style="width: 75%;text-align: left;margin: auto;margin-top: 1em;margin-bottom: 1em;" inputmode="email">
            <input class="border rounded-pill border-secondary form-control" type="password" data-bs-toggle="tooltip" data-bss-tooltip=""  id="password" name="password" placeholder="Heslo" required="" minlength="5" maxlength="254" title="Sem zadej heslo, které budeš používat při přihlašování" style="width: 75%;margin: auto;margin-top: 1em;margin-bottom: 1em;">
            <div class="form-check" style="width: 75%;padding-left: 5em;">
                <input class="form-check-input" type="checkbox" data-bs-toggle="tooltip" data-bss-tooltip="" id="remember" name="remember" style="margin-left: 0;" checked="" title="Při příští návštěvě budete stále přihlášen">
                <label class="form-check-label" for="remember">Zapamatovat si mě</label>
            </div>
            <button class="btn btn-primary btn-lg text-center border rounded border-success shadow" type="submit" style="margin: auto;margin-bottom: 2em;width: 50%;background: rgb(33,104,53);">Přihlásit se!</button>
        </form>
    </div>
</x-app-layout>
