<section class="section">
    <div class="section-header">
        {{-- <div class="section-header-back">
            <a href="features-settings.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div> --}}
        <h1>Notification Settings</h1>
        <div class="section-header-breadcrumb">
            {{-- <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
            <div class="breadcrumb-item active"><a href="#">Settings</a></div> --}}
            <div class="breadcrumb-item active"><a href="#">Notification Settings</a></div>
        </div>
    </div>

    <div class="section-body">
        {{-- <h2 class="section-title">All About General Settings</h2>
        <p class="section-lead">
            You can adjust all general settings here
        </p>

        <div id="output-status"></div> --}}
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    {{-- <div class="card-header">
                        <h4>Jump To</h4>
                    </div> --}}
                    <div class="card-body">
                        <ul class="nav nav-pills flex-column">
                            <li class="nav-item"><a href="#" class="nav-link active">Push Notifications</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <form wire:submit.prevent="submit">
                    <div class="card" id="settings-card">
                        <div class="card-header">
                            <h4>Push Notifications</h4>
                        </div>

                        <div class="card-body">
                            {{-- <p class="text-muted">General settings such as, site title, site description, address and so
                                    on.</p> --}}
                            <div class="form-group row align-items-center">
                                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Title</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" wire:model.lazy="title"
                                        class="form-control @error('title') is-invalid @enderror">
                                    @error('title')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="site-description"
                                    class="form-control-label col-sm-3 text-md-right">Description</label>
                                <div class="col-sm-6 col-md-9">
                                    <textarea class="form-control @error('description') is-invalid @enderror" wire:model.lazy="description"></textarea>
                                    @error('description')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Url</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" wire:model.lazy="url"
                                        class="form-control @error('url') is-invalid @enderror">
                                    @error('url')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label for="site-title" class="form-control-label col-sm-3 text-md-right">Image
                                    Url</label>
                                <div class="col-sm-6 col-md-9">
                                    <input type="text" wire:model.lazy="image"
                                        class="form-control @error('image') is-invalid @enderror">
                                    @error('image')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="form-control-label col-sm-3 text-md-right">Segment</label>
                                <div class="col-lg-8 col-md-8">
                                    <div class="selectgroup w-100">
                                        <label class="selectgroup-item">
                                            <input type="radio" name="segment" value="Subscribed Users"
                                                class="selectgroup-input" checked="">
                                            <span class="selectgroup-button">All</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="segment" value="Active Users"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">Active</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="segment" value="Android"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">Android</span>
                                        </label>
                                        <label class="selectgroup-item">
                                            <input type="radio" name="segment" value="Country Indonesia"
                                                class="selectgroup-input">
                                            <span class="selectgroup-button">Country Indonesia</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer bg-whitesmoke text-md-right">
                            <button class="btn btn-primary" type="submit">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
