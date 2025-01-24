<x-layout>


    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="row">
                <div class="col-xl-12">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">Editar Blog</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <div class="card">
                        <form action="/blog/editar" method="POST" enctype="multipart/form-data">
                         @csrf
                            <div class="card-body">
                                <div class="bank-inner-details">
                                    <div class="row gap-4">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-block">
                                                <label>Titulo<span class="text-danger">*</span></label>
                                                <input type="text" name="titulo" class="form-control" value="{{ $blog->titulo }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-block">
                                                <label>Blog Imagem</label>
                                                <div class="change-photo-btn">
                                                    <div>
                                                        <p>Upload File</p>
                                                    </div>
                                                    <input type="file" name="imagem" class="upload">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-block">
                                                <label>Descrição</label>
                                                <textarea class="form-control" placeholder="Dexei uma descricao" name="descricao"  id="editor">{{ old('descricao', $blog->descricao ?? '') }}</textarea>
                                            </div>
                                        </div>

                                        <input type="hidden" name="id_blog" value="{{ $blog->id }}">
                                    </div>
                                </div>
                            </div>
                            <div class=" blog-categories-btn pt-0 ">
                                <div class="bank-details-btn ">
                                    <button type="submit" class="btn bank-cancel-btn me-2">Editar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</x-layout>