<?php

use App\Laravel\Models\Station;
use Illuminate\Database\Seeder;

class StationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Station::truncate();


        Station::create([ 'code' => '002048ED', 'name' => 'Buguias - Naybo, Poblacion']);
        Station::create([ 'code' => '002048EE', 'name' => 'Buguias - Mansoyosoy, Catlubong']);
        Station::create([ 'code' => '002048F0', 'name' => 'Buguias - Brgy Hall, Amgaleyguey']);
        Station::create([ 'code' => '002048F1', 'name' => 'Buguias - Upper Patkiao, Natubleng']);
        Station::create([ 'code' => '002048F8', 'name' => 'Buguias - Cagam-is, Amgaleyguey']);
        Station::create([ 'code' => '00204900', 'name' => 'Buguias - Demang, Poblacion']);
        Station::create([ 'code' => '00204901', 'name' => 'Buguias - Bot-oan Brgy Hall, Catlubong']);
        Station::create([ 'code' => '00204906', 'name' => 'Buguias - Alibacong, Buguias']);
        Station::create([ 'code' => '00204A8E', 'name' => 'Buguias - Peggueyna, Amgaleyguey']);
        Station::create([ 'code' => '00204A92', 'name' => 'Buguias - Tabbac, Lengaoan']);
        Station::create([ 'code' => '00204A94', 'name' => 'Buguias - Cotcot, Bangao']);
        Station::create([ 'code' => '00204A97', 'name' => 'Buguias - BSU Buguias']);
        Station::create([ 'code' => '00204A9A', 'name' => 'Buguias - Nalam-an, Sebang']);
        Station::create([ 'code' => '00204A9B', 'name' => 'Buguias - Gusaran, Baculongan Norte']);
        Station::create([ 'code' => '00204A9C', 'name' => 'Buguias - Alam-am, Calamagan']);
        Station::create([ 'code' => '00204AA0', 'name' => 'Buguias - Cabuguiasan, Natubleng']);
        Station::create([ 'code' => '00204AAC', 'name' => 'Buguias - Antopac, Buyacaoan']);
        Station::create([ 'code' => '00204AAD', 'name' => 'Buguias - Lamut, Natubleng']);
        Station::create([ 'code' => '00204AAE', 'name' => 'Buguias - Dontog, Catlubong']);
        Station::create([ 'code' => '00204AB1', 'name' => 'Buguias - Bangao Proper']);
        Station::create([ 'code' => '00204AB2', 'name' => 'Buguias - Pan-ayaoan, Loo']);
        Station::create([ 'code' => '00204AB3', 'name' => 'Buguias Municipal Hall']);
        Station::create([ 'code' => '00204B00', 'name' => 'Benguet State Universiy Main']);
        Station::create([ 'code' => '00204B01', 'name' => 'Buguias - Dalimuno, Baculongan Sur']);
        Station::create([ 'code' => '00204B03', 'name' => 'Buguias - Guioeng, Amlimay']);
        Station::create([ 'code' => '00204B04', 'name' => 'Buguias - Sibugan, Buyacaoan']);
        Station::create([ 'code' => '00204B07', 'name' => 'Buguias - Kimpit, Amlimay']);
        Station::create([ 'code' => '00204B08', 'name' => 'Buguias - Calamagan Proper']);
        Station::create([ 'code' => '00204B09', 'name' => 'Buguias - Ponopon, Catlubong']);
        Station::create([ 'code' => '00204B0A', 'name' => 'Buguias - Pagapag-Pugo, Baculongan Norte']);
        Station::create([ 'code' => '00204B8D', 'name' => 'Buguias - Modayan, Loo']);
    }
}
