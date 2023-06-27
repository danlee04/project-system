<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Member;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithPagination;

class Members extends Component
{
    use LivewireAlert;
    use WithPagination;

    public $first_name, $middle_name, $last_name, $gender, $address, $forUpdate;
    public $searchTerm;
    public $list;

    protected $paginationTheme = 'bootstrap'; // Optional: Set the pagination theme

    public function render()
    {
        $members = $this->getMemberList(); // Call the getMemberList() method
        $members = $this->getMemberList()->paginate(5); // Set the number of items per page

        return view('livewire.members', compact('members'));
    }

    public function delete($id)
    {
        $delete = Member::where('id', $id)->delete();
        if ($delete) {
            $this->alert('success', 'Successfully deleted!');
        }
    }

    public function update($id)
    {
        $info = Member::where('id', $id)->first();

        if (isset($info)) {
            $this->memberID            = $id;
            $this->forUpdate           = true;
            $this->first_name          = $info->first_name;
            $this->middle_name         = $info->middle_name;
            $this->last_name           = $info->last_name;
            $this->gender              = $info->gender;
            $this->address             = $info->address;
        }
    }

    public function saveMember()
    {
        $validate = $this->validate([
            'first_name'     => 'required',
            'middle_name'    => 'required',
            'last_name'      => 'required',
            'gender'         => 'required',
            'address'        => 'required',
        ], [
            'first_name.required'    => 'First Name is required',
            'middle_name.required'   => 'Last Name is required',
            'last_name.required'     => 'Middle Name is required',
            'gender.required'        => 'Gender is required',
            'address.required'       => 'Address is required',
        ]);

        if ($validate) {
            if ($this->forUpdate) {
                $data = [
                    'first_name'     => $this->first_name,
                    'middle_name'    => $this->middle_name,
                    'last_name'      => $this->last_name,
                    'gender'         => $this->gender,
                    'address'        => $this->address,
                ];

                $update = Member::where('id', $this->memberID)
                    ->update($data);
                if ($update) {
                    $this->alert('success', $this->first_name . ' ' . $this->last_name . ' has been updated', ['toast' => false, 'position' => 'center']);
                }
            } else {
                $member = new Member();
                $member->first_name       = $this->first_name;
                $member->middle_name      = $this->middle_name;
                $member->last_name        = $this->last_name;
                $member->gender           = $this->gender;
                $member->address          = $this->address;
                $member->save();

                $this->alert('success', $this->first_name . ' ' . $this->last_name . ' has been added', ['toast' => false, 'position' => 'center']);
            }

            // Reset the input fields
            $this->resetInputFields();
        }
    }

    public function resetInputFields()
    {
        $this->first_name = '';
        $this->middle_name = '';
        $this->last_name = '';
        $this->gender = '';
        $this->address = '';
    }

    public function getMemberList()
    {
        $query = Member::query();

        if ($this->searchTerm) {
            $query->where(function ($q) {
                $q->where('first_name', 'LIKE', '%' . $this->searchTerm . '%')
                    ->orWhere('last_name', 'LIKE', '%' . $this->searchTerm . '%');
            });
        }

        return $query->orderBy('id', 'DESC');
    }
}
    
