<x-back_layout>
    <div class="container-fluid">
        <div class="row">
            <x-backsidebar />
            <div class="col-md-9 col-lg-10">
                <div class="col-12 text-center my-3">
                    <h1>Tutti gli utenti</h1>
                </div>
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Id</th>
                                <th scope="col">Nome e Cognome</th>
                                <th scope="col">Email</th>
                                <th scope="col">Creazione</th>
                                <th scope="col">Ruolo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <th scope="row">{{ $user->id }}</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->created_at->format('d/m/y') }}</td>

                                    @if ($user->is_revisor == true && $user->is_admin == true)
                                        <td>Utente Normale/Revisone</td>
                                    @elseif($user->is_admin == true)
                                        <td>Admin</td>
                                    @elseif($user->is_revisor == true)
                                        <td>Revisore</td>
                                    @else
                                        <td>Utente Normale</td>
                                    @endif
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-back_layout>
