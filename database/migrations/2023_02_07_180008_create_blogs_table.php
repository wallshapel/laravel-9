<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;
    return new class extends Migration {
        /**
         * Run the migrations.
         *
         * @return void
         */
        public function up() {
            Schema::create('blogs', function (Blueprint $table) {
                $table->id();
                $table->string('titulo');
                $table->longText('descripcion');
                $table->timestamps();
            });
        }
        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down() {
            Schema::dropIfExists('blogs');
        }
    };
?>
Lorem ipsum dolor sit, amet consectetur adipisicing elit. Eaque alias quaerat placeat reiciendis itaque minus nam nesciunt doloribus neque. Obcaecati veniam, nobis perspiciatis facere officiis provident repudiandae quibusdam optio blanditiis.