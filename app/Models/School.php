<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = [
        "urn",
        "la_name",
        "establishment_number",
        "establishment_name",
        "establishment_type_group",
        "establishment_status",
        "phase_of_education",
        "statutory_low_age",
        "statutory_high_age",
        "boarders",
        "nursery_provision",
        "official_sixth_form",
        "gender",
        "religious_character",
        "religious_ethos",
        "admissions_policy",
        "school_capacity",
        "special_classes",
        "census_date",
        "number_of_pupils",
        "number_of_boys",
        "number_of_girls",	
        "percentage_fsm",
        "trust_school_flag",
        "school_sponsor_flag",
        "federation_flag",
        "federations",
        "ukprn",
        "ofsted_last_insp",
        "ofsted_special_measures",
        "last_changed_date",
        "street",
        "locality",
        "address3",
        "town",
        "county",
        "postcode",
        "school_website",
        "telephone_number",
        "head_title",
        "head_first_name",
        "head_last_name",
        "head_preferred_job_title",
        "sen1",
        "sen2",
        "sen3",
        "sen4",
        "type_of_resourced_provision",
        "resourced_provision_on_roll",
        "resourced_provision_capacity",
        "sen_unit_on_roll",
        "sen_unit_capacity",
        "gor",
        "district_administrative",
        "administrative_ward",
        "parliamentary_constituency",
        "urban_rural",
        "easting",
        "northing",
        "msoa",
        "lsoa",
        "ofsted_rating",
        "country",
        "uprn",
        "featured_image",
        "id",
        "vote_ratio",
        "vote_total",
    ];

    protected $casts = [
        'id' => 'string',
    ];
    public $timestamps = true; 
}


