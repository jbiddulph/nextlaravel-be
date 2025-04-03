<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory, HasUuids;

    protected $casts = [
        'id' => 'string', // Ensure it's returned as a UUID string
    ];
    
    protected $fillable = [
        'id',
        'school_id',
        'uprn',
        'establishment_name',
        'address',
        'street',
        'locality',
        'town',
        'establishment_type_group',
        'phase_of_education',
        'featured_image',
        'la_name',
        'establishment_number',
        'establishment_status',
        'statutory_low_age',
        'statutory_high_age',
        'boarders',
        'nursery_provision',
        'official_sixth_form',
        'gender',
        'religious_character',
        'religious_ethos',
        'admissions_policy',
        'school_capacity',
        'special_classes',
        'census_date',
        'number_of_pupils',
        'number_of_boys',
        'number_of_girls',
        'percentage_fsm',
        'trust_school_flag',
        'school_sponsor_flag',
        'federation_flag',
        'federations',
        'ukprn',
        'ofsted_last_insp',
        'ofsted_special_measures',
        'last_changed_date',
        'county',
        'postcode',
        'school_website',
        'telephone_number',
        'head_title',
        'head_first_name',
        'head_last_name',
        'head_preferred_job_title',
        'sen1',
        'sen2',
        'sen3',
        'sen4',
        'type_of_resourced_provision',
        'resourced_provision_on_roll',
        'resourced_provision_capacity',
        'sen_unit_on_roll',
        'sen_unit_capacity',
        'gor',
        'district_administrative',
        'administrative_ward',
        'parliamentary_constituency',
        'urban_rural',
        'easting',
        'northing',
        'msoa',
        'lsoa',
        'ofsted_rating',
        'country',
        'vote_ratio',
        'vote_total',
    ];

    public function scopeFilter($query, array $filters)
    {
        if (!empty($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('establishment_name', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('street', 'like', '%' . $filters['search'] . '%')
                    ->orWhere('town', 'like', '%' . $filters['search'] . '%');
            });
        }

        if (!empty($filters['establishment_type_group'])) {
            $query->where('establishment_type_group', $filters['establishment_type_group']);
        }

        if (!empty($filters['phase_of_education'])) {
            $query->where('phase_of_education', $filters['phase_of_education']);
        }
    }
}
