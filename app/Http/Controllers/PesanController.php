<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class PesanController extends Controller
{
    public function pesan(Request $request)
    {
        $selectedItems = $request->input('pilihan_menu');
        foreach ($selectedItems as $itemId) {
            $item = Menu::find($itemId);
            // Lakukan tindakan tertentu dengan item yang dipilih
        }
        dd($item);
    }
}
