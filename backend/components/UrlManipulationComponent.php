<?php

namespace backend\components;

use Yii;
use yii\base\Component;
use yii\base\InvalidConfigException;

/**
* Component that is used to get and manipulate the URL.
*/
class UrlManipulationComponent extends Component {

	/**
	* Public function that returns the url.
	* @return string
	*/
	public function getUrl() {

		return Yii::$app->request->url;
	}

	/**
	* Public functio that returns the last word or construction from the last slash.
	* @return string
	*/
	public function urlLastWord() {

		$url = UrlManipulationComponent::getUrl();

		preg_match("/[^\/]+$/", $url, $matches);
        $last_word = $matches[0];

        return $last_word;
	}

}