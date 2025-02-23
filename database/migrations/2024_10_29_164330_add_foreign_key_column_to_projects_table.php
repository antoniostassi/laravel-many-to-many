<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            //
            $table->foreignId('type_id')->nullable()->constrained(); // Creo la foreign key column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('projects', function (Blueprint $table) {
            if (Schema::hasColumn('projects', 'type_id')) {

                $table->dropForeign(['type_id']); // Prima rimuovo il vincolo di foreign key (altrimenti non posso droppare la colonna)
                $table->dropColumn('type_id'); // Poi cancello la colonna type_id
            }
        });
    }
};
