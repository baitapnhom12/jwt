<?php

namespace App\Swagger\Auth;

use OpenApi\Annotations as OA;

/**
 * @OA\Post(
 *     path="/api/register",
 *     tags={"Authentication"},
 *     summary="Register a new user with email and password.",
 *     description="Register a new user with email and password.",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="name", type="string", format="name", example="username"),
 *             @OA\Property(property="email", type="string", format="email", example="user456@example.com"),
 *             @OA\Property(property="password", type="string", format="password", example="12345678")
 *         )
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="User successfully registered",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="message", type="boolean", example=true)
 *         )
 *     ),
 *     @OA\Response(
 *         response=400,
 *         description="Invalid input",
 *         @OA\JsonContent(
 *             type="object",
 *             @OA\Property(property="error", type="string", example="Invalid input")
 *         )
 *     )
 * )
 */
class Register {}
