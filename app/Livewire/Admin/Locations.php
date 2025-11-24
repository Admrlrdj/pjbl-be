<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\Location;

class Locations extends Component
{
    public $isUpdateLocationMode = false;
    public $location_id, $location_name, $location_address, $location_maps_url, $location_maps_embed;

    protected $listeners = [
        'deleteLocationAction' => 'deleteLocationAction',
        'updateLocationOrdering' => 'updateLocationOrdering',
    ];

    public function addLocation()
    {
        // dd('add location');
        $this->location_id = null;
        $this->location_name = null;
        $this->location_address = null;
        $this->location_maps_url = null;
        $this->isUpdateLocationMode = false;
        $this->showLocationModalForm();
    }

    public function createLocation()
    {
        $this->validate([
            'location_name' => 'required|unique:locations,name',
            'location_address' => 'required',
            'location_maps_url' => 'required|url',
            'location_maps_embed' => 'required',
        ], [
            'location_name.required' => 'Location Name is required',
            'location_name.unique' => 'Location Name already exists',
            'location_address.required' => 'Location Address is required',
            'location_maps_url.required' => 'Maps URL is required',
            'location_maps_url.url' => 'Maps URL must be a valid URL',
        ]);

        $location = new Location();
        $location->name = $this->location_name;
        $location->address = $this->location_address;
        $location->maps_url = $this->location_maps_url;
       $location->maps_embed = $this->location_maps_embed;
        $saved = $location->save();

        if ($saved) {
            $this->hideLocationModalForm();
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Location created successfully.']);
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Failed to create location.']);
        }
    }

    public function editLocation($id)
    {
        $location = Location::find($id);
        $this->location_id = $id;
        $this->location_name = Location::find($id)->name;
        $this->location_address = Location::find($id)->address;
        $this->location_maps_url = Location::find($id)->maps_url;
        $this->location_maps_embed = $location->maps_embed;

        $this->isUpdateLocationMode = true;
        $this->showLocationModalForm();
    }

    public function updateLocation()
    {
        $location = Location::findOrFail($this->location_id);

        $this->validate([
            'location_name' => 'required|unique:categories,name,' . $this->location_id,
            'location_address' => 'required',
            'location_maps_url' => 'required|url',
        ], [
            'location_name.required' => 'Location Name is required',
            'location_name.unique' => 'Location Name already exists',
            'location_address.required' => 'Location Address is required',
            'location_maps_url.required' => 'Maps URL is required',
            'location_maps_url.url' => 'Maps URL must be a valid URL',
        ]);

        $location->name = $this->location_name;
        $location->address = $this->location_address;
        $location->maps_url = $this->location_maps_url;
        $location->maps_embed = $this->location_maps_embed;

        $updated = $location->save();

        if ($updated) {
            $this->hideLocationModalForm();
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Location updated successfully.']);
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Failed to update location.']);
        }
    }

    public function deleteLocation($id)
    {
        $this->dispatch('deleteLocation', ['id' => $id]);
    }

    public function deleteLocationAction($id)
    {
        $location = Location::findOrFail($id);
        $delete = $location->delete();

        if ($delete) {
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Location deleted successfully.']);
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Failed to delete location.']);
        }
    }

    public function showLocationModalForm()
    {
        $this->resetErrorBag();
        $this->dispatch('showLocationModalForm');
    }

    public function hideLocationModalForm()
    {
        $this->dispatch('hideLocationModalForm');
        $this->isUpdateLocationMode = false;
        $this->location_id = $this->location_name = null;
    }

    public function render()
    {
        return view('livewire.admin.locations', [
            'locations' => Location::orderBy('id', 'asc')->get(),
        ]);
    }
}
