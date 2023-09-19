<div class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7">
                <div class="intro-wrap">
                    <h3 class="mb-5"><span class="d-block">Your Link to </span> Effortless Sharing <span class="typed-words"></span></h3>

                    <div class="row">
                        <div class="col-12">
                            <form class="form" id="form" wire:submit="uploadFile" enctype="multipart/form-data">
                                <div class="row mb-12">
                                    <div class="col-sm-12 col-md-12 mb-12 mb-lg-0 col-lg-12">
                                        <input type="file" class="form-control" wire:model="file">
                                    </div>
                                </div>    
                                <div class="row align-items-center">
                                    <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-4 mt-2">
                                        <button type="submit" class="btn btn-primary btn-block" wire:loading.attr="disabled" wire:target="file">Get Path</button>
                                    </div>
                                </div>
                                @error('file') <span class="error">{{ $message }}</span> @enderror
                                @if($public_path)
                                    <div class="row align-items-center">
                                        <div class="col-sm-12 col-md-6 mb-3 mb-lg-0 col-lg-12 mt-2">
                                            <div class="alert alert-success" role="alert">
                                                <small class="mt-3">
                                                    <a href="{{$public_path}}" target="_blank" id="file-link">{{$public_path}}</a> <span class="icon-copy "></span>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <div
                                    x-data="{ uploading: false, progress: 0 }"
                                    x-on:livewire-upload-start="uploading = true"
                                    x-on:livewire-upload-finish="uploading = false"
                                    x-on:livewire-upload-error="uploading = false"
                                    x-on:livewire-upload-progress="progress = $event.detail.progress"
                                >
                                    <!-- Progress Bar -->
                                    <div x-show="uploading">
                                        <progress max="100" x-bind:value="progress"></progress>
                                    </div>
                                </div>


                            </form>
                            

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="slides">
                    <img src="{{asset('frontend')}}/images/hero-slider-1.jpg" alt="Image" class="img-fluid active">
                    <img src="{{asset('frontend')}}/images/hero-slider-2.jpg" alt="Image" class="img-fluid">
                    <img src="{{asset('frontend')}}/images/hero-slider-3.jpg" alt="Image" class="img-fluid">
                    <img src="{{asset('frontend')}}/images/hero-slider-4.jpg" alt="Image" class="img-fluid">
                    <img src="{{asset('frontend')}}/images/hero-slider-5.jpg" alt="Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
@endpush

@push('scripts')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script>
        window.addEventListener('notify', event => {
            Toastify({
                text: event.detail[0],
                duration: 5000,
                close: true,
                gravity: "bottom", // `top` or `bottom`
                position: 'center', // `left`, `center` or `right`
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
                stopOnFocus: true, // Prevents dismissing of toast on hover
                onClick: function(){
                    copyFileLink();
                }
            }).showToast();

            // reset form

            document.getElementById('form').reset();
        });

    </script>
@endpush
