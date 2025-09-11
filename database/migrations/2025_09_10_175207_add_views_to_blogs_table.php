<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_views_to_blogs_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        if (!Schema::hasColumn('blogs', 'views')) {
            Schema::table('blogs', function (Blueprint $table) {
                $table->unsignedBigInteger('views')->default(0);
            });
        }
    }

    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn('views');
        });
    }
};
