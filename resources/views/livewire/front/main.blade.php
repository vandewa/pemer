<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-8 align-self-center">
                    <div class="left-content show-up header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>{{ $judul }}</h2>
                                <h>{{ $isi }}</h>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                        <img src="{{ asset('storage/' . $path_file) }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>