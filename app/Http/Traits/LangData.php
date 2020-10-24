<?php
namespace App\Http\Traits;
use App\Models\Category;
use App\Models\Item;
use App\Models\Review;
use App\Models\ReviewsLike;
use App\Models\User;
use App\Models\UserItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
trait LangData {

	public function toLang($lang, $data, $single = false) {
		if (empty($data)) {
			return [];
		}
		//dd($data->getRelations());
		if ($single) {
			$langAttrs = $this->getLangKeys($data->getAttributes(), $lang);


			foreach ($langAttrs as $attr) {
				if (str_is('*' . $lang, $attr)) {
					$theKey        = str_replace('_' . $lang, '', $attr);
					$data[$theKey] = $data[$attr];
				}
				unset($data[$attr]);
			}

			return $data;
		}
		$data = $data->map(function ($item, $key) use ($lang) {
			$langAttrs = $this->getLangKeys($item->getAttributes(), $lang);

			foreach ($langAttrs as $attr) {
				if (str_is('*' . $lang, $attr)) {
					$theKey        = str_replace('_' . $lang, '', $attr);
					$item[$theKey] = $item[$attr];
				}
				unset($item[$attr]);
			}
			//$item['aaaa'] = $item->getRelations();
			return $item;

		});
		return $data;
	}

	public function getLangKeys($attr) {
		$langKeys = [];

		foreach ($attr as $item_key => $item_value) {
			foreach (config('app.supported_languages') as $env_lang) {
				if (str_is('*' . $env_lang, $item_key)) {
					$langKeys[] = $item_key;
				}
			}
		}
		return $langKeys;
	}

	

}
