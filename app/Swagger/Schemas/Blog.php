<?php

namespace App\Swagger\Schemas;

use OpenApi\Annotations as OA;

/**
 * @OA\Schema(
 *     schema="Blog",
 *     type="object",
 *     title="Blog",
 *     required={"id", "title", "content", "category_id"},
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="title", type="string", example="My First Blog"),
 *     @OA\Property(property="content", type="string", example="This is the blog content"),
 *     @OA\Property(property="category_id", type="integer", example=2),
 *     @OA\Property(property="image", type="string", example="blogs/example.png"),
 *     @OA\Property(property="status", type="string", example="published"),
 *     @OA\Property(property="created_at", type="string", format="date-time"),
 *     @OA\Property(property="updated_at", type="string", format="date-time")
 * )
 */
class Blog {}
