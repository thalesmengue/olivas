<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'clients' => auth()->user()->clients
        ]);
    }

    public function getByName(string $name): JsonResponse
    {
        $clients = Client::query()
            ->where('user_id', auth()->id())
            ->where('name', 'like', '%' . $name . '%')
            ->get();

        if ($clients->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'Nenhum cliente com esse nome encontrado'
            ]);
        }

        return response()->json([
            'success' => true,
            'clients' => $clients
        ]);
    }
}
