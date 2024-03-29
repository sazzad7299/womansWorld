<?php

namespace App\Models;

use App\Models\ServicePhoto;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'category_id', 'description', 'detail', 'photo',
    ];

    public static $validateRule = [
        'name' => ['required', 'string', 'max: 255'],
        'slug' => ['required', 'string', 'max: 255'],
        'category_id' => ['required'],
        'description' => ['nullable'],
        'detail' => ['required', 'string'],
        'photo' => ['nullable', 'mimes: jpeg,jpg,png,gif,webp'],
    ];
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function photos()
    {
        return $this->hasMany(ServicePhoto::class, 'service_id');
    }

    public function storeService(Object $request)
    {

        try {
            DB::beginTransaction();
            $this->name = $request->name;
            $this->slug = $request->slug;
            $this->category_id = $request->category_id;
            $this->description = $request->description;
            $this->save();
            $service_id = $this->id;
            if ($files = $request->file('photo')) {
                foreach ($files as $file) {

                    $multiple_upload_path = 'public/images/services/';
                    $name = $file->getClientOriginalName();
                    $multiple_image_name = date('YmdHis') . '_' . $name;
                    $file->move($multiple_upload_path, $multiple_image_name);

                    $photo_data[] = [
                        'service_id' => $service_id,
                        'photo' => $multiple_upload_path . $multiple_image_name,
                        'created_at' => date('Y-m-d H:i:s'),
                        'updated_at' => date('Y-m-d H:i:s'),
                    ];
                }
                ServicePhoto::insert($photo_data);
            }
            DB::commit();
            session()->flash('success', 'New Service Created Successfully!');

        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('error', 'Something Went Wrong!');
        }
    }
    public function updateService(object $request, object $service)
    {
        try {
            DB::beginTransaction();

            $service->name = $request->name;
            $service->slug = $request->slug;
            $service->category_id = $request->category_id;
            $service->description = $request->description;
            $service->save();
            $service_id = $service->id;
            if ($files = $request->file('photo')) {
                $photo_data = [];
                foreach ($files as $file) {
                    $multiple_upload_path = 'public/images/services/';
                    $name = $file->getClientOriginalName();
                    $multiple_image_name = date('YmdHis') . '_' . $name;
                    $file->move($multiple_upload_path, $multiple_image_name);

                    $photo_data[] = [
                        'service_id' => $service_id,
                        'photo' => $multiple_upload_path . $multiple_image_name,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];
                }
                ServicePhoto::insert($photo_data);
            }

            DB::commit();
            session()->flash('success', 'Service Updated Successfully!');
        } catch (\Throwable $th) {
            DB::rollBack();
            session()->flash('error', 'Something Went Wrong!');
        }
    }

    public function destroyService(object $service)
    {

        if (file_exists($service->photo)) {
            unlink($service->photo);
        }
        $existingPhotos = $service->photos;

        foreach ($existingPhotos as $existingPhoto) {
            if (file_exists($existingPhoto->photo)) {
                unlink($existingPhoto->photo);
            }
        }

        $service->photos()->delete();
        $destroyService = $service->delete();

        $destroyService
        ? session()->flash('message', 'Service Deleted Successfully!')
        : session()->flash('message', 'Something Went Wrong!');
    }
}
