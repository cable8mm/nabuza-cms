<?php
App::uses('AppModel', 'Model');
/**
 * GameInfo Model
 *
 */
class GameInfo extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'game_info';

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'title';

}
