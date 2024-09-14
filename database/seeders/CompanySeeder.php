<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    public function run()
    {
        $companies = json_decode(file_get_contents(database_path('seeders/companies.json')), true);

        foreach ($companies as $company) {
            Company::create($company);
        }
    }
}

