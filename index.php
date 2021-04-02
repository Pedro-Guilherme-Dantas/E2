<?php include "functions.php"; validate(); ?>
<html lang="pt-br">
    <head>
        <title>Estatísticas de Alunos com COVID</title>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- FONT -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@900&display=swap" rel="stylesheet">

        <!-- ICONE -->
        <link rel="shortcut icon" href="images/virus.svg" type="image/x-icon">

        <!-- CSS -->
        <link rel="stylesheet" href="css/style.css">
        
    <style>
        .case1{border-top-left-radius: 10px;border-top: 5px solid #FFC107;}
        .case2{border-top: 5px solid #DC3545;}
        .case3{border-top: 5px solid #189E16;}
        .case4{border-top-right-radius: 10px;border-top: 5px solid #575757;}
    </style>

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>   
    <body>

        <div class="container my-5">
            <div class="row">
                <div class="col-md col-lg-3 mb-2 mx-3">
                    <div class="row">
                        <!-- FORM -->
                        <div class="col-md-12 bg-new-white shadow-custom rounded-border p-4 effect2">
                            <h1 class="title-form">PARTICIPE DA PESQUISA</h1>

                            <div class="form mt-5">
                                <form method="POST">
                                    <div class="form-group">
                                        <label class="label-style" for="cidade">CPF
                                            <span class="required-input">*</span>
                                        </label>
                                        <input class="input-style" onkeypress="$(this).mask('000.000.000-00')" type="text" name="inpCpf" id="cidade" placeholder="000.000.000-00" max-length="15" autocomplete="off" required>
                                    </div>

                                    <div class="form-group">
                                        <label class="label-style" for="idade">Idade
                                            <span class="required-input">*</span>
                                        </label>
                                        <input class="input-style" type="number" name="inpIdade" id="idade" maxlength="3" min="0" max="110" required placeholder="15">
                                    </div>

                                    <div class="form-group">
                                        <label class="label-style" for="cidade">Cidade
                                            <span class="required-input">*</span>
                                        </label>
                                        <select class="input-style" name="selectCidade">
                                            <?php criarSelect(); ?>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label class="label-style">Faz parte do grupo de risco?
                                            <span class="required-input">*</span>
                                        </label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="SIM" id="defaultCheck1" name="check1" required>
                                            <label class="form-check-label label-style" for="defaultCheck1">Sim</label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="NÃO" id="defaultCheck2" name="check1" required>
                                            <label class="form-check-label label-style" for="defaultCheck2">Não</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="label-style">Já foi infectado?
                                            <span class="required-input">*</span>
                                        </label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="SIM" id="defaultCheck3" name="check2" required>
                                            <label class="form-check-label label-style" for="defaultCheck3">Sim</label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="NÃO" id="defaultCheck4" name="check2" required>
                                            <label class="form-check-label label-style" for="defaultCheck4">Não</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="label-style">Tomou a vacina?
                                            <span class="required-input">*</span>
                                        </label>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="VACINADO" id="defaultCheck5" name="check3" required>
                                            <label class="form-check-label label-style" for="defaultCheck5">Sim </label>
                                        </div>

                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" value="NULA" id="defaultCheck6" name="check3" required>
                                            <label class="form-check-label label-style" for="defaultCheck6">Não</label>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary" name="btnEnviar">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



                <div class="col-md-7 col-lg mx-3">
                    <!-- CASES -->
                    <div class="row effect1">
                        <div class="col-md-12 mb-2">
                            <div class="row shadow-custom bg-new-white rounded-border">
                                <div class="col-6 col-md-6 col-sm-6 col-lg-3 p-0">
                                    <div class="div-cases case1 p-3">
                                        <h2 class="title-cases">CASOS<br>CONFIRMADOS</h2>
                                        <h3 class="number-cases text-warning"> 
                                            <?php echo showMedias(0); ?> 
                                        </h3>
                                    </div>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-0">
                                    <div class="div-cases case2 p-3">
                                        <h2 class="title-cases">MÉDIA<br>DE IDADE</h2>
                                        <h3 class="number-cases text-danger">
                                            <?php echo showMedias(1); ?>
                                        </h3>
                                    </div>
                                </div>

                                <div class="col-6 col-sm-6 col-md-6 col-lg-3 p-0">
                                    <div class="div-cases case3 p-3">
                                        <h2 class="title-cases">MÉDIA DE IDADE<br>(INFECTADOS)</h2>
                                        <h3 class="number-cases text-success">
                                            <?php echo showMedias(2); ?>
                                        </h3>
                                    </div>
                                </div>

                                <div class="col-6 col-md-6 col-sm-6 col-lg-3 p-0">
                                    <div class="div-cases case4 p-3">
                                        <h2 class="title-cases">TOTAL DE<br>ENTREVISTADOS</h2>
                                        <h3 class="number-cases text-secondary"><?php echo showMedias(3); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <div class="row">
                        <!-- GRAPHIC 1 -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
                            <div class="graphic-1 bg-new-white rounded-border shadow-custom mx-1 mb-2 text-center effect3">
                                <!-- Large modal -->
                                <button type="button" class="no-button" data-toggle="modal" data-target="#modal1">
                                    <img class="rounded-border" width="100%" src="images/grafico1.png">
                                    <svg width="32px" height="32px" fill="#6F6F6F" class="mb-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M508.745,246.041c-4.574-6.257-113.557-153.206-252.748-153.206S7.818,239.784,3.249,246.035    c-4.332,5.936-4.332,13.987,0,19.923c4.569,6.257,113.557,153.206,252.748,153.206s248.174-146.95,252.748-153.201    C513.083,260.028,513.083,251.971,508.745,246.041z M255.997,385.406c-102.529,0-191.33-97.533-217.617-129.418    c26.253-31.913,114.868-129.395,217.617-129.395c102.524,0,191.319,97.516,217.617,129.418    C447.361,287.923,358.746,385.406,255.997,385.406z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M255.997,154.725c-55.842,0-101.275,45.433-101.275,101.275s45.433,101.275,101.275,101.275    s101.275-45.433,101.275-101.275S311.839,154.725,255.997,154.725z M255.997,323.516c-37.23,0-67.516-30.287-67.516-67.516    s30.287-67.516,67.516-67.516s67.516,30.287,67.516,67.516S293.227,323.516,255.997,323.516z"/>
                                            </g>
                                        </g>
                                    </svg>
                                </button>

                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <img class="rounded-border" width="100%" src="images/grafico1.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- GRAPHIC 2 -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
                            <div class="graphic-1 bg-new-white rounded-border shadow-custom mx-1 mb-2 text-center effect3">
                                <!-- Large modal -->
                                <button type="button" class="no-button" data-toggle="modal" data-target="#modal2">
                                    <img class="rounded-border" width="100%" src="images/grafico2.png">
                                    <svg width="32px" height="32px" fill="#6F6F6F" class="mb-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M508.745,246.041c-4.574-6.257-113.557-153.206-252.748-153.206S7.818,239.784,3.249,246.035    c-4.332,5.936-4.332,13.987,0,19.923c4.569,6.257,113.557,153.206,252.748,153.206s248.174-146.95,252.748-153.201    C513.083,260.028,513.083,251.971,508.745,246.041z M255.997,385.406c-102.529,0-191.33-97.533-217.617-129.418    c26.253-31.913,114.868-129.395,217.617-129.395c102.524,0,191.319,97.516,217.617,129.418    C447.361,287.923,358.746,385.406,255.997,385.406z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M255.997,154.725c-55.842,0-101.275,45.433-101.275,101.275s45.433,101.275,101.275,101.275    s101.275-45.433,101.275-101.275S311.839,154.725,255.997,154.725z M255.997,323.516c-37.23,0-67.516-30.287-67.516-67.516    s30.287-67.516,67.516-67.516s67.516,30.287,67.516,67.516S293.227,323.516,255.997,323.516z"/>
                                            </g>
                                        </g>
                                    </svg>
                                </button>

                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal2">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <img class="rounded-border" width="100%" src="images/grafico2.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- GRAPHIC 3 -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
                            <div class="graphic-1 bg-new-white rounded-border shadow-custom mx-1 mb-2 text-center effect3">
                                <!-- Large modal -->
                                <button type="button" class="no-button" data-toggle="modal" data-target="#modal3">
                                    <img class="rounded-border" width="100%" src="images/graficoMap.png">
                                    <svg width="32px" height="32px" fill="#6F6F6F" class="mb-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M508.745,246.041c-4.574-6.257-113.557-153.206-252.748-153.206S7.818,239.784,3.249,246.035    c-4.332,5.936-4.332,13.987,0,19.923c4.569,6.257,113.557,153.206,252.748,153.206s248.174-146.95,252.748-153.201    C513.083,260.028,513.083,251.971,508.745,246.041z M255.997,385.406c-102.529,0-191.33-97.533-217.617-129.418    c26.253-31.913,114.868-129.395,217.617-129.395c102.524,0,191.319,97.516,217.617,129.418    C447.361,287.923,358.746,385.406,255.997,385.406z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M255.997,154.725c-55.842,0-101.275,45.433-101.275,101.275s45.433,101.275,101.275,101.275    s101.275-45.433,101.275-101.275S311.839,154.725,255.997,154.725z M255.997,323.516c-37.23,0-67.516-30.287-67.516-67.516    s30.287-67.516,67.516-67.516s67.516,30.287,67.516,67.516S293.227,323.516,255.997,323.516z"/>
                                            </g>
                                        </g>
                                    </svg>
                                </button>

                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal3">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <img class="rounded-border" width="100%" src="images/graficoMap.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <!-- GRAPHIC 4 -->
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
                            <div class="graphic-1 bg-new-white rounded-border shadow-custom mx-1 mb-2 text-center effect3">
                                <!-- Large modal -->
                                <button type="button" class="no-button" data-toggle="modal" data-target="#modal4">
                                    <img class="rounded-border" width="100%" src="images/grafico3.png">
                                    <svg width="32px" height="32px" fill="#6F6F6F" class="mb-2" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 511.999 511.999" style="enable-background:new 0 0 511.999 511.999;" xml:space="preserve">
                                        <g>
                                            <g>
                                                <path d="M508.745,246.041c-4.574-6.257-113.557-153.206-252.748-153.206S7.818,239.784,3.249,246.035    c-4.332,5.936-4.332,13.987,0,19.923c4.569,6.257,113.557,153.206,252.748,153.206s248.174-146.95,252.748-153.201    C513.083,260.028,513.083,251.971,508.745,246.041z M255.997,385.406c-102.529,0-191.33-97.533-217.617-129.418    c26.253-31.913,114.868-129.395,217.617-129.395c102.524,0,191.319,97.516,217.617,129.418    C447.361,287.923,358.746,385.406,255.997,385.406z"/>
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="M255.997,154.725c-55.842,0-101.275,45.433-101.275,101.275s45.433,101.275,101.275,101.275    s101.275-45.433,101.275-101.275S311.839,154.725,255.997,154.725z M255.997,323.516c-37.23,0-67.516-30.287-67.516-67.516    s30.287-67.516,67.516-67.516s67.516,30.287,67.516,67.516S293.227,323.516,255.997,323.516z"/>
                                            </g>
                                        </g>
                                    </svg>
                                </button>

                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" id="modal4">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <img class="rounded-border" width="100%" src="images/grafico3.png">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        



        <!-- Optional JavaScript -->

        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <!-- MASK JQUERY -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    </body>
</html>