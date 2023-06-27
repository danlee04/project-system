<div>
    <div class="content">
        <hr>
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
                        <button class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </hr>
    </div>
</div>
