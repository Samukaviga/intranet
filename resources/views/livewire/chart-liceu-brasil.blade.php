<div class="row ">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Liceu Brasil</h5>
            </div>
            <div class="card-body">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Whatsapp</h5>
            </div>
            <div class="card-body">
                <canvas id="myChart2"></canvas>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('myChart');
    const liceBrasil = @json($inscritosLiceuBrasil);
    const semPresenca = @json($semPresenca);
    const comPresenca = @json($comPresenca);


    console.log(liceBrasil)
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Inscritos', 'Sem Presenca', 'Com Presenca'],
            datasets: [{
                
                data: [liceBrasil, semPresenca, comPresenca],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                   
                }
            },
           
        }
    });
</script>

<script>
    const ctx2 = document.getElementById('myChart2');
    const mensagensEnviadas = @json($mensagensEnviadas);
    const segundasMensagens = @json($segundasMensagens);
    const mensagensEntregues = @json($mensagensEntregues);
    const mensagensNaoEntregues = @json($mensagensNaoEntregues);


    new Chart(ctx2, {
        type: 'pie',
        data: {
            labels: ['Enviado', 'Segundo Envio', 'Entregues', 'Nao Entregues'],
            datasets: [{
                
                data: [mensagensEnviadas, segundasMensagens, mensagensEntregues, mensagensNaoEntregues],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                   
                }
            },
           
        }
    });
</script>