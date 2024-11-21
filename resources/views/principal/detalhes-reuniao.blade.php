<x-layout :mensagem-sucesso="$mensagemSucesso">

    <!-- Page Wrapper -->
    <div class="page-wrapper">

    @if(session('mensagemSucesso'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('mensagemSucesso') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Editar Reuniao</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item active">Admin</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Page Header -->

            <!-- Overview Section -->
            <div class="row ">


                <div class="col-lg-8 ">
                    <div class="card">
                     
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Data</th>
                                            <th>Horario</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        @foreach ($reunioes as $reuniao )
                                            
                                        <tr>
                                            <td>{{ $reuniao->nome }}</td>
                                            <td>{{ \Carbon\Carbon::parse($reuniao->data)->format('d/m/Y') }}</td>
                                            <td>{{ $reuniao->horario }}</td>
                                            <td class="text-start" ><a href="/editarReuniao/{{ $reuniao->id }}" type="button" class="btn btn-outline-success btn-sm" id="type-success">Editar</a></td>
                                            <td class="text-start" >
                                                <form action="#" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" id="type-error">Excluir</button>
                                                </form>
                                            </td>
                                        </tr>

                                        @endforeach
                               
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <!-- /Overview Section -->

 

         

        


        </div>
        <!-- /Page Wrapper -->



    </div>
    <!-- /Main Wrapper -->


</x-layout>