@extends('layouts.frontend')
@section('front_title') About Us @endsection
@section('front_css')
@endsection
@section('content')
    <section class="dishes-nearby section-gapping">
        <div class="container">
            <div class="row ">
                <div class="col-md-4">
                    <h2 class="title text-black">About   <b>US</b></h2> </div>
            </div>
            <div class="aboutus-page">
                <div class="row mt-5 align-items-center">
                    <div class="col-md-5">
                        <img src="{{URL::to('public/Frontassets/images/own-boss.png')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7">
                        <p>Somos tres hermanos y desde chicos nuestra mamá siempre nos ha hecho de comer y estamos acostumbrados a comer en familia todos los días.
                        Al crecer e irnos de la casa nos dimos cuenta que lo que teníamos era muy especial. Llegar a la casa y que la comida esté servida es un privilegio! Más aún, el poder comer comida hecha por nuestra mamá en familia todos los días es una bendición.
                        </p>
                    </div>
                </div>
                <div class="row mt-5 align-items-center">

                    <div class="col-md-7">
                        <p>Ahora que ya somos grandes, ir al super y cocinar todos los días se ha vuelto complicado y terminamos comiendo fuera o pidiendo comida. Sin embargo extrañamos la comida de mamá y que nos grite "Ya esta la comida!!"</p>
                    </div>
                    <div class="col-md-5 text-right">
                        <img src="{{URL::to('public/Frontassets/images/community.png')}}" class="img-fluid" alt="">
                    </div>
                </div>
                <div class="row mt-5 align-items-center">
                    <div class="col-md-5">
                        <img src="{{URL::to('public/Frontassets/images/own-boss.png')}}" class="img-fluid" alt="">
                    </div>
                    <div class="col-md-7">
                        <p>Sabemos que ustedes también y creamos Chefis con la intención de que la hora de comer sea tan agradable y tan fácil como llegar a tu casa y sentarte a la mesa y que la comida esté lista, donde lo único que tienes que hacer es sentarte a comer.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('front_js')
@endsection
