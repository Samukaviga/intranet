<x-layout>


    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row justify-content-center">
                <div class="col-lg-10 col-xl-9">

                    <!-- Blog Details-->
                    <div class="blog-view">
                        <div class="blog-single-post">
                            <a href="/recursos-humanos" class="back-btn"><i class="feather-chevron-left"></i> Back</a>
                            <div class="blog-image">
                                <a href="javascript:void(0);"><img alt="img" src="{{ $conteudo->imagem ? asset('storage/' . $conteudo->imagem) : asset('assets/img/category/blog-detail.jpg') }}" class="img-fluid"></a>
                            </div>
                            <h3 class="blog-title">{{ $conteudo->titulo }}</h3>
                            <div class="blog-info">

                            </div>
                            <div class="blog-content">
                                <p>{!! str_replace(['{', '}'], '', $conteudo->descricao) !!}</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- /Blog Details-->


</x-layout>