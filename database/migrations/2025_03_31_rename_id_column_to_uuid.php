<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        if (!Schema::hasColumn('schools', 'id')) {
            Schema::table('schools', function (Blueprint $table) {
                $table->uuid('id')->nullable();
            });

            DB::table('schools')->update(['id' => DB::raw('uuid_generate_v4()')]);

            Schema::table('schools', function (Blueprint $table) {
                $table->uuid('id')->nullable(false)->change();
            });
        }
    }

    public function down()
    {
        if (Schema::hasColumn('schools', 'id')) {
            Schema::table('schools', function (Blueprint $table) {
                $table->dropColumn('id');
            });
        }
    }
};
