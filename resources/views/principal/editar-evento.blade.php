<x-layout>


    <!-- Page Wrapper -->
    <div class="page-wrapper">
        <div class="content container-fluid">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="row">
                <div class="col-xl-12">

                    <!-- Page Header -->
                    <div class="page-header">
                        <div class="row">
                            <div class="col-sm-12">
                                <h3 class="page-title">Editar Evento</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <div class="card">
                        <form action="/blog/editar" method="post">
                            <div class="card-body">
                                <div class="bank-inner-details">

                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-block">
                                                <label>Nome<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="nome" value="{{ $evento->nome }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-block">
                                                <label>Horario</label>
                                                <input type="time" class="form-control" name="horario" value="{{ $evento->horario }}">

                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-block">
                                                <label>Data</label>
                                                <input type="date" class="form-control" name="data" value="{{ $evento->data }}">

                                            </div>
                                        </div>

                                        <input type="hidden" name="id_evento" value="{{ $evento->id }}">
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