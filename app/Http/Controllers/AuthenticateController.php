<?php

namespace Rossina\Http\Controllers;

use Illuminate\Http\Request;
use Rossina\Http\Requests;
use Rossina\User;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthenticateController extends Controller
{

    public function __construct()
    {
        // Aplique o middleware jwt.auth a todos os métodos neste controlador
        // exceto para o método de autenticação. Nós não queremos para evitar
        // o usuário recupera o token se não tiver já
        $this->middleware('jwt.auth', ['except' => ['authenticate']]);
    }

    public function index()
    {
        // Recuperar todos os usuários no banco de dados e devolvê-los
        $users = User::all();
        return $users;
    }

    public function authenticate(Request $request)
    {
        // agarrar credenciais do pedido
        $credentials = $request->only('email', 'password');

        try {
            // tentar verificar as credenciais e criar um token para o usuário
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'credenciais_inválidas'], 401);
            }
        } catch (JWTException $e) {
            // algo deu errado enquanto tenta codificar o token
            return response()->json(['error' => 'não_poderia_criar_token'], 500);
        }

        // tudo de bom assim retornar o token
        return response()->json(compact('token'));
    }

    public function getAuthenticatedUser()
    {
        try {

            if (! $user = JWTAuth::parseToken()->authenticate()) {
                return response()->json(['usuário_não_encontrado'], 404);
            }

        } catch (TokenExpiredException $e) {

            return response()->json(['token_expirado'], $e->getStatusCode());

        } catch (TokenInvalidException $e) {

            return response()->json(['token_inválido'], $e->getStatusCode());

        } catch (JWTException $e) {

            return response()->json(['token_ausente'], $e->getStatusCode());
        }

        // o token é válido e nós ter encontrado o utilizador através do sub reivindicação
        return response()->json(compact('user'));
    }
}
