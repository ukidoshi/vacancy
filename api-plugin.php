<?php

namespace NamePlugin;

class NameApi {
    public $api_url;

	// �������� ��������
	// $vacancy_params - ������, ������� ������ � ���� ���������� � ����� �������� (��������, ��������, �� � ��)
    public function publish_vacancy($post, $vacancy_params) {
        global $wpdb;

        $ret = array();

        if (!is_object($post)) {
            return false;
        }
		
		// sending post req
		$res = $this->api_send($this->api_url . "/vacancy", $vacancy_params);
		$res_o = json_decode($res);
		// ���� � ������ api ���� id ��������� ��������
		if ($res !== false && is_object($res_o) && isset($res_o->id)) {
			$ret = array_merge($res_o, $ret);
			return $ret;
		} else {
			return false;
		}

		return false;
    }    

	// �������� ������� ��������.
	// $vacancy_id - id ��������
	public function get_vacancy_negotations($post, $vacancy_id) {
		global $wpdb;

        $ret = array();

        if (!is_object($post)) {
            return false;
        }

        $params = "vacancy_id=$vacancy_id&age_from=18&citizenship=113";
        $res = $this->api_send($this->api_url . 'negotiations/somecollection/?' . $params);
        $res_o = json_decode($res);
		// ���� � api ���� ���� items, ������� ������ �������
        if ($res !== false && is_object($res_o) && isset($res_o->items)) {
            $ret = array_merge($res_o->items, $ret);
			// some code... ��������� ��������/���������� ��������
            return $ret;
        } else {
            return false;
        }

		return false;
	}

	public function api_send_get() {
		// �������� GET �������
        return '';
    }

    public function api_send_post($api_url, $params) {
		// �������� POST �������
        return '';
    }
}