<?php
/**
 * @var $faker \Faker\Generator
 * @var $index integer
 */
return [
  'name' => $faker->city,
  'category_id' => $faker->numberBetween($min = 1, $max = 4),
  'price' => $faker->numberBetween($min = 1, $max = 9000)
];

//php yii fixture/generate product --count=50

//php yii fixture/load Product
