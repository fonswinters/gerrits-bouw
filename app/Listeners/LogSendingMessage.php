<?php

namespace App\Listeners;

use Illuminate\Mail\Events\MessageSending;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogSendingMessage
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param MessageSending $event
     * @return void
     */
    public function handle(MessageSending $event)
    {
        \Log::info('Sending message with subject "'.$event->message->getSubject().'" to "'.implode(', "',$event->message->getTo()).'"');
    }
}
