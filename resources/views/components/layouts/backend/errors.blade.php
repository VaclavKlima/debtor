@if($errors->any())
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <p class="mb-0">
                        @foreach($errors->all() as $error)
                            {{ $error }}<br>
                        @endforeach
                    </p>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        </div>
    </div>
@endif
