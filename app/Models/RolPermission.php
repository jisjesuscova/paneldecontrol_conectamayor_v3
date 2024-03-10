<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RolPermission extends Model
{
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rol_id',
        'add_section',
        'edit_section',
        'delete_section',
        'copy_section',
        'order_section',
        'add_category',
        'edit_category',
        'delete_category',
        'copy_category',
        'order_category',
        'add_content',
        'edit_content',
        'delete_content',
        'copy_content',
        'order_content',
        'watch_audit',
        'add_user',
        'edit_user',
        'delete_user',
        'add_rol',
        'edit_rol',
        'delete_rol',
    ];

    protected $dates = ['deleted_at'];
}