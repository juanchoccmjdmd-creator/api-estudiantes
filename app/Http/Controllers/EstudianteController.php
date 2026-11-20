<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function index(): JsonResponse
    {
        $estudiantes = Estudiante::all();
        return response()->json([
            'status' => 'success',
            'total' => $estudiantes->count(),
            'data' => $estudiantes,
        ], 200);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'correo' => 'required|email|max:255|unique:estudiantes,correo',
            'programa' => 'required|string|max:255',
        ]);

        $estudiante = Estudiante::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Estudiante registrado correctamente',
            'data' => $estudiante,
        ], 201);
    }

    public function show(string $id): JsonResponse
    {
        $estudiante = Estudiante::find($id);

        if (!$estudiante) {
            return response()->json([
                'status' => 'error',
                'message' => 'Estudiante no encontrado',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $estudiante,
        ], 200);
    }
}
