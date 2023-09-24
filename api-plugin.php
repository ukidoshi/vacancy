<?php

namespace NamePlugin;

class NameApi {
    public $api_url;

	// выложить вакансию
	// $vacancy_params - объект, который хранит в себе информацию о новой вакансии (название, описание, зп и тд)
    public function publish_vacancy($post, $vacancy_params) {
        global $wpdb;

        $ret = array();

        if (!is_object($post)) {
            return false;
        }
		
		// sending post req
		$res = $this->api_send($this->api_url . "/vacancy", $vacancy_params);
		$res_o = json_decode($res);
		// если в ответе api есть id созданной вакансии
		if ($res !== false && is_object($res_o) && isset($res_o->id)) {
			$ret = array_merge($res_o, $ret);
			return $ret;
		} else {
			return false;
		}

		return false;
    }    

	// получить отклики вакансии.
	// $vacancy_id - id вакансии
	public function get_vacancy_negotations($post, $vacancy_id) {
		global $wpdb;

        $ret = array();

        if (!is_object($post)) {
            return false;
        }

        $params = "vacancy_id=$vacancy_id&age_from=18&citizenship=113";
        $res = $this->api_send($this->api_url . 'negotiations/somecollection/?' . $params);
        $res_o = json_decode($res);
		// если в api есть поле items, который хранит отклики
        if ($res !== false && is_object($res_o) && isset($res_o->items)) {
            $ret = array_merge($res_o->items, $ret);
			// some code... различные проверки/фильтрации откликов
            return $ret;
        } else {
            return false;
        }

		return false;
	}

	public function api_send_get() {
		// Отправка GET запроса
        return '';
    }

    public function api_send_post($api_url, $params) {
		// Отправка POST запроса
        return '';
    }
}