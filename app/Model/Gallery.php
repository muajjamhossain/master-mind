<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    protected $fillable =
    [
        'gallery_category_id','title','photo','admin_id','slug','status'
    ];
    public function gallerycategory()
    {
      return $this->belongsTo('App\Model\GalleryCategory' ,'gallery_category_id', 'id');
    }
}
