<div>
    <form class="form-default" role="form" wire:submit.prevent="submit()" id="addressAddForm"
        enctype="multipart/form-data">
        <div class="modal-body">
            <div class="p-3">

                <div class="row mt-3">
                    <div class="col-md-2">
                        <label>Your Name</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" autocomplete="name" autofocus class="form-control mb-3"
                            placeholder="Your Name" name="name" wire:model="name">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-md-2">
                        <label>Your Email</label>
                    </div>
                    <div class="col-md-10">
                        <input type="email" autocomplete="email" class="form-control mb-3" placeholder="Your Email"
                            name="email" wire:model="email" required="">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label>Phone</label>
                    </div>
                    <div class="col-md-10">
                        <input wire:model="phone_number" type="text" autocomplete="mobile"
                            class="form-control mb-3 numbers-only" placeholder="Your Phone Number" name="phone_number"
                            required="">
                        @error('phone_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label>Qualification</label>
                    </div>
                    <div class="col-md-10">
                        <input wire:model="qualification" type="text" class="form-control mb-3 numbers-only"
                            placeholder="Your Qualification" name="qualification" required="">
                        @error('qualification')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label>Current Working Status</label>
                    </div>
                    <div class="col-md-10 mb-3">
                        <div class="form-group__content" wire:ignore>
                            <select wire:model="current_status" class="form-control aiz-selectpicker"
                                data-live-search="true" data-placeholder="Select your status" name="current_status"
                                required>
                                <option selected value="Employed">Employed</option>
                                <option value="Serving Notice Period">Serving Notice Period</option>
                                <option value="Unemployed">Unemployed</option>
                            </select>
                        </div>
                        @error('current_status')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>Gender</label>
                    </div>
                    <div class="col-md-10 mb-3">
                        <div class="form-group__content" wire:ignore>
                            <select wire:model="gender" class="form-control aiz-selectpicker" data-live-search="true"
                                data-placeholder="Select your gender" name="gender" required>
                                <option selected value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        @error('gender')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <label>Years of Experience</label>
                    </div>
                    <div class="col-md-10">
                        <input wire:model="years_of_experience" type="text" class="form-control mb-3 numbers-only"
                            placeholder="Years of Experience" name="years_of_experience" required="">
                        @error('years_of_experience')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                        <label>Resume</label>
                    </div>
                    <div class="col-md-10">
                        <input wire:model="resume_file" type="file" accept=""
                            class="form-control mb-3 numbers-only" name="resume_file" required="">
                        @error('resume_file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group text-right">
                    <button type="submit" wire:loading.attr="disabled" class="ps-btn">Submit</button>
                </div>

                <div>
                    @if (session()->has('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>

            </div>
        </div>
    </form>
</div>
