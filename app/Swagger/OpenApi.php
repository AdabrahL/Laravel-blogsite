<?php

namespace App\Swagger;

/**
 * @OA\OpenApi(
 *     @OA\Info(
 *         version="1.0.0",
 *         title="BlogSite API",
 *         description="API documentation for BlogSite (Blogs, Categories, Users).",
 *         @OA\Contact(
 *             email="support@blogsite.test",
 *             name="BlogSite Support"
 *         )
 *     ),
 *
 *     @OA\Server(
 *         url="http://blogsite.test",
 *         description="Local Development Server"
 *     ),
 *     @OA\Server(
 *         url="http://blogsite.test",
 *         description="Production Server"
 *     )
 * )
 */
class OpenApi
{
    // Empty class, only for annotations
}
