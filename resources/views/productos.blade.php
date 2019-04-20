<div class="container-fluid">
    <product-list-component></product-list-component>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{ asset('storage/nb.png') }}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title"> <p class="lead font-weight-bold">{{-- {{ products.nombre }} --}}Nombre</p></h5>
                    <p class="card-text">{{-- {{ products.descripcion }} --}}This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <div class="d-flex justify-content-end align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-info" onclick="window.location='{{ url("/detalles") }}'">Ver</button>
                            <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                        </div>
                        <!-- <small class="text-muted">9 mins</small> -->
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{ asset('storage/nb.png') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                        <small class="text-muted">9 mins</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{ asset('storage/nb.png') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                        <small class="text-muted">9 mins</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
            <div class="card mb-4 box-shadow">
                <img class="card-img-top" src="{{ asset('storage/nb.png') }}" alt="Card image cap">
                <div class="card-body">
                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button>
                        </div>
                        <small class="text-muted">9 mins</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>