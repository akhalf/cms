<?php

namespace App\Traits;

trait ImageUploadTrait
{
    protected $image_path = 'app/public/images';
    protected $image_width=700;
    protected $image_height=300;

    public function uploadImage($image)
    {
        $image_name = $this->imageName($image);
        \Image::make($image)->resize($this->image_width, $this->image_height)->save(storage_path($this->image_path . '/' . $image_name));

        return $image_name;
    }

    public function imageName($image)
    {
        return time() . '-' . $image->getClientOriginalName();
    }
}
