<div>
    <h1>Create New Retreat</h1>

    @if (session()->has('success'))
        <div style="color: green;">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="submit">
        <label for="name">Name:</label>
        <input type="text" id="name" wire:model="name" required>

        <label for="starting_date">Starting date:</label>
        <input type="date" id="starting_date" wire:model="starting_date" required>

        <label for="ending_date">Ending date:</label>
        <input type="date" id="ending_date" wire:model="ending_date" required>

        <label for="description">Description:</label>
        <textarea id="description" wire:model="description" required></textarea>

        <label for="price">Price:</label>
        <input type="number" id="price" wire:model="price" required>

        <label for="number_places">Number of places:</label>
        <input type="number" id="number_place" wire:model="number_place" required>

        <label for="address">Address:</label>
        <input type="text" id="address" wire:model="address" required>

        <label for="latitude">latitude:</label>
    <input type="text" id="latitude" wire:model="latitude" required>

    <label for="longitude">longitude:</label>
    <input type="text" id="longitude"  wire:model="longitude" required>

    <label for="image_path">Télécharger des images:</label>
    <input type="file" id="image_path" wire:model="image_path" required>
        

    <button type="submit">Créer une nouvelle retraite</button>
    </form>
</div>
