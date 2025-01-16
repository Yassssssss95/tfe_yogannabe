@extends('layouts.admin')

@section('title', 'Gestion des retraites')

@section('content')
<div class="admin-header">
    <h2>Liste des retraites</h2>
    <a href="{{ route('admin.retreats.create') }}" class="btn-primary">
        Ajouter une retraite
    </a>
</div>

<div class="admin-table">
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Dates</th>
                <th>Lieu</th>
                <th>Places</th>
                <th>Prix</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($retreats as $retreat)
                <tr>
                    <td>{{ $retreat->name }}</td>
                    <td>{{ $retreat->starting_date }}</td>
                    <td>{{ $retreat->ending_date }}</td>
                    <td>{{ $retreat->number_places }}</td>
                    <td>{{ $retreat->price }}€</td>
                    <td class="actions">
                        <a href="{{ route('admin.retreats.edit', $retreat->id) }}" class="btn-edit">Modifier</a>
                        <form action="{{ route('admin.retreats.delete', $retreat->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn-delete">Supprimer</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection