<?php

use App\Laravel\Models\Recommendation;
use Illuminate\Database\Seeder;

class RecommendationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Recommendation::truncate();

        Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Suitable condition for field preparation activities."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Suitable condition for field preparation activities."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Suitable condition for field preparation activities."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Suitable condition for field preparation activities."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Strong winds: not suitable for field preparation activities. It is recommended to establish/ plant windbreaks to minimize soil erosion."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Suitable condition for field preparation activities."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Extremely hot and  dry condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Suitable condition for field preparation activities."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Extremely hot and  dry condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Suitable condition for field preparation activities."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Extremely hot and  dry condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Suitable condition for field preparation activities."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Extremely hot and  dry condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Strong winds: not suitable for field preparation activities. It is recommended to establish/ plant windbreaks to minimize soil erosion."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Suitable condition for field preparation activities."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Extremely hot condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Suitable condition for field preparation activities."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Extremely hot condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Suitable condition for field preparation activities."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Extremely hot condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Suitable condition for field preparation activities."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Extremely hot condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Land Preparation",
			'type' => "moderate",
			'content' => "Strong winds: not suitable for field preparation activities. It is recommended to establish/ plant windbreaks to minimize soil erosion."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Windbreaks",
			'type' => "moderate",
			'content' => "It is recommended to establish/ plant windbreaks to minimize soil erosion."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Windbreaks",
			'type' => "moderate",
			'content' => "It is recommended to establish/ plant windbreaks to minimize soil erosion."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Windbreaks",
			'type' => "moderate",
			'content' => "It is recommended to establish/ plant windbreaks to minimize soil erosion."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Windbreaks",
			'type' => "moderate",
			'content' => "It is recommended to establish/ plant windbreaks to minimize soil erosion."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Windbreaks",
			'type' => "moderate",
			'content' => "It is recommended to establish/ plant windbreaks to minimize soil erosion."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Windbreaks",
			'type' => "moderate",
			'content' => "It is recommended to establish/ plant windbreaks to minimize soil erosion."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Not suitable for germination of most seeds: Direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Favorable condition for seed germination."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Too hot for seeds to germinate, uncomfortable for workers: direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Not suitable for germination of most seeds: Direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Favorable condition for seed germination."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Too hot for seeds to germinate, uncomfortable for workers: direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Not suitable for germination of most seeds: Direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Favorable condition for seed germination."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Too hot for seeds to germinate, uncomfortable for workers: direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Not suitable for germination of most seeds: Direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Plant with caution: moderate winds may cause wind dispersal of seeds."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Too hot for seeds to germinate, uncomfortable for workers: direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Not suitable for germination of most seeds: Direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Plant with caution: moderate winds may cause wind dispersal of seeds."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Too hot for seeds to germinate, uncomfortable for workers: direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Not suitable for germination of most seeds: Direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Favorable condition for seed germination."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Too hot for seeds to germinate, uncomfortable for workers: direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Not suitable for germination of most seeds: Direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Favorable condition for seed germination."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Too hot for seeds to germinate, uncomfortable for workers: direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Not suitable for germination of most seeds: Direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Favorable condition for seed germination."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Too hot for seeds to germinate, uncomfortable for workers: direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Not suitable for germination of most seeds: Direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Plant with caution: moderate winds may cause wind dispersal of seeds."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Too hot for seeds to germinate, uncomfortable for workers: direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Not suitable for germination of most seeds: Direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Plant with caution: moderate winds may cause wind dispersal of seeds."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Direct Planting",
			'type' => "moderate",
			'content' => "Too hot for seeds to germinate, uncomfortable for workers: direct planting is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 28,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Suitable condition for transplanting of cool-season crops."
		]);

		Recommendation::create([
			'temp_min' => 29,
			'temp_max' => 36,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Suitable condition for transplanting of warm-season crops."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Unsuitable for transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 28,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Suitable condition for transplanting of cool-season crops."
		]);

		Recommendation::create([
			'temp_min' => 29,
			'temp_max' => 36,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Suitable condition for transplanting of warm-season crops."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Unsuitable for transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 28,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Suitable condition for transplanting of cool-season crops."
		]);

		Recommendation::create([
			'temp_min' => 29,
			'temp_max' => 36,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Suitable condition for transplanting of warm-season crops."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Unsuitable for transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 36,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Plant with caution as moderate winds may increase evaporation of transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Unsuitable for transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 36,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Plant with caution as moderate winds may increase evaporation of transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Unsuitable for transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 28,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Suitable condition for transplanting of cool-season crops."
		]);

		Recommendation::create([
			'temp_min' => 29,
			'temp_max' => 36,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Suitable condition for transplanting of warm-season crops."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Unsuitable for transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 28,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Suitable condition for transplanting of cool-season crops."
		]);

		Recommendation::create([
			'temp_min' => 29,
			'temp_max' => 36,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Suitable condition for transplanting of warm-season crops."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Unsuitable for transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 28,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Suitable condition for transplanting of cool-season crops."
		]);

		Recommendation::create([
			'temp_min' => 29,
			'temp_max' => 36,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Suitable condition for transplanting of warm-season crops."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Unsuitable for transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 36,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Plant with caution as moderate winds may increase evaporation of transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Unsuitable for transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 36,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Plant with caution as moderate winds may increase evaporation of transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Unsuitable for transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 28,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Suitable condition for transplanting of cool-season crops."
		]);

		Recommendation::create([
			'temp_min' => 29,
			'temp_max' => 36,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Suitable condition for transplanting of warm-season crops."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Unsuitable for transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 28,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Suitable condition for transplanting of cool-season crops."
		]);

		Recommendation::create([
			'temp_min' => 29,
			'temp_max' => 36,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Suitable condition for transplanting of warm-season crops."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Unsuitable for transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 28,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Suitable condition for transplanting of cool-season crops."
		]);

		Recommendation::create([
			'temp_min' => 29,
			'temp_max' => 36,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Suitable condition for transplanting of warm-season crops."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Unsuitable for transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 36,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Plant with caution as moderate winds may increase evaporation of transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Unsuitable for transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 36,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Plant with caution as moderate winds may increase evaporation of transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Transplanting",
			'type' => "moderate",
			'content' => "Unsuitable for transplanted seedlings."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Low probability of absent to moderate rain: Mechanical weeding is advised to reduce nutrient competition."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Low probability of absent to moderate rain: Mechanical weeding is advised to reduce nutrient competition."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Low probability of absent to moderate rain: Mechanical weeding is advised to reduce nutrient competition."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Low probability of absent to moderate rain: Mechanical weeding is advised to reduce nutrient competition."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Low probability of absent to moderate rain: Mechanical weeding is advised to reduce nutrient competition."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Low probability of absent to moderate rain: Mechanical weeding is advised to reduce nutrient competition."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Low probability of absent to moderate rain: Mechanical weeding is advised to reduce nutrient competition."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Low probability of absent to moderate rain: Mechanical weeding is advised to reduce nutrient competition."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Low probability of absent to moderate rain: Mechanical weeding is advised to reduce nutrient competition."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Low probability of absent to moderate rain: Mechanical weeding is advised to reduce nutrient competition."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Low probability of absent to moderate rain: Mechanical weeding is advised to reduce nutrient competition."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Low probability of absent to moderate rain: Mechanical weeding is advised to reduce nutrient competition."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Low probability of absent to moderate rain: Mechanical weeding is advised to reduce nutrient competition."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Low probability of absent to moderate rain: Mechanical weeding is advised to reduce nutrient competition."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Low probability of absent to moderate rain: Mechanical weeding is advised to reduce nutrient competition."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mechanical Weeding",
			'type' => "moderate",
			'content' => "Extremely hot and  humid condition: Uncomfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "High spray drift risk: Unpredictable vapour and mist drift may lead to inversion: Spray application is not advised."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "Wind speeds are expected to be mostly favourable for application of agricultural chemicals."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "Hot temperatures may injure crops: caution should be exercised."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "Moderate-High spray drift risk: need to carefully monitor conditions: postpone/spray with caution."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "Hot temperatures may injure crops: caution should be exercised."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "High spray drift risk: Droplet drift and vapour drift are almost uncertain. Unsuitable for most spraying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "Extreme spray drift risk: Unsuitable for spraying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "High spray drift risk: Unpredictable vapour and mist drift may lead to inversion: Spray application is not advised."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "Wind speeds are expected to be mostly favourable for application of agricultural chemicals."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "Hot temperatures may injure crops: caution should be exercised."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "Moderate-High spray drift risk: need to carefully monitor conditions: postpone/spray with caution."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "Hot temperatures may injure crops: caution should be exercised."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "High spray drift risk: Droplet drift and vapour drift are almost uncertain. Unsuitable for most spraying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "Extreme spray drift risk: Unsuitable for spraying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "High spray drift risk: Unpredictable vapour and mist drift may lead to inversion: Spray application is not advised."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "Wind speeds are expected to be mostly favourable for application of agricultural chemicals."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "Hot temperatures may injure crops: caution should be exercised."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "Moderate-High spray drift risk: need to carefully monitor conditions: postpone/spray with caution."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "Hot temperatures may injure crops: caution should be exercised."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "High spray drift risk: Droplet drift and vapour drift are almost uncertain. Unsuitable for most spraying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Foliar Application",
			'type' => "moderate",
			'content' => "Extreme spray drift risk: Unsuitable for spraying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 10,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application at this condition is likely inefffective."
		]);

		Recommendation::create([
			'temp_min' => 11,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Suitable condition for ground application of chemicals."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 10,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application at this condition is likely inefffective."
		]);

		Recommendation::create([
			'temp_min' => 11,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Suitable condition for ground application of chemicals."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 10,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application at this condition is likely inefffective."
		]);

		Recommendation::create([
			'temp_min' => 11,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Suitable condition for ground application of chemicals."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 10,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application at this condition is likely inefffective."
		]);

		Recommendation::create([
			'temp_min' => 11,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Suitable condition for ground application of chemicals."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Unsuitable for chemical application."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 10,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application at this condition is likely inefffective."
		]);

		Recommendation::create([
			'temp_min' => 11,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Suitable condition for ground application of chemicals."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 10,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application at this condition is likely inefffective."
		]);

		Recommendation::create([
			'temp_min' => 11,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Suitable condition for ground application of chemicals."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 10,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application at this condition is likely inefffective."
		]);

		Recommendation::create([
			'temp_min' => 11,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Suitable condition for ground application of chemicals."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 10,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application at this condition is likely inefffective."
		]);

		Recommendation::create([
			'temp_min' => 11,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Suitable condition for ground application of chemicals."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Unsuitable for chemical application."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 10,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application at this condition is likely inefffective."
		]);

		Recommendation::create([
			'temp_min' => 11,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Suitable condition for ground application of chemicals."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 10,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application at this condition is likely inefffective."
		]);

		Recommendation::create([
			'temp_min' => 11,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Suitable condition for ground application of chemicals."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 10,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application at this condition is likely inefffective."
		]);

		Recommendation::create([
			'temp_min' => 11,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Suitable condition for ground application of chemicals."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 10,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application at this condition is likely inefffective."
		]);

		Recommendation::create([
			'temp_min' => 11,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Suitable condition for ground application of chemicals."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Chemical application is not recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Ground Appliation",
			'type' => "moderate",
			'content' => "Unsuitable for chemical application."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Irrigation",
			'type' => "moderate",
			'content' => "Strong winds and hot temperature: Crops may suffer from moisture stress, supplementary irrigation is recommended."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Irrigation",
			'type' => "moderate",
			'content' => "Strong winds and hot temperature: Crops may suffer from moisture stress, supplementary irrigation is recommended."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Irrigation",
			'type' => "moderate",
			'content' => "Strong winds and hot temperature: Crops may suffer from moisture stress, supplementary irrigation is recommended."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Irrigation",
			'type' => "moderate",
			'content' => "Strong winds and hot temperature: Crops may suffer from moisture stress, supplementary irrigation is recommended."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Irrigation",
			'type' => "moderate",
			'content' => "Strong winds and hot temperature: Crops may suffer from moisture stress, supplementary irrigation is recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Irrigation",
			'type' => "moderate",
			'content' => "Dry condition and low rainfall probability: crops may suffer from moisture stress, supplementary irrigation is recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Irrigation",
			'type' => "moderate",
			'content' => "Dry condition and low rainfall probability: crops may suffer from moisture stress, supplementary irrigation is recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Irrigation",
			'type' => "moderate",
			'content' => "Dry condition and low rainfall probability: crops may suffer from moisture stress, supplementary irrigation is recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Irrigation",
			'type' => "moderate",
			'content' => "Dry condition and low rainfall probability: crops may suffer from moisture stress, supplementary irrigation is recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Irrigation",
			'type' => "moderate",
			'content' => "Dry condition and low rainfall probability: crops may suffer from moisture stress, supplementary irrigation is recommended."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Irrigation",
			'type' => "moderate",
			'content' => "Strong winds and hot temperature: Crops may suffer from moisture stress, supplementary irrigation is recommended."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Irrigation",
			'type' => "moderate",
			'content' => "Strong winds and hot temperature: Crops may suffer from moisture stress, supplementary irrigation is recommended."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Irrigation",
			'type' => "moderate",
			'content' => "Strong winds and hot temperature: Crops may suffer from moisture stress, supplementary irrigation is recommended."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Irrigation",
			'type' => "moderate",
			'content' => "Strong winds and hot temperature: Crops may suffer from moisture stress, supplementary irrigation is recommended."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Irrigation",
			'type' => "moderate",
			'content' => "Strong winds and hot temperature: Crops may suffer from moisture stress, supplementary irrigation is recommended."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Suitable for harvesting cool-season crops: Some harvested crops require high humidity to prevent shriveling. "
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Suitable condition for harvesting grain crops."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Hot temperature and humid conditions may not be comfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Suitable for harvesting cool-season crops: Some harvested crops require high humidity to prevent shriveling. "
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Suitable condition for harvesting grain crops."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Hot temperature and humid conditions may not be comfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Suitable for harvesting cool-season crops: Some harvested crops require high humidity to prevent shriveling. "
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Suitable condition for harvesting grain crops."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Hot temperature and humid conditions may not be comfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Harvest with caution as moderate winds may increase transpiration and water loss. "
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Not suitable for harvesting crops."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Harvest earlier as strong winds may cause lodging, in shattering and/or severe crop injury."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Not suitable for harvesting crops."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Harvest with caution as some fruit and vegetable crops require high humidity to prevent shriveling. "
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Suitable condition for harvesting grain crops."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Hot temperature and humid conditions may not be comfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Suitable for harvesting cool-season crops: Some harvested crops require high humidity to prevent shriveling. "
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Suitable condition for harvesting grain crops."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Hot temperature and humid conditions may not be comfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Suitable for harvesting cool-season crops: Some harvested crops require high humidity to prevent shriveling. "
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Suitable condition for harvesting grain crops."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Hot temperature and humid conditions may not be comfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Harvest with caution as moderate winds may increase transpiration and water loss. "
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Not suitable for harvesting crops."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Harvest earlier as strong winds may cause lodging, in shattering and/or severe crop injury."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Not suitable for harvesting crops."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Suitable for harvesting cool-season crops: Some harvested crops require high humidity to prevent shriveling. "
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Suitable condition for harvesting grain crops."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Hot temperature and humid conditions may not be comfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Suitable for harvesting cool-season crops: Some harvested crops require high humidity to prevent shriveling. "
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Suitable condition for harvesting grain crops."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Hot temperature and humid conditions may not be comfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 15,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Suitable for harvesting cool-season crops: Some harvested crops require high humidity to prevent shriveling. "
		]);

		Recommendation::create([
			'temp_min' => 16,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Suitable condition for harvesting grain crops."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Hot temperature and humid conditions may not be comfortable for workers."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Harvest with caution as moderate winds may increase transpiration and water loss. "
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Not suitable for harvesting crops."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 32,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Harvest earlier as strong winds may cause lodging, in shattering and/or severe crop injury."
		]);

		Recommendation::create([
			'temp_min' => 33,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Harvesting",
			'type' => "moderate",
			'content' => "Not suitable for harvesting crops."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 20,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Low temperature will delay drying. Sun drying is not advised."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 36,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Suitable condition for drying activities."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Farmers should take advantage of this period for meat and fish drying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 20,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Low temperature will delay drying. Sun drying is not advised."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 36,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Suitable condition for drying activities."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Farmers should take advantage of this period for meat and fish drying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 20,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Low temperature will delay drying. Sun drying is not advised."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 36,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Suitable condition for drying activities."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Farmers should take advantage of this period for meat and fish drying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 20,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Low temperature will delay drying. Sun drying is not advised."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 36,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Moderate winds will tend to cause excessively rapid drying."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Farmers should take advantage of this period for meat and fish drying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Strong winds will tend to cause excessively rapid drying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 20,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Low temperature will delay drying. Sun drying is not advised."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Extremely dry weather: establish sheds to slow the drying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 20,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Low temperature will delay drying. Sun drying is not advised."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Extremely dry weather: establish sheds to slow the drying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 20,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Low temperature will delay drying. Sun drying is not advised."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Extremely dry weather: establish sheds to slow the drying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 20,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Low temperature will delay drying. Sun drying is not advised."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Moderate winds and dry weather will tend to cause excessively rapid drying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Strong winds and dry weather will tend to cause excessively rapid drying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 20,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Low temperature will delay drying. Sun drying is not advised."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 36,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Suitable condition for drying activities."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Farmers should take advantage of this period for meat and fish drying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 20,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Low temperature will delay drying. Sun drying is not advised."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 36,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Suitable condition for drying activities."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Farmers should take advantage of this period for meat and fish drying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 20,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Low temperature will delay drying. Sun drying is not advised."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 36,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Suitable condition for drying activities."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Farmers should take advantage of this period for meat and fish drying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 20,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Low temperature will delay drying. Sun drying is not advised."
		]);

		Recommendation::create([
			'temp_min' => 21,
			'temp_max' => 36,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Moderate winds will tend to cause excessively rapid drying."
		]);

		Recommendation::create([
			'temp_min' => 37,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Farmers should take advantage of this period for meat and fish drying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Sundrying",
			'type' => "moderate",
			'content' => "Strong winds will tend to cause excessively rapid drying."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mulching",
			'type' => "moderate",
			'content' => "Establishment of mulch is advised to retain soil moisture."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mulching",
			'type' => "moderate",
			'content' => "Establishment of mulch is advised to retain soil moisture."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mulching",
			'type' => "moderate",
			'content' => "Establishment of mulch is advised to retain soil moisture."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mulching",
			'type' => "moderate",
			'content' => "Establishment of mulch is advised to retain soil moisture."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mulching",
			'type' => "moderate",
			'content' => "Establishment of mulch is advised to retain soil moisture."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mulching",
			'type' => "moderate",
			'content' => "Establishment of mulch is advised to retain soil moisture."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mulching",
			'type' => "moderate",
			'content' => "Establishment of mulch is advised to retain soil moisture."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mulching",
			'type' => "moderate",
			'content' => "Establishment of mulch is advised to retain soil moisture."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mulching",
			'type' => "moderate",
			'content' => "Establishment of mulch is advised to retain soil moisture."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mulching",
			'type' => "moderate",
			'content' => "Establishment of mulch is advised to retain soil moisture."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 0,
			'wind_speed_max' => 3,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mulching",
			'type' => "moderate",
			'content' => "Establishment of mulch is advised to retain soil moisture."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 3.1,
			'wind_speed_max' => 6.5,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mulching",
			'type' => "moderate",
			'content' => "Establishment of mulch is advised to retain soil moisture."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 6.6,
			'wind_speed_max' => 19,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mulching",
			'type' => "moderate",
			'content' => "Establishment of mulch is advised to retain soil moisture."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mulching",
			'type' => "moderate",
			'content' => "Establishment of mulch is advised to retain soil moisture."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Mulching",
			'type' => "moderate",
			'content' => "Establishment of mulch is advised to retain soil moisture."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Propping",
			'type' => "moderate",
			'content' => "Some crops require proper propping to reduce lodging."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 71,
			'humidity_max' => 100,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Propping",
			'type' => "moderate",
			'content' => "Some crops require proper propping to reduce lodging."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Propping",
			'type' => "moderate",
			'content' => "Some crops require proper propping to reduce lodging."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 0,
			'humidity_max' => 40,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Propping",
			'type' => "moderate",
			'content' => "Some crops require proper propping to reduce lodging."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 20,
			'wind_speed_max' => 29,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Propping",
			'type' => "moderate",
			'content' => "Some crops require proper propping to reduce lodging."
		]);

		Recommendation::create([
			'temp_min' => -100,
			'temp_max' => 100,
			'humidity_min' => 41,
			'humidity_max' => 70,
			'wind_speed_min' => 30,
			'wind_speed_max' => 100,
			'prob_of_precip_min' => 0,
			'prob_of_precip_max' => 40,
			'precipitation_min' => 0,
			'precipitation_max' => 7.5,
			'title' => "Propping",
			'type' => "moderate",
			'content' => "Some crops require proper propping to reduce lodging."
		]);

    }


}
