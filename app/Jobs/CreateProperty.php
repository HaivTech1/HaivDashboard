<?php

namespace App\Jobs;

use App\Models\User;
use App\Models\Property;
use App\Http\Requests\PropertyRequest;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class CreateProperty implements ShouldQueue
{
    use Dispatchable;
    
    private $title;
    private $price;
    private $built;
    private $bedroom;
    private $bathroom;
    private $category;
    private $purpose;
    private $address;
    private $latitude;
    private $longitude;
    private $description;
    private $specifications;
    private $image;
    private $video;
    private $author;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(
        string $title,
        string $price,
        string $built,
        string $bedroom,
        string $bathroom,
        string $category,
        string $purpose,
        string $address,
        ?string $latitude,
        ?string $longitude,
        string $description,
        ?string $specifications,
        ?array $image = [],
        ?string $video,
        User $author

    )
    {
        $this->title = $title;
        $this->price = $price;
        $this->built = $built;
        $this->bedroom = $bedroom;
        $this->bathroom = $bathroom;
        $this->category = $category;
        $this->purpose = $purpose;
        $this->address = $address;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
        $this->description = $description;
        $this->specifications = $specifications;
        $this->image = $image;
        $this->video = $video;
        $this->author = $author;
    }

    public static function fromRequest(PropertyRequest $request): self
    {
        return new static(
            $request->title(),
            $request->price(),
            $request->built(),
            $request->bedroom(),
            $request->bathroom(),
            $request->category(),
            $request->purpose(),
            $request->address(),
            $request->latitude(),
            $request->longitude(),
            $request->description(),
            $request->specifications(),
            $request->image(),
            $request->video(),
            $request->author()
        );
    }
    
    public function handle(): Property
    {
        // dd(explode(", ", $this->specifications));
        $property = new Property([
            'title' => $this->title,
            'price' => $this->price,
            'built' => $this->built,
            'purpose' => $this->purpose,
            'bedroom' => $this->bedroom,
            'bathroom' => $this->bathroom,
            'property_category_id' => $this->category,
            'address' => $this->address,
            'longitude' => $this->longitude,
            'latitude' => $this->latitude,
            'description' => $this->description,
            'specifications' => json_encode(explode(", ", $this->specifications)),
            'property_category_id' => $this->category,

        ]);

        $property->authoredBy($this->author);

        if($this->image)
        {
            foreach($this->image as $file)
            {
                $uploadedFileUrl = Cloudinary::upload($file->getRealPath(), [
                    'folder' => 'properties'
                ])->getSecurePath();

                $Imgdata[] = $uploadedFileUrl;
            }
             $property->image = json_encode($Imgdata);
        }

       
        $property->save();
        return $property;
    }
}
// Painted Interior, Running Water, Utility Bill Inclusive, Built in Wardrope, Not Tiled, Good Network Reception