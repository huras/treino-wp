<style>
    .select2-selection__rendered {
        line-height: 42px !important;
        /* border: 1px solid #e3e3ea; */
    }
    .select2-container .select2-selection--single {
        height: 42px !important;
        border: 1px solid #e3e3ea;
    }
    .select2-selection__arrow {
        height: 42px !important;
        /* border: 1px solid #e3e3ea; */
    }

    .select2-container{
        width: 100%!important;
    }
</style>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css" type="text/css">

<div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <form id='form-step-1' action="{{route('externalStep1Entry')}}" method='GET' class='row g-3' >

                    <div class="col-12">
                        <label for="input-name" class="lutron-label form-label">Nome</label>
                        <input
                            id='input-name'
                            name='nome'
                            type="text"
                            class="form-control lutron-input"
                            placeholder="Seu Nome Completo"
                            aria-label="Seu Nome Completo"
                        >
                        <div id='input-name-validation'>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="input-email" class="lutron-label form-label">E-mail</label>
                        <input
                            id="input-email"
                            name='email'
                            type="email"
                            class="form-control lutron-input"
                            placeholder="Digite seu melhor e-mail"
                            aria-label="Digite seu melhor e-mail"
                        >
                        <div id='input-email-validation'>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="input-phone" class="lutron-label form-label">Telefone | WhatsApp</label>
                        <input
                            id="input-phone"
                            name='phone'
                            type="text"
                            class="form-control lutron-input phone_with_ddd"
                            placeholder="Digite seu WhatsApp com DDD"
                            aria-label="Digite seu WhatsApp com DDD"
                        >
                        <div id='input-phone-validation'>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="input-cidade" class="lutron-label form-label">Estado</label>
                        <select
                            id="input-estado"
                            name='estado'
                            type="text"
                            class="form-control lutron-input"
                            placeholder="Qual o seu Estado"
                            aria-label="Qual o seu Estado"
                        >
                        </select>
                        <div id='input-estado-validation'>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="input-cidade" class="lutron-label form-label">Cidade</label>
                        <select
                            id="input-cidade"
                            name='cidade'
                            type="text"
                            class="form-control lutron-input"
                            placeholder="Qual sua Cidade"
                            aria-label="Qual sua Cidade"
                        >
                        </select>
                        <div id='input-cidade-validation'>
                        </div>
                    </div>

                    <button type="button" class='btn btn-primary btn-lutron' onclick='lutronForm.goToStep2()'> Próximo passo </button>
                </form>

                <form id='form-step-2' action="{{route('externalStep1Entry')}}" method='GET' class='row g-3' style='display: none;'>

                    <input type="hidden" name="paramsJSON" value="" id="paramsJSON">
                    <input type="hidden" name="codigoTabela" value="-1" id="codigoTabela">

                    <div class="col-12">
                        <label for="input-veiculo" class="lutron-label form-label">Tipo de veículo:</label>
                        <div class='w-100 gx-1'>
                            <div class="form-check form-check-inline ">
                                <input class="form-check-input" type="radio" name="tipoVeiculo" id="carro-radio" value="1" onchange="handleVehicleType(event)">
                                <label class="form-check-label" for="carro-radio">Carro</label>
                            </div>
                            <div class="form-check form-check-inline ">
                                <input class="form-check-input" type="radio" name="tipoVeiculo" id="moto-radio" value="2" onchange="handleVehicleType(event)">
                                <label class="form-check-label" for="moto-radio">Moto</label>
                            </div>
                            <div class="form-check form-check-inline ">
                                <input class="form-check-input" type="radio" name="tipoVeiculo" id="caminhao-radio" value="3" onchange="handleVehicleType(event)">
                                <label class="form-check-label" for="caminhao-radio">Caminhão</label>
                            </div>
                        </div>
                        <div id='tipoVeiculo-validation'>
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="select-marca" class="lutron-label form-label">Marca</label>
                        <select class="form-select" name="marca" id="select-marca" onchange="handleBrand(event)">
                        </select>
                        <div id='select-marca-validation'>
                        </div>
                    </div>

                    <div class="col-6">
                        <label for="select-modelo" class="lutron-label form-label">Modelo</label>
                        <select class="form-select" name="modelo"  id="select-modelo" onchange="handleModel(event)">
                        </select>
                        <div id='select-modelo-validation'>
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="select-ano-modelo" class="lutron-label form-label">Ano Modelo</label>
                        <select class="form-select" name="anoModelo"  id="select-ano-modelo" onchange="handleYear(event)">
                        </select>
                        <div id='select-ano-validation'>
                        </div>
                    </div>

                    <div class="col-2">
                        <button type="button" class='btn btn-secondary btn-lutron w-100' onclick='lutronForm.goToStep1()'> < </button>
                    </div>
                    <div class="col-10">
                        <button type="button" class='btn btn-primary btn-lutron w-100' onclick='lutronForm.submit()'> Cotar Agora! </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>  -->
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
    <!-- Popper.JS -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script> -->