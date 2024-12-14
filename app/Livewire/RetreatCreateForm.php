<?php
namespace App\Livewire;
use App\Models\Category;
use App\Models\Event;
use Livewire\Component;
class EventCreateForm extends Component
{
    // Propriétés liées au formulaire
    public $name;
    public $starting_date;
    public $ending_date;
    public $description;
    public $price;
    public $number_place;
    public $address;
    public $image_path;
    public $longitude;
    public $latitude;
    

    public function submit()
    {
        // Valider les données du formulaire
        $valiending_datedData = $this->validate([
            'name' => 'required|string|max:255',
            'starting_date' => 'required|date',
            'ending_date' => 'required|date',
            'description' => 'required|longText',
            'price' => 'required|float',
            'number_place' => 'required|integer|min:1',
            'address'=> 'required|string',
            'image_path'=>'required|string',
            'longitude'=>'required|string',
            'latitude'=>'required|string',
            
        ]);

        // Créer l'événement
        $retreat = Retreat::create($validatedData);

        

        // Réinitialiser le formulaire et afficher un message de succès
        $this->reset();
        session()->flash('success', 'Retreat created successfully!');
    }

    public function render()
    {
        return view('livewire.retreat-create-form');
    }
}