<?php
namespace App\Http\Controllers;

use App\Enum\GenderEnum;
use App\Enum\OrderStatusEnum;
use App\Models\DummyUser;
use Illuminate\Validation\Rule;

class UserFormController extends Controller
{
    public function show()
    {
        $statuses   = OrderStatusEnum::cases();
        $genders    = GenderEnum::cases();
        $dummyUsers = DummyUser::all();
        return view('formEnum', compact('genders', 'statuses', 'dummyUsers'));
    }

    public function createDummyUser()
    {
        request()->validate([
            'name'   => 'required|string',
            'gender' => ['required', Rule::enum(GenderEnum::class)],
        ]);

        DummyUser::create([
            'name'   => request()->name,
            'gender' => request()->gender,
        ]);

        return back()->with('success', 'Dummy user created');
    }
}