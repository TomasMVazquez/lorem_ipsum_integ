@extends('template')

@section('title',"Lorem ipsum | FAQs")

@section('mainContent')
<div class="mainFaqs">
  <section class="col-12 col-md-10 col-lg-8 text-center p-0">

    <h1 class="mt-4">Preguntas Frecuentes</h1>

    <p class="m-5">
      ¿Tenés dudas sobre cómo adquirir nuestros productos? Compartimos las FAQs que tenés que saber sobre <strong>Lorem Ipsum Cosmética</strong>. Si tu consulta no se encuentra en este listado, no dudes en contactarnos.
    </p>

    <div class="accordion mt-3" id="accordionMobile">

      <div class="card">
        <div class="card-header" id="headingOne">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
              ¿Testean en animales?
            </button>
          </h2>
        </div>

        <div id="collapseOne" class="collapse " aria-labelledby="headingOne" data-parent="#accordionMobile">
          <div class="card-body">
            No, nuestros productos no son testeados en animales. Hacemos pruebas clínicas y dermatológicas en personas, respaldadas por especialistas y en un laboratorio de referencia internacional.
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header" id="headingTwo">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
              ¿Venden productos a través de la web?
            </button>
          </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionMobile">
          <div class="card-body">
            No, <strong>Lorem Ipsum Cosmética</strong> no vende sus productos a través de la página.
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header" id="headingThree">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
              ¿Sus productos son solo para mujeres?
            </button>
          </h2>
        </div>
        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionMobile">
          <div class="card-body">
            En <strong>Lorem Ipsum Cosmética</strong> podés encontrar productos para todos, todas, todes, tod@s y todxs.
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header" id="headingFour">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseOne">
              ¿Puedo hacerme una cuenta en su página?
            </button>
          </h2>
        </div>

        <div id="collapseFour" class="collapse " aria-labelledby="headingFour" data-parent="#accordionMobile">
          <div class="card-body">
            Por supuesto. Completá el formulario de registro con tus datos y ya tendrás tu cuenta personal.
          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header" id="headingFive">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseTwo">
              ¿Puedo cambiar mi nombre de perfil de usuario?
            </button>
          </h2>
        </div>
        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionMobile">
          <div class="card-body">
            Si, claro! Ingresá a tu perfil y modificá el formulario. Guardá y listo!

          </div>
        </div>
      </div>

      <div class="card">
        <div class="card-header" id="headingSix">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseThree">
              ¿Cómo puedo encontrar el producto que estoy buscando?
            </button>
          </h2>
        </div>
        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionMobile">
          <div class="card-body">
            En la página principal vas a encontrar un buscador que te permitirá acceder al producto que estás buscando.

          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingSeven">
          <h2 class="mb-0">
            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseOne">
              ¿Son responsables de las transacciones realizadas en la página?
            </button>
          </h2>
        </div>

        <div id="collapseSeven" class="collapse " aria-labelledby="headingSeven" data-parent="#accordionMobile">
          <div class="card-body">
            No somos responsables ni somos intermediarios de las transacciones comerciales que realicen les usuaries a través de la página.
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingEight">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseTwo">
              ¿Puedo recibir las novedades de sus productos?
            </button>
          </h2>
        </div>
        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionMobile">
          <div class="card-body">
            Sí. Marcá en tu perfil la opción "Quiero recibir noticias!". Mensualmente recibirás un mail con todas las noveades de nuestros productos.
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-header" id="headingNine">
          <h2 class="mb-0">
            <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseThree">
              ¿Qué somos?
            </button>
          </h2>
        </div>
        <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionMobile">
          <div class="card-body">
            ¡Tiburones!
          </div>
        </div>
      </div>
    </div>

    <!-- Versión Desktop -->
    <div class="faqDesktop" id="accordionDesktop">

      <div class="accordion faqs-preguntas">
        <div class="card">
          <div class="card-header" id="headingOne">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <i class="fas fa-chevron-right mr-2"></i> ¿Testean en animales?
              </button>
            </h2>
          </div>


        </div>
        <div class="card">
          <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                <i class="fas fa-chevron-right mr-2"></i> ¿Venden productos a través de la web?
              </button>
            </h2>
          </div>

        </div>
        <div class="card">
          <div class="card-header" id="headingThree">
            <h2 class="mb-0">
              <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                <i class="fas fa-chevron-right mr-2"></i>¿Sus productos son solo para mujeres?

              </button>
            </h2>
          </div>

        </div>
        <div class="card">
          <div class="card-header" id="headingFour">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                <i class="fas fa-chevron-right mr-2"></i> ¿Puedo hacerme una cuenta en su página?
              </button>
            </h2>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingFive">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                <i class="fas fa-chevron-right mr-2"></i> ¿Puedo cambiar mis datos de perfil?
              </button>
            </h2>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingSix">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                <i class="fas fa-chevron-right mr-2"></i> ¿Cómo puedo encontrar el producto que estoy buscando?
              </button>
            </h2>
          </div>
        </div>
        <div class="card">
          <div class="card-header" id="headingSeven">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseSeven" aria-expanded="true" aria-controls="collapseSeven">
                <i class="fas fa-chevron-right mr-2"></i> ¿Son responsable de las transacciones realizadas en la página?
              </button>
            </h2>
          </div>
        </div>

        <div class="card">
          <div class="card-header" id="headingEight">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                <i class="fas fa-chevron-right mr-2"></i> ¿Puedo recibir las novedades de sus productos?
              </button>
            </h2>
          </div>

        </div>
        <div class="card">
          <div class="card-header" id="headingNine">
            <h2 class="mb-0">
              <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseNine" aria-expanded="false" aria-controls="collapseNine">
                <i class="fas fa-chevron-right mr-2"></i> ¿Qué somos?
              </button>
            </h2>
          </div>
        </div>
      </div>

      <div class="faqs-rtas">
        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionDesktop">
          <div class="card-body">
            No, nuestros productos no son testeados en animales. Hacemos pruebas clínicas y dermatológicas en personas, respaldadas por especialistas y en un laboratorio de referencia internacional.
          </div>
        </div>

        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionDesktop">
          <div class="card-body">
            No, <strong>Lorem Ipsum Cosmética</strong> no vende sus productos a través de la página.
          </div>
        </div>

        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionDesktop">
          <div class="card-body">
            En <strong>Lorem Ipsum Cosmética</strong> podés encontrar productos para todos, todas, todes, tod@s y todxs.
          </div>
        </div>

        <div id="collapseFour" class="collapse " aria-labelledby="headingFour" data-parent="#accordionDesktop">
          <div class="card-body">
            Por supuesto. Completá el formulario de registro con tus datos y ya tendrás tu cuenta personal.
          </div>
        </div>

        <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionDesktop">
          <div class="card-body">
            Sí, claro! Ingresá a tu perfil y modificá el formulario. Guardá y listo!
          </div>
        </div>

        <div id="collapseSix" class="collapse" aria-labelledby="headingSix" data-parent="#accordionDesktop">
          <div class="card-body">
            En la página principal vas a encontrar un buscador que te permitirá acceder al producto que estás buscando.
          </div>
        </div>

        <div id="collapseSeven" class="collapse " aria-labelledby="headingSeven" data-parent="#accordionDesktop">
          <div class="card-body">
            No somos responsables ni somos intermediarios de las transacciones comerciales que realicen les usuaries a través de la página.
          </div>
        </div>

        <div id="collapseEight" class="collapse" aria-labelledby="headingEight" data-parent="#accordionDesktop">
          <div class="card-body">
            Sí. Marcá en tu perfil la opción "Quiero recibir noticias!". Mensualmente recibirás un mail con todas las noveades de nuestros productos.
          </div>
        </div>

        <div id="collapseNine" class="collapse" aria-labelledby="headingNine" data-parent="#accordionDesktop">
          <div class="card-body">
            ¡Tiburones!
          </div>
        </div>

      </div>
    </div>
  </section>
</div>
@endsection
