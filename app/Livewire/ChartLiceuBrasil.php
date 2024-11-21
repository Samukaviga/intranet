<?php

namespace App\Livewire;

use App\Models\Prospeccao;
use App\Models\Subscribers;
use Livewire\Component;

class ChartLiceuBrasil extends Component
{

    public $inscritosLiceuBrasil;
    public $semPresenca;

    public $comPresenca;

    public $mensagensEnviadas;

    public $segundasMensagens;
    public $mensagensEntregues;
    public $mensagensNaoEntregues;

    public function mount() // Método chamado na inicialização do componente
    {
        $this->totalInscritosLiceuBrasil();
        $this->totalSemPresencaLiceuBrasil();
        $this->totalComPresencaLiceuBrasil();
        $this->totalMensagensEnviadas();
        $this->totalSegundasMensagens();
        $this->totalMensagensEntregues();
        $this->totalMensagensNaoEntregues();
    }

    public function render()
    {
        return view('livewire.chart-liceu-brasil');
    }

    public function totalInscritosLiceuBrasil() 
    {
        $this->inscritosLiceuBrasil = Subscribers::all()->count();
    }

    public function totalSemPresencaLiceuBrasil() 
    {
        $this->semPresenca = Prospeccao::where('presenca', 0)->where('tipo_escola', 1)->count();
    }

    public function totalComPresencaLiceuBrasil() 
    {
        $this->comPresenca = Prospeccao::where('presenca', 1)->where('tipo_escola', 1)->count();
    }

    public function totalMensagensEnviadas() 
    {
        $this->mensagensEnviadas = Prospeccao::where('enviado', 1)->where('tipo_escola', 1)->count();
    }

    public function totalSegundasMensagens() 
    {
        $this->segundasMensagens = Prospeccao::where('enviado', 2)->where('tipo_escola', 1)->count();
    }

    public function totalMensagensEntregues() 
    {
        $this->mensagensEntregues = Prospeccao::where('entregue', 1)->where('tipo_escola', 1)->count();
    }

    public function totalMensagensNaoEntregues() 
    {
        $this->mensagensNaoEntregues = Prospeccao::where('entregue', 0)->where('tipo_escola', 1)->count();
    }
}
