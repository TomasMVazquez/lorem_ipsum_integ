<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTablesDb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100)->unique()->nullable();
            $table->timestamps();
        });

        Schema::create('subcategories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100)->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories');
            $table->timestamps();
        });

        Schema::create('user_subcategory', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->timestamps();
        });

        Schema::create('presentations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('type');
            $table->timestamps();
        });

        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100)->nullable();
            $table->longText('brief')->nullable();
            $table->longText('description')->nullable();
            $table->integer('rating');
            $table->string('benefits');
            $table->longText('uses');
            $table->unsignedBigInteger('subcategory_id')->nullable();
            $table->foreign('subcategory_id')->references('id')->on('subcategories');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('user_product', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedBigInteger('product_id')->nullable();
            $table->foreign('product_id')->references('id')->on('products');
            $table->timestamps();
        });

        // Insert categories
        DB::table('categories')->insert(
          array(
            array('name' => 'Cosmetica Capilar'),
            array('name' => 'Cosmetica Corporal'),
            array('name' => 'Cosmetica Facial')
          ));
        // Insert subcategories
        DB::table('subcategories')->insert(
          array(
            array('name' => 'Shampoo','category_id' => '1'),
            array('name' => 'Serum Reparador','category_id' => '1'),
            array('name' => 'Loción','category_id' => '1'),
            array('name' => 'Shock','category_id' => '1'),
            array('name' => 'Coloración','category_id' => '1'),
            array('name' => 'Tratamiento','category_id' => '1'),
            array('name' => 'Jabones','category_id' => '2'),
            array('name' => 'Geles','category_id' => '2'),
            array('name' => 'Cremas','category_id' => '2'),
            array('name' => 'Protectores Solares','category_id' => '3'),
            array('name' => 'Máscaras','category_id' => '3'),
            array('name' => 'Cremas','category_id' => '3'),
            array('name' => 'Lociones','category_id' => '3'),
            array('name' => 'Sérum','category_id' => '3'),
            array('name' => 'Hidratación','category_id' => '3')
        ));
        // Insert presentations
        DB::table('presentations')->insert(
          array(
              array('type'=>'Pote 1kg'),
              array('type'=>'Envase de 200grs'),
              array('type'=>'Estuche de 24 Ampollas de 10cc. cada una'),
              array('type'=>'Envase 30cc'),
              array('type'=>'Envase 50cc'),
              array('type'=>'Envase de 350grs'),
              array('type'=>'Estuche con 2 pomos de 60grs. c/u'),
              array('type'=>'Pomo individual'),
              array('type'=>'Estuche 12 Ampollas de 15cc. c/u'),
              array('type'=>'Estuche 24 Ampollas de 15cc. c/u'),
              array('type'=>'Envase de 100cc')
            ));
        // Insert subcategories
        DB::table('products')->insert(
          array(
            array(
              'name'            => 'Serum Reparador Capilar - Oro Líquido 24k + Keratina',
              'brief'           => 'Producto desarrollado a base de siliconas de última generación con oro de 24 Kilates en suspensión.',
              'description'     => 'Es un producto desarrollado a base de siliconas de última generación con oro de 24 Kilates en suspensión, que por su alto poder antioxidante, estimula la actividad celular e ilumina tus cabellos haciéndolos lucir más sanos y jóvenes. Contiene Keratina, proteína vital para el cabello, que otorga propiedades humectantes y reparación inmediata. Aporta energía y le otorga un brillo final, haciendo que luzca  radiante y sensual.',
              'rating'          => '1',
              'benefits'        => 'Brillo y protección instantánea.',
              'uses'            => 'Se utiliza en pequeñas porciones (2 o 3 gotas); aplicándolas sobre la palma de la mano y frotando ambas manos. Luego aplicar sobre las puntas y semilargos hasta la absorción completa del producto. De tener puntas muy florecidas, aplicar 2 o 3 gotas más solo en dicha zona. No enjuagar. Luego realizar el peinado habitual.',
              'subcategory_id'  => '2'
            ),
            array(
              'name'            => 'Shampoo Egyptian Gold',
              'brief'           => 'Es un producto desarrollado a base de siliconas de última generación con oro de 24 quilates en suspensión, que estimula la actividad celular y potencia la luminosidad.',
              'description'     => 'Su contenido en Keratina, proteína vital para el cabello, le otorga propiedades humectantes y reparación inmediata. Actúa delicadamente sobre el cabello respetando la estructura del mismo, dejándolo suave, sedoso e increíblemente brillante.',
              'rating'          => '1',
              'benefits'        => 'Brillo y protección.',
              'uses'            => 'Aplicar sobre el cabello mojado, masajeando con la yema de los dedos desde el cuero cabelludo hasta las puntas. Luego enjuagar con abundante agua.',
              'subcategory_id'  => '1'
            ),
            array(
              'name'            => 'Tratamiento Regenerador Capilar - Egyptian Gold',
              'brief'           => 'Es un producto desarrollado a base de siliconas de última generación con oro de 24 quilates en suspensión, que estimula la actividad celular y potencia la luminosidad.',
              'description'     => 'Por su contenido en Beta-Caroteno es un poderoso antioxidante que activa la capacidad celular contra los radicales libres. Su contenido en Keratina, proteína vital para el cabello, aporta y retiene la humedad. Otorga un Brillo Final que hará lucir tu cabello radiante y sensual.',
              'rating'          => '1',
              'benefits'        => 'Hidratación Intensa / Reparación Profunda.',
              'uses'            => 'Aplicar sobre el cabello mojado, masajeando con la yema de los dedos desde el cuero cabelludo hasta las puntas. Luego enjuagar con abundante agua.',
              'subcategory_id'  => '6'
            ),
            array(
              'name'            => 'Coloración Capilar Profesional. Con ORO 24k y Keratina',
              'brief'           => 'Elaborada con inmejorables componentes químicos; Kleno Color se diferencia y se destaca por contener ORO 24 Kilates en Suspensión más Keratina.',
              'description'     => 'Elaborada con inmejorables componentes químicos; Kleno Color se diferencia y se destaca por contener ORO 24 Kilates en Suspensión más Keratina.
                                    Además del excelente color - por su poder antioxidante - le otorga al cabello juventud y vitalidad.
                                    Kleno Color está al servicio del profesional; para que estos encuentren el mejor resultado colorimétrico y comercial.',
              'rating'          => '1',
              'benefits'        => 'Brillo y Vitalidad.',
              'uses'            => 'Se recomienda no lavar los cabellos durante las 24 hs previas a la aplicación del producto.
                                    Aplicar la crema utilizando pincel; sobre los cabellos secos.
                                    El tiempo de exposición debe ser de 30 a 40 minutos aproximadamente según la textura de cada cabello; contando el tiempo a partir de finalizada la aplicación.
                                    Luego enjuagar con abundante agua tibia',
              'subcategory_id'  => '5'
            ),
            array(
              'name'            => 'Shock Oro Keratin - Oro 24k y Keratina',
              'brief'           => 'Ideal para cabellos debilitados por la coloración y demás procesos químicos.',
              'description'     => 'Ideal para cabellos debilitados por la coloración y demás procesos químicos. La Keratina, proteína natural del cabello, repara y cauteriza la fibra capilar dejándola sana, sin porosidad y con brillo. Su contenido en Oro 24 K aumenta aún más su brillo a la vez que otorga propiedades antioxidantes, retardando el envejecimiento natural de los mismos.',
              'rating'          => '1',
              'benefits'        => 'No frizz / Anti age / Brillo',
              'uses'            => 'Agitar hasta que las partículas depositadas en el fondo del envas queden en suspensión. Volcar el contenido de un envase en un bols o recipiente. Agregarle de tres a cuatro partes  de agua y mezclar preferente con un pincel u otro utensilio hasta formar una crema suave y consistente (mezclar durante aproximadamente 1 minuto). Aplicar uniformemente en la totalidad del pelo y el cuero cabelludo recién lavado y sin secar.
                                    Masajear unos segundos para permitir una mejor distribución',
              'subcategory_id'  => '4'
            ),
            array(
              'name'            => 'Loción Anticaída con Arginina, Biotina y Keratina',
              'brief'           => 'Complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.',
              'description'     => 'HAIR RESIST KLENO es un complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.
                                    Por su alta concentración de Aminoácidos del crecimiento tales como la Arginina, Proteínas de Placenta, Proteínas de Soja; y Vitaminas tales como la Biotina (Vitamina B-9) y  el Panthenol (Vitamina B-5), HAIR RESIST KLENO es un poderoso agente nutritivo de la raíz, restructurando la fibra capilar y logrando que el cabello crezca más fuerte, obteniendo así cabellos resistentes, suaves y brillantes.',
              'rating'          => '1',
              'benefits'        => 'Tratamiento anticaída con aminoácidos del crecimiento.',
              'uses'            => 'Aplicar sobre el cuero cabelludo, sección por sección, sobre el cabello seco o secado previamente con una toalla. Realizar un masaje ejerciendo una ligera presión con las puntas de los dedos. Esta ampolla debe utilizarse en  tratamientos intensivos, alternando su uso con la Loción HAIR RESIST KLENO, 3 veces por semana. Se recomienda realizar éste tratamiento durante 2 meses, ya que los primeros resultados se verán a las 6 semanas de comenzado.
                                    Se aconseja lavar el cabello diariamente con Shampoo HAIR RESIST, ya que sus componentes favorecen al tratamiento.',
              'subcategory_id'  => '3'
            ),
            array(
              'name'            => 'Jabón Corporal',
              'brief'           => 'Complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.',
              'description'     => 'HAIR RESIST KLENO es un complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.
                                    Por su alta concentración de Aminoácidos del crecimiento tales como la Arginina, Proteínas de Placenta, Proteínas de Soja; y Vitaminas tales como la Biotina (Vitamina B-9) y  el Panthenol (Vitamina B-5), HAIR RESIST KLENO es un poderoso agente nutritivo de la raíz, restructurando la fibra capilar y logrando que el cabello crezca más fuerte, obteniendo así cabellos resistentes, suaves y brillantes.',
              'rating'          => '1',
              'benefits'        => 'Tratamiento anticaída con aminoácidos del crecimiento.',
              'uses'            => 'Aplicar sobre el cuero cabelludo, sección por sección, sobre el cabello seco o secado previamente con una toalla. Realizar un masaje ejerciendo una ligera presión con las puntas de los dedos. Esta ampolla debe utilizarse en  tratamientos intensivos, alternando su uso con la Loción HAIR RESIST KLENO, 3 veces por semana. Se recomienda realizar éste tratamiento durante 2 meses, ya que los primeros resultados se verán a las 6 semanas de comenzado.
                                    Se aconseja lavar el cabello diariamente con Shampoo HAIR RESIST, ya que sus componentes favorecen al tratamiento.',
              'subcategory_id'  => '7'
            ),
            array(
              'name'            => 'Gel Corporal',
              'brief'           => 'Complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.',
              'description'     => 'HAIR RESIST KLENO es un complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.
                                    Por su alta concentración de Aminoácidos del crecimiento tales como la Arginina, Proteínas de Placenta, Proteínas de Soja; y Vitaminas tales como la Biotina (Vitamina B-9) y  el Panthenol (Vitamina B-5), HAIR RESIST KLENO es un poderoso agente nutritivo de la raíz, restructurando la fibra capilar y logrando que el cabello crezca más fuerte, obteniendo así cabellos resistentes, suaves y brillantes.',
              'rating'          => '1',
              'benefits'        => 'Tratamiento anticaída con aminoácidos del crecimiento.',
              'uses'            => 'Aplicar sobre el cuero cabelludo, sección por sección, sobre el cabello seco o secado previamente con una toalla. Realizar un masaje ejerciendo una ligera presión con las puntas de los dedos. Esta ampolla debe utilizarse en  tratamientos intensivos, alternando su uso con la Loción HAIR RESIST KLENO, 3 veces por semana. Se recomienda realizar éste tratamiento durante 2 meses, ya que los primeros resultados se verán a las 6 semanas de comenzado.
                                    Se aconseja lavar el cabello diariamente con Shampoo HAIR RESIST, ya que sus componentes favorecen al tratamiento.',
              'subcategory_id'  => '8'
            ),
            array(
              'name'            => 'Crema Corporal',
              'brief'           => 'Complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.',
              'description'     => 'HAIR RESIST KLENO es un complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.
                                    Por su alta concentración de Aminoácidos del crecimiento tales como la Arginina, Proteínas de Placenta, Proteínas de Soja; y Vitaminas tales como la Biotina (Vitamina B-9) y  el Panthenol (Vitamina B-5), HAIR RESIST KLENO es un poderoso agente nutritivo de la raíz, restructurando la fibra capilar y logrando que el cabello crezca más fuerte, obteniendo así cabellos resistentes, suaves y brillantes.',
              'rating'          => '1',
              'benefits'        => 'Tratamiento anticaída con aminoácidos del crecimiento.',
              'uses'            => 'Aplicar sobre el cuero cabelludo, sección por sección, sobre el cabello seco o secado previamente con una toalla. Realizar un masaje ejerciendo una ligera presión con las puntas de los dedos. Esta ampolla debe utilizarse en  tratamientos intensivos, alternando su uso con la Loción HAIR RESIST KLENO, 3 veces por semana. Se recomienda realizar éste tratamiento durante 2 meses, ya que los primeros resultados se verán a las 6 semanas de comenzado.
                                    Se aconseja lavar el cabello diariamente con Shampoo HAIR RESIST, ya que sus componentes favorecen al tratamiento.',
              'subcategory_id'  => '9'
            ),
            array(
              'name'            => 'Protector Solar Facial',
              'brief'           => 'Complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.',
              'description'     => 'HAIR RESIST KLENO es un complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.
                                    Por su alta concentración de Aminoácidos del crecimiento tales como la Arginina, Proteínas de Placenta, Proteínas de Soja; y Vitaminas tales como la Biotina (Vitamina B-9) y  el Panthenol (Vitamina B-5), HAIR RESIST KLENO es un poderoso agente nutritivo de la raíz, restructurando la fibra capilar y logrando que el cabello crezca más fuerte, obteniendo así cabellos resistentes, suaves y brillantes.',
              'rating'          => '1',
              'benefits'        => 'Tratamiento anticaída con aminoácidos del crecimiento.',
              'uses'            => 'Aplicar sobre el cuero cabelludo, sección por sección, sobre el cabello seco o secado previamente con una toalla. Realizar un masaje ejerciendo una ligera presión con las puntas de los dedos. Esta ampolla debe utilizarse en  tratamientos intensivos, alternando su uso con la Loción HAIR RESIST KLENO, 3 veces por semana. Se recomienda realizar éste tratamiento durante 2 meses, ya que los primeros resultados se verán a las 6 semanas de comenzado.
                                    Se aconseja lavar el cabello diariamente con Shampoo HAIR RESIST, ya que sus componentes favorecen al tratamiento.',
              'subcategory_id'  => '10'
            ),
            array(
              'name'            => 'Máscara Facial',
              'brief'           => 'Complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.',
              'description'     => 'HAIR RESIST KLENO es un complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.
                                    Por su alta concentración de Aminoácidos del crecimiento tales como la Arginina, Proteínas de Placenta, Proteínas de Soja; y Vitaminas tales como la Biotina (Vitamina B-9) y  el Panthenol (Vitamina B-5), HAIR RESIST KLENO es un poderoso agente nutritivo de la raíz, restructurando la fibra capilar y logrando que el cabello crezca más fuerte, obteniendo así cabellos resistentes, suaves y brillantes.',
              'rating'          => '1',
              'benefits'        => 'Tratamiento anticaída con aminoácidos del crecimiento.',
              'uses'            => 'Aplicar sobre el cuero cabelludo, sección por sección, sobre el cabello seco o secado previamente con una toalla. Realizar un masaje ejerciendo una ligera presión con las puntas de los dedos. Esta ampolla debe utilizarse en  tratamientos intensivos, alternando su uso con la Loción HAIR RESIST KLENO, 3 veces por semana. Se recomienda realizar éste tratamiento durante 2 meses, ya que los primeros resultados se verán a las 6 semanas de comenzado.
                                    Se aconseja lavar el cabello diariamente con Shampoo HAIR RESIST, ya que sus componentes favorecen al tratamiento.',
              'subcategory_id'  => '11'
            ),
            array(
              'name'            => 'Crema Facial',
              'brief'           => 'Complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.',
              'description'     => 'HAIR RESIST KLENO es un complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.
                                    Por su alta concentración de Aminoácidos del crecimiento tales como la Arginina, Proteínas de Placenta, Proteínas de Soja; y Vitaminas tales como la Biotina (Vitamina B-9) y  el Panthenol (Vitamina B-5), HAIR RESIST KLENO es un poderoso agente nutritivo de la raíz, restructurando la fibra capilar y logrando que el cabello crezca más fuerte, obteniendo así cabellos resistentes, suaves y brillantes.',
              'rating'          => '1',
              'benefits'        => 'Tratamiento anticaída con aminoácidos del crecimiento.',
              'uses'            => 'Aplicar sobre el cuero cabelludo, sección por sección, sobre el cabello seco o secado previamente con una toalla. Realizar un masaje ejerciendo una ligera presión con las puntas de los dedos. Esta ampolla debe utilizarse en  tratamientos intensivos, alternando su uso con la Loción HAIR RESIST KLENO, 3 veces por semana. Se recomienda realizar éste tratamiento durante 2 meses, ya que los primeros resultados se verán a las 6 semanas de comenzado.
                                    Se aconseja lavar el cabello diariamente con Shampoo HAIR RESIST, ya que sus componentes favorecen al tratamiento.',
              'subcategory_id'  => '12'
            ),
            array(
              'name'            => 'Loción Facial',
              'brief'           => 'Complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.',
              'description'     => 'HAIR RESIST KLENO es un complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.
                                    Por su alta concentración de Aminoácidos del crecimiento tales como la Arginina, Proteínas de Placenta, Proteínas de Soja; y Vitaminas tales como la Biotina (Vitamina B-9) y  el Panthenol (Vitamina B-5), HAIR RESIST KLENO es un poderoso agente nutritivo de la raíz, restructurando la fibra capilar y logrando que el cabello crezca más fuerte, obteniendo así cabellos resistentes, suaves y brillantes.',
              'rating'          => '1',
              'benefits'        => 'Tratamiento anticaída con aminoácidos del crecimiento.',
              'uses'            => 'Aplicar sobre el cuero cabelludo, sección por sección, sobre el cabello seco o secado previamente con una toalla. Realizar un masaje ejerciendo una ligera presión con las puntas de los dedos. Esta ampolla debe utilizarse en  tratamientos intensivos, alternando su uso con la Loción HAIR RESIST KLENO, 3 veces por semana. Se recomienda realizar éste tratamiento durante 2 meses, ya que los primeros resultados se verán a las 6 semanas de comenzado.
                                    Se aconseja lavar el cabello diariamente con Shampoo HAIR RESIST, ya que sus componentes favorecen al tratamiento.',
              'subcategory_id'  => '13'
            ),
            array(
              'name'            => 'Sérum Facial',
              'brief'           => 'Complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.',
              'description'     => 'HAIR RESIST KLENO es un complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.
                                    Por su alta concentración de Aminoácidos del crecimiento tales como la Arginina, Proteínas de Placenta, Proteínas de Soja; y Vitaminas tales como la Biotina (Vitamina B-9) y  el Panthenol (Vitamina B-5), HAIR RESIST KLENO es un poderoso agente nutritivo de la raíz, restructurando la fibra capilar y logrando que el cabello crezca más fuerte, obteniendo así cabellos resistentes, suaves y brillantes.',
              'rating'          => '1',
              'benefits'        => 'Tratamiento anticaída con aminoácidos del crecimiento.',
              'uses'            => 'Aplicar sobre el cuero cabelludo, sección por sección, sobre el cabello seco o secado previamente con una toalla. Realizar un masaje ejerciendo una ligera presión con las puntas de los dedos. Esta ampolla debe utilizarse en  tratamientos intensivos, alternando su uso con la Loción HAIR RESIST KLENO, 3 veces por semana. Se recomienda realizar éste tratamiento durante 2 meses, ya que los primeros resultados se verán a las 6 semanas de comenzado.
                                    Se aconseja lavar el cabello diariamente con Shampoo HAIR RESIST, ya que sus componentes favorecen al tratamiento.',
              'subcategory_id'  => '14'
            ),
            array(
              'name'            => 'Hidratación Facial',
              'brief'           => 'Complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.',
              'description'     => 'HAIR RESIST KLENO es un complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.
                                    Por su alta concentración de Aminoácidos del crecimiento tales como la Arginina, Proteínas de Placenta, Proteínas de Soja; y Vitaminas tales como la Biotina (Vitamina B-9) y  el Panthenol (Vitamina B-5), HAIR RESIST KLENO es un poderoso agente nutritivo de la raíz, restructurando la fibra capilar y logrando que el cabello crezca más fuerte, obteniendo así cabellos resistentes, suaves y brillantes.',
              'rating'          => '1',
              'benefits'        => 'Tratamiento anticaída con aminoácidos del crecimiento.',
              'uses'            => 'Aplicar sobre el cuero cabelludo, sección por sección, sobre el cabello seco o secado previamente con una toalla. Realizar un masaje ejerciendo una ligera presión con las puntas de los dedos. Esta ampolla debe utilizarse en  tratamientos intensivos, alternando su uso con la Loción HAIR RESIST KLENO, 3 veces por semana. Se recomienda realizar éste tratamiento durante 2 meses, ya que los primeros resultados se verán a las 6 semanas de comenzado.
                                    Se aconseja lavar el cabello diariamente con Shampoo HAIR RESIST, ya que sus componentes favorecen al tratamiento.',
              'subcategory_id'  => '15'
            ),
            array(
              'name'            => 'Hidratación Facial',
              'brief'           => 'Complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.',
              'description'     => 'HAIR RESIST KLENO es un complejo biológico, botánico y biotecnológico destinado a reducir la pérdida de cabello y estimular su crecimiento.
                                    Por su alta concentración de Aminoácidos del crecimiento tales como la Arginina, Proteínas de Placenta, Proteínas de Soja; y Vitaminas tales como la Biotina (Vitamina B-9) y  el Panthenol (Vitamina B-5), HAIR RESIST KLENO es un poderoso agente nutritivo de la raíz, restructurando la fibra capilar y logrando que el cabello crezca más fuerte, obteniendo así cabellos resistentes, suaves y brillantes.',
              'rating'          => '1',
              'benefits'        => 'Tratamiento anticaída con aminoácidos del crecimiento.',
              'uses'            => 'Aplicar sobre el cuero cabelludo, sección por sección, sobre el cabello seco o secado previamente con una toalla. Realizar un masaje ejerciendo una ligera presión con las puntas de los dedos. Esta ampolla debe utilizarse en  tratamientos intensivos, alternando su uso con la Loción HAIR RESIST KLENO, 3 veces por semana. Se recomienda realizar éste tratamiento durante 2 meses, ya que los primeros resultados se verán a las 6 semanas de comenzado.
                                    Se aconseja lavar el cabello diariamente con Shampoo HAIR RESIST, ya que sus componentes favorecen al tratamiento.',
              'subcategory_id'  => '15'
            )
        ));

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
        Schema::dropIfExists('subcategories');
        Schema::dropIfExists('presentations');
        Schema::dropIfExists('products');
        Schema::dropIfExists('user_product');
    }
}
