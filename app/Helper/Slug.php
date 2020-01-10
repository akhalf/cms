<?php

namespace App\Helper;

//use Illuminate\Support\Facades\DB;

class Slug
{
    public static function slug($string, $separator = '-')
    {
        $string = preg_replace("/[^a-z0-9_\s\-۰۱۲۳۴۵۶۷۸۹يءاأإآؤئبپتثجچحخدذرزژسشصضطظعغفقکكگگلمنوهیة]/u", '', $string);
        $string = preg_replace("/[\s\-_]+/", ' ', $string);
        $string = preg_replace("/[\s_]/", $separator, $string);
        return $string;
    }

    public static function uniqueSlug($slug, $table)
    {
        $slug = self::slug($slug);
        $items=\DB::table($table)->select('slug')->whereRaw("slug like '$slug%'")->get();

        $count = '';
        if(sizeof($items))
            $count = count($items)+1;

        return $slug . $count;
    }
}
