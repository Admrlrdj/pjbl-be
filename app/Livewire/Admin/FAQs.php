<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\FAQ;

class FAQs extends Component
{
    public $isUpdateFAQMode = false;
    public $faq_id, $question, $answer;

    protected $listeners = [
        'deleteFAQAction' => 'deleteFAQAction',
        'updateFAQOrdering' => 'updateFAQOrdering',
    ];

    public function addFAQ()
    {
        // dd('add category');
        $this->faq_id = null;
        $this->question = null;
        $this->answer = null;
        $this->isUpdateFAQMode = false;
        $this->showFAQModalForm();
    }

    public function createFAQ()
    {
        $this->validate([
            'question' => 'required|unique:f_a_q_s,question',
            'answer' => 'required',

        ], [
            'question.required' => 'Question is required',
            'question.unique' => 'Question already exists',
            'answer.required' => 'Answer is required',
        ]);

        $faq = new FAQ();
        $faq->question = $this->question;
        $faq->answer = $this->answer;
        $saved = $faq->save();

        if ($saved) {
            $this->hideFAQModalForm();
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'FAQ created successfully.']);
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Failed to create faq.']);
        }
    }

    public function editFAQ($id)
    {
        $faq = FAQ::find($id);
        $this->faq_id = $id;
        $this->question = $faq->question;
        $this->answer = $faq->answer;
        $this->isUpdateFAQMode = true;
        $this->showFAQModalForm();
    }


    public function updateFAQ()
    {
        $faq = FAQ::findOrFail($this->faq_id);

        $this->validate([
            'question' => 'required|unique:f_a_q_s,question,' . $this->faq_id,
            'answer' => 'required',

        ], [
            'question.required' => 'Question is required',
            'question.unique' => 'Question already exists',
            'answer.required' => 'Answer is required',
        ]);

        $faq->question = $this->question;
        $faq->answer = $this->answer;
        $updated = $faq->save();

        if ($updated) {
            $this->hideFAQModalForm();
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'FAQ updated successfully.']);
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Failed to update faq.']);
        }
    }

    public function deleteFAQ($id)
    {
        $this->dispatch('deleteFAQ', ['id' => $id]);
    }

    public function deleteFAQAction($id)
    {
        $faq = FAQ::findOrFail($id);
        $delete = $faq->delete();

        if ($delete) {
            $this->dispatch('showToastr', ['type' => 'success', 'message' => 'FAQ deleted successfully.']);
        } else {
            $this->dispatch('showToastr', ['type' => 'error', 'message' => 'Failed to delete faq.']);
        }
    }

    public function showFAQModalForm()
    {
        $this->resetErrorBag();
        $this->dispatch('showFAQModalForm');
    }

    public function hideFAQModalForm()
    {
        $this->dispatch('hideFAQModalForm');
        $this->isUpdateFAQMode = false;
        $this->faq_id = $this->question = null;
    }
    public function render()
    {
        return view('livewire.admin.f-a-qs', [
            'faqs' => Faq::orderBy('id', 'asc')->get(),
        ]);
    }
}
