<?php

namespace App\Constant;
abstract class Constant
{
    const PRODUCT_STATUS = [
        0 => '<span class="badge bg-danger">Inactive</span>',
        1 => '<span class="badge bg-success">Active</span>',
        2 => '<span class="badge bg-info">Pending</span>',
        3 => '<span class="badge bg-info">Review</span>',
        4 => '<span class="badge bg-info">Waiting</span>',
    ];
}
