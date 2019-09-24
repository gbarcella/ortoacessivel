<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class EmprestimoPendenteCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ependente:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Comando Cron para verificar se o emprestimo esta pendente.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $data_atual = date('Y-m-d');

        $situacaoPendente = "Pendente";

        $emprestimos = DB::table('emprestimos')->where('data_devolucao', '<', date('Y-m-d'))->update(['status' => $situacaoPendente]);
    }
}
