<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EmailList;

class EmailListController extends Controller
{

    public function showSubscribers()
    {
        // Fetch the list of subscribers from the EmailList model
        $subscribers = EmailList::all();

        return view('writer.subs', compact('subscribers'));
    }

}
