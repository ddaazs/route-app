<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExerciseController extends Controller
{
    public function index(){
        $users = [
            [
                'id' => 1,
                'name' => 'Nguyễn Văn A',
                'email' => 'a@example.com',
                'type' => 'admin',
                'created_at' => '2023-01-01 12:00:00',
                'status' => 'active',
            ],
            [
                'id' => 2,
                'name' => 'Trần Thị B',
                'email' => 'b@example.com',
                'type' => 'editor',
                'created_at' => '2023-02-01 12:00:00',
                'status' => 'active',
            ],
            [
                'id' => 3,
                'name' => 'Lê Văn C',
                'email' => 'c@example.com',
                'type' => 'subscriber',
                'created_at' => '2023-03-01 12:00:00',
                'status' => 'inactive',
            ],
            [
                'id' => 4,
                'name' => 'Phạm Văn D',
                'email' => 'd@example.com',
                'type' => 'admin',
                'created_at' => '2023-04-01 12:00:00',
                'status' => 'active',
            ],
        ];
        return view('exercise',compact('users'));
    }
}
