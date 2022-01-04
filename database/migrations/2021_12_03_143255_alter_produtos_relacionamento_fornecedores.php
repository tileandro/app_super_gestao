<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterProdutosRelacionamentoFornecedores extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $fornecedor_id = DB::table('fornecedor')->insertGetId([
                'nome' => 'Fornecedor Padrão',
                'email' => 'fornecedor@mail.com',
                'uf' => 'SP',
            ]);
            //$table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('produto_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');
        });
    }
}
