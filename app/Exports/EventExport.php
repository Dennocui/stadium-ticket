<?php

namespace App\Exports;

use App\ticket;
use Maatwebsite\Excel\Concerns\FromCollection;

class EventExport implements FromCollection
{   
    // public function __construct(TicketRepository $tickets)
    // {
    //     $this->ticket = $tickets;
    // }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return ticket::all();
    }
}
