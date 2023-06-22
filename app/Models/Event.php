<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'account_id',
        'event_name',
        'event_slug',
        'event_category',
        'description',
        'event_type',
        'event_start_date',
        'event_end_date',
        'ticket_category_change',
        'registration_start',
        'registration_close',
        'is_gst_on_race_applicable',
        'gst_race_amount',
        'processing_fee',
        'gst_on_processing_fee',
        'display_text_bef_reg',
        'display_text_after_reg',
        'is_full_coupon_reg',
        'allow_international_payment',
        'has_results',
        'results_submission_start',
        'results_submission_end',
        'creation_date',
        'creation_ip',
        'created_by',
        'updated_date',
        'updated_ip',
        'updated_by',
        'status'
    ];
}
