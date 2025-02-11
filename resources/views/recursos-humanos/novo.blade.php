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
                                <h3 class="page-title">Add Post</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->
                    <form action="{{ route('recursos-humanos.novo.post') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="bank-inner-details">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-block">
                                                <label>Titulo<span class="text-danger">*</span></label>
                                                <input name="titulo" type="text" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-block">
                                                <label>Imagem</label>
                                                <div class="change-photo-btn">
                                                    <div>
                                                        <p>Add Image</p>
                                                    </div>
                                                    <input type="file" name="imagem" class="upload" accept="image/*">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-block">
                                                <label>Descricao</label>
                                                <textarea id="editor" name="descricao" class="form-control" rows="4"></textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12 mt-4">
                                            <div class="input-block">
                                                <label>Arquivo/Documento</label>
                                                <div class="change-photo-btn">
                                                    <div>
                                                        <p>Add arquivo</p>
                                                    </div>
                                                    <input type="file" name="arquivo" class="upload" accept=".doc,.docx,.pdf,.xls,.xlsx">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class=" blog-categories-btn pt-0">
                                <div class="bank-details-btn ">
                                    <button class="btn bank-cancel-btn me-2">Adicionar</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>

</x-layout>