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
                                <h3 class="page-title">Editar Perfil</h3>
                            </div>
                        </div>
                    </div>
                    <!-- /Page Header -->

                    <div class="card">
                        <form action="#" method="post">
                            <div class="card-body">
                                <div class="bank-inner-details">

                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-block">
                                                <label>Nome<span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="nome" value="{{ $usuario->name }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-block">
                                                <label>E-mail</label>
                                                <input type="text" class="form-control" name="email" value="{{ $usuario->email }}">

                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-block">
                                                <label>Nascimento</label>
                                                <input type="date" class="form-control" name="nascimento" value="{{ \Carbon\Carbon::parse($usuario->nascimento)->format('Y-m-d') }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-block">
                                                <label>Celular</label>
                                                <input type="text" class="form-control" name="celular" id="celular" value="{{ old('celular', $usuario->celular) }}">
                                            </div>
                                        </div>
                                    
                                        <div class="col-lg-12 col-md-12">
                                            <div class="input-block">
                                                <label for="departamento">Departamento</label>
                                                <select class="form-select" name="departamento" id="departamento">
                                                    <option value="">Selecione um departamento</option>

                                                    @foreach ($departamentos as $departamento)
                                                    <option value="{{ $departamento->id }}" {{ $departamento->nome == $usuario->departamento->nome ? "selected" : "" }}>{{ $departamento->nome }}</option>

                                                    @endforeach

                                                </select>
                                            </div>
                                        </div>

                                        <input type="hidden" name="id_reuniao" value="">
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