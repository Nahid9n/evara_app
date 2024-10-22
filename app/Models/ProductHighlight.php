<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductHighlight extends Model
{
    use HasFactory;
    private static $productHighlight,$productHighlights;

    public static function newProductHighlight($Highlights,$id){
        foreach ($Highlights as $Highlight){
            self::$productHighlight = new ProductHighlight();
            self::$productHighlight->product_id = $id;
            self::$productHighlight->Highlight_id = $Highlight;
            self::$productHighlight->save();
        }
    }


    public static function updateProductHighlight($Highlights, $id){

        self::$productHighlights = ProductHighlight::where('product_id',$id)->get();
        foreach (self::$productHighlights as $productHighlight ){
            $productHighlight->delete();
        }

        self::newProductHighlight($Highlights, $id);
    }

    public static function deleteProductHighlight($id) {

        self::$productHighlights = ProductHighlight::where('product_id',$id)->get();
        foreach (self::$productHighlights as $productHighlight ){
            $productHighlight->delete();
        }
    }

    public function Highlight()
    {
        return $this->belongsTo(Highlight::class);
    }
    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }


}
