<x-layout :mensagem-sucesso="$mensagemSucesso">


    <!-- Page Wrapper -->
    <div class="page-wrapper">

        @if(session('mensagemSucesso'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            {{ session('mensagemSucesso') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif


        <div class="content container-fluid">
            <!-- Page Header -->
            <div class="page-header">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-sub-header">
                            <h3 class="page-title">Seja bem vindo!</h3>
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
            <div class="row">

                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Liceu Brasil</h6>
                                    <h3>{{ $totalLiceuBrasil }}</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="assets/img/icons/dash-icon-01.svg" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Awards</h6>
                                    <h3>50+</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="assets/img/icons/dash-icon-02.svg" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Department</h6>
                                    <h3>30+</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="assets/img/icons/dash-icon-03.svg" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12 d-flex">
                    <div class="card bg-comman w-100">
                        <div class="card-body">
                            <div class="db-widgets d-flex justify-content-between align-items-center">
                                <div class="db-info">
                                    <h6>Revenue</h6>
                                    <h3>$505</h3>
                                </div>
                                <div class="db-icon">
                                    <img src="assets/img/icons/dash-icon-04.svg" alt="Dashboard Icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Overview Section -->

            <!-- CHART -->
            <livewire:chart-liceu-brasil />
            <!-- /CHART -->

            <!-- Socail Media Follows -->
            <div class="row">
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card flex-fill fb sm-box">
                        <div class="social-likes">
                            <p>Seguidores Facebook</p>
                            <h6>50,095</h6>
                        </div>
                        <div class="social-boxs">
                            <img src="assets/img/icons/social-icon-01.svg" alt="Social Icon">
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card flex-fill twitter sm-box">
                        <div class="social-likes">
                            <p>Seguidores twitter</p>
                            <h6>48,596</h6>
                        </div>
                        <div class="social-boxs">
                            <img src="assets/img/icons/social-icon-02.svg" alt="Social Icon">
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card flex-fill insta sm-box">
                        <div class="social-likes">
                            <p>Seguidores Instagram</p>
                            <h6>5000</h6>
                        </div>
                        <div class="social-boxs">
                            <img src="assets/img/icons/social-icon-03.svg" alt="Social Icon">
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-sm-6 col-12">
                    <div class="card flex-fill linkedin sm-box">
                        <div class="social-likes">
                            <p>Seguidores linkedin</p>
                            <h6>69,050</h6>
                        </div>
                        <div class="social-boxs">
                            <img src="assets/img/icons/social-icon-04.svg" alt="Social Icon">
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Socail Media Follows -->
        </div>





</x-layout>