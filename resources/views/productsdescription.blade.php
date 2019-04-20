@extends('layouts.app')

@section('content')

<div class="main">
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-6 mb-4" id="imagenproducto">
                <img src="{{ asset('storage/nb.png') }}" class="img-fluid" alt="">  
            </div>
            
            <div class="col-md-6 mb-4">
                <div class="p-4">
                    
                    <p class="lead font-weight-bold">Nombre del Producto</p>
                    
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Et dolor suscipit libero eos atque quia ipsa
                        sint voluptatibus!
                        Beatae sit assumenda asperiores iure at maxime atque repellendus maiores quia sapiente.
                    </p>
                    <p class="lead">
                        <span class="mr-1"> <del>$200</del> </span>
                        <span>$100</span>
                    </p>
                    <div class="d-flex justify-content-start align-items-baseline">
                        <label for="colores" class="mr-1">Colores:</label>
                        <div class="picker-color ml-1" name="colores" style="backgroundColor: #c5170f"></div>
                        <div class="picker-color ml-1" name="colores" style="backgroundColor: #9b9b9b"></div>
                        <div class="picker-color ml-1" name="colores" style="backgroundColor: #1d334a"></div>
                    </div>
                    <form class="d-flex justify-content-start align-items-baseline">
                        <label for="cantidad">Cantidad:</label>
                        <button type="button" class="btn btn-outline-info ml-2"><i class="fas fa-minus" {{-- @click="addQuantity" --}}></i></button>
                        <strong style="width: 35px; text-align:center">{{-- {{ quantity }} --}}0</strong>
                        <button type="button" class="btn btn-outline-info mr-2"><i class="fas fa-plus" {{-- @click="subQuantity" --}}></i></button>
                        {{-- <input name="cantidad" type="number" value="1" aria-label="Search" class="form-control ml-1 mr-2" style="width: 80px"> --}}
                        <label for="tallas">Talla:</label>
                        <select name="tallas" id="tallas" class="form-control ml-1 mr-2" style="width: 80px">
                            <option value="36">36</option>
                            <option value="37">37</option>
                            <option value="38">38</option>
                            <option value="39">39</option>
                        </select>
                        <button class="btn btn-primary btn-md my-0 p ml-1" type="submit">Añadir al carrito
                            <i class="fas fa-shopping-cart ml-1"></i>
                        </button>
                    </form>
                    
                </div>                  
            </div>             
        </div>
        {{-- lightbox? --}}
        <div class="row mt-2 mb-2">
            <div class="col-2 mb-2">
                <img class="img-thumbnail img-fluid" src="https://d2lm6fxwu08ot6.cloudfront.net/img-thumbs/960w/04LDEYRW59.jpg" alt="">
            </div>
            <div class="col-2 mb-2">
                <img class="img-thumbnail img-fluid" src="https://d2lm6fxwu08ot6.cloudfront.net/img-thumbs/960w/90V03Q5Y60.jpg" alt="">
            </div>
            <div class="col-2 mb-2">
                <img class="img-thumbnail img-fluid" src="https://d2lm6fxwu08ot6.cloudfront.net/img-thumbs/960w/O83SF2RB6D.jpg" alt="">
            </div>
            <div class="col-2 mb-2">
                <img class="img-thumbnail img-fluid" src="https://d2lm6fxwu08ot6.cloudfront.net/img-thumbs/960w/5JVPSVP7EI.jpg" alt="">
            </div>
            <div class="col-2 mb-2">
                <img class="img-thumbnail img-fluid" src="https://d2lm6fxwu08ot6.cloudfront.net/img-thumbs/960w/C5Y10KIIHA.jpg" alt="">
            </div>
            <div class="col-2 mb-2">
                <img class="img-thumbnail img-fluid" src="https://d2lm6fxwu08ot6.cloudfront.net/img-thumbs/960w/YSSFRY5B25.jpg" alt="">
            </div>
        </div>
        <hr>
    </div>
</div>
@include('footer')
@endsection
{{-- <script>
    export default {
        data: {
            quantity: 0
        },
        methods: {
            addQuantity: function() {
                this.quantity++;
            },
            subQuantity: function() {
                if (quantity > 0) {
                    this.quantity--;
                }
            }
        }
    }
</script> --}}
<style>
    .row>.col-2 img {
        padding: 0;
        max-width: auto;
    }
    
    #imagenproducto {
        max-height: 650px;
        max-width: 500px;
    }
    
</style>