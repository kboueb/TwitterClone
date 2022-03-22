<!-- COMMENTS
    -> Premier IF pour globaliser toutes les erreurs afin qu'elles soient détectée
    lorsque le "count($errors)>0 c-a-d quand il y a une erreur ou plus ".

    -> Le deuxième IF permet d'afficher les alertes de success
    -> Le troisième IF permet d'afficher les alertes d'erreurs
-->
@if (count($errors) > 0)
    @foreach ($errors->all() as $error)
        <div class="alert alert-danger">
            {{ $error }}
        </div>
    @endforeach
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
