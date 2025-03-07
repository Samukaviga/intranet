<x-layout :mensagem-sucesso="$mensagemSucesso">

    <!-- Page Wrapper -->
    <div class="page-wrapper">
        @isset($mensagemSucesso)
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ $mensagemSucesso }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endisset

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="content container-fluid">


            <!-- Blog List -->
            <div class="row">
                <div class="col-md-9">
                    <ul class="list-links mb-4">

                    </ul>
                </div>
                <div class="col-md-3 text-md-end">
                    <a href="/recursos-humanos/novo" class="btn btn-primary btn-blog mb-3"><i class="feather-plus-circle me-1"></i> Add New</a>
                </div>
            </div>

            <div class="row">

                <!-- Blog Post -->
                <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                    <div class="blog grid-blog flex-fill">
                        <div class="blog-image">
                            <a href="/recursos-humanos/detalhes"><img class="img-fluid" src="assets/img/category/blog-6.jpg" alt="Post Image"></a>


                        </div>
                        <div class="blog-content">

                            <h3 class="blog-title"><a href="/recursos-humanos/detalhes">Políticas e Procedimentos</a></h3>
                            <p>Lorem ipsum dolor sit amet, consectetur em adipiscing elit, sed do eiusmod tempor.</p>
                        </div>
                        <div class="row">
                            <div class="edit-options">
                                <div class="edit-delete-btn">
                                    <a href="/recursos-humanos/editar" class="text-success"><i class="feather-edit-3 me-1"></i> Edit</a>
                                    <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="feather-trash-2 me-1"></i> Delete</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Blog Post -->
                <!-- Blog Post -->
                <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                    <div class="blog grid-blog flex-fill">
                        <div class="blog-image">
                            <a href="/recursos-humanos/detalhes"><img class="img-fluid" src="assets/img/category/blog-6.jpg" alt="Post Image"></a>


                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="#">
                                            <img src="assets/img/profiles/avatar-01.jpg" alt="Post Author">
                                            <span>
                                                <span class="post-title">Vincent</span>
                                                <span class="post-date"><i class="far fa-clock"></i> 4 Dec 2022</span>
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="blog-title"><a href="/recursos-humanos/detalhes">Benefícios</a></h3>
                            <p>Informações sobre plano de saúde, previdência privada, convênios, etc.</p>
                        </div>
                        <div class="row">
                            <div class="edit-options">
                                <div class="edit-delete-btn">
                                    <a href="/recursos-humanos/editar" class="text-success"><i class="feather-edit-3 me-1"></i> Edit</a>
                                    <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="feather-trash-2 me-1"></i> Delete</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Blog Post -->

                <!-- Blog Post -->
                <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                    <div class="blog grid-blog flex-fill">
                        <div class="blog-image">
                            <a href="/recursos-humanos/detalhes"><img class="img-fluid" src="assets/img/category/blog-6.jpg" alt="Post Image"></a>


                        </div>
                        <div class="blog-content">
                            <ul class="entry-meta meta-item">
                                <li>
                                    <div class="post-author">
                                        <a href="#">
                                            <img src="assets/img/profiles/avatar-01.jpg" alt="Post Author">
                                            <span>
                                                <span class="post-title">Vincent</span>
                                                <span class="post-date"><i class="far fa-clock"></i> 4 Dec 2022</span>
                                            </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                            <h3 class="blog-title"><a href="/recursos-humanos/detalhes">Treinamentos e Desenvolvimento</a></h3>
                            <p>Catálogo de treinamentos disponíveis, inscrição e histórico de participação.</p>
                        </div>
                        <div class="row">
                            <div class="edit-options">
                                <div class="edit-delete-btn">
                                    <a href="/recursos-humanos/editar" class="text-success"><i class="feather-edit-3 me-1"></i> Edit</a>
                                    <a href="#" class="text-danger" data-bs-toggle="modal" data-bs-target="#deleteModal"><i class="feather-trash-2 me-1"></i> Delete</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Blog Post -->

                @foreach ($conteudos as $conteudo )

                <!-- Blog Post -->
                <div class="col-md-6 col-xl-4 col-sm-12 d-flex">
                    <div class="blog grid-blog flex-fill">
                        <div class="blog-image">
                            <a href="/recursos-humanos/detalhes/{{ $conteudo->id }}"><img class="img-fluid" style=" height: 220px;" src="{{ $conteudo->imagem ? asset('storage/' . $conteudo->imagem) : asset('logo/liceu_rede.png') }}" alt="Post Image"></a>
                        </div>

                        <div class="blog-content">
                            <h3 class="blog-title"><a href="/recursos-humanos/detalhes/{{ $conteudo->id }}">{{ $conteudo->titulo }}</a></h3>
                            <p></p>
                        </div>

                        <div class="row">
                            <div class="edit-options">
                                <div class="edit-delete-btn d-flex">
                                    <a href="/recursos-humanos/editar/{{ $conteudo->id }}" class="text-success"><i class="feather-edit-3 me-1"></i> Edit</a>


                                    <form class="p-0 m-0" action="{{ route('recursos-humanos.delete', ['id' => $conteudo->id]) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="text-danger btn btn-sm " data-bs-target="#deleteModal" id="type-error"><i class="feather-trash-2 me-1"></i>Excluir</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Blog Post -->

                @endforeach


            </div>

</x-layout>