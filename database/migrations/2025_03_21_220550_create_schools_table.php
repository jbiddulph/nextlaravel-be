<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->integer("urn")->nullable();
            $table->string("la_name")->nullable();
            $table->integer("establishment_number")->nullable();
            $table->string("establishment_name");
            $table->string("establishment_type_group")->nullable();
            $table->string("establishment_status")->nullable();
            $table->string("phase_of_education")->nullable();
            $table->integer("statutory_low_age")->nullable();
            $table->integer("statutory_high_age")->nullable();
            $table->string("boarders")->nullable();
            $table->string("nursery_provision")->nullable();
            $table->string("official_sixth_form")->nullable();
            $table->string("gender")->nullable();
            $table->string("religious_character")->nullable();
            $table->string("religious_ethos")->nullable();
            $table->string("admissions_policy")->nullable();
            $table->integer("school_capacity")->nullable();
            $table->string("special_classes")->nullable();
            $table->date("census_date")->nullable();
            $table->integer("number_of_pupils")->nullable();
            $table->integer("number_of_boys")->nullable();
            $table->integer("number_of_girls")->nullable();
            $table->float("percentage_fsm")->nullable();
            $table->string("trust_school_flag")->nullable();
            $table->string("school_sponsor_flag")->nullable();
            $table->string("federation_flag")->nullable();
            $table->string("federations")->nullable();
            $table->integer("ukprn")->nullable();
            $table->date("ofsted_last_insp")->nullable();
            $table->string("ofsted_special_measures")->nullable();
            $table->date("last_changed_date")->nullable();
            $table->string("street")->nullable();
            $table->string("locality")->nullable();
            $table->string("address3")->nullable();
            $table->string("town")->nullable();
            $table->string("county")->nullable();
            $table->string("postcode")->nullable();
            $table->string("school_website")->nullable();
            $table->string("telephone_number")->nullable();
            $table->string("head_title")->nullable();
            $table->string("head_first_name")->nullable();
            $table->string("head_last_name")->nullable();
            $table->string("head_preferred_job_title")->nullable();
            $table->string("sen1")->nullable();
            $table->string("sen2")->nullable();
            $table->string("sen3")->nullable();
            $table->string("sen4")->nullable();
            $table->string("type_of_resourced_provision")->nullable();
            $table->integer("resourced_provision_on_roll")->nullable();
            $table->integer("resourced_provision_capacity")->nullable();
            $table->integer("sen_unit_on_roll")->nullable();
            $table->integer("sen_unit_capacity")->nullable();
            $table->string("gor")->nullable();
            $table->string("district_administrative")->nullable();
            $table->string("administrative_ward")->nullable();
            $table->string("parliamentary_constituency")->nullable();
            $table->string("urban_rural")->nullable();
            $table->integer("easting")->nullable();
            $table->integer("northing")->nullable();
            $table->string("msoa")->nullable();
            $table->string("lsoa")->nullable();
            $table->string("ofsted_rating")->nullable();
            $table->string("country")->nullable();
            $table->integer("uprn")->nullable();
            $table->string("featured_image")->nullable();
            $table->uuid("id");
            $table->integer("vote_ratio")->nullable();
            $table->integer("vote_total")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('schools');
    }
};
