<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Ortoacessível - Gerenciamento de Pedidos de Produtos Ortopédicos</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Bootstrap 4.1.3 !-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!-- Favicon -->
    <link rel="shortcut icon" href="http://otranscribe.com/favicon.png" />

    <!-- Styles -->
    <style>
        .register {
            background: -webkit-linear-gradient(left, #329AF7, #0E62CC);
            margin-top: 3%;
            padding: 3%;
            margin-top: 0px;
        }

        .register-left {
            text-align: center;
            color: #fff;
            margin-top: 4%;
        }

        .register-left input {
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            width: 60%;
            background: #f8f9fa;
            font-weight: bold;
            color: #383d41;
            margin-top: 30%;
            margin-bottom: 3%;
            cursor: pointer;
        }

        .register-right {
            background: #f8f9fa;
            border-top-left-radius: 10% 50%;
            border-bottom-left-radius: 10% 50%;
        }

        .register-left img {
            margin-top: 15%;
            margin-bottom: 5%;
            width: 25%;
            -webkit-animation: mover 2s infinite alternate;
            animation: mover 1s infinite alternate;
        }

        @-webkit-keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        @keyframes mover {
            0% {
                transform: translateY(0);
            }

            100% {
                transform: translateY(-20px);
            }
        }

        .register-left p {
            font-weight: lighter;
            padding: 12%;
            margin-top: -9%;
        }

        .register .register-form {
            padding: 10%;
            margin-top: 10%;
        }

        .btnRegister {
            float: left;
            margin-top: 10%;
            border: none;
            border-radius: 1.5rem;
            padding: 2%;
            background: #0062cc;
            color: #fff;
            font-weight: 600;
            width: 50%;
            cursor: pointer;
        }

        .register .nav-tabs {
            margin-top: 3%;
            border: none;
            background: #0062cc;
            border-radius: 1.5rem;
            width: 28%;
            float: right;
        }

        .register .nav-tabs .nav-link {
            padding: 2%;
            height: 34px;
            font-weight: 600;
            color: #fff;
            border-top-right-radius: 1.5rem;
            border-bottom-right-radius: 1.5rem;
        }

        .register .nav-tabs .nav-link:hover {
            border: none;
        }

        .register .nav-tabs .nav-link.active {
            width: 100px;
            color: #0062cc;
            border: 2px solid #0062cc;
            border-top-left-radius: 1.5rem;
            border-bottom-left-radius: 1.5rem;
        }

        .register-heading {
            text-align: center;
            margin-top: 8%;
            margin-bottom: -15%;
            color: #495057;
        }

        h1,
        h2 {
            font-weight: bold;
        }

        p {
            font-size: 16px;
            color: #fff;
        }

        .jumbotron {
            background-image: url("../images/jumbotron.png");
            background-size: contain;
            background-repeat: no-repeat;
            color: white;
            background-color: #F8F9FA;
            text-align: center;

        }

        .jumbotron p {
            color: #000;
            font-size: 40px;
        }

        .btn-primary {
            color: #fff;
            background-color: #329AF7;
            border-color: #333;
            margin-bottom: 5px;
        }

        .btn-primary:hover {
            color: #000;
            background-color: white;
            border-color: #000;
        }

        .btn-primary-login {
            color: #fff;
            background-color: transparent;
            border-color: #fff;
            margin-bottom: 5px;
        }

        .btn-primary-login:hover {
            color: #000;
            background-color: white;
            border-color: #fff;
        }

        @media (min-width: 1025px) and (max-width: 1280px) {

            .jumbotron {
                background-color: #F8F9FA;
                background-image: none;
            }
        }

        @media (min-width: 768px) and (max-width: 1024px) {

            .jumbotron {
                background-color: #F8F9FA;
                background-image: none;
            }

        }

        @media (min-width: 768px) and (max-width: 1024px) and (orientation: landscape) {

            .jumbotron {
                background-color: #F8F9FA;
                background-image: none;
            }

        }

        @media (min-width: 481px) and (max-width: 767px) {

            .jumbotron {
                background-color: #F8F9FA;
                background-image: none;
            }

        }

        @media (min-width: 320px) and (max-width: 480px) {

            .jumbotron {
                background-color: #F8F9FA;
                background-image: none;
            }

        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: #333;
            color: white;
            text-align: center;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark  fixed-top" style="background-color: #329AF7;">
        <a class="navbar-brand" href="#">Ortoacessível</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Início <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sobre-nos">Sobre</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#solicitacao_produto">Solicitar Produto</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#sou-orgao">Sou um Órgão</a>
                </li>
            </ul>

            @if (Route::has('login'))
            @auth
            <a class="btn btn-primary-login my-2 my-sm-0" href="{{ url('/home') }}">Painel Administrativo</a>
            @else
            <a class="btn btn-primary-login my-2 my-sm-0" href="{{ route('login') }}">Login</a>
            @endauth

            @endif
        </div>
    </nav>

    <br>
    <br>

    @if ($message = Session::get('success'))
    <div class="alert alert-success" style=" background-color: green;">
        <p>{{ $message }}</p>
    </div>
    @endif

    @if ($message = Session::get('failed'))
    <div class="alert alert-danger" style="background-color: red;">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="jumbotron">
        <div class="container">
            <h1 class="headline" style="color: #000;">Software Ortoacessível</h1>
            <p>A ferramenta ideal para gerenciar pedidos de produtos ortopédicos em secretarias de saúde.</p>
            <br>
            <p><a class="btn btn-primary btn-lg" href="#sobre-nos" role="button">Saiba Mais &raquo;</a> <a
                    class="btn btn-primary btn-lg" href="#solicitacao_produto" role="button">Solicitar Produto
                    &raquo;</a></p>
        </div>
        <br>
        <br>
    </div>

    <div class="container-fluid" id="sobre-nos" style="padding: 3%; background-color: #fff; margin-top: -33px;">
        <div class="row">
            <div class="col-md-6">
                <hr style="background-color: #000;" />
                <h1>Sobre Nós</h1>
                <p style="color: #333;">
                    O software <b>Ortoacessível</b> auxilia secretarias de saúde a gerenciar
                    pedidos de empréstimos de produtos ortopédicos. As atividades de cadastrar
                    pessoas, produtos, parceiros, empréstimos, tarefas e interesses muitas vezes
                    é feita de forma manual, então, o software é ideal para agilizar todas essas tarefas,
                    aumentando o controle e eficiência desse processo.
                </p>

                <a class="btn btn-success btn-lg" href="#sou-orgao"
                    style="background-color: #329AF7; color: #fff;">Quero
                    utilizar o sistema!</a>
                <hr style="background-color: #000;" />
            </div>

            <div class="col-md-6">
                <img class="img-fluid" style="width: 300px; heigth: 300px; float: right;"
                    src="https://yata.ostr.locaweb.com.br/d59940a9b87dc90f5ff5b39a60d9c995ca554a16f6b96c66c4ec6b0e43e410bd">
            </div>
        </div>
    </div>

    <div class="container-fluid register" id="solicitacao_produto">
        <div class="row">
            <div class="col-md-3 register-left">
                <img src="{{URL::asset('/images/wheelchair-interesse.png')}}" alt="" />
                <h3>Olá!</h3>
                <p>Registre o seu interesse em uma das organizações disponíveis!</p>
            </div>
            <div class="col-md-9 register-right">

                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <h3 class="register-heading">Registre seu interesse!</h3>
                        <form action="/store-interesse-website" method="POST">
                            @csrf
                            <div class="row register-form">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <select id="input_orgao" class="form-control" name="orgao" required>
                                            <option selected disabled value="">Escolha um órgão...</option>
                                            @foreach($orgaos as $o)
                                            <option value="{{ $o->id }}">{{ $o->name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="nome1" class="form-control" placeholder="Nome *"
                                            required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="telefone1" class="form-control"
                                            placeholder="Telefone *" required />
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="interesse" class="form-control"
                                            placeholder="Produto de Interesse *" required />
                                    </div>

                                    <input type="submit" class="btnRegister" value="Registrar" />
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid" style="display: grid;
    place-content: center;
    height: 20vh;
    background: #0E62CC;
    font-family: 'Red Hat Display', sans-serif;">
        <h1 style="font-size: 4vw;
            max-width: 75vw;
            color: #fefefe;">
            <span style=" background-image: linear-gradient(transparent calc(65% - 5px), #000cc4 5px);
                    background-size: 0;
                    background-repeat: no-repeat;
                    display: inline;
                    transition: 0.5s ease;">Software Ortoacessível</span>
        </h1>
    </div>


    <div class="container-fluid" style="background-color: #F8F9FA;">
        <div class="container" id="sou-orgao" style="padding: 20px;">
            <div class="card card-outline-secondary">
                <div class="card-header" style="background-color: #3197F5; color: #fff;">
                    <h3 class="mb-0">Quero utilizar o sistema na minha organização!</h3>
                </div>
                <div class="card-body">
                    <form class="form" role="form" autocomplete="off" action="/store-solicitacao" method="post">
                        @csrf
                        @method('post')
                        <fieldset>
                            <label for="nome2" class="mb-0">Nome</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <input type="text" name="nome2" id="name2" placeholder="Nome" class="form-control"
                                        required="">
                                </div>
                            </div>
                            <label for="email2" class="mb-0">Email</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <input type="text" name="email2" id="email2" placeholder="E-mail"
                                        class="form-control" required="">
                                </div>
                            </div>
                            <label for="telefone2" class="mb-0">Telefone</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <input type="text" name="telefone2" id="telefone2" placeholder="Telefone"
                                        class="form-control telefone2" required="">
                                </div>
                            </div>
                            <label for="message2" class="mb-0">Mensagem</label>
                            <div class="row mb-1">
                                <div class="col-lg-12">
                                    <textarea rows="6" name="mensagem2" id="message2" class="form-control"
                                        required=""></textarea>
                                </div>
                            </div>
                            <button type="submit" style="width: 100%;" class="btn btn-primary btn-lg float-right">Enviar
                                Solicitação</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <div class="footer">
        <a href="https://github.com/gbarcella/ortoacessivel">
            <p>Ortoacessível &copy; Copyrigth, 2019.</p>
        </a>
    </div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>