<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Event;
use App\Http\Requests\StoreEventRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CreateEvent implements ShouldQueue
{
    use Dispatchable;

    private $author;
    private $title;
    private $description;
    private $category;
    private $start;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        User $author,
        string $title,
        ?string $description,
        ?string $category,
        ?string $start
    )
    {
        $this->author = $author;
        $this->title = $title;
        $this->description = $description;
        $this->category = $category;
        $this->start = $start;
    }

    public static function fromRequest(StoreEventRequest $request): self
    {
        return new static (
            $request->author(),
            $request->title(),
            $request->description(),
            $request->category(),
            $request->start()
        );
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(): Event
    {
        $event = new Event([
            'title'             => $this->title,
            'description'       => $this->description,
            'category'          => $this->category,
            'start'          => $this->start,
        ]);

        $event->authoredBy($this->author);
        $event->save();
        return $event;
    }
}
