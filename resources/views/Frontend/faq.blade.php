@extends('layouts.frontend')
@section('front_title')FAQ @endsection
@section('content')
<!-- Modal -->
<div id="wrapper">
	<section class="dishes-nearby section-gapping">
		<div class="container faq-container">

			<div class="accordion" id="accordionExample">
				<div class="card">
					<div class="card-header" id="headingOne">
						<h2 class="mb-0">
							<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
								Como funciona Chefis?
							</button>
						</h2>
					</div>

					<div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
						<div class="card-body">
							Chefis es un mercado digital que conecta a los mejores chefs de la Ciudad de México con personas que buscan comida hecha como en casa.
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingTwo">
						<h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
								El Chef viene a mi casa?
							</button>
						</h2>
					</div>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
						<div class="card-body">
							El chef no va a tu casa. Más bien el chef prepara la comida desde su propia casa y un repartidor chefis la recoge y luego la lleva a tu domicilio.
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingThree">
						<h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
								Que hago si quiero pedir comida para muchas personas?
							</button>
						</h2>
					</div>
					<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
						<div class="card-body">
							Mandanos un correo a comidas@chefis.app o un whatsapp a (55) 67020423 con los detalles de tu solicitud.
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingFour">
						<h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
								Quiero organizar un working lunch?
							</button>
						</h2>
					</div>
					<div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
						<div class="card-body">
							Mandanos un correo a comidas@chefis.app o un whatsapp a (55) 67020423 con los detalles de tu solicitud.
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingFive">
						<h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
								Puedo pedir con anticipación?
							</button>
						</h2>
					</div>
					<div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
						<div class="card-body">
							Si! Y nos encanta cuando lo haces porque asi nuestros chefs se pueden preparar.<br>
							Simplemente, elige el dia que quieras pedir y elige la comida y agregala al carrito
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingSix">
						<h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
								Si pides para toda tu semana te regalamos un descuento de 10% USA CODIGO SEMANA Puedes planear para tu semana.
							</button>
						</h2>
					</div>
					<div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionExample">
						<div class="card-body">
							Has cada pedido con Chefis
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingSeven">
						<h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
								Que tengo que hacer para ser Chef?
							</button>
						</h2>
					</div>
					<div id="collapseSeven" class="collapse" aria-labelledby="headingSeven" data-parent="#accordionExample">
						<div class="card-body">
							help.chefis.app/chef
						</div>
					</div>
				</div>
				<div class="card">
					<div class="card-header" id="headingEight">
						<h2 class="mb-0">
							<button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
								Tuve un problema
							</button>
						</h2>
					</div>
					<div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionExample">
						<div class="card-body">
							Vete al area de soporte.
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
