<?php

use PragmaRX\Tracker\Support\Migration;

class CreateTrackerReferersTable extends Migration
{
    /**
     * Table related to this migration.
     *
     * @var string
     */
    private $table = 'tracker_referers';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function migrateUp()
    {
        $this->builder->create(
            $this->table,
            function ($table) {
                $table->bigIncrements('id');

                $table->bigInteger('domain_id')->unsigned()->index();
                $table->string('url')->index();
                $table->string('host');

                $table->timestamp('created_at')->nullable()->index();
                $table->timestamp('updated_at')->nullable()->index();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function migrateDown()
    {
        $this->drop($this->table);
    }
}