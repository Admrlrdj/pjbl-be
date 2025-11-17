<?php

namespace App\Livewire\Admin;

use App\Models\ContactUs;
use Livewire\Component;

class Contacts extends Component
{
    protected $listeners = ['deleteContactAction'];

    public function deleteContact($id)
    {
        $this->dispatch('deleteContact', ['id' => $id]);
    }

    public function deleteContactAction($id)
    {
        $contact = ContactUs::findOrFail($id);
        $delete = $contact->delete();

        if ($delete) {
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'Contact deleted successfully.']);
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Failed to delete contact.']);
        }
    }
    public function render()
    {
        return view('livewire.admin.contacts', [
            'contacts' => ContactUs::orderBy('id', 'asc')->get(),
        ]);
    }
}
