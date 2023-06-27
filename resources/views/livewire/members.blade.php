<div>
    <div class="card-body">
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