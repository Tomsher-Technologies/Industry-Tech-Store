<div>
    <form class="form-default" role="form" wire:submit.prevent="save()" id="addressAddForm">
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
                        <label>Your message</label>
                    </div>
                    <div class="col-md-10">
                        <textarea placeholder="Your message" name="message_body" wire:model="message_body" class="form-control mb-3 numbers-only" id="" cols="30" rows="10"></textarea>
                        @error('message_body')
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
