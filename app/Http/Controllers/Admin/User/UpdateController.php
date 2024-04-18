<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\Category;


class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Category $user)
    {
        $data = $request->validated();
        $user->update($data);
        return redirect()->route('admin.user.show', compact('user'));
    }
}
