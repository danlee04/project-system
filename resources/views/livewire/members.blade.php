<div>
    <div class="card-body">
    <h2>Add New Member</h2>
            <form wire:submit.prevent="saveMember">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label">First Name</div>
                            <input type="" wire:model="first_name" name="first_name" class="form-control">
                            @error('first_name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label">Middle Name</div>
                            <input type="" wire:model="middle_name" name="middle_name"  class="form-control">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="form-label">Last Name</div>
                            <input type="" wire:model="last_name" name="last_name" class="form-control">
                            @error('last_name')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-label">Gender</div>
                            <select class="form-control" id="gender" wire:model="gender">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <div class="form-label">Home Address</div>
                            <input type="" wire:model="address" name="address" class="form-control">
                            @error('address')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                    @if($forUpdate)
                        <button class="btn btn-primary">Update</button>
                        @else
                        <button class="btn btn-primary">Save</button>
                    @endif
                        </dv>
                    </div>
                    </form>
                </div>
        <hr>
            <!-- search bar -->
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <i class="fas fa-table me-1"></i>
                            <h2>Members List</h2>
                        </div>
                        <div>
                            <input type="text" wire:model="searchTerm" placeholder="Search..." class="form-control">
                        </div>
                    </div>
                </div>
            <!-- search bar end-->

            <!-- Livewire component end -->

            <table class="table">
                <thead>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Home Address</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach($members as $member)
                        <tr>
                            <td>{{ $member->first_name }}</td>
                            <td>{{ $member->middle_name }}</td>
                            <td>{{ $member->last_name }}</td>
                            <td>{{ $member->gender }}</td>
                            <td>{{ $member->address }}</td>
                            <td>
                        <button class="btn btn-info btn-sm" wire:click="update('{{ $member->id }}')">Edit</button>

                        <button class="btn btn-danger btn-sm" wire:click="delete('{{ $member->id }}')">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $members->links() }}
            <div>
        </hr>
    </div>
</div>