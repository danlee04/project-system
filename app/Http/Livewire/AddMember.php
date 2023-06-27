<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Member;
use Jantinnerezo\LivewireAlert\LivewireAlert;


class AddMember extends Component
{
    use LivewireAlert;
    
    public $first_name;
    public $middle_name;
    public $last_name;
    public $gender;
    public $address;

    public function saveMember()
    {
        $validatedData = $this->validate([
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'gender' => 'required|string',
            'address' => 'required|string',
        ]);

        Member::create($validatedData);
        $this->alert('success', $this->first_name.' '.$this->last_name.' has been added', ['toast' => false, 'position' => 'center']);
        $this->resetFields();
    }

    private function resetFields()
    {
        $this->first_name = null;
        $this->middle_name = null;
        $this->last_name = null;
        $this->gender = null;
        $this->address = null;
    }

    public function render()
    {
        return view('livewire.add-member');
    }
}
